<?php
App::uses('AppController', 'Controller');
/**
 * Restaurants Controller
 *
 * @property Restaurant $Restaurant
 * @property PaginatorComponent $Paginator
 */
class RestaurantsController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('RequestHandler', 'Session');
public $helpers = array('Html', 'Form', 'Time', 'Js');

public $paginate = array(
	'limit' => 10,
	'order' => array(
		'Restaurant.id' => 'asc'
	)
);

	var $uses = array(
        'Restaurant',
        'Specialty',
        'Review',
        'User',
        'RestaurantSpecialty'
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Restaurant->recursive = 0;
		$this->paginate['Restaurant']['limit'] = 10;
		$this->paginate['Restaurant']['order'] = array('Restaurant.id' => 'asc');
		//$this->paginate['User']['conditions'] => array('User.id' => '');
		$this->set('restaurants', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Restaurant->exists($id)) {
			throw new NotFoundException(__('Invalid restaurant'));
		}

		$restaurant = $this->Restaurant->findById($id);
		foreach ($restaurant['Review'] as $key => $review){
            $user = $this->User->findById($review['user_id']);
            $review['username'] = $user['User']['username'];
            $restaurant['Review'][$key] = $review;
        }
        $averages = $this->Review->getAveragesByRestaurantId($id);
        $specialties = $this->RestaurantSpecialty->getSpecialtiesNamesByRestaurantId($id);

		$this->set(array(
						'restaurant' => $restaurant,
						'averages' => $averages,
						'specialties' => $specialties
					)
				);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() { 
		
		if ($this->request->is('post')) {
			$this->Restaurant->create();

			if ($this->Restaurant->save($this->request->data)) {


				$id = $this->Restaurant->getLastInsertID();

				foreach($this->request->data['RestaurantSpecialty']['specialty_id'] as $specialty){
					$this->RestaurantSpecialty->addWithSpecialtyIdAndRestaurantId($specialty, $id);
				}

				$this->Flash->success(__('The restaurant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
			}
		}
		
		$provinces = $this->Restaurant->Province->find('list');
		$specialties = $this->Specialty->find('list');
		$this->set(
			array(
				'provinces' => $provinces,
				'specialties' => $specialties
			)
			);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Restaurant->exists($id)) {
			throw new NotFoundException(__('Invalid restaurant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Restaurant->save($this->request->data)) {

				$this->RestaurantSpecialty->deleteRestaurantsSpecialtyByRestaurantId($id);

				foreach($this->request->data['RestaurantSpecialty']['specialty_id'] as $specialty){
					$this->RestaurantSpecialty->addWithSpecialtyIdAndRestaurantId($specialty, $id);
				}

				$this->Flash->success(__('The restaurant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
			$this->request->data = $this->Restaurant->find('first', $options);
		}
		$provinces = $this->Restaurant->Province->find('list');
		$specialties = $this->Specialty->find('list');
		$restaurant = $this->Restaurant->findById($id);
		$restaurantSpecialties = $this->RestaurantSpecialty->getSpecialtiesIdsByRestaurantId($id);
        $this->set(
                array(
                    'provinces' => $provinces,
					'specialties' => $specialties,
					'restaurant' => $restaurant,
                    'restaurantSpecialties' => $restaurantSpecialties
                )
                );
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Restaurant->exists($id)) {
			throw new NotFoundException(__('Invalid restaurant'));
		}

		$this->request->allowMethod('post', 'delete');
		
		$this->RestaurantSpecialty->deleteRestaurantsSpecialtyByRestaurantId($id);
		if ($this->Restaurant->delete($id)) {
			$this->Flash->success(__('The restaurant has been deleted.'));
		} else {
			$this->Flash->error(__('The restaurant could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
