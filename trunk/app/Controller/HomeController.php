<?php

class HomeController extends AppController {
    var $uses = array('Tour','Country');
    public function display() {
        $this->set('tourData', $this->Tour->find('all',array('limit'=>3)));
    }

}

?>
