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
        'cookingclass_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cookingclass_date' => array(
            'date' => array(
                'rule' => array('date'),
            'message' => 'Please select a date from the calendar.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            //rule 2 - must be not null
            'rule2' => array(
                'rule' => array('notEmpty'),
                'message' => "Please select a date from the calendar."
            ),
        ),
        'cookingclass_time' => array(
            'time' => array(
                'rule' => array('time'),
            'message' => 'Please select a time from the drop down list.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cooking_class_price' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Cooking Class Price cannot be Empty.',
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
