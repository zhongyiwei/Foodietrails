<?php
App::uses('AppController', 'Controller');
/**
 * DisclaimerForms Controller
 *
 * @property DisclaimerForm $DisclaimerForm
 */
class DisclaimerFormsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DisclaimerForm->recursive = 0;
		$this->set('disclaimerForms', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DisclaimerForm->id = $id;
		if (!$this->DisclaimerForm->exists()) {
			throw new NotFoundException(__('Invalid disclaimer form'));
		}
		$this->set('disclaimerForm', $this->DisclaimerForm->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DisclaimerForm->create();
			if ($this->DisclaimerForm->save($this->request->data)) {
				$this->Session->setFlash(__('The disclaimer form has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disclaimer form could not be saved. Please, try again.'));
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
		$this->DisclaimerForm->id = $id;
		if (!$this->DisclaimerForm->exists()) {
			throw new NotFoundException(__('Invalid disclaimer form'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DisclaimerForm->save($this->request->data)) {
				$this->Session->setFlash(__('The disclaimer form has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disclaimer form could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DisclaimerForm->read(null, $id);
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
		$this->DisclaimerForm->id = $id;
		if (!$this->DisclaimerForm->exists()) {
			throw new NotFoundException(__('Invalid disclaimer form'));
		}
		if ($this->DisclaimerForm->delete()) {
			$this->Session->setFlash(__('Disclaimer form deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Disclaimer form was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
