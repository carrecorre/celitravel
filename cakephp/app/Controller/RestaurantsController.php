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
public $components = array('RequestHandler', 'Paginator');
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
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view','search','searchjson');
	}

	public function isAuthorized($user){

		if(isset($user['role']) && $user['role'] == 'user'){

			if(in_array($this->action, array('edit','view'))){
				return true;
			}else{
				if($this->Auth->user('id')){

					$this->redirect($this->Auth->redirect());
				}
			}
		}else{
			return true;
		}
	}

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

		$userLocation = @unserialize (file_get_contents('http://ip-api.com/php/'));
		if ($userLocation && $userLocation['status'] == 'success') {
			$this->Session->write('userLocation',$userLocation);
		}

		if (!$this->Restaurant->exists($id)) {
			throw new NotFoundException(__('Restaurante no encontrado'));
		}

		$restaurant = $this->Restaurant->findById($id);
		
		$userLocation = ($this->Session->read('userLocation'));
		$distance = $this->Restaurant->restaurantUserDistance($restaurant['Restaurant']['latitude'], $restaurant['Restaurant']['longitude'], $userLocation);

		if($distance){
			$restaurant['Restaurant']['user_distance'] = $distance;
		}
	
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

				$this->Flash->success(__('Restaurante añadido.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El restaurante no ha podido ser añadido.'));
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
			throw new NotFoundException(__('Restaurante no encontrado.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Restaurant->save($this->request->data)) {

				$this->RestaurantSpecialty->deleteRestaurantsSpecialtyByRestaurantId($id);

				foreach($this->request->data['RestaurantSpecialty']['specialty_id'] as $specialty){
					$this->RestaurantSpecialty->addWithSpecialtyIdAndRestaurantId($specialty, $id);
				}

				$this->Session->setFlash(__('El restaurante ha sido actualizado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El restaurante no ha podido ser actualizado.'));
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
			throw new NotFoundException(__('Restaurante no encontrado.'));
		}

		$this->request->allowMethod('post', 'delete');
		
		$this->RestaurantSpecialty->deleteRestaurantsSpecialtyByRestaurantId($id);
		$this->Review->deleteReviewsByRestaurantId($id);
		if ($this->Restaurant->delete($id)) {
			$this->Flash->success(__('El restaurante ha sido eliminado.'));
		} else {
			$this->Flash->error(__('El restaurante no ha podido ser eliminado.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function searchjson(){
		$term = null;
		if(!empty($this->request->query['term'])){
			$term = $this->request->query['term'];
			$terms = explode(' ', trim($term));
			$terms = array_diff($terms, array(''));
			foreach($terms as $term){
				$conditionsRestaurant[] = array('Restaurant.name LIKE' => '%'.$term.'%');
			}
			$restaurants = $this->Restaurant->find('all', array('recursive' => -1,
											'fields' => array(
												'Restaurant.id',
												'Restaurant.name',
												'Restaurant.address',
												'Restaurant.town'
											), 
											'conditions' => $conditionsRestaurant,
											'limit' => 20
										));
			
			echo json_encode($restaurants);
			$this->autoRender = false;							
		}
	}

	public function searchtownjson(){
		$term = null;
		if(!empty($this->request->query['term'])){
			$term = $this->request->query['term'];
			$terms = explode(' ', trim($term));
			$terms = array_diff($terms, array(''));
			foreach($terms as $term){
				$conditionsRestaurant[] = array('Restaurant.town LIKE' => '%'.$term.'%');
			}
			$restaurants = $this->Restaurant->find('all', array('recursive' => -1,
											'fields' =>
											
												array('DISTINCT Restaurant.town')
											, 
											'conditions' => $conditionsRestaurant,
											'limit' => 20
										));
			
			echo json_encode($restaurants);
			$this->autoRender = false;							
		}

	}


	public function restaurantJson(){
		$restaurants = ($this->Session->read('restaurants'));
		
		echo json_encode($restaurants);
		$this->autoRender = false;		

	}

	public function search(){

		$userLocation = @unserialize (file_get_contents('http://ip-api.com/php/'));
		if ($userLocation && $userLocation['status'] == 'success') {
			$this->Session->write('userLocation',$userLocation);
		}

		$search = null;

		foreach($this->request->query as $key => $query){
			if($query == '1'){
				$specialties[] = $key;
			}
		}

		if(!empty($this->request->query['search'])){

			$search = $this->request->query['search'];
			$town = $this->request->query['search-town'];

			$search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			foreach($terms as $term){
				$conditionsRest[] = array('Restaurant.name LIKE' =>  '%'.$term.'%',
											'Restaurant.town LIKE' =>  '%'.$town.'%', 				
			);
			}
			if(!isset($specialties)){
				foreach($this->request->query as $key => $query){				
						$specialties[] = $key;				
				}
			}
			$restaurants = $this->Restaurant->search($conditionsRest, $specialties);
			
			foreach ($restaurants as $key => $restaurant){
				$general = $this->Review->getGeneralRateByRestaurantId($restaurant['Restaurant']['id']);
				$knowledge = $this->Review->getGlutenKnowledgeByRestaurantId($restaurant['Restaurant']['id']);
				$restaurants[$key]['Restaurant']['general_rate'] = $general[0]['average'];
				$restaurants[$key]['Restaurant']['gluten_knowledge'] = $knowledge[0]['average'];
			}
	
		}else if(!empty($this->request->query['search-town'])){

			$town = $this->request->query['search-town'];

			$search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $town);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			foreach($terms as $term){

				$conditionsRest[] = array('Restaurant.town LIKE' =>  '%'.$town.'%', 				
			);
			}
			if(!isset($specialties)){
				foreach($this->request->query as $key => $query){				
						$specialties[] = $key;				
				}
			}
			$restaurants = $this->Restaurant->search($conditionsRest, $specialties);
			
			foreach ($restaurants as $key => $restaurant){
				$general = $this->Review->getGeneralRateByRestaurantId($restaurant['Restaurant']['id']);
				$knowledge = $this->Review->getGlutenKnowledgeByRestaurantId($restaurant['Restaurant']['id']);
				$restaurants[$key]['Restaurant']['general_rate'] = $general[0]['average'];
				$restaurants[$key]['Restaurant']['gluten_knowledge'] = $knowledge[0]['average'];
			}
		}else{
			$restaurants = $this->Restaurant->findBestGlutenKnowledgeRated(5);
			foreach ($restaurants as $key => $restaurant){
				$general = $this->Review->getGeneralRateByRestaurantId($restaurant['Restaurant']['id']);
				$knowledge = $this->Review->getGlutenKnowledgeByRestaurantId($restaurant['Restaurant']['id']);
				$restaurants[$key]['Restaurant']['general_rate'] = $general[0]['average'];
				$restaurants[$key]['Restaurant']['gluten_knowledge'] = $knowledge[0]['average'];
			}
		}
		
		$userLocation = ($this->Session->read('userLocation'));

		foreach ($restaurants as $key => $restaurant){
			$distance = $this->Restaurant->restaurantUserDistance($restaurant['Restaurant']['latitude'], $restaurant['Restaurant']['longitude'], $userLocation);
		
			if($distance){
				$restaurants[$key]['Restaurant']['user_distance'] = $distance;
			}
		}

		$provinces = $this->Restaurant->Province->find('list');
		$specialties = $this->Specialty->find('list');
		$this->Session->write('restaurants',$restaurants);

        $this->set(
                array(
					'specialties' => $specialties,
					'restaurants' => $restaurants
                )
                );

	}
}
