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
//        $this->Cookie->name = 'shoppingCart';
//        $this->Cookie->time = 60 * 60 * 24 * 30;
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

        $tourData = $this->Tour->find("all", array('conditions' => array("Tour.id" => "$id")));

//        print_r($tourData);
        $tourTypeId = $tourData[0]['TourType']['id'];
        $tourType = $this->Tour->TourType->find('all', array('fields' => 'tour_type_name', 'conditions' => array('TourType.id' => "$tourTypeId")));
        $this->set(compact('tourType'));
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
                $this->Session->setFlash(__('The tour could not be saved. Please, try again.'), 'failure-message');
            }
        }
        $tourType = $this->Tour->TourType->find('list', array('fields' => 'tour_type_name'));
        $this->set(compact('tourType'));
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
                $this->Session->setFlash(__('The tour could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->Tour->read(null, $id);
        }
        $tourType = $this->Tour->TourType->find('list', array('fields' => 'tour_type_name'));
        $this->set(compact('tourType'));
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
        $this->Session->setFlash(__('Tour was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function tourDetail($id = null) {
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }

//        for ($i = 0; $i < 28; $i++) {
//            $weekArray[$i] = date('D', strtotime("+$i day"));
//            $dateArray[$i] = date('jS M', strtotime("+ $i day"));
//            $tourDateArray[$i] = date('Y-m-d', strtotime("+$i day"));
//        }
        $tourDateData = $this->TourDate->find("all", array('conditions' => array('tour_progress' => 'Incomplete', 'TourDate.tour_id' => "$id", 'TourDate.tour_date >=' => date('Y-m-d H:i:s'))));
////        $tourDateList = $this->TourDate->find("list",array( 'fields' => array('TourDate.id'),'conditions' => array('tour_progress' => 'Incomplete','TourDate.tour_id'=>"$id")));
        $tourData = $this->Tour->find("all", array('conditions' => array('Tour.id' => "$id")));
////        print_r($tourData);
        for ($i = 0; $i < count($tourDateData); $i++) {
            $tourDateId = $tourDateData[$i]['TourDate']['id'];
            $tourOrderData = $this->TourOrder->find('all', array('conditions' => array('TourOrder.tour_date_id' => "$tourDateId", 'TourOrder.tour_id' => "$id")));
            $Booked = 0;
            for ($j = 0; $j < count($tourOrderData); $j++) {
                $Booked = $Booked + $tourOrderData[$j]['TourOrder']['tour_purchase_quantity'];
            }
            $tourDateData[$i]['vacancy'] = $tourData[0]['Tour']['tour_max_num_on_day'] - $Booked;
            if ($tourDateData[$i]['vacancy'] < 0) {
                $tourDateData[$i]['vacancy'] = 0;
            }

            if ($Booked >= $tourData[0]['Tour']['tour_max_num_on_day']) {
                $tourDateData[$i]['display'] = false;
            } else {
                $tourDateData[$i]['display'] = true;
            }
        }
//        print_r($tourDateData);
//        $this->set(compact('weekArray', 'dateArray', 'tourDateArray', 'tourDateData'));

        $this->set(compact('tourDateData'));
        $tour = $this->Tour->find('all', array('conditions' => array('Tour.id' => "$id", 'Tour.publish_status' => "Published")));
        if ($tour == null) {
            $this->redirect(array('controller' => 'home', 'action' => 'display'));
        }
        $this->set('tour', $tour[0]);
        $this->set('feedbacks', $this->Feedback->find('all', array('conditions' => array('AND' => array('Feedback.page_id' => $id), 'Feedback.feedback_type' => "Tour", 'Feedback_status' => "show"))));
    }

        public function preview($id = null) {
        $this->Tour->id = $id;
        if (!$this->Tour->exists()) {
            throw new NotFoundException(__('Invalid tour'));
        }
        $tourDateData = $this->TourDate->find("all", array('conditions' => array('tour_progress' => 'Incomplete', 'TourDate.tour_id' => "$id", 'TourDate.tour_date >=' => date('Y-m-d H:i:s'))));
        $tourData = $this->Tour->find("all", array('conditions' => array('Tour.id' => "$id")));
        for ($i = 0; $i < count($tourDateData); $i++) {
            $tourDateId = $tourDateData[$i]['TourDate']['id'];
            $tourOrderData = $this->TourOrder->find('all', array('conditions' => array('TourOrder.tour_date_id' => "$tourDateId", 'TourOrder.tour_id' => "$id")));
            $Booked = 0;
            for ($j = 0; $j < count($tourOrderData); $j++) {
                $Booked = $Booked + $tourOrderData[$i]['TourOrder']['tour_purchase_quantity'];
            }
            $tourDateData[$i]['vacancy'] = $tourData[0]['Tour']['tour_max_num_on_day'] - $Booked;
            if ($tourDateData[$i]['vacancy'] < 0) {
                $tourDateData[$i]['vacancy'] = 0;
            }

            if ($Booked >= $tourData[0]['Tour']['tour_max_num_on_day']) {
                $tourDateData[$i]['display'] = false;
            } else {
                $tourDateData[$i]['display'] = true;
            }
        }
        $this->set(compact('tourDateData'));
        $tour = $this->Tour->find('all', array('conditions' => array('Tour.id' => "$id")));
        $this->set('tour', $tour[0]);
    }

}

