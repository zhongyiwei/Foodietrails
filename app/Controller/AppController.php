<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'home', 'action' => 'display'),	
            'authorize' => array('Controller')
        )
    );
//      public function beforeFilter1() {
//         $this->Auth->allow('index', 'view');
//     }
    var $uses = array('Tour', 'Event');

    function beforeFilter() {
        Security::setHash('sha1');
        $menus = $this->Tour->find('all', array('limit' => 3));
        $this->set('menu', $menus);
        $this->Auth->allow('display', 'tourDetail', 'aboutCompany', 'contactUs', 'login', 'event_detail','add','edit','view');
        $menus2 = $this->Event->find('all', array('limit' => 3));
        $this->set('menu2', $menus2);
        $this->Auth->authenticate = array(
            'Form' => array('userModel'=>'User',
                'fields' => array('username' => 'user_email', 'password' => 'user_password'),
            ),
        );
        $this->set('logged_in',$this->Auth->loggedIn());
        $this->set('current_user',$this->Auth->user());
    }

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['user_role']) && $user['user_role'] == 'Admin') {
            return true;
        }

        // Default deny
        return false;
    }

}
