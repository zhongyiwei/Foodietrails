<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
require_once('recaptchalib.php');

/**
 * Tours Controller
 *
 * @property Tour $Tour
 */
class AboutController extends AppController {

    var $uses = array('About');

    public function contactUs() {
        $allTours = $this->Tour->find('all', array('fields' => 'id, tour_name'));
        $this->set('allToursContactUs', $allTours);
        $this->About->set($this->request->data);
        if ($this->request->is('post')) {
          
            $resp = recaptcha_check_answer($this->privateKey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
            if (!$resp->is_valid) {
                $errorMessage[0] = "Validation code is not valid";
                $errorMessage[1] = "input text required error";
                $this->set('Error', $errorMessage);
            } else {
                if ($this->About->validates($this->data)) {
//                    debug($_POST);
                    $emailAddress = $this->request->data['email'];
                    $email = new CakeEmail();
                    $email->config('default');
                    $email->emailFormat('html');
                    $email->from(array("$emailAddress" => "$emailAddress"));
                    $email->to("$this->recipient");
                    $firstName = $this->request->data['first_name'];
                    $lastName = $this->request->data['last_name'];
                    $wantto = $this->request->data['wantto'];
                    $phone = $this->request->data['phone'];
                    $wanttoSentence = " want to ";
                    $newsDesc = '<div style="font-family: Arial;">' . "<p>Customer Name: <b>$firstName $lastName </b> </p>";
//                    debug($_POST);
                    if ($wantto != '') {
                        for ($i = 0; $i < count($wantto); $i++) {
                            $wanttoSentence .= $wantto[$i] . ", ";
                        }
                        $newsDesc .= "<p>Customer <b>$wanttoSentence</b></p>";
                    } else {
                        $wanttoSentence = null;
                    }

                    if ($phone != '') {
                        $newsDesc .= "<p>Customer Phone Number: <b>$phone</b></p>";
                    }
                    $inquiryAboutSentence = " want to inquiry about ";
                    $inquiryAbout = $this->request->data['inquiring'];
                    if ($inquiryAbout != '') {
                        $inquiryAboutSentence .= "$inquiryAbout";
                        $newsDesc .= "<p>Customer Inquiers About: <b>$inquiryAbout</b></p>";
                    } else {
                        $inquiryAboutSentence = null;
                    }
                    $emptyRequest = "";
                    if ($wantto == '' && $inquiryAbout == '') {
                        $emptyRequest = " has inquiry to you.";
                    }
                    $newsTitle = "$firstName $lastName $emptyRequest $wanttoSentence $inquiryAboutSentence ";
                    $message = $this->request->data['message'];
                    $newsDesc .= "<p>Below are the Customer's Message: </p><p>$message</p><p>To reply, please reply to this email: <b>$emailAddress</b></p></div>";
                    $email->subject($newsTitle);
                    $email->send($newsDesc);
                    $this->redirect(array('action' => 'sendSuccessful'));
                } else {
                    $this->set('validationErrorsArray', $this->About->invalidFields());
                }
            }
        }
    }

    public function sendSuccessful() {
        
    }

}

?>
