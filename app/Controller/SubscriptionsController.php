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

    public function unsubscribe($id=null) {
        if ($this->request->is('post')) {
            $email = $this->request->data['User_subscription']['user_email'];
            $checkEmail = $this->User_subscription->find('all', array('conditions' => array('user_email' => "$email")));
             print_r($checkEmail);
            if ($checkEmail != null) {
                $this->request->data['User_subscription']['id'] = "$checkEmail";
                $this->request->data['User_subscription']['subscription_status'] = 'No';
                if ($this->User_subscription->save($this->request->data)) {
                    $this->Session->setFlash(__('The faq has been saved'));
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
