<?php
App::uses('AppController', 'Controller');
/**
 * TourImages Controller
 *
 * @property TourImage $TourImage
 */
class TourImagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TourImage->recursive = 0;
		$this->set('tourImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TourImage->id = $id;
		if (!$this->TourImage->exists()) {
			throw new NotFoundException(__('Invalid tour image'));
		}
		$this->set('tourImage', $this->TourImage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TourImage->create();
			if ($this->TourImage->save($this->request->data)) {
				$this->Session->setFlash(__('The tour image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour image could not be saved. Please, try again.'));
			}
		}
		$tours = $this->TourImage->Tour->find('list');
		$this->set(compact('tours'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TourImage->id = $id;
		if (!$this->TourImage->exists()) {
			throw new NotFoundException(__('Invalid tour image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TourImage->save($this->request->data)) {
				$this->Session->setFlash(__('The tour image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour image could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TourImage->read(null, $id);
		}
		$tours = $this->TourImage->Tour->find('list');
		$this->set(compact('tours'));
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
		$this->TourImage->id = $id;
		if (!$this->TourImage->exists()) {
			throw new NotFoundException(__('Invalid tour image'));
		}
		if ($this->TourImage->delete()) {
			$this->Session->setFlash(__('Tour image deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tour image was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
