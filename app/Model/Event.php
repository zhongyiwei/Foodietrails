<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property EventUser $EventUser
 */
class Event extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'event_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Event Name Cannot be Empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Event Description Cannot be Blank.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
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
		'EventUser' => array(
			'className' => 'EventUser',
			'foreignKey' => 'event_id',
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
