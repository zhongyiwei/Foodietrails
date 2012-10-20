<?php

App::uses('AppModel', 'Model');

class About extends AppModel {

    public $name = 'About';
    var $useTable = false;
    public $validate = array(
        'first_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'Please enter your First Name.'
            ),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'Please enter your Last Name.'
            ),
        ),
        'email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'Please enter your Email.'
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter your email correctly.'
            ),
        ),
        'message' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'Please enter your Message.'
            ),
        ),
    );

}

?>
