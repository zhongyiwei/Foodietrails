<?php

App::uses('AppController', 'Controller');

/**
 * Faqs Controller
 *
 * @property Faq $Faq
 */
class FaqsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
        $this->Faq->recursive = 0;
        $this->set('faqs', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Faq->id = $id;
        if (!$this->Faq->exists()) {
            throw new NotFoundException(__('Invalid faq'));
        }
        $this->set('faq', $this->Faq->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Faq->create();
            if ($this->Faq->save($this->request->data)) {
                $this->Session->setFlash(__('The faq has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'failure-message');
            }
        }
    }

    public function faq_view() {
        //$currentUser = $this->Auth->user();
        if ($this->request->is('post')) {
            //$this->request->data['Faq']['user_id'] = $currentUser;
            $this->request->data['Faq']['faq_status'] = 'Hide';
            $this->Faq->create();
            if ($this->Faq->save($this->request->data)) {
//				$this->Session->setFlash(__('The faq has been send for review, you might later see the answer in faq page.'));
                $this->redirect(array('action' => 'askedsuccessful'));
            } else {
                $this->Session->setFlash(__('The faq could not be saved. Please, try again.'), 'failure-message');
            }
        }
        $this->set('faqs', $this->Faq->find('all', array('conditions' => array('faq_status' => "show"))));
    }

    public function askedsuccessful() {
        
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Faq->id = $id;
        if (!$this->Faq->exists()) {
            throw new NotFoundException(__('Invalid faq'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Faq->save($this->request->data)) {
                $this->Session->setFlash(__('The faq has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The faq could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->Faq->read(null, $id);
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
        $this->Faq->id = $id;
        if (!$this->Faq->exists()) {
            throw new NotFoundException(__('Invalid faq'));
        }
        if ($this->Faq->delete()) {
            $this->Session->setFlash(__('Faq deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Faq was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

}
