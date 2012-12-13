<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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
            if ($this->Session->read('Cart') != null) {
                for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Session->read("Cart.cartData$i");
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
                $this->Session->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Session->read('Cart'));
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
                    $this->Session->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
            //debug($this->Session->read('Cart.cartData0'));
        } else if ($identifier == 'CookingClass') {
            $dateId = $this->params['url']['dateId'];
            if ($this->Session->read('Cart') != null) {
                for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Session->read("Cart.cartData$i");
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
                $this->Session->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Session->read('Cart'));
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
                    $this->Session->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
        } else if ($identifier == 'Product') {
            if ($this->Session->read('Cart') != null) {
                for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Session->read("Cart.cartData$i");
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
                $this->Session->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Session->read('Cart'));
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
                    $this->Session->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
        } else if ($identifier == 'GiftVoucher') {
            if ($this->Session->read('Cart') != null) {
                for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Session->read("Cart.cartData$i");
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
                $this->Session->write('Cart.cartData0', $currentProduct);
            } else if ($currentCart[0] != null && $id != null) {
                $maxArrayKeyId = count($this->Session->read('Cart'));
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
                    $this->Session->write("Cart.cartData$maxArrayKeyId", $currentProduct);
                }
            }
        }
        $this->set('SC', $this->Session->read("Cart"));
        if ($this->request->is('post')) {
            if ($identifier == 'Update') {
                for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    $currentCart[$i] = $this->Session->read("Cart.cartData$i");
                }
                for ($i = 0; $i < count($currentCart); $i++) {
                    if ($currentCart[$i]['Identifier'] == 'Tour') {
                        $postName = $currentCart[$i]['Tour']['id'] . 'TQty';
                        $num = intval($this->request->data($postName));
                        if (is_int($num) == true && $num > 0) {
                            $currentCart[$i]['Qty'] = $num;
                            $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['TourDate']['tour_price_per_certificate'];
                            $this->Session->write("Cart.cartData$i", $currentCart[$i]);
                        } else {
                            $this->Session->setFlash(__('Please enter your number correctly.'), 'failure-message');
                        }
                    } else if ($currentCart[$i]['Identifier'] == 'CookingClass') {
                        $postName = $currentCart[$i]['Cookingclass']['id'] . 'CCQty';
                        $num = intval($this->request->data($postName));
                        if (is_int($num) == true && $num > 0) {
                            $currentCart[$i]['Qty'] = $num;
                            $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['CookingclassDate']['cooking_class_price'];
                            $this->Session->write("Cart.cartData$i", $currentCart[$i]);
                        } else {
                            $this->Session->setFlash(__('Please enter your number correctly.'), 'failure-message');
                        }
                    } else if ($currentCart[$i]['Identifier'] == 'Product') {
                        $postName = $currentCart[$i]['Product']['id'] . 'PQty';
                        $num = intval($this->request->data($postName));
                        if (is_int($num) == true && $num > 0) {
                            $currentCart[$i]['Qty'] = $num;
                            $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['ProductDate']['product_price'];
                            $this->Session->write("Cart.cartData$i", $currentCart[$i]);
                        } else {
                            $this->Session->setFlash(__('Please enter your number correctly.'), 'failure-message');
                        }
                    } else if ($currentCart[$i]['Identifier'] == 'GiftVoucher') {
                        $postName = $currentCart[$i]['GiftVoucher']['id'] . 'GQty';
                        $num = intval($this->request->data($postName));
                        if (is_int($num) == true && $num > 0) {
                            $currentCart[$i]['Qty'] = $num;
                            $currentCart[$i]['subTotal'] = $currentCart[$i]['Qty'] * $currentCart[$i]['GiftVoucher']['gift_price'];
                            $this->Session->write("Cart.cartData$i", $currentCart[$i]);
                        } else {
                            $this->Session->setFlash(__('Please enter your number correctly.'), 'failure-message');
                        }
                    }
                }
            }
        }
        $this->set('SC', $this->Session->read('Cart'));
    }

    public function deleteCheckoutItem($id = null) {
        if (!empty($this->params['url']['def'])) {
            $identifier = $this->params['url']['def'];
            $id = $this->params['url']['id'];
        } else {
            $identifier = null;
            $id = null;
        }

        for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
            $currentCart[$i] = $this->Session->read("Cart.cartData$i");
        }
//        debug($currentCart);
//        debug($identifier);
        if (count($currentCart) != 1) {
            $redirectLink = "index";
            for ($i = 0; $i < count($currentCart); $i++) {
                $this->Session->delete("Cart.cartData$i");
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
            //debug($currentCart);
            for ($i = 0; $i < count($currentCart); $i++) {
                $this->Session->write("Cart.cartData$i", $currentCart[$i]);
            }
            //debug($this->Session->read('Cart'));
            $this->redirect(array('action' => $redirectLink));
        } else {
            $redirectLink = "index";
            $this->Session->delete("Cart.cartData0");
            $this->redirect(array('action' => $redirectLink));
        }
    }

    var $uses = array('DisclaimerForm');

    public function confirmCheckout() {
        $this->set('disclaimerForm', $this->DisclaimerForm->find('all', array('limit' => 1)));
        $this->set('SC', $this->Session->read('Cart'));
        echo $this->Session->read('User.role');
    }

    public function paymentSuccessful() {
        $SC = $this->Session->read('Cart');
        $currentUser = $this->Auth->user();
        $currentUserId = $currentUser['id'];
//        if ($_SESSION["payment_Status"] == 'Pending') {
        for ($i = 0; $i < count($SC); $i++) {
            if ($SC["cartData$i"]['Identifier'] == "Tour") {
                $this->request->data['TourOrder']['tour_id'] = $SC["cartData$i"]['Tour']['id'];
                $this->request->data['TourOrder']['user_id'] = $currentUserId;
                $this->request->data['TourOrder']['tour_date_id'] = $SC["cartData$i"]['DateId'];
                $this->request->data['TourOrder']['tour_purchase_quantity'] = $SC["cartData$i"]['Qty'];
                $this->request->data['TourOrder']['tour_purchase_date'] = date('Y-m-d H:i:s');
                $this->TourOrder->save($this->request->data);
            } else if ($SC["cartData$i"]['Identifier'] == "CookingClass") {
                $this->request->data['CookingclassOrder']['cooking_class_id'] = $SC["cartData$i"]['Cookingclass']['id'];
                $this->request->data['CookingclassOrder']['user_id'] = $currentUserId;
                $this->request->data['CookingclassOrder']['cooking_class_date_id'] = $SC["cartData$i"]['DateId'];
                $this->request->data['CookingclassOrder']['cooking_class_order_quantity'] = $SC["cartData$i"]['Qty'];
                $this->request->data['CookingclassOrder']['cooking_class_order_date'] = date('Y-m-d H:i:s');
                $this->CookingclassOrder->save($this->request->data);
            } else if ($SC["cartData$i"]['Identifier'] == "Product") {
                $this->request->data['ProductOrder']['product_id'] = $SC["cartData$i"]['Product']['id'];
                $this->request->data['ProductOrder']['user_id'] = $currentUserId;
                $this->request->data['ProductOrder']['cooking_class_date_id'] = $SC["cartData$i"]['DateId'];
                $this->request->data['ProductOrder']['product_purchase_quantity'] = $SC["cartData$i"]['Qty'];
                $this->request->data['ProductOrder']['product_purchase_date'] = date('Y-m-d H:i:s');
                $this->ProductOrder->save($this->request->data);
            } else if ($SC["cartData$i"]['Identifier'] == "GiftVoucher") {
//                    echo $SC["cartData$i"]['Qty'];
                for ($j = 0; $j < $SC["cartData$i"]['Qty']; $j++) {
                    $this->GiftvoucherOrder->create(false);
                    $users = $this->User->find("all", array('conditions' => array("User.id" => "$currentUserId")));
                    $redeemCode = "FT" . $users[0]['User']['user_first_name'] . date('YmdHis') . $j;
                    $this->request->data['GiftvoucherOrder']['gift_voucher_id'] = $SC["cartData$i"]['GiftVoucher']['id'];
                    $this->request->data['GiftvoucherOrder']['user_id'] = $currentUserId;
                    $this->request->data['GiftvoucherOrder']['gift_purchase_date'] = date('Y-m-d H:i:s');
                    $this->request->data['GiftvoucherOrder']['gift_due_date'] = date('Y-m-d H:i:s', strtotime('+1 year'));
                    $this->request->data['GiftvoucherOrder']['gift_redeem_code'] = "$redeemCode";
                    $this->request->data['GiftvoucherOrder']['gift_redeem_status'] = "Not Redeemed";
                    $this->GiftvoucherOrder->save($this->request->data);

                    $userEmail = $users[0]['User']['user_email'];
                    $giftMessage = $this->GiftVoucher->find("all", array('conditions' => array("Giftvoucher.id" => $SC["cartData$i"]['GiftVoucher']['id'])));
                    $termLink = "<a href=" . Router::url("/files/WaiverforFoodieTrailswebsite.pdf", true) . ">T&C's</a> on our website";
                    $logo = "<img src=" . Router::url("/img/logo.png", true) . " height='50' alt ='Foodie Trails Logo' name ='Foodie Trails Logo'/>";
                    $msg = str_replace("{first_name}", $users[0]['User']['user_first_name'], $giftMessage[0]['GiftVoucher']['gift_message']);
                    $msg = str_replace("{expire_date}", date('Y-m-d H:i:s', strtotime('+1 year')), $msg);
                    $msg = str_replace("{redeem_code}", $redeemCode, $msg);
                    $msg = str_replace("{term_link}", $termLink, $msg);
                    $msg = str_replace("{logo}", $logo, $msg);
                    $msg = "<div style='font-family:Century Gothic;color:#06496e; '>" . $msg . "</div>";

                    $email = new CakeEmail();
                    $email->config('default');
                    $email->emailFormat('html');
                    $email->from(array("$this->sender" => "$this->senderTag"));
                    $email->to("$userEmail");
                    $email->subject("Thank you for purchasing the Gift Voucher, here is your Gift Voucher Code");

                    $email->send($msg);
                }
            }
        }
//        }

        for ($i = 0; $i < count($SC); $i++) {
            $this->Session->delete("Cart.cartData$i");
        }
        $this->redirect(array('action' => 'paymentSuccessfulLanding'));
    }

    public function paymentSuccessfulLanding() {
        
    }

}