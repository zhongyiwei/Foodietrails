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
                $this->Session->setFlash(__('The tour date could not be saved. Please, try again.'));
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
                $this->Session->setFlash(__('The tour date could not be saved. Please, try again.'));
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

        for ($i = 0; $i < count($tourOrderData); $i++) {
            $recipient = $tourOrderData[$i]['User']['user_email'];
            $tourName = $tourOrderData[$i]['Tour']['tour_name'];
            $tourId = $tourOrderData[$i]['Tour']['id'];
            $feedbackLink = "<a href=" . Router::url("/feedbacks/add?def=Tour&id=$tourId", true) . ">Feedback Link</a>";
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("sippoujulian@gmail.com" => "Foodie Trails.com"));
            $email->to("$recipient");
            $email->subject("Thanks for supporting foodie trails, tell us your experience via feedback.");
            $feedbackMessage = "
                <div style='font-family: Arial; color:#06496e'><p>Dear Valued Customer:</p>
                <p>Greetings, Thank you for attending our $tourName, Hope you enjoy it.</p>
                <p>We hope to hear more from you, if you have any ideas about the tours or want to give suggestions, Please click the link to leave your message: </p>
                 <p>$feedbackLink</p>
                 <p>Hope you have a good time and enjoy your day.</p>
                 <p>For Any Inquiries, Please telephone 0452660748 or visit FAQ section at www.foodietrails.com.au</p>
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

        for ($i = 0; $i < count($tourOrderData); $i++) {
            $recipient = $tourOrderData[$i]['User']['user_email'];
            $tourName = $tourOrderData[$i]['Tour']['tour_name'];
            $tourId = $tourOrderData[$i]['Tour']['id'];
            $tourDate = $tourDateData[$i]['TourDate']['tour_date'];
            $tourTime = $tourDateData[$i]['TourDate']['tour_time'];
            $tourLocation = $tourOrderData[$i]['Tour']['tour_location'];
            $tourLink = "<a href=" . Router::url("/tours/tourDetail/$tourId", true) . ">Detailed Tour Information</a>";
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("sippoujulian@gmail.com" => "Foodie Trails.com"));
            $email->to("$recipient");
            $email->subject("A gentle reminder: Prior notice for upcoming trip");
            $notificationMessage = "
                <div style='font-family: Arial; color:#06496e'><p>Dear Valued Customer:</p>
                <p>Greetings, this is a gentle reminder from foodietrails.com, </p><p> You are going to have your tour <b>$tourName</b> on <b>$tourDate</b> at <b>$tourTime</b></p>
                <p>We will meet you at $tourLocation, If you want to look more details about the tours, please click the link below:</p>
                 <p>$tourLink</p>
                 <p>Hope you have a good time and enjoy your day.</p>
                 <p>For Any Inquiries, Please telephone 0452660748 or visit FAQ section at www.foodietrails.com.au</p>
                 </div>
";
            $email->send($notificationMessage);
        }
        $this->redirect(array('action' => 'index'));
    }

}
