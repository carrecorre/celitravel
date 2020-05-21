<?php
App::uses('AppController', 'Controller');
/**
 * Reviews Controller
 *
 * @property Review $Review
 * @property PaginatorComponent $Paginator
 */
class ReviewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Review->recursive = 0;
		$this->set('reviews', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
		$this->set('review', $this->Review->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	$this->autoRender = false;	

		if ($this->request->is('post')) {
			$this->Review->create();
			if ($this->Review->save($this->request->data)) {
				return true;
			} else {
				
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
				return false;
			}
		}
		$restaurants = $this->Review->Restaurant->find('list');
		$users = $this->Review->User->find('list');
		$this->set(compact('restaurants', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Review->save($this->request->data)) {
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The review could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
			$this->request->data = $this->Review->find('first', $options);
		}
		$restaurants = $this->Review->Restaurant->find('list');
		$users = $this->Review->User->find('list');
		$this->set(compact('restaurants', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $restaurant) {
	
		$this->autoRender = false;		

		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Review->delete($id)) {
			$this->Session->setFlash(__('Tu opinión ha sido eliminada.'));
			return $this->redirect(array('controller'=> 'restaurants','action' => 'view', $restaurant));
		} else {
			$this->Session->setFlash(__('The review could not be deleted. Please, try again.'));
			return $this->redirect(array('controller'=> 'restaurants','action' => 'view', $restaurant));
		}

	}

}
