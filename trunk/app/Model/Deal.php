<?php

App::uses('AppModel', 'Model');

/**
 * Deal Model
 *
 */
class Deal extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'content' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The country name cannot be empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'publish_status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The country name cannot be empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

}
