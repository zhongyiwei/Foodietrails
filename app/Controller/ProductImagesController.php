<?php
App::uses('AppController', 'Controller');
/**
 * ProductImages Controller
 *
 * @property ProductImage $ProductImage
 */
class ProductImagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductImage->recursive = 0;
		$this->set('productImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProductImage->id = $id;
		if (!$this->ProductImage->exists()) {
			throw new NotFoundException(__('Invalid product image'));
		}
		$this->set('productImage', $this->ProductImage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductImage->create();
			if ($this->ProductImage->save($this->request->data)) {
				$this->Session->setFlash(__('The product image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product image could not be saved. Please, try again.'));
			}
		}
		$products = $this->ProductImage->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProductImage->id = $id;
		if (!$this->ProductImage->exists()) {
			throw new NotFoundException(__('Invalid product image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProductImage->save($this->request->data)) {
				$this->Session->setFlash(__('The product image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product image could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProductImage->read(null, $id);
		}
		$products = $this->ProductImage->Product->find('list');
		$this->set(compact('products'));
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
		$this->ProductImage->id = $id;
		if (!$this->ProductImage->exists()) {
			throw new NotFoundException(__('Invalid product image'));
		}
		if ($this->ProductImage->delete()) {
			$this->Session->setFlash(__('Product image deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product image was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
