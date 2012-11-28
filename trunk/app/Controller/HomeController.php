<?php

class HomeController extends AppController {

    var $uses = array('Tour', 'Country', 'Cookingclass', 'HomePageImage', 'HomePageList');

    public function display() {
        $this->set('ImageData', $this->HomePageImage->find('all', array('conditions' => array('publish_status' => 'Show'))));

        $homeList = $this->HomePageList->find('all');
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
            if ($homeList[$i]['HomePageList']['list_type'] == 'Tour') {
                $TourIds = $homeList[$i]['HomePageList']['product_id'];
                $temp = $this->Tour->find('all', array('conditions' => array('Tour.id' => "$TourIds")));
                $tourArray[$TourCount] = $temp[0];
                $TourCount++;
            } else if ($homeList[$i]['HomePageList']['list_type'] == 'Cooking Class') {
                $cookingClassId = $homeList[$i]['HomePageList']['product_id'];
                $temp = $this->Cookingclass->find('all', array('conditions' => array('Cookingclass.id' => "$cookingClassId")));
                $cookingClassArray[$cookingClassCount] = $temp[0];
                $cookingClassCount++;
            } else if ($homeList[$i]['HomePageList']['list_type'] == 'Product') {
                $productId = $homeList[$i]['HomePageList']['product_id'];
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
