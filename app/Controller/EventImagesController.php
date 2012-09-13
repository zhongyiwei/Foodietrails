<?php
App::uses('AppController', 'Controller');
/**
 * EventImages Controller
 *
 * @property EventImage $EventImage
 */
class EventImagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventImage->recursive = 0;
		$this->set('eventImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EventImage->id = $id;
		if (!$this->EventImage->exists()) {
			throw new NotFoundException(__('Invalid event image'));
		}
		$this->set('eventImage', $this->EventImage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventImage->create();
			if ($this->EventImage->save($this->request->data)) {
				$this->Session->setFlash(__('The event image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event image could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventImage->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EventImage->id = $id;
		if (!$this->EventImage->exists()) {
			throw new NotFoundException(__('Invalid event image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventImage->save($this->request->data)) {
				$this->Session->setFlash(__('The event image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event image could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EventImage->read(null, $id);
		}
		$events = $this->EventImage->Event->find('list');
		$this->set(compact('events'));
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
		$this->EventImage->id = $id;
		if (!$this->EventImage->exists()) {
			throw new NotFoundException(__('Invalid event image'));
		}
		if ($this->EventImage->delete()) {
			$this->Session->setFlash(__('Event image deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event image was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
