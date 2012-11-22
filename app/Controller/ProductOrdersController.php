<?php
App::uses('AppController', 'Controller');
/**
 * ProductOrders Controller
 *
 * @property ProductOrder $ProductOrder
 */
class ProductOrdersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductOrder->recursive = 0;
		$this->set('productOrders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProductOrder->id = $id;
		if (!$this->ProductOrder->exists()) {
			throw new NotFoundException(__('Invalid product order'));
		}
		$this->set('productOrder', $this->ProductOrder->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductOrder->create();
			if ($this->ProductOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The product order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product order could not be saved. Please, try again.'),'failure-message');
			}
		}
		$products = $this->ProductOrder->Product->find('list');
		$users = $this->ProductOrder->User->find('list');
		$this->set(compact('products', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProductOrder->id = $id;
		if (!$this->ProductOrder->exists()) {
			throw new NotFoundException(__('Invalid product order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProductOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The product order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product order could not be saved. Please, try again.'),'failure-message');
			}
		} else {
			$this->request->data = $this->ProductOrder->read(null, $id);
		}
		$products = $this->ProductOrder->Product->find('list');
		$users = $this->ProductOrder->User->find('list');
		$this->set(compact('products', 'users'));
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
		$this->ProductOrder->id = $id;
		if (!$this->ProductOrder->exists()) {
			throw new NotFoundException(__('Invalid product order'));
		}
		if ($this->ProductOrder->delete()) {
			$this->Session->setFlash(__('Product order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product order was not deleted'),'failure-message');
		$this->redirect(array('action' => 'index'));
	}
}
