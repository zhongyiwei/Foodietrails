<?php

App::uses('AppModel', 'Model');

/**
 * UserSubscription Model
 *
 */
class UserSubscription extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'user_email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'Please enter your Email.'
            ),
            'user_email' => array(
                'rule' => array('email'),
                'message' => 'Please enter your email correctly.'
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'The email is already in subscribe list. ')
        ),
        'subscription_status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

}
