<?php

App::uses('AppController', 'Controller');

/**
 * GiftvoucherOrders Controller
 *
 * @property GiftvoucherOrder $GiftvoucherOrder
 */
class GiftvoucherOrdersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->GiftvoucherOrder->recursive = 0;
        $this->set('giftvoucherOrders', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->GiftvoucherOrder->id = $id;
        if (!$this->GiftvoucherOrder->exists()) {
            throw new NotFoundException(__('Invalid giftvoucher order'));
        }
        $this->set('giftvoucherOrder', $this->GiftvoucherOrder->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->GiftvoucherOrder->create();
            if ($this->GiftvoucherOrder->save($this->request->data)) {
                $this->Session->setFlash(__('The giftvoucher order has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The giftvoucher order could not be saved. Please, try again.'));
            }
        }
        $users = $this->GiftvoucherOrder->User->find('list');
        $giftVouchers = $this->GiftvoucherOrder->GiftVoucher->find('list');
        $userEmail = $this->GiftvoucherOrder->User->find('list', array('fields' => 'user_email'));
        $giftName = $this->GiftvoucherOrder->GiftVoucher->find('list', array('fields' => 'gift_voucher_name'));
        $this->set(compact('users', 'giftVouchers','userEmail','giftName'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->GiftvoucherOrder->id = $id;
        if (!$this->GiftvoucherOrder->exists()) {
            throw new NotFoundException(__('Invalid giftvoucher order'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->GiftvoucherOrder->save($this->request->data)) {
                $this->Session->setFlash(__('The giftvoucher order has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The giftvoucher order could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->GiftvoucherOrder->read(null, $id);
        }
        $users = $this->GiftvoucherOrder->User->find('list');
        $giftVouchers = $this->GiftvoucherOrder->GiftVoucher->find('list');
        $userEmail = $this->GiftvoucherOrder->User->find('list', array('fields' => 'user_email'));
        $giftName = $this->GiftvoucherOrder->GiftVoucher->find('list', array('fields' => 'gift_voucher_name'));
        $this->set(compact('users', 'giftVouchers','userEmail','giftName'));
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
        $this->GiftvoucherOrder->id = $id;
        if (!$this->GiftvoucherOrder->exists()) {
            throw new NotFoundException(__('Invalid giftvoucher order'));
        }
        if ($this->GiftvoucherOrder->delete()) {
            $this->Session->setFlash(__('Giftvoucher order deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Giftvoucher order was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}