<?php

App::uses('AppModel', 'Model');

/**
 * Tour Model
 *
 * @property TourType $TourType
 * @property TourDate $TourDate
 * @property TourOrder $TourOrder
 */
class Tour extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'tour_name';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $validate = array(
        'tour_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Name Cannot be Empty. ',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Description Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_vendor_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Vendor Name Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_long_description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Long Description Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_notes' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Notes Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_paricipant_guidlines' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Participant Guidelines Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_location' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Location Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_duration' => array(
            'tour_duration' => array(
                'rule' => array('notEmpty'),
                'message' => 'The Tour Duration Cannot be Empty. '
            ),
             'decimal'=>array(
              'rule' =>array('decimal',2),
                'message'=>'The maximum duration should be a valid number only.  '
            ),
        ),
 
        'tour_weather' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Weather Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_spectator' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Spectators Should Have a Value.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_max_num_on_day' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please Set the maximum number of People for the Tour.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'naturalNumber'=>array(
              'rule' =>array('naturalNumber'),
                'message'=>'The maximum number should be a valid number only.  '
            ),
            
        ),
        'tour_type_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Tour Type Cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please Set the correct tour type for the tour.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tour_thumbnail' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please upload an image for the tour.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'TourType' => array(
            'className' => 'TourType',
            'foreignKey' => 'tour_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'TourDate' => array(
            'className' => 'TourDate',
            'foreignKey' => 'tour_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'TourOrder' => array(
            'className' => 'TourOrder',
            'foreignKey' => 'tour_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
