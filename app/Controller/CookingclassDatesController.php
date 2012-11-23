<?php
App::uses('AppController', 'Controller');
/**
 * CookingclassDates Controller
 *
 * @property CookingclassDate $CookingclassDate
 */
class CookingclassDatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CookingclassDate->recursive = 0;
		$this->set('cookingclassDates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CookingclassDate->id = $id;
		if (!$this->CookingclassDate->exists()) {
			throw new NotFoundException(__('Invalid cookingclass date'));
		}
		$this->set('cookingclassDate', $this->CookingclassDate->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CookingclassDate->create();
			if ($this->CookingclassDate->save($this->request->data)) {
				$this->Session->setFlash(__('The cookingclass date has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cookingclass date could not be saved. Please, try again.'));
			}
		}
		$cookingclasses = $this->CookingclassDate->Cookingclass->find('list');
		$this->set(compact('cookingclasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CookingclassDate->id = $id;
		if (!$this->CookingclassDate->exists()) {
			throw new NotFoundException(__('Invalid cookingclass date'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CookingclassDate->save($this->request->data)) {
				$this->Session->setFlash(__('The cookingclass date has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cookingclass date could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CookingclassDate->read(null, $id);
		}
		$cookingclasses = $this->CookingclassDate->Cookingclass->find('list');
		$this->set(compact('cookingclasses'));
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
		$this->CookingclassDate->id = $id;
		if (!$this->CookingclassDate->exists()) {
			throw new NotFoundException(__('Invalid cookingclass date'));
		}
		if ($this->CookingclassDate->delete()) {
			$this->Session->setFlash(__('Cookingclass date deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cookingclass date was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
