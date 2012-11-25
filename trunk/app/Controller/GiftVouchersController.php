<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * GiftVouchers Controller
 *
 * @property GiftVoucher $GiftVoucher
 */
class GiftVouchersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->GiftVoucher->recursive = 0;
        $this->set('giftVouchers', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->GiftVoucher->id = $id;
        if (!$this->GiftVoucher->exists()) {
            throw new NotFoundException(__('Invalid gift voucher'));
        }
        $this->set('giftVoucher', $this->GiftVoucher->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->GiftVoucher->create();
            if ($this->GiftVoucher->save($this->request->data)) {
                $this->Session->setFlash(__('The gift voucher has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gift voucher could not be saved. Please, try again.'), 'failure-message');
            }
        }
//		$users = $this->GiftVoucher->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->GiftVoucher->id = $id;
        if (!$this->GiftVoucher->exists()) {
            throw new NotFoundException(__('Invalid gift voucher'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->GiftVoucher->save($this->request->data)) {
                $this->Session->setFlash(__('The gift voucher has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gift voucher could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->GiftVoucher->read(null, $id);
        }
//		$users = $this->GiftVoucher->User->find('list');
        $this->set(compact('users'));
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
        $this->GiftVoucher->id = $id;
        if (!$this->GiftVoucher->exists()) {
            throw new NotFoundException(__('Invalid gift voucher'));
        }
        if ($this->GiftVoucher->delete()) {
            $this->Session->setFlash(__('Gift voucher deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Gift voucher was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function redeem($id = null) {
        $identifier = $this->params['url']['def'];
        $id = $this->params['url']['id'];
        if ($this->request->is('post')) {
            $redeemCode = $this->request->data['GiftvoucherOrder']['gift_redeem_code'];
            $temp = $this->GiftvoucherOrder->find('all', array('conditions' => array('gift_redeem_code' => "$redeemCode")));
//            print_r($redeemData);
            $redeemStatus = true;
            if ($temp != null) {
                $redeemData = $temp[0];
//                print_r($redeemData);
                if ($identifier != $redeemData['GiftVoucher']['gift_type']) {
                    $redeemStatus = false;
                    $this->Session->setFlash(__('Your redeem code is not entered correctly, Please try again.'), 'failure-message');
                } else if ($redeemData['GiftvoucherOrder']['gift_redeem_status'] == 'Redeemed') {
                    $redeemStatus = false;
                    $this->Session->setFlash(__('Sorry, but this gift voucher has been redeemed.'), 'failure-message');
                } else if (date('Y-m-d') > $redeemData['GiftvoucherOrder']['gift_due_date']) {
                    $redeemStatus = false;
                    $this->Session->setFlash(__('Sorry, but this gift voucher has expired.'), 'failure-message');
                }
            } else if ($temp == null) {
                $redeemStatus = false;
                $this->Session->setFlash(__('Your redeem code is not entered correctly, Please try again.'), 'failure-message');
            }
//            debug($redeemStatus);
            $currentUser = $this->Auth->user();
            $currentUserId = $currentUser['id'];
//            print_r($currentUser);
//            debug($identifier);
            if ($redeemStatus == true) {
                $giftVoucherOrderId = $redeemData['GiftvoucherOrder']['id'];
                $this->request->data['GiftvoucherOrder']['gift_redeem_status'] = 'Redeemed';
                $this->request->data['GiftvoucherOrder']['recipient_id'] = "$currentUserId";
                $this->request->data['GiftvoucherOrder']['id'] = "$giftVoucherOrderId";
                $this->GiftvoucherOrder->save($this->request->data);

                if ($identifier == 'Tour') {
                    $this->request->data['TourOrder']['tour_id'] = "$id";
                    $this->request->data['TourOrder']['user_id'] = "$currentUserId";
                    $this->request->data['TourOrder']['tour_date_id'] = "2";
                    $this->request->data['TourOrder']['tour_purchase_quantity'] = "1";
                    $this->request->data['TourOrder']['tour_purchase_date'] = date('Y-m-d H:i:s');
                    $this->TourOrder->save($this->request->data);
                } else if ($identifier == "Cooking Class") {
                    $this->request->data['CookingclassOrder']['cooking_class_id'] = "$id";
                    $this->request->data['CookingclassOrder']['user_id'] = "$currentUserId";
                    $this->request->data['CookingclassOrder']['cooking_class_date_id'] = "1";
                    $this->request->data['CookingclassOrder']['cooking_class_order_quantity'] = "1";
                    $this->request->data['CookingclassOrder']['cooking_class_order_date'] = date('Y-m-d H:i:s');
                    $this->CookingclassOrder->save($this->request->data);
                }

                $this->redirect(array('action' => "redeem_status/?id=$giftVoucherOrderId"));
            }
        }
    }

    public function redeem_status() {
        $id = $this->params['url']['id'];
        $currentUser = $this->Auth->user();
        $this->set('currentUser', $currentUser);

        $temp = $this->GiftvoucherOrder->find("all", array('conditions' => array('GiftvoucherOrder.id' => "$id", 'recipient_id' => $currentUser['id'])));

        if ($temp != null) {
            $redeemData = $temp[0];
            $this->set('redeemData', $temp[0]);
            $user_first_name = $redeemData['User']['user_first_name'];
            $user_last_name = $redeemData['User']['user_surname'];
            $user_contacts = $redeemData['User']['user_contacts'];
            $user_email = $redeemData['User']['user_email'];
            $gift_voucher_name = $redeemData['GiftVoucher']['gift_voucher_name'];
            $gift_redeem_status = $redeemData['GiftvoucherOrder']['gift_redeem_status'];
            $currrentUser_email = $currentUser['user_email'];
//            $transactionID = $redeemData['GiftvoucherOrder']['id'];

            $redeemMessage = '<div style="font-family: Arial;"><p>Below are the confirmation information: </p><table border="0px" style="width: 600px; padding:10px;">' . "
            <td style='border-right: 1px solid #DDD;border-bottom: 1px solid #DDD;font-family: Arial;'>Gifter Name</td>
            <td style='border-bottom: 1px solid #DDD;font-family: Arial;'>$user_first_name $user_last_name</td>
        </tr>
        <tr>
            <td style='border-right: 1px solid #DDD;border-bottom: 1px solid #DDD;font-family: Arial;'>Gifter Contact Number</td>
            <td style='border-bottom: 1px solid #DDD;font-family: Arial;'>$user_contacts</td>
        </tr>
        <tr>
            <td style='border-right: 1px solid #DDD;border-bottom: 1px solid #DDD;font-family: Arial;'>Gifter Email</td>
            <td style='border-bottom: 1px solid #DDD;font-family: Arial;'>$user_email</td>
        <tr>
            <td style='border-right: 1px solid #DDD;border-bottom: 1px solid #DDD;font-family: Arial;'>Gift Voucher Name</td>
            <td style='border-bottom: 1px solid #DDD;font-family: Arial;'>$gift_voucher_name</td>
        </tr>
        <tr>
            <td style='border-bottom: 0px; border-right:1px solid #DDD;font-family: Arial;'>Gift Redeem Status</td>
            <td style='border-bottom: 0px;font-family: Arial;'>$gift_redeem_status</td>
        </tr>
        <tr>
        <td colspan='2' style='font-family: Arial; margin-top:40px;'><p>For Any Inquiries, Please telephone 0452660748 or visit FAQ section at www.foodietrails.com.au</p></td>
        </tr>
    </table></div>";

            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("$currrentUser_email" => "$currrentUser_email"));
            $email->to("$currrentUser_email");
            $email->subject("Congratulations, Your gift voucher has been redeemed successfully!");
            $email->send($redeemMessage);
        } else {
            $this->set('redeemData', $temp);
        }
    }

}
