<?php

App::uses('AppController', 'Controller');

class SitemapController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    function index() {
        
    }

    /*
     * Action for send sitemaps to search engines 
     */
}

?>