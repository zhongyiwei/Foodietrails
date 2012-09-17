<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController 
{ 
    var $name = "Users"; 
    var $helpers = array('Html', 'Form'); 
     
    function beforeFilter() 
    { 
        $this->__validateLoginStatus(); 
    } 
     
    function login() 
    { 
        if(empty($this->data) == false) 
        { 
            if(($user = $this->User->validateLogin($this->data['User'])) == true) 
            { 
                $this->Session->write('User', $user); 
                $this->Session->setFlash('You\'ve successfully logged in.'); 
                $this->redirect('index'); 
                exit(); 
            } 
            else 
            { 
                $this->Session->setFlash('Sorry, the information you\'ve entered is incorrect.'); 
                exit(); 
            } 
        } 
    } 
     
    function logout() 
    { 
        $this->Session->destroy('user'); 
        $this->Session->setFlash('You\'ve successfully logged out.'); 
        $this->redirect('login'); 
    } 
         
    function __validateLoginStatus() 
    { 
        if($this->action != 'login' && $this->action != 'logout') 
        { 
            if($this->Session->check('User') == false) 
            { 
                $this->redirect('login'); 
                $this->Session->setFlash('The URL you\'ve followed requires you login.'); 
            } 
        } 
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
	public function user_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * user_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function user_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * user_add method
 *
 * @return void
 */
	public function user_add() {
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
 * user_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function user_edit($id = null) {
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
 * user_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function user_delete($id = null) {
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
}
