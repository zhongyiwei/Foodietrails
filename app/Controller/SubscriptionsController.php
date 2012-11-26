<?php

App::uses('AppController', 'Controller');

class SubscriptionsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('subscribe');
    }

    public function subscribe() {
        if ($this->request->is('post')) {
            $this->request->data['User_subscription']['subscription_status'] = 'Yes';
            $this->User_subscription->create();
            if ($this->User_subscription->save($this->request->data)) {
                $this->redirect(array('action' => 'askedsuccessful'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'failure-message');
            }
        }
    }

    public function unsubscribe($id = null) {
        $id = $this->request['User_subscription']['id'];
        if ($this->request->is('post')) {
            $email = $this->request->data['User_subscription']['user_email'];
            $temp = $this->User_subscription->find('all', array('conditions' => array('user_email' => "$email")));
            if ($temp != $email) {
                $this->request->data['User_subscription']['user_email'];
                $this->request->data['User_subscription']['subscription_status'] = 'No';
                if ($this->User_subscription->save($this->request->data)) {
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
