<?php

App::uses('AppModel', 'Model');

/**
 * CookingclassDate Model
 *
 * @property Cookingclass $Cookingclass
 */
class CookingclassDate extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'cooking_class_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_date' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_time' => array(
            'time' => array(
                'rule' => array('time'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => 'The Cooking Class Time cannot be Empty.',
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
            'naturalNumber' => array(
                'rule' => array('naturalNumber'),
                'message' => 'The price should be a valid number only.  '
            ),
        ),
        'cooking_class_progress' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Cooking Class Progress cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Cookingclass' => array(
            'className' => 'Cookingclass',
            'foreignKey' => 'cookingclass_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
