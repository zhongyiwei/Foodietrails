<?php

App::uses('AppController', 'Controller');

/**
 * Cookingclasses Controller
 *
 * @property Cookingclass $Cookingclass
 */
class CookingclassesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Cookingclass->recursive = 0;
        $this->set('cookingclasses', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Cookingclass->id = $id;
        if (!$this->Cookingclass->exists()) {
            throw new NotFoundException(__('Invalid cookingclass'));
        }
        $this->set('cookingclass', $this->Cookingclass->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Cookingclass->create();
            if ($this->Cookingclass->save($this->request->data)) {
                $this->Session->setFlash(__('The cookingclass has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cooking class could not be saved. Please, try again.'), 'failure-message');
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
        $this->Cookingclass->id = $id;
        if (!$this->Cookingclass->exists()) {
            throw new NotFoundException(__('Invalid cookingclass'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Cookingclass->save($this->request->data)) {
                $this->Session->setFlash(__('The cooking class has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cooking class could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->Cookingclass->read(null, $id);
        }
    }

    public function cookingclass_detail($id = null) {
        $this->Cookingclass->id = $id;
        if (!$this->Cookingclass->exists()) {
            throw new NotFoundException(__('Invalid Cooking Class'));
        }

//        for ($i = 0; $i < 28; $i++) {
//            $weekArray[$i] = date('D', strtotime("+$i day"));
//            $dateArray[$i] = date('jS M', strtotime("+ $i day"));
//            $cookingclassDateArray[$i] = date('Y-m-d', strtotime("+$i day"));
//        }
//        $cookingclassDateData = $this->CookingclassDate->find("all", array('conditions' => array('cookingclass_progress' => 'Incomplete', 'CookingclassDate.cookingclass_id' => "$id")));
////        $cookingclassDateList = $this->CookingclassDate->find("list",array( 'fields' => array('CookingclassDate.id'),'conditions' => array('cookingclass_progress' => 'Incomplete','CookingclassDate.cookingclass_id'=>"$id")));
//        $cookingclassData = $this->Cookingclass->find("all", array('conditions' => array('Cookingclass.id' => "$id")));
//        for ($i = 0; $i < count($cookingclassDateData); $i++) {
//            $cookingclassDateId = $cookingclassDateData[$i]['CookingclassDate']['id'];
//            $cookingclassOrderData = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => "$cookingclassDateId", 'CookingclassOrder.cooking_class_id' => "$id")));
//            if (count($cookingclassOrderData) >= $cookingclassData[0]['Cookingclass']['cooking_class_max_num_on_day']) {
//                $cookingclassDateData[$i]['display'] = false;
//            } else {
//                $cookingclassDateData[$i]['display'] = true;
//            }
//        }

        $cookingclassDateData = $this->CookingclassDate->find("all", array('conditions' => array('cookingclass_progress' => 'Incomplete', 'CookingclassDate.cookingclass_id' => "$id")));
        
        for ($i = 0; $i < count($cookingclassDateData); $i++) {
            $cookingclassDateId = $cookingclassDateData[$i]['CookingclassDate']['id'];
            $cookingclassOrderData = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => "$cookingclassDateId", 'CookingclassOrder.cooking_class_id' => "$id")));
            $cookingclassData = $this->Cookingclass->find("all", array('conditions' => array('Cookingclass.id' => "$id")));
            $Booked = 0;
            for ($j = 0; $j < count($cookingclassOrderData); $j++) {
                $Booked = $Booked + $cookingclassOrderData[$i]['CookingclassOrder']['cooking_class_order_quantity'];
            }
            $cookingclassDateData[$i]['vacancy'] = $cookingclassData[0]['Cookingclass']['cooking_class_max_num_on_day'] - $Booked;
            if ($cookingclassDateData[$i]['vacancy'] < 0) {
                $cookingclassDateData[$i]['vacancy'] = 0;
            }

            if ($Booked >= $cookingclassData[0]['Cookingclass']['cooking_class_max_num_on_day']) {
                $cookingclassDateData[$i]['display'] = false;
            } else {
                $cookingclassDateData[$i]['display'] = true;
            }
        }

//        $this->set(compact('weekArray', 'dateArray', 'cookingclassDateArray', 'cookingclassDateData'));
        $this->set(compact('cookingclassDateData'));

        $this->set('cookingclass', $this->Cookingclass->read(null, $id));
        $this->set('feedbacks', $this->Feedback->find('all', array('conditions' => array('AND' => array('feedback.page_id' => $id), 'feedback.feedback_type' => "CookingClass", 'feedback_status' => "show"))));
    }

    
        public function preview($id = null) {
        $this->Cookingclass->id = $id;
        if (!$this->Cookingclass->exists()) {
            throw new NotFoundException(__('Invalid Cooking Class'));
        }
        $cookingclassDateData = $this->CookingclassDate->find("all", array('conditions' => array('cookingclass_progress' => 'Incomplete', 'CookingclassDate.cookingclass_id' => "$id")));
        
        for ($i = 0; $i < count($cookingclassDateData); $i++) {
            $cookingclassDateId = $cookingclassDateData[$i]['CookingclassDate']['id'];
            $cookingclassOrderData = $this->CookingclassOrder->find('all', array('conditions' => array('CookingclassOrder.cooking_class_date_id' => "$cookingclassDateId", 'CookingclassOrder.cooking_class_id' => "$id")));
            $cookingclassData = $this->Cookingclass->find("all", array('conditions' => array('Cookingclass.id' => "$id")));
            $Booked = 0;
            for ($j = 0; $j < count($cookingclassOrderData); $j++) {
                $Booked = $Booked + $cookingclassOrderData[$i]['CookingclassOrder']['cooking_class_order_quantity'];
            }
            $cookingclassDateData[$i]['vacancy'] = $cookingclassData[0]['Cookingclass']['cooking_class_max_num_on_day'] - $Booked;
            if ($cookingclassDateData[$i]['vacancy'] < 0) {
                $cookingclassDateData[$i]['vacancy'] = 0;
            }

            if ($Booked >= $cookingclassData[0]['Cookingclass']['cooking_class_max_num_on_day']) {
                $cookingclassDateData[$i]['display'] = false;
            } else {
                $cookingclassDateData[$i]['display'] = true;
            }
        }
        $this->set(compact('cookingclassDateData'));

        $this->set('cookingclass', $this->Cookingclass->read(null, $id));
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
        $this->Cookingclass->id = $id;
        if (!$this->Cookingclass->exists()) {
            throw new NotFoundException(__('Invalid cookingclass'));
        }
        if ($this->Cookingclass->delete()) {
            $this->Session->setFlash(__('Cooking class deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Cooking class was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

}
