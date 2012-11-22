<?php

App::uses('AppController', 'Controller');

/**
 * Tours Controller
 *
 * @property Tour $Tour
 */
class ToursController extends AppController {
	
//    public function isAuthorized($user) {
//        // All registered users can add posts
////        if ($this->action === 'add') {
////            return true;
////        }
//        // The owner of a post can edit and delete it
////        if (in_array($this->action, array('edit', 'delete','view','index','add'))) {
////            $tourId = $this->request->params['pass'][0];
////            if ($this->Tour->isOwnedBy($tourId, $user['id'])) {
//                return true;
////            }
////        }
//        return parent::isAuthorized($user);
//    }
//    public $components = array('Cookie');
//    public function beforeFilter() {
//        parent::beforeFilter();
//        $this->Cookie->name = 'shoppingCart';
//        $this->Cookie->time = 60 * 60 * 24 * 30;
//    }
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Cookie->name = 'shoppingCart';
        $this->Cookie->time = 60 * 60 * 24 * 30;
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Tour->recursive = 0;
        $this->set('tours', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }
        $this->set('tour', $this->Tour->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Tour->create();
            if ($this->Tour->save($this->request->data)) {
                $this->Session->setFlash(__('The tour has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tour could not be saved. Please, try again.'),'failure-message');
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
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Tour->save($this->request->data)) {
                $this->Session->setFlash(__('The tour has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tour could not be saved. Please, try again.'),'failure-message');
            }
        } else {
            $this->request->data = $this->Tour->read(null, $id);
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
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }
        if ($this->Tour->delete()) {
            $this->Session->setFlash(__('Tour deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tour was not deleted'),'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function tourDetail($id = null) {
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }
        $this->set('tour', $this->Tour->read(null, $id));
		$this->set('feedbacks', $this->Feedback->find('all',array('conditions' => array('AND' => array('feedback.page_id' => $id),'feedback.feedback_type'=>"Tour", 'feedback_status'=>"show"))));
	}
	
//    public function checkout($id = null) {
////        debug($this->Cookie->read('shoppingCart'));
//        if ($this->Cookie->read('Cart') != null) {
//            for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
////            $currentCart = $this->Cookie->read('cartData');
////            print_r($currentCart);
//                $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
////                print_r($currentCart);
//            }
//        } else {
//            $currentCart[0] = null;
//        }
////        debug($_COOKIE);
//        $currentTour = $this->Tour->read(null, $id);
////        debug($currentCart);
//        if ($currentCart[0] == null && $id != null) {
//            $currentProduct['Tour']['id'] = $currentTour['Tour']['id'];
//            $currentProduct['Tour']['tour_name'] = $currentTour['Tour']['tour_name'];
//            $currentProduct['Tour']['tour_price_per_certificate'] = $currentTour['Tour']['tour_price_per_certificate'];
//            $currentProduct['Qty'] = 1;
//            $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['Tour']['tour_price_per_certificate'];
////            $currentCart[0] = $currentProduct;
////            print_r($currentCart);
//            $this->Cookie->write('Cart.cartData0', $currentProduct);
////            print_r($this->Cookie->read('cartData'));
////            debug($currentCart);
////            $this->set('SC', $this->Cookie->read('Cart'));
//        } else if ($currentCart[0] != null && $id != null) {
//            $maxArrayKeyId = count($this->Cookie->read('Cart'));
//            $insertStatus = true;
////            debug($currentCart);
//            for ($i = 0; $i < $maxArrayKeyId; $i++) {
//                if ($currentCart[$i]['Tour']['id'] == $id) {
//                    //$staus = "You have already got this product in your Shopping Cart";
//                    $insertStatus = false;
////                    $this->set('SC', $this->Cookie->read("Cart"));
//                }
//            }
//            if ($insertStatus == true) {
//                $currentProduct['Identifier'] = "Tour";
//                $currentProduct['Tour']['id'] = $currentTour['Tour']['id'];
//                $currentProduct['Tour']['tour_name'] = $currentTour['Tour']['tour_name'];
//                $currentProduct['Tour']['tour_price_per_certificate'] = $currentTour['Tour']['tour_price_per_certificate'];
//                $currentProduct['Qty'] = 1;
//                $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['Tour']['tour_price_per_certificate'];
////                $currentCart[$maxArrayKeyId][0] = $currentProduct;
////                print_r($currentCart);
////                print_r( unserialize($_COOKIE["shoppingCart"]));
////                $this->Cookie->delete('cartData');
////                print_r($_COOKIE);
////                $this->Cookie->write('shoppingCart.cartData', $currentCart, false);
//                $this->Cookie->write("Cart.cartData$maxArrayKeyId", $currentProduct);
////                debug($this->Cookie->read('cartData'));
////                print_r($_COOKIE);
////                $this->set('SC', $this->Cookie->read("Cart"));
////                $this->set('SC', unserialize($_COOKIE["shoppingCart"]));
//            }
//        }
//        $this->set('SC', $this->Cookie->read("Cart"));
////        print_r($_COOKIE);
//        if ($this->request->is('post')) {
//            for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
//                $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
//            }
//            for ($i = 0; $i < count($currentCart); $i++) {
//                $postName = $currentCart[$i]['Tour']['id'] . 'Qty';
//                $currentCart[$i]['Qty'] = $this->request->data($postName);
//                $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['Tour']['tour_price_per_certificate'];
//                $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
//            }
//            $this->set('SC', $this->Cookie->read('Cart'));
//        }
//    }
//
//    public function deleteCheckoutItem($id = null) {
////        if (!$this->request->is('post')) {
////            throw new MethodNotAllowedException();
////        }
////        $this->Tour->id = $id;
////        if (!$this->Tour->exists()) {
////            throw new NotFoundException(__('Invalid tour'));
////        }
////        $currentCart = $this->Cookie->read('shoppingCart');
//////        $ar_keys = array_keys($currentCart);
////        if (count($currentCart) == 0) {
//////            unset($currentCart[0]);
//////            array_splice($currentCart, 1, 1);
//////            $this->Cookie->destroy();
//////            $this->redirect(array('action' => "/checkout/"));
//////                debug($ar_keys);
////        }
////        for ($i = 0; $i < count($currentCart); $i++) {
////            if ($currentCart[$i]['Tour']['id'] == $id && count($currentCart) != 1) {
//////                unset($currentCart[$i]);
//////                array_splice($currentCart, 1, 1);
//////                debug($currentCart);
//////                $this->Cookie->write('shoppingCart', $currentCart);
////                $redirectLink = "/checkout/$currentCart[0]['Tour']['id']";
//////                $this->redirect(array('action' => $redirectLink));
////            }
////        }
////        $this->Session->setFlash(__('Tour deleted'));
////        debug($this->Cookie->read('shoppingCart'));
////        $this->redirect(array('controller' => 'home', 'action' => 'display'));
//        for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
//            $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
//        }
////        debug($currentCart);
////        debug($id);
//        if (count($currentCart) != 1) {
////            $redirectLink = "/checkout/" . $currentCart[0]['Tour']['id'];
//            $redirectLink = "/checkout/";
//            for ($i = 0; $i < count($currentCart); $i++) {
//                $this->Cookie->delete("Cart.cartData$i");
//            }
//            for ($i = 0; $i < count($currentCart); $i++) {
//                if ($currentCart[$i]['Tour']['id'] == $id) {
//                    unset($currentCart[$i]);
//                }
//            }
//            array_splice($currentCart, count($currentCart), 1);
////            debug($currentCart);
//            for ($i = 0; $i < count($currentCart); $i++) {
//                $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
//            }
//        } else {
//            $redirectLink = "/checkout/";
//            $this->Cookie->delete("Cart.cartData0");
//        }
//        $this->redirect(array('action' => $redirectLink));
//    }

}

