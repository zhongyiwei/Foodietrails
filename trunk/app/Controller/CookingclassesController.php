<?php
App::uses('AppController', 'Controller');
/**
 * Cookingclasses Controller
 *
 * @property Cookingclass $Cookingclass
 */
class CookingclassesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cookingclass->recursive = 0;
		$this->set('cookingclasses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Cookingclass->id = $id;
		if (!$this->Cookingclass->exists()) {
			throw new NotFoundException(__('Invalid cookingclass'));
		}
		$this->set('cookingclass', $this->Cookingclass->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cookingclass->create();
			if ($this->Cookingclass->save($this->request->data)) {
				$this->Session->setFlash(__('The cookingclass has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cookingclass could not be saved. Please, try again.'));
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
		$this->Cookingclass->id = $id;
		if (!$this->Cookingclass->exists()) {
			throw new NotFoundException(__('Invalid cookingclass'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cookingclass->save($this->request->data)) {
				$this->Session->setFlash(__('The cookingclass has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cookingclass could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Cookingclass->read(null, $id);
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
		$this->Cookingclass->id = $id;
		if (!$this->Cookingclass->exists()) {
			throw new NotFoundException(__('Invalid cookingclass'));
		}
		if ($this->Cookingclass->delete()) {
			$this->Session->setFlash(__('Cookingclass deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cookingclass was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
