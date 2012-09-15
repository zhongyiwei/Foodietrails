<?php

class Home extends AppModel {

    public $hasMany = array(
        'tour' => array(
            'className' => 'tours',
            'foreignKey' => 'tour_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit'=>'3'
        )
    );
}

?>
