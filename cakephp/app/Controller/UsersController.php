

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
	public $components = array('RequestHandler', 'Session');
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
				return $this->redirect(array('action' => 'index'));
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Usuario guardado correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Error al guardar el usuario.'));
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
		return $this->redirect(array('action' => 'index'));
	}
}
