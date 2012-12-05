<?php

App::uses('AppController', 'Controller');
require_once ("paypalfunctions.php");

class CheckoutController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index($id = null) {
        if (!empty($this->params['url']['def'])) {
            $identifier = $this->params['url']['def'];
            $id = $this->params['url']['id'];
        } else {
            $identifier = null;
            $id = null;
        }

        if ($identifier == 'Tour') {
            $dateId = $this->params['url']['dateId'];
            if ($this->Cookie->read('Cart') != null) {
                for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
                }
            } else {
                $currentCart[0] = null;
            }
            $currentTour = $this->Tour->read(null, $id);
            $currentTourDate = $this->TourDate->find("all", array('conditions' => array('TourDate.id' => "$dateId")));
            if ($currentCart[0] == null && $id != null) {
                $currentProduct['Identifier'] = "Tour";
                $currentProduct['Tour']['id'] = $currentTour['Tour']['id'];
                $currentProduct['Tour']['tour_name'] = $currentTour['Tour']['tour_name'];
                $currentProduct['TourDate']['tour_price_per_certificate'] = $currentTourDate[0]['TourDate']['tour_price_per_certificate'];
                $currentProduct['Qty'] = 1;
                $currentProduct['DateId'] = $dateId;
                $currentProduct['Date'] = $currentTourDate[0]['TourDate']['tour_date'];
                $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentTourDate[0]['TourDate']['tour_price_per_certificate'];
                $this->Cookie->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Cookie->read('Cart'));
                $insertStatus = true;
                for ($i = 0; $i < $maxArrayKeyId; $i++) {
                    if ($currentCart[$i]['Identifier'] == 'Tour') {
                        if ($currentCart[$i]['Tour']['id'] == $id && $currentCart[$i]['DateId'] == $dateId) {
                            $insertStatus = false;
                        }
                    }
                }
                if ($insertStatus == true) {
                    $currentProduct['Identifier'] = "Tour";
                    $currentProduct['Tour']['id'] = $currentTour['Tour']['id'];
                    $currentProduct['Tour']['tour_name'] = $currentTour['Tour']['tour_name'];
                    $currentProduct['TourDate']['tour_price_per_certificate'] = $currentTourDate[0]['TourDate']['tour_price_per_certificate'];
                    $currentProduct['Qty'] = 1;
                    $currentProduct['DateId'] = $dateId;
                    $currentProduct['Date'] = $currentTourDate[0]['TourDate']['tour_date'];
                    $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentTourDate[0]['TourDate']['tour_price_per_certificate'];
                    $this->Cookie->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
            //debug($this->Cookie->read('Cart.cartData0'));
        } else if ($identifier == 'CookingClass') {
            $dateId = $this->params['url']['dateId'];
            if ($this->Cookie->read('Cart') != null) {
                for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
                }
            } else {
                $currentCart[0] = null;
            }
            $currentTour = $this->Cookingclass->read(null, $id);
            $currentTourDate = $this->CookingclassDate->find("all", array('conditions' => array('CookingclassDate.id' => "$dateId")));
//            print_r($currentTourDate);
            if ($currentCart[0] == null && $id != null) {
                $currentProduct['Identifier'] = "CookingClass";
                $currentProduct['Cookingclass']['id'] = $currentTour['Cookingclass']['id'];
                $currentProduct['Cookingclass']['cooking_class_name'] = $currentTour['Cookingclass']['cooking_class_name'];
                $currentProduct['CookingclassDate']['cooking_class_price'] = $currentTourDate[0]['CookingclassDate']['cooking_class_price'];
                $currentProduct['Qty'] = 1;
                $currentProduct['DateId'] = $dateId;
                $currentProduct['Date'] = $currentTourDate[0]['CookingclassDate']['cookingclass_date'];
                $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentTourDate[0]['CookingclassDate']['cooking_class_price'];
                $this->Cookie->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Cookie->read('Cart'));
                $insertStatus = true;
                for ($i = 0; $i < $maxArrayKeyId; $i++) {
                    if ($currentCart[$i]['Identifier'] == 'CookingClass') {
                        if ($currentCart[$i]['Cookingclass']['id'] == $id && $currentCart[$i]['DateId'] == $dateId) {
                            $insertStatus = false;
                        }
                    }
                }
                if ($insertStatus == true) {
                    $currentProduct['Identifier'] = "CookingClass";
                    $currentProduct['Cookingclass']['id'] = $currentTour['Cookingclass']['id'];
                    $currentProduct['Cookingclass']['cooking_class_name'] = $currentTour['Cookingclass']['cooking_class_name'];
                    $currentProduct['CookingclassDate']['cooking_class_price'] = $currentTourDate[0]['CookingclassDate']['cooking_class_price'];
                    $currentProduct['Qty'] = 1;
                    $currentProduct['DateId'] = $dateId;
                    $currentProduct['Date'] = $currentTourDate[0]['CookingclassDate']['cookingclass_date'];
                    $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentTourDate[0]['CookingclassDate']['cooking_class_price'];
                    $this->Cookie->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
        } else if ($identifier == 'Product') {
            if ($this->Cookie->read('Cart') != null) {
                for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
                }
            } else {
                $currentCart[0] = null;
            }
            $currentTour = $this->Product->read(null, $id);
            if ($currentCart[0] == null && $id != null) {
                $currentProduct['Identifier'] = "Product";
                $currentProduct['Product']['id'] = $currentTour['Product']['id'];
                $currentProduct['Product']['product_name'] = $currentTour['Product']['product_name'];
                $currentProduct['Product']['product_price'] = $currentTour['Product']['product_price'];
                $currentProduct['Qty'] = 1;
                $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['Product']['product_price'];
                $this->Cookie->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Cookie->read('Cart'));
                $insertStatus = true;
                for ($i = 0; $i < $maxArrayKeyId; $i++) {
                    if ($currentCart[$i]['Identifier'] == 'Product') {
                        if ($currentCart[$i]['Product']['id'] == $id) {
                            $insertStatus = false;
                        }
                    }
                }
                if ($insertStatus == true) {
                    $currentProduct['Identifier'] = "Product";
                    $currentProduct['Product']['id'] = $currentTour['Product']['id'];
                    $currentProduct['Product']['product_name'] = $currentTour['Product']['product_name'];
                    $currentProduct['Product']['product_price'] = $currentTour['Product']['product_price'];
                    $currentProduct['Qty'] = 1;
                    $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['Product']['product_price'];
                    $this->Cookie->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
        } else if ($identifier == 'GiftVoucher') {
            if ($this->Cookie->read('Cart') != null) {
                for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
                }
            } else {
                $currentCart[0] = null;
            }
            $currentGiftVoucher = $this->GiftVoucher->read(null, $id);
            if ($currentCart[0] == null && $id != null) {
                $currentProduct['Identifier'] = "GiftVoucher";
                $currentProduct['GiftVoucher']['id'] = $currentGiftVoucher['GiftVoucher']['id'];
                $currentProduct['GiftVoucher']['gift_voucher_name'] = $currentGiftVoucher['GiftVoucher']['gift_voucher_name'];
                $currentProduct['GiftVoucher']['gift_price'] = $currentGiftVoucher['GiftVoucher']['gift_price'];
                $currentProduct['Qty'] = 1;
                $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['GiftVoucher']['gift_price'];
                $this->Cookie->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Cookie->read('Cart'));
                $insertStatus = true;
                for ($i = 0; $i < $maxArrayKeyId; $i++) {
                    if ($currentCart[$i]['Identifier'] == 'GiftVoucher') {
                        if ($currentCart[$i]['GiftVoucher']['id'] == $id) {
                            $insertStatus = false;
                        }
                    }
                }
                if ($insertStatus == true) {
                    $currentProduct['Identifier'] = "GiftVoucher";
                    $currentProduct['GiftVoucher']['id'] = $currentGiftVoucher['GiftVoucher']['id'];
                    $currentProduct['GiftVoucher']['gift_voucher_name'] = $currentGiftVoucher['GiftVoucher']['gift_voucher_name'];
                    $currentProduct['GiftVoucher']['gift_price'] = $currentGiftVoucher['GiftVoucher']['gift_price'];
                    $currentProduct['Qty'] = 1;
                    $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['GiftVoucher']['gift_price'];
                    $this->Cookie->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
        }
        $this->set('SC', $this->Cookie->read("Cart"));
        if ($this->request->is('post')) {
            if ($identifier == 'Update') {
                for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
                }
                for ($i = 0; $i < count($currentCart); $i++) {
                    if ($currentCart[$i]['Identifier'] == 'Tour') {
                        $postName = $currentCart[$i]['Tour']['id'] . 'TQty';
                        $currentCart[$i]['Qty'] = $this->request->data($postName);
                        $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['Tour']['tour_price_per_certificate'];
                        $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
                    } else if ($currentCart[$i]['Identifier'] == 'CookingClass') {
                        $postName = $currentCart[$i]['Cookingclass']['id'] . 'CCQty';
                        $currentCart[$i]['Qty'] = $this->request->data($postName);
                        $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['Cookingclass']['cooking_class_price'];
                        $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
                    } else if ($currentCart[$i]['Identifier'] == 'Product') {
                        $postName = $currentCart[$i]['Product']['id'] . 'PQty';
                        $currentCart[$i]['Qty'] = $this->request->data($postName);
                        $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['Product']['product_price'];
                        $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
                    } else if ($currentCart[$i]['Identifier'] == 'GiftVoucher') {
                        $postName = $currentCart[$i]['GiftVoucher']['id'] . 'GQty';
                        $currentCart[$i]['Qty'] = $this->request->data($postName);
                        $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['GiftVoucher']['gift_price'];
                        $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
                    }
                }
            }
        }
        $this->set('SC', $this->Cookie->read('Cart'));
    }

    public function deleteCheckoutItem($id = null) {
        if (!empty($this->params['url']['def'])) {
            $identifier = $this->params['url']['def'];
            $id = $this->params['url']['id'];
        } else {
            $identifier = null;
            $id = null;
        }

        for ($i = 0; $i < count($this->Cookie->read('Cart')); $i++) {
            $currentCart[$i] = $this->Cookie->read("Cart.cartData$i");
        }
//        debug($currentCart);
        debug($identifier);
        if (count($currentCart) != 1) {
            $redirectLink = "index";
            for ($i = 0; $i < count($currentCart); $i++) {
                $this->Cookie->delete("Cart.cartData$i");
            }
            if ($identifier == 'Tour') {
                for ($i = 0; $i < count($currentCart); $i++) {
                    if ($currentCart[$i]['Identifier'] == 'Tour') {
                        if ($currentCart[$i]['Tour']['id'] == $id) {
                            unset($currentCart[$i]);
                        }
                    }
                }
            }
            if ($identifier == 'CookingClass') {
                for ($i = 0; $i < count($currentCart); $i++) {
                    if ($currentCart[$i]['Identifier'] == 'CookingClass') {
                        if ($currentCart[$i]['Cookingclass']['id'] == $id) {
                            unset($currentCart[$i]);
                        }
                    }
                }
            }
            if ($identifier == 'Product') {
                for ($i = 0; $i < count($currentCart); $i++) {
                    if ($currentCart[$i]['Identifier'] == 'Product') {
                        if ($currentCart[$i]['Product']['id'] == $id) {
                            unset($currentCart[$i]);
                        }
                    }
                }
            }
            if ($identifier == 'GiftVoucher') {
                for ($i = 0; $i < count($currentCart); $i++) {
                    if ($currentCart[$i]['Identifier'] == 'GiftVoucher') {
                        if ($currentCart[$i]['GiftVoucher']['id'] == $id) {
                            unset($currentCart[$i]);
                        }
                    }
                }
            }
            array_splice($currentCart, count($currentCart), 1);
            debug($currentCart);
            for ($i = 0; $i < count($currentCart); $i++) {
                $this->Cookie->write("Cart.cartData$i", $currentCart[$i]);
            }
            debug($this->Cookie->read('Cart'));
            $this->redirect(array('action' => $redirectLink));
        } else {
            $redirectLink = "index";
            $this->Cookie->delete("Cart.cartData0");
            $this->redirect(array('action' => $redirectLink));
        }
    }

    var $uses = array('DisclaimerForm');

    public function confirmCheckout() {
        $this->set('disclaimerForm', $this->DisclaimerForm->find('all', array('limit' => 1)));
        $this->set('SC', $this->Cookie->read('Cart'));
    }

    public function expressCheckout() {
        
    }

    public function paymentSuccessful() {
        
    }

}