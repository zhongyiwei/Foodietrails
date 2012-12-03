<?php

App::uses('AppController', 'Controller');
require_once('recaptchalib.php');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class FeedbacksController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Feedback->recursive = 0;
        $this->set('feedbacks', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid Feedback'));
        }
        $this->set('feedback', $this->Feedback->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {
        $identifier = $this->params['url']['def'];
        $id = $this->params['url']['id'];
        if ($this->request->is('post')) {
            $resp = recaptcha_check_answer($this->privateKey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
            if (!$resp->is_valid) {
                $errorMessage[0] = "Validation code is not valid";
                $errorMessage[1] = "input text required error";
                $this->set('Error', $errorMessage);
            } else {
                $this->request->data['Feedback']['page_id'] = $id;
                $this->request->data['Feedback']['feedback_status'] = 'Hide';
                $this->request->data['Feedback']['feedback_type'] = $identifier;
                $this->Feedback->create();
                if ($this->Feedback->save($this->request->data)) {
//                    $this->Session->setFlash(__('Your Feedback has been saved'));
                    if ($identifier == 'Tour') {
                        $this->redirect(array('controller' => 'Tours', 'action' => "tourDetail/$id"));
                    } else if ($identifier == 'CookingClass') {
                        $this->redirect(array('controller' => 'CookingClasses', 'action' => "cookingclass_detail/$id"));
                    }
                } else {
//                    $this->Session->setFlash(__('Your Feedback could not be saved. Please, try again.'), 'failure-message');
                }
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
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid Feedback'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('Your Feedback has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Your feedback could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->Feedback->read(null, $id);
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
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid Feedback'));
        }
        if ($this->Feedback->delete()) {
            $this->Session->setFlash(__('Feedback deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Feedback was not deleted, Please try again.'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

}
