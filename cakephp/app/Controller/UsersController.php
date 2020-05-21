

<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler');
	public $helpers = array('Html', 'Form', 'Time', 'Js');

	public $paginate = array(
		'limit' => 10,
		'order' => array(
			'User.id' => 'asc'
		)
	);

	var $uses = array(
        'User',
        'Specialty',
        'Review',
        'Restaurant',
        'RestaurantSpecialty'
	);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add');
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

	public function login(){

		if ($this->request->is('post')) {
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			}else{
				echo json_encode(array('false'));
			}		
		}

	$this->autoRender = false;	
	}

	public function logout(){		
		return $this->redirect($this->Auth->logout());	
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if($this->Auth->user('role')!= 'admin'){
			return $this->redirect(array('controller'=>'pages','action' => 'home'));
		}
		$conditions[] = array();
		$paramsConsulta = array();
		$users = $this->paginar(
			$paramsConsulta,
			$conditions,
			10
		);
		$this->set('users', $users);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario no encontrado'));
		}
		if($this->Auth->user('role')!='admin'){
			if($this->Auth->user('id')!= $id){
				return $this->redirect(array('controller'=>'pages','action' => 'home'));
			}
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

		$user = $this->User->find('first', $options);

		$conditions[] = array('User.id LIKE' =>  $id);
		
			$paramsConsulta = array(
				'fields' => array('Review.*'),	
							'alias' => 'Review',
							'table' => 'reviews',
							'order' => "Review.date DESC",
							'conditions' => array(
								'Review.user_id = User.id'
							)	
			);

		$reviews = $this->paginar(
			$paramsConsulta,
			$conditions,
			5,
			'Review'
		);
		
		foreach ($reviews as $key => $review){
            $restaurant = $this->Restaurant->findById($review['Review']['restaurant_id']);
			$reviews[$key]['Review']['restaurant_name'] =  $restaurant['Restaurant']['name'];
			$reviews[$key]['Review']['restaurant_address'] = $restaurant['Restaurant']['address'].' - '.
			$restaurant['Restaurant']['town'].', '.
			$restaurant['Restaurant']['postal_code'].', '.
			$restaurant['Province']['name'].'('.
			$restaurant['Province']['community'].')';
		}

		$this->set(array(
						'user' => $user,
				   		'reviews' => $reviews
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
			if($this->request->data['User']['role']=='0'){
				$this->request->data['User']['role'] = 'user';
			}
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario registrado correctamente.'));
				return $this->redirect(array('controller'=>'pages','action' => 'home'));
			} else {
				$this->Session->setFlash(__('Error al registrar el usuario.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario no encontrado'));
		}
		if($this->Auth->user('role')!='admin'){
			if($this->Auth->user('id')!= $id){
				return $this->redirect(array('controller'=>'pages','action' => 'home'));
			}
		}
		
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario guardado correctamente.'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('Error al guardar el usuario.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$user = $this->User->findById($id);
        $this->set(
                array(
					'user' => $user
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario no encontrado'));
		}
		$this->request->allowMethod('post', 'delete');

		$this->Review->deleteReviewsByUserId($id);
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('Usuario eliminado correctamente.'));
		} else {
			$this->Session->setFlash(__('Error al eliminar el usuario.'));
		}
		$current_user = $this->Session->read('current_user');
		if(isset($current_user) && $current_user['role']=='admin'){
			return $this->redirect(array('action' => 'index'));
		}else{
			return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		
	}
}
