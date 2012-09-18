<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

//    public function beforeFilter() {
//        parent::beforeFilter();
//        $this->Auth->allow('add','edit','view','index');
//    }
    function beforeFilter() {
        parent::beforeFilter();
//        Security::setHash('sha1');
        $this->Auth->allow('login');
        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array('username' => 'user_email', 'password' => 'user_password'),
            ),
        );
//        $this->Auth->fields = array('username' => 'user_email', 'password' => 'user_password');
    }

    public function login() {
        if ($this->request->is('post')) {
//            debug($this->Auth);
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
                $this->Session->setFlash(__('worked'));
            } else {
                $this->Session->setFlash(__('Invalid email or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $countries = $this->User->Country->find('list');
        $events = $this->User->Event->find('list');
        $news = $this->User->News->find('list');
        $this->set(compact('countries', 'events', 'news'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $countries = $this->User->Country->find('list');
        $events = $this->User->Event->find('list');
        $news = $this->User->News->find('list');
        $this->set(compact('countries', 'events', 'news'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * user_index method
     *
     * @return void
     */
//	public function user_index() {
//		$this->User->recursive = 0;
//		$this->set('users', $this->paginate());
//	}
//
///**
// * user_view method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function user_view($id = null) {
//		$this->User->id = $id;
//		if (!$this->User->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
//		$this->set('user', $this->User->read(null, $id));
//	}
//
///**
// * user_add method
// *
// * @return void
// */
//	public function user_add() {
//		if ($this->request->is('post')) {
//			$this->User->create();
//			if ($this->User->save($this->request->data)) {
//				$this->Session->setFlash(__('The user has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
//			}
//		}
//		$countries = $this->User->Country->find('list');
//		$events = $this->User->Event->find('list');
//		$news = $this->User->News->find('list');
//		$this->set(compact('countries', 'events', 'news'));
//	}
//
///**
// * user_edit method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function user_edit($id = null) {
//		$this->User->id = $id;
//		if (!$this->User->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
//		if ($this->request->is('post') || $this->request->is('put')) {
//			if ($this->User->save($this->request->data)) {
//				$this->Session->setFlash(__('The user has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
//			}
//		} else {
//			$this->request->data = $this->User->read(null, $id);
//		}
//		$countries = $this->User->Country->find('list');
//		$events = $this->User->Event->find('list');
//		$news = $this->User->News->find('list');
//		$this->set(compact('countries', 'events', 'news'));
//	}
//
///**
// * user_delete method
// *
// * @throws MethodNotAllowedException
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function user_delete($id = null) {
//		if (!$this->request->is('post')) {
//			throw new MethodNotAllowedException();
//		}
//		$this->User->id = $id;
//		if (!$this->User->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
//		if ($this->User->delete()) {
//			$this->Session->setFlash(__('User deleted'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->Session->setFlash(__('User was not deleted'));
//		$this->redirect(array('action' => 'index'));
//	}
}
