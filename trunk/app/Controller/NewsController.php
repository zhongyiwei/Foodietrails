<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->News->recursive = 0;
        $this->set('news', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        $this->set('news', $this->News->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->News->create();
            $this->request->data['News']['send_status'] = 'false';
            if ($this->News->save($this->request->data)) {
                $this->Session->setFlash(__('The news has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The news could not be saved. Please, try again.'),'failure-message');
            }
        }
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->News->save($this->request->data)) {
                $this->Session->setFlash(__('The news has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The news could not be saved. Please, try again.'),'failure-message');
            }
        } else {
            $this->request->data = $this->News->read(null, $id);
        }
        $this->set(compact('users'));
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
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        if ($this->News->delete()) {
            $this->Session->setFlash(__('News deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('News was not deleted'),'failure-message');
        $this->redirect(array('action' => 'index'));
    }

	public function news_detail($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        $this->set('news', $this->News->read(null, $id));
    }
    public function emailsubscriber($id = null) {
        $this->News->id = $id;
        $this->set('news', $this->News->read(null, $id));
        $this->request->data['News']['send_status'] = 'true';
        $this->News->saveField('send_status', $this->request->data['News']['send_status']);
        $subscribers = $this->User->find('all', array('conditions' => array('user_emailsubscription =' => 'Yes')));
//        $subscribers = $this->NewsUser->find('all', array('conditions' => array('news_id =' => $id)));
////        debug($subscribers);
//        for ($i = 0; $i < count($subscribers); $i++) {
//            $id = $subscribers[$i]['NewsUser']['user_id'];
//            $subscribers2[$i] = $this->User->read(null, $id);
//        }
////        debug($subscribers2);
        $this->set('subscribers', $subscribers);
//        $this->redirect(array('action' => 'index'));
    }

}
