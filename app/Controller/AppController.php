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
            'logoutRedirect' => array('controller' => 'home', 'action' => 'index'),
            'authorize' => array('Controller')
        ),
        'Cookie',
    );
    public $helpers = array(
        'Session'
    );
//      public function beforeFilter1() {
//         $this->Auth->allow('index', 'view');
//     }
    var $uses = array('Tour', 'Event', 'Cookingclass', 'Product', 'User', 'Feedback', 'News', 'GiftVoucher', 'GiftvoucherOrder', 'TourOrder', 'CookingclassOrder', 'TourDate', 'UserSubscription', 'CookingclassDate', 'TourType', 'ProductOrder');

    function beforeFilter() {
        Security::setHash('sha1');
        $allTours = $this->Tour->find('list', array('fields' => 'id, tour_name', 'conditions' => array('Tour.publish_status' => "Published")));
        $this->set('allTours', $allTours);
        $allCookingClass = $this->Cookingclass->find('list', array('fields' => 'id, cooking_class_name'));
        $this->set('allCookingClasses', $allCookingClass);
        $allProducts = $this->Product->find('list', array('fields' => 'id, product_name'));
        $this->set('allProducts', $allProducts);

        $tourTypeData = $this->TourType->find("all");
        $this->set('tourTypeData', $tourTypeData);
        $tourMenu = null;
        for ($i = 0; $i < count($tourTypeData); $i++) {
            $tourTypeId = $tourTypeData[$i]['TourType']['id'];
            $tourMenu[$i] = $this->Tour->find('all', array('fields' => 'id, tour_name', 'conditions' => array('Tour.tour_type_id' => "$tourTypeId", 'Tour.publish_status' => "Published")));
//            print_r($tourMenu);
        }
        $this->set("tourMenu", $tourMenu);
        $this->Auth->allow('display', 'tourDetail', 'cookingclass_detail', 'aboutCompany', 'contactUs', 'login', 'event_detail', 'checkout', 'logout', 'customerLogin', 'deleteCheckoutItem', 'customerPayment', 'existingCustomerLogin', 'check', 'confirmCheckout', 'sendEmail', 'sendSuccessful', 'news_detail', 'askedsuccessful', 'faq_view', 'redeem', 'redeemLogin', 'loginForRedeem', 'redeem_status', 'product_details', 'subscribe', 'unsubscribe', 'successfulsubscription', 'successfulunsubscription', 'expressCheckout', 'paymentSuccessful', 'deal_detail','homepageLogin','customerInfoEdit','register','more_detail','forgotten_password','changeSuccessful');
        $menus2 = $this->Event->find('all', array('fields' => 'id, event_name', 'conditions' => array('publish_status' => "Published")));
        
        $this->set('menu2', $menus2);
        $menus3 = $this->Cookingclass->find('all', array('fields' => 'id, cooking_class_name', 'conditions' => array('publish_status' => "Published")));
        $this->set('menu3', $menus3);
        $menus4 = $this->News->find('all', array('fields' => 'id, news_title', 'conditions' => array('publish_status' => "Published")));
        $this->set('menu4', $menus4);
        $menus7 = $this->GiftVoucher->find('all', array('fields' => 'id, gift_voucher_name', 'conditions' => array('publish_status' => "Published")));
        $this->set('giftVoucher', $menus7);
        $menus8 = $this->Product->find('all', array('fields' => 'id, product_name', 'conditions' => array('publish_status' => "Published")));
        $this->set('menu8', $menus8);
        $this->Auth->authenticate = array(
            'Form' => array('userModel' => 'User',
                'fields' => array('username' => 'user_email', 'password' => 'user_password'),
            ),
        );
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        
        $this->set('pathForFinder', "/web2.0/");
        $this->sender = "tours@foodietrails.com.au";
        $this->senderTag = "Foodie Trails";
        $this->recipient = "tours@foodietrails.com.au";
        $this->set('blogLink', "http://foodietrails.com.au/blogweb/index.php");
        $this->set('publicKey', "6Ldl-dcSAAAAAMbIoqOIHftTglcPfeRWnRirosk6");
        $this->privateKey = "6Ldl-dcSAAAAACS36YCZNyjag4luQ171Ty1KJeni";
        $this->set('homePageContact', "(+61) 1800667791");
        
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