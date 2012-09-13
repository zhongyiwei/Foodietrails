<?php
App::uses('AppController', 'Controller');
/**
 * CookingclassImages Controller
 *
 * @property CookingclassImage $CookingclassImage
 */
class CookingclassImagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CookingclassImage->recursive = 0;
		$this->set('cookingclassImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CookingclassImage->id = $id;
		if (!$this->CookingclassImage->exists()) {
			throw new NotFoundException(__('Invalid cookingclass image'));
		}
		$this->set('cookingclassImage', $this->CookingclassImage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CookingclassImage->create();
			if ($this->CookingclassImage->save($this->request->data)) {
				$this->Session->setFlash(__('The cookingclass image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cookingclass image could not be saved. Please, try again.'));
			}
		}
		$cookingClasses = $this->CookingclassImage->CookingClass->find('list');
		$this->set(compact('cookingClasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CookingclassImage->id = $id;
		if (!$this->CookingclassImage->exists()) {
			throw new NotFoundException(__('Invalid cookingclass image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CookingclassImage->save($this->request->data)) {
				$this->Session->setFlash(__('The cookingclass image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cookingclass image could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CookingclassImage->read(null, $id);
		}
		$cookingClasses = $this->CookingclassImage->CookingClass->find('list');
		$this->set(compact('cookingClasses'));
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
		$this->CookingclassImage->id = $id;
		if (!$this->CookingclassImage->exists()) {
			throw new NotFoundException(__('Invalid cookingclass image'));
		}
		if ($this->CookingclassImage->delete()) {
			$this->Session->setFlash(__('Cookingclass image deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cookingclass image was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
