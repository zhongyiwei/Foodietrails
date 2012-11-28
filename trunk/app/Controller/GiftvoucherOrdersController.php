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
        $data = $this->GiftvoucherOrder->find("all", array('conditions' => array("GiftvoucherOrder.id" => "$id")));
        $recipientID = $data[0]['GiftvoucherOrder']['recipient_id'];
        $recipientEmail = $this->User->find('list', array('fields' => 'user_email', 'conditions' => array("User.id" => "$recipientID")));
        $this->set('giftvoucherOrder', $this->GiftvoucherOrder->read(null, $id));
        $this->set('recipientEmail', $recipientEmail);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $id = $this->request->data['GiftvoucherOrder']['user_id'];
            $users = $this->User->find("all", array('conditions' => array("User.id" => "$id")));
            $redeemCode = $users[0]['User']['user_first_name'].date('YmdHis');
//            print_r($users);
            $this->GiftvoucherOrder->create();
            $this->request->data['GiftvoucherOrder']['gift_purchase_date'] = date('Y-m-d H:i:s');
            $this->request->data['GiftvoucherOrder']['gift_due_date'] = date('Y-m-d H:i:s', strtotime('+1 year'));
            $this->request->data['GiftvoucherOrder']['gift_redeem_code'] = "$redeemCode";
            if ($this->GiftvoucherOrder->save($this->request->data)) {
                $this->Session->setFlash(__('The giftvoucher order has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The giftvoucher order could not be saved. Please, try again.'), 'failure-message');
            }
        }
        $users = $this->GiftvoucherOrder->User->find('list');
        $giftVouchers = $this->GiftvoucherOrder->GiftVoucher->find('list');
        $userEmail = $this->GiftvoucherOrder->User->find('list', array('fields' => 'user_email'));
        $giftName = $this->GiftvoucherOrder->GiftVoucher->find('list', array('fields' => 'gift_voucher_name'));
        $this->set(compact('users', 'giftVouchers', 'userEmail', 'giftName'));
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
                $this->Session->setFlash(__('The giftvoucher order could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->GiftvoucherOrder->read(null, $id);
        }
        $users = $this->GiftvoucherOrder->User->find('list');
        $giftVouchers = $this->GiftvoucherOrder->GiftVoucher->find('list');
        $userEmail = $this->GiftvoucherOrder->User->find('list', array('fields' => 'user_email'));
        $giftName = $this->GiftvoucherOrder->GiftVoucher->find('list', array('fields' => 'gift_voucher_name'));
        $this->set(compact('users', 'giftVouchers', 'userEmail', 'giftName'));
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
        $this->Session->setFlash(__('Giftvoucher order was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

}
