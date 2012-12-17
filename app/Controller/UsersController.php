<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
require_once('recaptchalib.php');
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
//        $this->Auth->allow('add');
    }

    public function login() {
        if ($this->request->is('post')) {
//            debug($this->Auth);
            if ($this->Auth->login()) {
                $currentUser = $this->Auth->user();
                if ($currentUser['user_role'] == 'Admin') {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->redirect(array('controller' => 'checkout', 'action' => 'confirmCheckout'));
                }
            } else {
                $this->Session->setFlash(__('Invalid email or password, try again'), 'failure-message');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function homepageLogin() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $currentUser = $this->Auth->user();
                $this->redirect(array('controller' => 'home', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Invalid email or password, try again'), 'failure-message');
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
            throw new NotFoundException(__('The user that you are currently searching is not found'), 'failure-message');
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
            $customerData = $this->request->data;
//            if ($customerData['User']['user_emailsubscription'] != 'Yes') {
//                $customerData['User']['user_emailsubscription'] = 'No';
//            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again'), 'failure-message');
            }
        }
        $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
//        $events = $this->User->Event->find('list');
//        $news = $this->User->News->find('list');
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
            throw new NotFoundException(__('The user could not be saved. Please, try again'));
        }
        // $userData = $this->User->read(null, $id);
        // $subscription = $userData['User']['user_emailsubscription'];
        //$this->set('subscriptionStatus', $subscription);
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again', 'failure-message'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
//        $events = $this->User->Event->find('list');
//        $news = $this->User->News->find('list');
        $this->set(compact('countries', 'events', 'news'));
    }

    public function register() {
        if ($this->request->is('post')) {
            $resp = recaptcha_check_answer($this->privateKey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
            if (!$resp->is_valid) {
                $errorMessage[0] = "Validation code is not valid";
                $errorMessage[1] = "input text required error";
                $this->set('Error', $errorMessage);
            } else {
                $this->User->create();
                $customerData = $this->request->data;
                $customerData['User']['user_emailsubscription'] = "Customer";
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index', 'controller' => 'home'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again'), 'failure-message');
                }
            }
        }
        $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
        $this->set(compact('countries', 'events', 'news'));
    }

    public function customerInfoEdit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('The user could not be saved. Please, try again'));
        }
        $currentUser = $this->Auth->user();
        if ($currentUser['id'] == $id) {
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index', 'controller' => 'home'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again', 'failure-message'));
                }
            } else {
                $this->request->data = $this->User->read(null, $id);
            }
        }
        $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
        $this->set(compact('countries', 'events', 'news', 'id'));
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
            throw new NotFoundException(__('The user could not be saved. Please, try again'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted Succesful'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted', 'failure-message'));
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
                    if ($this->Auth->login()) {
                        $currentUser = $this->Auth->user();
                        if ($currentUser['user_role'] == 'Admin') {
                            $this->redirect($this->Auth->redirect());
                        } else {
                            $this->redirect(array('controller' => 'checkout', 'action' => 'confirmCheckout'));
                        }
                    } else {
                        $this->Session->setFlash(__('Invalid email or password, try again', 'failure-message'));
                    }
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again', 'failure-message'));
                }
            }
            $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
//            $events = $this->User->Event->find('list');
            $this->set(compact('countries', 'events', 'news'));
        } else {
            $this->redirect(array('controller' => 'checkout', 'action' => "/confirmCheckout/"));
        }
    }

    public function redeemLogin() {
        $id = $this->params['url']['id'];
        $identifier = $this->params['url']['def'];
        $this->set('id', $id);
        $this->set('def', $identifier);
        if ($this->Auth->loggedIn() == false) {
            if ($this->request->is('post')) {
                $this->User->create();
                $customerData = $this->request->data;
                $customerData['User']['user_role'] = 'Customer';
                if ($this->User->save($customerData)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    if ($this->Auth->login()) {
                        $this->redirect(array('controller' => 'giftvouchers', 'action' => "chooseDate?def=$identifier&id=$id"));
                    } else {
                        $this->Session->setFlash(__('Invalid email or password, try again', 'failure-message'));
                    }
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again', 'failure-message'));
                }
            }
            $countries = $this->User->Country->find('list', array('fields' => 'country_name'));
            $this->set(compact('countries', 'events', 'news'));
        } else {
            $this->redirect(array('controller' => 'giftvouchers', 'action' => "chooseDate?def=$identifier&id=$id"));
        }
    }

    public function loginForRedeem() {
        $id = $this->params['url']['id'];
        $identifier = $this->params['url']['def'];
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect(array('controller' => 'giftvouchers', 'action' => "chooseDate?def=$identifier&id=$id"));
            } else {
                $this->Session->setFlash(__('Invalid email or password, try again'), 'failure-message');
            }
        }
    }

    public function customerPayment() {
//        debug($this->Auth);
    }

    public function export() {
        ini_set('max_execution_time', 600);

        $result = $this->User->find("all", array('fields' => array(
                'id',
                'user_role',
                'user_first_name',
                'user_surname',
                'user_contacts',
                'user_email',
                'user_dietary_requirement',
                'user_spl_assistance',
            ),
            ));
//        print_r($result);
        $header_row = array(
                'Role',
                'First Name',
                'Surname',
                'Contact Details (Phone)',
                'Email',
                'Dietary Requirements',
                'SPL Assistance',
        );
        //array_unshift($result, $header_row);
        $currentDate = date('Y-m-d');
        $filename  = "User_Details_On_$currentDate.csv";
        $csv_file = fopen('php://output', 'w');
        $this->autoRender = false;
        
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        fputcsv($csv_file, $header_row, ',', '"');
        foreach ($result as $result) {
                $row = array(
                    $result['User']['user_role'],
                    $result['User']['user_first_name'],
                    $result['User']['user_surname'],
                    $result['User']['user_contacts'],
                    $result['User']['user_email'],
                    $result['User']['user_dietary_requirement'],
                    $result['User']['user_spl_assistance'],
                );
                fputcsv($csv_file, $row, ',', '"');
            }
        fclose($csv_file);
    }
     public function forgotten_password() {
        if ($this->request->is('post')) {
            $user_email = $this->request->data['User']['forget'];
            $user = $this->User->find('all', array('conditions' => array('User.user_email' => $user_email)));
           
            if (count($user) != 0) {
                $tempPassword = $this->User->createTempPassword(8);
                $userFirstName = $user[0]['User']['user_first_name'];
                $data = array('id' => $user[0]['User']['id'], 'user_password' => $tempPassword);

                if ($this->User->save($data)) {
                    $email = new CakeEmail();
                    $email->config('default');
                    $email->emailFormat('html');
                    $email->from(array("$this->sender" => "$this->senderTag"));
                    $email->to("$user_email");
                    $email->subject("Your New Password - Foodie Trails");
                    $logo = "<img src=" . Router::url("/img/logo.png", true) . " height='50' alt ='Foodie Trails Logo' name ='Foodie Trails Logo'/>";
                    $body = "
	                <div style='font-family:Century Gothic; color:#06496e; width:620px;'><p>Dear $userFirstName,</p>
	                <p>Your new password is:</p>
	                <p style='font-weight:bold'>$tempPassword </p>
	                <p>Please Visit <a href='http://www.foodietrails.com.au/web2.0/users/homepageLogin'>Link</a> Here to Login.</p>
	                $logo
	                <p style='color: #ff7003; font-weight:bold; font-size:13px;'>Did you know that Foodie trails is part of a fully licenced travel company? Let us help you plan your next customized holiday at the right price and great service!</p>
	                <p style='font-size:13px'><a href='www.foodietrails.com.au'style='font-size:13px'>FoodieTrails.com.au</a></p>
	                <p style='font-size:13px'>Follow Us on <a href='www.facebook.com/foodietrails' style='font-size:13px'>Facebook</a></p>
	                <p style='font-size:13px'>Follow Us on <a href=' www.twitter.com/foodietrails'style='font-size:13px' >Twitter</a></p>
	                </div>
	                ";
                    $email->send($body);
                    $this->redirect(array('controller' => 'users', 'action' => "changeSuccessful"));
                }
            } else {
                $this->Session->setFlash('No user was found with the submitted email address.', 'failure-message');
            }
        }
    }
            	public function changeSuccessful() {
        	//$this->set('psd', $this->params['url']['psd']);
        	}

}