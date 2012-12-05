<?php

App::uses('AppController', 'Controller');

/**
 * Deals Controller
 *
 * @property Deal $Deal
 */
class DealsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Deal->recursive = 0;
        $this->set('deals', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException(__('Invalid deal'));
        }
        $this->set('deal', $this->Deal->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Deal->create();
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash(__('The deal has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The deal could not be saved. Please, try again.'));
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
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException(__('Invalid deal'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash(__('The deal has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The deal could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Deal->read(null, $id);
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
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException(__('Invalid deal'));
        }
        if ($this->Deal->delete()) {
            $this->Session->setFlash(__('Deal deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Deal was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function deal_detail() {
        $content = $this->Deal->find('all', array('limits' => 1, 'conditions' => array('publish_status' => "Published")));
        $this->set('content', $content);
    }

    public function preview($id = null) {
        $content = $this->Deal->find('all', array('conditions' => array('id' => $id)));
        $this->set('content', $content);
    }

}
