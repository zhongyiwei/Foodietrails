<?php

App::uses('AppController', 'Controller');

/**
 * HomepageImages Controller
 *
 * @property HomepageImage $HomepageImage
 */
class HomepageImagesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->HomepageImage->recursive = 0;
        $this->set('homepageImages', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->HomepageImage->id = $id;
        if (!$this->HomepageImage->exists()) {
            throw new NotFoundException(__('Invalid homepage image'));
        }
        $this->set('homepageImage', $this->HomepageImage->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->HomepageImage->create();
            if ($this->HomepageImage->save($this->request->data)) {
                $this->Session->setFlash(__('The homepage image has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The homepage image could not be saved. Please, try again.'), 'failure-message');
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
        $this->HomepageImage->id = $id;
        if (!$this->HomepageImage->exists()) {
            throw new NotFoundException(__('Invalid homepage image'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->HomepageImage->save($this->request->data)) {
                $this->Session->setFlash(__('The homepage image has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The homepage image could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->HomepageImage->read(null, $id);
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
        $this->HomepageImage->id = $id;
        if (!$this->HomepageImage->exists()) {
            throw new NotFoundException(__('Invalid homepage image'));
        }
        if ($this->HomepageImage->delete()) {
            $this->Session->setFlash(__('Homepage image deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Homepage image was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

}
