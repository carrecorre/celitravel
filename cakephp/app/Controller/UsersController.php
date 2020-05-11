

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
		$this->User->recursive = 0;
		$this->paginate['User']['limit'] = 10;
		$this->paginate['User']['order'] = array('User.id' => 'asc');
		//$this->paginate['User']['conditions'] => array('User.id' => '');
		$this->set('users', $this->paginate());
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
		if($this->Auth->user('id')!= $id){
			return $this->redirect(array('controller'=>'pages','action' => 'home'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Usuario registrado correctamente.'));
				return $this->redirect(array('controller'=>'pages','action' => 'home'));
			} else {
				$this->Flash->error(__('Error al registrar el usuario.'));
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
		if($this->Auth->user('id')!= $id){
			return $this->redirect(array('controller'=>'pages','action' => 'home'));
		}
		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario guardado correctamente.'));
				return $this->redirect(array('controller'=>'pages','action' => 'home'));
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
			$this->Flash->success(__('Usuario eliminado correctamente.'));
		} else {
			$this->Flash->error(__('Error al eliminar el usuario.'));
		}
		return $this->redirect(array('controller'=>'pages','action' => 'home'));
	}
}
