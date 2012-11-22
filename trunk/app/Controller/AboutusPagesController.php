<?php
App::uses('AppController', 'Controller');
/**
 * AboutusPages Controller
 *
 * @property AboutusPage $AboutusPage
 */
class AboutusPagesController extends AppController {

        public function aboutCompany() {
        $content = $this->AboutusPage->find('all', array('limits' => 1));
        $this->set('content',$content);
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AboutusPage->recursive = 0;
		$this->set('aboutusPages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AboutusPage->id = $id;
		if (!$this->AboutusPage->exists()) {
			throw new NotFoundException(__('Invalid aboutus page'));
		}
		$this->set('aboutusPage', $this->AboutusPage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AboutusPage->create();
			if ($this->AboutusPage->save($this->request->data)) {
				$this->Session->setFlash(__('The aboutus page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aboutus page could not be saved. Please, try again.'),'failure-message');
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
		$this->AboutusPage->id = $id;
		if (!$this->AboutusPage->exists()) {
			throw new NotFoundException(__('Invalid aboutus page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AboutusPage->save($this->request->data)) {
				$this->Session->setFlash(__('The aboutus page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aboutus page could not be saved. Please, try again.'),'failure-message');
			}
		} else {
			$this->request->data = $this->AboutusPage->read(null, $id);
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
		$this->AboutusPage->id = $id;
		if (!$this->AboutusPage->exists()) {
			throw new NotFoundException(__('Invalid aboutus page'));
		}
		if ($this->AboutusPage->delete()) {
			$this->Session->setFlash(__('Aboutus page deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aboutus page was not deleted'),'failure-message');
		$this->redirect(array('action' => 'index'));
	}
}
