<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $name = "Users";
    public $uses = array('User');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function login() {
        if ($this->request->is('post')) {
//            debug($this->Auth);
            if ($this->Auth->login()) {
                $currentUser = $this->Auth->user();
                if ($currentUser['user_role'] == 'Admin') {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->redirect(array('controller'=>'checkout','action' => 'confirmCheckout'));
                }
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
        $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
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
        $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
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

    public function customerLogin() {
        if ($this->Auth->loggedIn() == false) {
            if ($this->request->is('post')) {
                $this->User->create();
                $customerData = $this->request->data;
                $customerData['User']['user_role'] = 'Customer';
                if ($this->User->save($customerData)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => "/customerPayment/"));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
            $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
            $events = $this->User->Event->find('list');
            $news = $this->User->News->find('list');
            $this->set(compact('countries', 'events', 'news'));
        } else {
            $this->redirect(array('action' => "/customerPayment/"));
        }
    }

    public function customerPayment() {
//        debug($this->Auth);
    }

    public function export() {
//          $header_row = array(
//            'User' => array(
//                'id' => 'User ID',
//                'user_role' => 'Role',
//                'user_first_name' => 'First Name',
//                'user_surname' => 'Surname',
//                'user_contacts' => 'Contact Details (Phone)',
//                'user_email' => 'Email',
//                'user_password' => 'Password',
//                'user_dietary_requirement' => 'Dietary Requirements',
//                'user_spl_assistance' => 'SPL Assistance',
//                'user_referee' => 'Referee',
//                'user_postcode' => 'Post Code',
//                'user_state' => 'State',
//                'country_id' => 'Country'
//            )
//        );
        ini_set('max_execution_time', 600);
//        $filename = "User_Detail_Export_" . date("Y.m.d") . ".csv";
//        $csv_file = fopen('php://output', 'w');
//        header('Content-type: application/csv');
//        header('Content-Disposition: attachment; filename="' . $filename . '"');
//        $result = $this->User->find("all", array('fields' => array('user_role','user_first_name',
//                'user_surname',
//                'user_contacts',
//                'user_email',
//                'user_dietary_requirement',
//                'user_spl_assistance',
//                'user_referee',
//                'user_postcode',
//                'user_state')));
//        $header_row = array(
//            'User' => array(
//                'Role',
//                'First Name',
//                'Surname',
//                'Contact Details (Phone)',
//                'Email',
//                'Dietary Requirements',
//                'SPL Assistance',
//                'Referee',
//                'Post Code',
//                'State',
//            )
//        );
//        $header_row = array(
//            'User' => array(
//                'user_role' => 'Role',
//                'user_first_name' => 'First Name',
//                'user_surname' => 'Surname',
//                'user_contacts' => 'Contact Details (Phone)',
//                'user_email' => 'Email',
//                'user_password' => 'Password',
//                'user_dietary_requirement' => 'Dietary Requirements',
//                'user_spl_assistance' => 'SPL Assistance',
//                'user_referee' => 'Referee',
//                'user_postcode' => 'Post Code',
//                'user_state' => 'State',
//            )
//        );
//        print_r($result);
//        fputcsv($csv_file, $header_row, ',', '"');
//        foreach ($result as $result) {
//            // Array indexes correspond to the field names in your db table(s)
//            $row = array(
//                $result['User']['user_role'],
//                $result['User']['user_first_name'],
//                $result['User']['user_surname'],
//                $result['User']['user_contacts'],
//                $result['User']['user_email'],
//                $result['User']['user_dietary_requirement'],
//                $result['User']['user_spl_assistance'],
//                $result['User']['user_referee'],
//                $result['User']['user_postcode'],
//                $result['User']['user_state'],
//            );
//            fputcsv($csv_file, $row, ',', '"');
////                    print_r($row);
//        }
//        fclose($csv_file);
//        $this->redirect(array('action' => "/index/"));
        Configure::write('debug', 0);
        $result = $this->User->find("all", array('fields' => array(
                'id',
                'user_role',
                'user_first_name',
                'user_surname',
                'user_contacts',
                'user_email',
                'user_dietary_requirement',
                'user_spl_assistance',
                'user_referee',
                'user_postcode',
                'user_state',
            ),
            'contain' => false));
//        print_r($result);
        $header_row = array(
        'User' => array(
        'id' => 'ID',
        'user_role' => 'Role',
        'user_first_name' => 'First Name',
        'user_surname' => 'Surname',
        'user_contacts' => 'Contact Details (Phone)',
        'user_email' => 'Email',
        'user_dietary_requirement' => 'Dietary Requirements',
        'user_spl_assistance' => 'SPL Assistance',
        'user_referee' => 'Referee',
        'user_postcode' => 'Post Code',
        'user_state' => 'State',
        )
        );
        array_unshift($result, $header_row);
//        print_r($result);
//        $this->set(compact('data'));
         $this->set('data', $result);
         
    }

}
