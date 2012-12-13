<?php

class HomeController extends AppController {

    var $uses = array('Tour', 'Country', 'Cookingclass', 'HomePageImage', 'HomepageList');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $this->set('ImageData', $this->HomePageImage->find('all', array('conditions' => array('publish_status' => 'Show'))));

        $homeList = $this->HomepageList->find('all');
        $TourIds = "";
        $TourCount = 0;
        $cookingClassId = "";
        $cookingClassCount = 0;
        $productId = "";
        $productIdCount = 0;
        $tourArray = null;
        $cookingClassArray = null;
        $productArray = null;
        for ($i = 0; $i < count($homeList); $i++) {
            if ($homeList[$i]['HomepageList']['list_type'] == 'Tour') {
                $TourIds = $homeList[$i]['HomepageList']['product_id'];
                $temp = $this->Tour->find('all', array('conditions' => array('Tour.id' => "$TourIds")));
                $tourArray[$TourCount] = $temp[0];
                $TourCount++;
            } else if ($homeList[$i]['HomepageList']['list_type'] == 'Cooking Class') {
                $cookingClassId = $homeList[$i]['HomepageList']['product_id'];
                $temp = $this->Cookingclass->find('all', array('conditions' => array('Cookingclass.id' => "$cookingClassId")));
                $cookingClassArray[$cookingClassCount] = $temp[0];
                $cookingClassCount++;
            } else if ($homeList[$i]['HomepageList']['list_type'] == 'Product') {
                $productId = $homeList[$i]['HomepageList']['product_id'];
                $temp = $this->Product->find('all', array('conditions' => array('Product.id' => "$productId")));
                $productArray[$productIdCount] = $temp[0];
                $productIdCount++;
            }
        }

        $this->set('tourData', $tourArray);
        $this->set('cookingClassData', $cookingClassArray);
        $this->set('productData', $productArray);
    }

}

?>
