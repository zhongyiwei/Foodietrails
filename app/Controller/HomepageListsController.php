<?php

App::uses('AppController', 'Controller');

/**
 * HomepageLists Controller
 *
 * @property HomepageList $HomepageList
 */
class HomepageListsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->HomepageList->recursive = 0;
        $this->set('homepageLists', $this->paginate());
        $productName = null;
        $all = $this->HomepageList->find('all', array('fields' => 'list_type, product_id'));
        for ($i = 0; $i < count($all); $i++) {
            if ($all[$i]['HomepageList']['list_type'] == 'Tour') {
                $tourId = $all[$i]['HomepageList']['product_id'];
                $temp = $this->Tour->find('all', array('fields' => 'tour_name', 'conditions' => array('Tour.id' => "$tourId")));
                $productName[$i] = $temp[0]['Tour']['tour_name'];
            } else if ($all[$i]['HomepageList']['list_type'] == 'Cooking Class') {
                $cookingClassId = $all[$i]['HomepageList']['product_id'];
                $temp = $this->Cookingclass->find('all', array('fields' => 'cooking_class_name', 'conditions' => array('Cookingclass.id' => "$cookingClassId")));
                $productName[$i] = $temp[0]['Cookingclass']['cooking_class_name'];
            } else if ($all[$i]['HomepageList']['list_type'] == 'Product') {
                $productId = $all[$i]['HomepageList']['product_id'];
                $temp = $this->Product->find('all', array('fields' => 'product_name', 'conditions' => array('Product.id' => "$productId")));
                $productName[$i] = $temp[0]['Product']['product_name'];
            }
        }
        $this->set('productName', $productName);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->HomepageList->id = $id;
        if (!$this->HomepageList->exists()) {
            throw new NotFoundException(__('Invalid homepage list'));
        }
        $this->set('homepageList', $this->HomepageList->read(null, $id));

        $all = $this->HomepageList->find('all', array('fields' => 'list_type, product_id', 'conditions' => array('id' => "$id")));

        if ($all[0]['HomepageList']['list_type'] == 'Tour') {
            $tourId = $all[0]['HomepageList']['product_id'];
            $temp = $this->Tour->find('all', array('fields' => 'tour_name', 'conditions' => array('id' => "$tourId")));
            $productName = $temp[0]['Tour']['tour_name'];
        } else if ($all[0]['HomepageList']['list_type'] == 'Cooking Class') {
            $cookingClassId = $all[0]['HomepageList']['product_id'];
            $temp = $this->Cookingclass->find('all', array('fields' => 'cooking_class_name', 'conditions' => array('id' => "$cookingClassId")));
            $productName = $temp[0]['Cookingclass']['cooking_class_name'];
        } else if ($all[0]['HomepageList']['list_type'] == 'Product') {
            $productId = $all[0]['HomepageList']['product_id'];
            $temp = $this->Product->find('all', array('fields' => 'product_name', 'conditions' => array('id' => "$productId")));
            $productName = $temp[0]['Product']['product_name'];
        }
        $this->set('productName', $productName);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->HomepageList->create();
            if ($this->HomepageList->save($this->request->data)) {
                $this->Session->setFlash(__('The homepage list has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The homepage list could not be saved. Please, try again.'), 'failure-message');
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
        $this->HomepageList->id = $id;
        if (!$this->HomepageList->exists()) {
            throw new NotFoundException(__('Invalid homepage list'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->HomepageList->save($this->request->data)) {
                $this->Session->setFlash(__('The homepage list has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The homepage list could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->HomepageList->read(null, $id);
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
        $this->HomepageList->id = $id;
        if (!$this->HomepageList->exists()) {
            throw new NotFoundException(__('Invalid homepage list'));
        }
        if ($this->HomepageList->delete()) {
            $this->Session->setFlash(__('Homepage list deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Homepage list was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

}
