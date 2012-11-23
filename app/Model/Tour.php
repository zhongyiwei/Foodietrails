<?php
App::uses('AppModel', 'Model');
/**
 * Tour Model
 *
 * @property Feedback $Feedback
 * @property TourGiftvoucher $TourGiftvoucher
 * @property TourOrder $TourOrder
 * @property Date $Date
 */
class Tour extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
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
            		'tour_price_per_certificate' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Tour Price Cannot be Empty.',
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
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Tour Duration Cannot be Empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		),
		'tour_type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Tour Type Cannot be Empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            		'tour_thumbnail' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please upload a thumbnail for the tour.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
//		'TourGiftvoucher' => array(
//			'className' => 'TourGiftvoucher',
//			'foreignKey' => 'tour_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		),
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */

}
