<?php
App::uses('AppController', 'Controller');
/**
 * GiftVouchers Controller
 *
 * @property GiftVoucher $GiftVoucher
 */
class GiftVouchersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GiftVoucher->recursive = 0;
		$this->set('giftVouchers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->GiftVoucher->id = $id;
		if (!$this->GiftVoucher->exists()) {
			throw new NotFoundException(__('Invalid gift voucher'));
		}
		$this->set('giftVoucher', $this->GiftVoucher->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GiftVoucher->create();
			if ($this->GiftVoucher->save($this->request->data)) {
				$this->Session->setFlash(__('The gift voucher has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift voucher could not be saved. Please, try again.'));
			}
		}
//		$users = $this->GiftVoucher->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->GiftVoucher->id = $id;
		if (!$this->GiftVoucher->exists()) {
			throw new NotFoundException(__('Invalid gift voucher'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GiftVoucher->save($this->request->data)) {
				$this->Session->setFlash(__('The gift voucher has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift voucher could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GiftVoucher->read(null, $id);
		}
//		$users = $this->GiftVoucher->User->find('list');
		$this->set(compact('users'));
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
		$this->GiftVoucher->id = $id;
		if (!$this->GiftVoucher->exists()) {
			throw new NotFoundException(__('Invalid gift voucher'));
		}
		if ($this->GiftVoucher->delete()) {
			$this->Session->setFlash(__('Gift voucher deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gift voucher was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
