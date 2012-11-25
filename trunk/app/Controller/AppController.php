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
            'loginRedirect' => array('controller' => 'tours', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'home', 'action' => 'display'),
            'authorize' => array('Controller')
        ),
        'Cookie',
    );
//      public function beforeFilter1() {
//         $this->Auth->allow('index', 'view');
//     }
    var $uses = array('Tour', 'Event', 'Cookingclass', 'Product', 'User', 'Feedback', 'News', 'GiftVoucher','GiftvoucherOrder', 'TourOrder','CookingclassOrder');

    function beforeFilter() {
        Security::setHash('sha1');
        $allTours = $this->Tour->find('list', array('fields' => 'id, tour_name'));
        $this->set('allTours', $allTours);
        $allCookingClass= $this->Cookingclass->find('list', array('fields' => 'id, cooking_class_name'));
        $this->set('allCookingClasses', $allCookingClass);
        $allProducts = $this->Product->find('list', array('fields' => 'id, product_name'));
        $this->set('allProducts', $allProducts);

        $menus = $this->Tour->find('all', array('fields' => 'id, tour_name', 'conditions' => array('tour_type' => 'Public')));
        $this->set('menu', $menus);
        $menus5 = $this->Tour->find('all', array('fields' => 'id, tour_name', 'conditions' => array('tour_type' => 'Private')));
        $this->set('menu5', $menus5);
        $menus6 = $this->Tour->find('all', array('fields' => 'id, tour_name', 'conditions' => array('tour_type' => 'International')));
        $this->set('menu6', $menus6);
        $this->Auth->allow('display', 'tourDetail', 'cookingclass_detail', 'aboutCompany', 'contactUs', 'login', 'event_detail', 'checkout', 'logout', 'customerLogin', 'deleteCheckoutItem', 'customerPayment', 'existingCustomerLogin', 'check', 'confirmCheckout', 'sendEmail', 'sendSuccessful', 'news_detail', 'askedsuccessful', 'faq_view','redeem','redeemLogin','loginForRedeem','redeem_status');
        $menus2 = $this->Event->find('all', array('fields' => 'id, event_name'));
        $this->set('menu2', $menus2);
        $menus3 = $this->Cookingclass->find('all', array('fields' => 'id, cooking_class_name'));
        $this->set('menu3', $menus3);
        $menus4 = $this->News->find('all', array('fields' => 'id, news_title'));
        $this->set('menu4', $menus4);
        $menus7 = $this->GiftVoucher->find('all', array('fields' => 'id, gift_voucher_name'));
        $this->set('giftVoucher', $menus7);
        $menus8 = $this->Product->find('all', array('fields' => 'id, product_name'));
        $this->set('menu8', $menus8);
        $this->Auth->authenticate = array(
            'Form' => array('userModel' => 'User',
                'fields' => array('username' => 'user_email', 'password' => 'user_password'),
            ),
        );
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
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
