<?php
App::uses('AppController', 'Controller');
/**
 * TourDates Controller
 *
 * @property TourDate $TourDate
 */
class TourDatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TourDate->recursive = 0;
		$this->set('tourDates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TourDate->id = $id;
		if (!$this->TourDate->exists()) {
			throw new NotFoundException(__('Invalid tour date'));
		}
		$this->set('tourDate', $this->TourDate->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TourDate->create();
			if ($this->TourDate->save($this->request->data)) {
				$this->Session->setFlash(__('The tour date has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour date could not be saved. Please, try again.'));
			}
		}
		$tours = $this->TourDate->Tour->find('list');
		  $tourName = $this->TourDate->Tour->find('list', array('fields' => 'tour_name'));
		$this->set(compact('tours','tourName'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TourDate->id = $id;
		if (!$this->TourDate->exists()) {
			throw new NotFoundException(__('Invalid tour date'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TourDate->save($this->request->data)) {
				$this->Session->setFlash(__('The tour date has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tour date could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TourDate->read(null, $id);
		}
		$tours = $this->TourDate->Tour->find('list');
                $tourName = $this->TourDate->Tour->find('list', array('fields' => 'tour_name'));
		$this->set(compact('tours','tourName'));
                
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
		$this->TourDate->id = $id;
		if (!$this->TourDate->exists()) {
			throw new NotFoundException(__('Invalid tour date'));
		}
		if ($this->TourDate->delete()) {
			$this->Session->setFlash(__('Tour date deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tour date was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
