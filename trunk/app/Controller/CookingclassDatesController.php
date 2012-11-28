<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * CookingclassDates Controller
 *
 * @property CookingclassDate $CookingclassDate
 */
class CookingclassDatesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->CookingclassDate->recursive = 0;
        $this->set('cookingclassDates', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->CookingclassDate->id = $id;
        if (!$this->CookingclassDate->exists()) {
            throw new NotFoundException(__('Invalid cookingclass date'));
        }
        $this->set('cookingclassDate', $this->CookingclassDate->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->CookingclassDate->create();
            if ($this->CookingclassDate->save($this->request->data)) {
                $this->Session->setFlash(__('The cookingclass date has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cooking class date could not be saved. Please, try again.'), 'failure-message');
            }
        }
        $cookingclasses = $this->CookingclassDate->Cookingclass->find('list');
        $cookingclassName = $this->CookingclassDate->Cookingclass->find('list', array('fields' => 'cooking_class_name'));
        $this->set(compact('cookingclasses', 'cookingclassName'));
        ;
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->CookingclassDate->id = $id;
        if (!$this->CookingclassDate->exists()) {
            throw new NotFoundException(__('Invalid cookingclass date'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CookingclassDate->save($this->request->data)) {
                $this->Session->setFlash(__('The cookingclass date has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cooking class date could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->CookingclassDate->read(null, $id);
        }
        $cookingclasses = $this->CookingclassDate->Cookingclass->find('list');
        $cookingclassName = $this->CookingclassDate->Cookingclass->find('list', array('fields' => 'cooking_class_name'));
        $this->set(compact('cookingclasses', 'cookingclassName'));
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
        $this->CookingclassDate->id = $id;
        if (!$this->CookingclassDate->exists()) {
            throw new NotFoundException(__('Invalid cookingclass date'));
        }
        if ($this->CookingclassDate->delete()) {
            $this->Session->setFlash(__('Cooking class date deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Cookingclass date was not deleted successfully, Please try again'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function requestFeedback($id = null) {
        $cookingClassDateData = $this->CookingclassDate->find('all', array('conditions' => array('CookingclassDate.id' => "$id")));
        $cookingclass_id = $cookingClassDateData[0]['CookingclassDate']['cookingclass_id'];
        $cookingclassOrderData = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => "$id", 'CookingclassOrder.cooking_class_id' => "$cookingclass_id")));
        $this->Session->setFlash(__('Email requesting for customer feedback has been sent successfully'));
//        print_r($cookingclassOrderData);
        for ($i = 0; $i < count($cookingclassOrderData); $i++) {
            $recipient = $cookingclassOrderData[$i]['User']['user_email'];
            $cookingclassName = $cookingclassOrderData[$i]['CookingClass']['cooking_class_name'];
            $cookingclassId = $cookingclassOrderData[$i]['CookingClass']['id'];
            $feedbackLink = "<a href=" . Router::url("/feedbacks/add?def=CookingClass&id=$cookingclassId", true) . ">Feedback Link</a>";
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("$this->sender" => "$this->senderTag"));
            $email->to("$recipient");
            $email->subject("Thanks for supporting foodie trails, tell us your experience via feedback.");
            $feedbackMessage = "
                <div style='font-family: Arial; color:#06496e'><p>Dear Valued Customer:</p>
                <p>Greetings, Thank you for attending our $cookingclassName, Hope you enjoy it.</p>
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
        $cookingClassDateData = $this->CookingclassDate->find('all', array('conditions' => array('CookingclassDate.id' => "$id")));
        $cookingclass_id = $cookingClassDateData[0]['CookingclassDate']['cookingclass_id'];
        $cookingclassOrderData = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => "$id", 'CookingclassOrder.cooking_class_id' => "$cookingclass_id")));
//        print_r($cookingclassOrderData);
        $this->Session->setFlash(__('Email notification has been sent successfully'));
        for ($i = 0; $i < count($cookingclassOrderData); $i++) {
            $recipient = $cookingclassOrderData[$i]['User']['user_email'];
            $cookingclassName = $cookingclassOrderData[$i]['CookingClass']['cooking_class_name'];
            $cookingclassId = $cookingclassOrderData[$i]['CookingClass']['id'];
            $cookingclassDate = $cookingclassOrderData[$i]['CookingClassDate']['cookingclass_date'];
            $cookingclassTime = $cookingclassOrderData[$i]['CookingClassDate']['cookingclass_time'];
            $cookingclass_Location = $cookingclassOrderData[$i]['CookingClass']['cooking_class_location'];
            $cookingclassLink = "<a href=" . Router::url("/CookingClasses/cookingclass_detail/$cookingclassId", true) . ">Detailed Cooking Class Information</a>";
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("$this->sender" => "$this->senderTag"));
            $email->to("$recipient");
            $email->subject("A gentle reminder: Prior notice for upcoming trip");
            $notificationMessage = "
                <div style='font-family: Arial; color:#06496e'><p>Dear Valued Customer:</p>
                <p>Greetings, this is a gentle reminder from foodietrails.com, </p><p> You are going to have your cooking class <b>$cookingclassName</b> on <b>$cookingclassDate</b> at <b>$cookingclassTime</b></p>
                <p>We will meet you at $cookingclass_Location, If you want to look more details about the tours, please click the link below:</p>
                 <p>$cookingclassLink</p>
                 <p>Hope you have a good time and enjoy your day.</p>
                 <p>For Any Inquiries, Please telephone 0452660748 or visit FAQ section at www.foodietrails.com.au</p>
                 </div>
";
            $email->send($notificationMessage);
        }
        $this->redirect(array('action' => 'index'));
    }

}
