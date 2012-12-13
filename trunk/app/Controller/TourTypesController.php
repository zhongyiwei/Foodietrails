<?php
App::uses('AppController', 'Controller');
/**
 * TourTypes Controller
 *
 * @property TourType $TourType
 */
class TourTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TourType->recursive = 0;
		$this->set('tourTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TourType->id = $id;
		if (!$this->TourType->exists()) {
			throw new NotFoundException(__('Invalid tour type'));
		}
		$this->set('tourType', $this->TourType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TourType->create();
			if ($this->TourType->save($this->request->data)) {
				$this->Session->setFlash(__('The tour type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour type could not be saved. Please, try again.'));
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
		$this->TourType->id = $id;
		if (!$this->TourType->exists()) {
			throw new NotFoundException(__('Invalid tour type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TourType->save($this->request->data)) {
				$this->Session->setFlash(__('The tour type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TourType->read(null, $id);
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
		$this->TourType->id = $id;
		if (!$this->TourType->exists()) {
			throw new NotFoundException(__('Invalid tour type'));
		}
		if ($this->TourType->delete()) {
			$this->Session->setFlash(__('Tour type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tour type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
