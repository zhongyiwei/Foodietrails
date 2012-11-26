<?php

App::uses('AppController', 'Controller');

/**
 * UserSubscriptions Controller
 *
 * @property UserSubscription $UserSubscription
 */
class UserSubscriptionsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->UserSubscription->recursive = 0;
        $this->set('userSubscriptions', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->UserSubscription->id = $id;
        if (!$this->UserSubscription->exists()) {
            throw new NotFoundException(__('Invalid user subscription'));
        }
        $this->set('userSubscription', $this->UserSubscription->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->UserSubscription->create();
            if ($this->UserSubscription->save($this->request->data)) {
                $this->Session->setFlash(__('The user subscription has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user subscription could not be saved. Please, try again.'));
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
        $this->UserSubscription->id = $id;
        if (!$this->UserSubscription->exists()) {
            throw new NotFoundException(__('Invalid user subscription'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserSubscription->save($this->request->data)) {
                $this->Session->setFlash(__('The user subscription has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user subscription could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->UserSubscription->read(null, $id);
        }
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
        $this->UserSubscription->id = $id;
        if (!$this->UserSubscription->exists()) {
            throw new NotFoundException(__('Invalid user subscription'));
        }
        if ($this->UserSubscription->delete()) {
            $this->Session->setFlash(__('User subscription deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User subscription was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function subscribe() {
        if ($this->request->is('post')) {
            $email = $this->request->data['UserSubscription']['user_email'];
            $temp = $this->UserSubscription->find('all', array('conditions' => array('user_email' => "$email",'subscription_status'=>'Yes')));
            if ($temp != null) {
                $this->Session->setFlash(__('You have alerady subscribed to our newsletters'), 'failure-message');
            } else {
                $this->request->data['UserSubscription']['subscription_status'] = 'Yes';
                $this->UserSubscription->create();
                if ($this->UserSubscription->save($this->request->data)) {
                    $this->redirect(array('action' => 'askedsuccessful'));
                } else {
                    $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'failure-message');
                }
            }
        }
    }

    public function unsubscribe($id = null) {
//        $id = $this->request['User_subscription']['id'];
        if ($this->request->is('post')) {
            $email = $this->request->data['UserSubscription']['user_email'];
            $temp = $this->UserSubscription->find('all', array('conditions' => array('user_email' => "$email")));
            if ($temp != null) {
                $this->request->data['UserSubscription']['id'] = $temp[0]['UserSubscription']['id'];
                $this->request->data['UserSubscription']['subscription_status'] = 'No';
                if ($this->UserSubscription->save($this->request->data)) {
                    $this->redirect(array('action' => 'askedsuccessful'));
                }
            } else {
                $this->Session->setFlash(__('You are not subscribed to recieve newsletters'), 'failure-message');
            }
        }
    }

    public function askedsuccessful() {
        
    }

}
