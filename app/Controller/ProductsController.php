<?php

App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Product->recursive = 0;
        $this->set('products', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('product', $this->Product->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'failure-message');
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
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->Product->read(null, $id);
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
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('Product deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Product was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function product_details() {
        $products = $this->Product->find('all', array('conditions' => array('publish_status' => "Published")));
        $this->set('products', $products);
    }

    public function more_detail($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('product', $this->Product->read(null, $id));
//        $this->set('feedbacks', $this->Feedback->find('all', array('conditions' => array('AND' => array('feedback.page_id' => $id), 'feedback.feedback_type' => "Product", 'feedback_status' => "show"))));
    }

    public function preview($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->set('product', $this->Product->read(null, $id));
    }

}
