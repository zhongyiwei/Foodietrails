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
                $this->Session->setFlash(__('The tour could not be saved. Please, try again.'));
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
                $this->Session->setFlash(__('The tour could not be saved. Please, try again.'));
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
        $this->Session->setFlash(__('Tour was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function tourDetail($id = null) {
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }
        $this->set('tour', $this->Tour->read(null, $id));
    }

    public function checkout($id = null) {
        $this->Tour->id = $id;
//        if (!$this->Tour->exists()) {
//            throw new NotFoundException(__('Invalid tour'));
//        }
        $currentCart = $this->Cookie->read('shoppingCart');
        $currentProduct = $this->Tour->read(null, $id);
        if ($currentCart == "" && $id != null) {
            $currentProduct['Qty'] = 1;
            $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['Tour']['tour_price_per_certificate'];
            $tourInfo[0] = $currentProduct;
            $this->Cookie->write('shoppingCart', $tourInfo);
        } else if ($currentCart != "" && $id != null) {
            $ar_keys = array_keys($currentCart);
            rsort($ar_keys);
            $maxArrayKeyId = $ar_keys[0] + 1;

            $insertStatus = true;
            for ($i = 0; $i < $maxArrayKeyId; $i++) {
                if ($currentCart[$i]['Tour']['id'] == $id) {
                    $staus = "You have already got this product in your Shopping Cart";
                    $insertStatus = false;
                }
            }
            if ($insertStatus == true) {
                $currentProduct['Qty'] = 1;
                $currentProduct['subTotal'] = $currentProduct['Qty'] * $currentProduct['Tour']['tour_price_per_certificate'];
                $currentCart[$maxArrayKeyId] = $currentProduct;
                $this->Cookie->write('shoppingCart', $currentCart);
            }
        }
        $this->set('SC', $this->Cookie->read('shoppingCart'));

        if ($this->request->is('post')) {
            $currentCart2 = $this->Cookie->read('shoppingCart');
            for ($i = 0; $i < count($currentCart2); $i++) {
                $postName = $currentCart2[$i]['Tour']['tour_name'] . 'Qty';
                $currentCart2[$i]['Qty'] = $this->request->data($postName);
                $currentCart2[$i]['subTotal'] = $currentCart2[$i]['Qty'] * $currentCart2[$i]['Tour']['tour_price_per_certificate'];
            }
            $this->Cookie->write('shoppingCart', $currentCart2);
            $this->set('SC', $this->Cookie->read('shoppingCart'));
        }
//        debug($this->Cookie->read('shoppingCart'));
    }

    public function deleteCheckoutItem($id = null) {
//        if (!$this->request->is('post')) {
//            throw new MethodNotAllowedException();
//        }
        $this->Tour->id = $id;
//        if (!$this->Tour->exists()) {
//            throw new NotFoundException(__('Invalid tour'));
//        }
        $currentCart = $this->Cookie->read('shoppingCart');
//        $ar_keys = array_keys($currentCart);
        for ($i = 0; $i < count($currentCart); $i++) {
            if ($currentCart[$i]['Tour']['id'] == $id) {
                unset($currentCart[$i]);
                array_splice($currentCart, 1, 1);
//                debug($currentCart);
                $this->Cookie->write('shoppingCart', $currentCart);
                $this->redirect(array('action' => '/checkout/'));
            } 
        }
        if (count($currentCart) == 1) {
                unset($currentCart[0]);
                array_splice($currentCart, 1, 1);
                $this->Cookie->destroy();
                $this->redirect(array('action' => "/checkout/"));
//                debug($ar_keys);
            }
        $this->Session->setFlash(__('Tour deleted'));
//        $this->redirect(array('controller' => 'home', 'action' => 'display'));
    }
}

