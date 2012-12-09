<?php

App::uses('AppController', 'Controller');

class SitemapController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    function index() {
        $tour = $this->Tour->find('all', array('fields' => 'id,tour_name', 'conditions' => array('publish_status' => "Published")));
         $this->set('tour', $tour);
    }

    /*
     * Action for send sitemaps to search engines 
     */
}

?>