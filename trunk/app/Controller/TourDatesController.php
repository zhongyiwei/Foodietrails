<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * TourDates Controller
 *
 * @property TourDate $TourDate
 */
class TourDatesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TourDate->recursive = 0;
        $this->set('tourDates', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->TourDate->id = $id;
        if (!$this->TourDate->exists()) {
            throw new NotFoundException(__('Invalid tour date'));
        }
        $this->set('tourDate', $this->TourDate->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->TourDate->create();
            if ($this->TourDate->save($this->request->data)) {
                $this->Session->setFlash(__('The tour date has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tour date could not be saved. Please, try again.'), 'failure-message');
            }
        }
        $tours = $this->TourDate->Tour->find('list');
        $tourName = $this->TourDate->Tour->find('list', array('fields' => 'tour_name'));
        $this->set(compact('tours', 'tourName'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->TourDate->id = $id;
        if (!$this->TourDate->exists()) {
            throw new NotFoundException(__('Invalid tour date'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TourDate->save($this->request->data)) {
                $this->Session->setFlash(__('The tour date has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tour date could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->TourDate->read(null, $id);
        }
        $tours = $this->TourDate->Tour->find('list');
        $this->set(compact('tours'));
        $tourName = $this->TourDate->Tour->find('list', array('fields' => 'tour_name'));
        $this->set(compact('tours', 'tourName'));
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
        $this->TourDate->id = $id;
        if (!$this->TourDate->exists()) {
            throw new NotFoundException(__('Invalid tour date'));
        }
        if ($this->TourDate->delete()) {
            $this->Session->setFlash(__('Tour date deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tour date was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function requestFeedback($id = null) {
        $tourDateData = $this->TourDate->find('all', array('conditions' => array('TourDate.id' => "$id")));
        $tourId = $tourDateData[0]['TourDate']['tour_id'];
        $tourOrderData = $this->TourOrder->find('all', array('conditions' => array('TourOrder.tour_date_id' => "$id", 'TourOrder.tour_id' => "$tourId")));
        $this->Session->setFlash(__('Email requesting for customer feedback has been sent successfully'));
        for ($i = 0; $i < count($tourOrderData); $i++) {
            $recipient = $tourOrderData[$i]['User']['user_email'];
            $tourName = $tourOrderData[$i]['Tour']['tour_name'];
            $tourId = $tourOrderData[$i]['Tour']['id'];
            $logo = "<img src=" . Router::url("/img/logo.png", true) . " height='50' alt ='Foodie Trails Logo' name ='Foodie Trails Logo'/>";
            $contactInfo = $tourOrderData[$i]['Tour']['contactInfo'];
            $feedbackLink = "<a href=" . Router::url("/feedbacks/add?def=Tour&id=$tourId", true) . ">Feedback Link</a>";
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("$this->sender" => "$this->senderTag"));
            $email->to("$recipient");
            $email->subject("Thanks for supporting foodie trails, tell us your experience via feedback.");
            $feedbackMessage = "
                <div style='font-family: Century Gothic; color:#06496e'><p>Dear Valued Customer:</p>
                <p>Greetings, Thank you for attending our $tourName, Hope you enjoy it.</p>
                <p>We hope to hear more from you, if you have any ideas about the tours or want to give suggestions, Please click the link to leave your message: </p>
                 <p>$feedbackLink</p>
                 <p>Hope you have a good time and enjoy your day.</p>
                 $logo
                <p style='color: #ff7003; font-weight:bold; font-size:13px;'>Did you know that Foodie trails is part of a fully licenced travel company? Let us help you plan your next customized holiday at the right price and great service!</p>
                <p style='font-size:13px'>$contactInfo</p> 
                <p style='font-size:13px'><a href='www.foodietrails.com.au'style='font-size:13px'>FoodieTrails.com.au</a></p>
                <p style='font-size:13px'>Follow Us on <a href='www.facebook.com/foodietrails' style='font-size:13px'>Facebook</a></p>
                <p style='font-size:13px'>Follow Us on <a href=' www.twitter.com/foodietrails'style='font-size:13px' >Twitter</a></p>
                 </div>
";
            $email->send($feedbackMessage);
        }
        $this->redirect(array('action' => 'index'));
    }

    public function notification($id = null) {
        $tourDateData = $this->TourDate->find('all', array('conditions' => array('TourDate.id' => "$id")));
        $tourId = $tourDateData[0]['TourDate']['tour_id'];
        $tourOrderData = $this->TourOrder->find('all', array('conditions' => array('TourOrder.tour_date_id' => "$id", 'TourOrder.tour_id' => "$tourId")));
        $this->Session->setFlash(__('Email notification has been sent successfully'));
//        print_r($tourOrderData);
        for ($i = 0; $i < count($tourOrderData); $i++) {
            $tourTypeId = $tourOrderData[$i]['Tour']['tour_type_id'];
            $tourType = $this->TourType->find('all', array('conditions' => array('TourType.id' => "$tourTypeId")));
            $tourTypeName = $tourType[0]['TourType']['tour_type_name'];
            $recipient = $tourOrderData[$i]['User']['user_email'];
            $tourName = $tourOrderData[$i]['Tour']['tour_name'];
            $tourId = $tourOrderData[$i]['Tour']['id'];
            $tourDate = $tourOrderData[$i]['TourDate']['tour_date'];
            $tourTime = $tourOrderData[$i]['TourDate']['tour_time'];
            $tourLocation = $tourOrderData[$i]['Tour']['tour_location'];
            $tourLink = "<a href=" . Router::url("/tours/tourDetail/$tourId", true) . ">Detailed Tour Information</a>";
            $termLink = "<a href=" . Router::url("/files/WaiverforFoodieTrailswebsite.pdf", true) . ">T&C's on our website</a>";
            $tourNotificationExtraMessage = $tourOrderData[$i]['Tour']['tour_email_notification'];
            $logo = "<img src=" . Router::url("/img/logo.png", true) . " height='50' alt ='Foodie Trails Logo' name ='Foodie Trails Logo'/>";
            $contactInfo = $tourOrderData[$i]['Tour']['contactInfo'];
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('both');
            $email->from(array("$this->sender" => "$this->senderTag"));
            $email->to("$recipient");
            $email->subject("A gentle reminder: Prior notice for upcoming trip");
            $notificationMessage = "
                <html><body><div style='font-family:Century Gothic; color:#06496e; width:620px;'><p>Hello, </p>
                <p>Thank you for booking $tourName $tourTypeName with us for $tourDate. </p>
                <p>We will meet at $tourTime $tourLocation, </p>
                $tourNotificationExtraMessage
                <p>Please make yourselves familiar with our $termLink</p>   
                $logo
                <p style='color: #ff7003; font-weight:bold; font-size:13px;'>Did you know that Foodie trails is part of a fully licenced travel company? Let us help you plan your next customized holiday at the right price and great service!</p>
                <p style='font-size:13px'>$contactInfo</p> 
                <p style='font-size:13px'><a href='www.foodietrails.com.au'style='font-size:13px'>FoodieTrails.com.au</a></p>
                <p style='font-size:13px'>Follow Us on <a href='www.facebook.com/foodietrails' style='font-size:13px'>Facebook</a></p>
                <p style='font-size:13px'>Follow Us on <a href=' www.twitter.com/foodietrails'style='font-size:13px' >Twitter</a></p>
                </div>
                </body>
                </html>
";
            $email->send($notificationMessage);
        }
        $this->redirect(array('action' => 'index'));
    }

}
