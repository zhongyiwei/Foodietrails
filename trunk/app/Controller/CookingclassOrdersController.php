<?php

App::uses('AppController', 'Controller');

/**
 * CookingclassOrders Controller
 *
 * @property CookingclassOrder $CookingclassOrder
 */
class CookingclassOrdersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->CookingclassOrder->recursive = 0;
        $this->set('cookingclassOrders', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->CookingclassOrder->id = $id;
        if (!$this->CookingclassOrder->exists()) {
            throw new NotFoundException(__('Invalid cookingclass order'));
        }
        $this->set('cookingclassOrder', $this->CookingclassOrder->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->CookingclassOrder->create();
            if ($this->CookingclassOrder->save($this->request->data)) {
                $this->Session->setFlash(__('The cookingclass order has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cookingclass order could not be saved. Please, try again.'));
            }
        }
        $cookingClasses = $this->CookingclassOrder->CookingClass->find('list');
        $users = $this->CookingclassOrder->User->find('list');
        $cookingClassDates = $this->CookingclassOrder->CookingClassDate->find('list');
        
        $userEmail = $this->CookingclassOrder->User->find('list', array('fields' => 'user_email'));
        $cookingclassName = $this->CookingclassOrder->CookingClass->find('list', array('fields' => 'cooking_class_name'));
        $cookingclassDate = $this->CookingclassOrder->CookingClassDate->find('list', array('fields' => 'cookingclass_date'));
        $this->set(compact('cookingClasses', 'users', 'cookingClassDates','userEmail','cookingclassName','cookingclassDate'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->CookingclassOrder->id = $id;
        if (!$this->CookingclassOrder->exists()) {
            throw new NotFoundException(__('Invalid cookingclass order'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CookingclassOrder->save($this->request->data)) {
                $this->Session->setFlash(__('The cookingclass order has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cookingclass order could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->CookingclassOrder->read(null, $id);
        }
        $cookingClasses = $this->CookingclassOrder->CookingClass->find('list');
        $users = $this->CookingclassOrder->User->find('list');
        $cookingClassDates = $this->CookingclassOrder->CookingClassDate->find('list');
        
        $userEmail = $this->CookingclassOrder->User->find('list', array('fields' => 'user_email'));
        $cookingclassName = $this->CookingclassOrder->CookingClass->find('list', array('fields' => 'cooking_class_name'));
        $cookingclassDate = $this->CookingclassOrder->CookingClassDate->find('list', array('fields' => 'cookingclass_date'));
        $this->set(compact('cookingClasses', 'users', 'cookingClassDates','userEmail','cookingclassName','cookingclassDate'));
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
        $this->CookingclassOrder->id = $id;
        if (!$this->CookingclassOrder->exists()) {
            throw new NotFoundException(__('Invalid cookingclass order'));
        }
        if ($this->CookingclassOrder->delete()) {
            $this->Session->setFlash(__('Cookingclass order deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Cookingclass order was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
