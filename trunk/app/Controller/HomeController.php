<?php

class HomeController extends AppController {

    var $uses = array('Tour', 'Country','Cookingclass');

    public function display() {
        $this->set('tourData', $this->Tour->find('all', array('limit' => 3)));
        $this->set('cookingClassData', $this->Cookingclass->find('all', array('limit' => 3)));
    }

}

?>
