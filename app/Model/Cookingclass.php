<?php

App::uses('AppModel', 'Model');

/**
 * Cookingclass Model
 *
 */
class Cookingclass extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'cooking_class_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Cooking Class Name cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Cooking Class Description cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_location' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Cooking Class Location cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_price' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Cooking Class Price cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_thumbnail' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please upload a thumbnail for the Cooking Class.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

}
