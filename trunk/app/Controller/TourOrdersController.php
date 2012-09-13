<?php
App::uses('AppController', 'Controller');
/**
 * TourOrders Controller
 *
 * @property TourOrder $TourOrder
 */
class TourOrdersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TourOrder->recursive = 0;
		$this->set('tourOrders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TourOrder->id = $id;
		if (!$this->TourOrder->exists()) {
			throw new NotFoundException(__('Invalid tour order'));
		}
		$this->set('tourOrder', $this->TourOrder->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TourOrder->create();
			if ($this->TourOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The tour order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour order could not be saved. Please, try again.'));
			}
		}
		$tours = $this->TourOrder->Tour->find('list');
		$users = $this->TourOrder->User->find('list');
		$this->set(compact('tours', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TourOrder->id = $id;
		if (!$this->TourOrder->exists()) {
			throw new NotFoundException(__('Invalid tour order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TourOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The tour order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TourOrder->read(null, $id);
		}
		$tours = $this->TourOrder->Tour->find('list');
		$users = $this->TourOrder->User->find('list');
		$this->set(compact('tours', 'users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TourOrder->id = $id;
		if (!$this->TourOrder->exists()) {
			throw new NotFoundException(__('Invalid tour order'));
		}
		if ($this->TourOrder->delete()) {
			$this->Session->setFlash(__('Tour order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tour order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
