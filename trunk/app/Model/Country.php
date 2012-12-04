<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 * @property User $User
 */
class Country extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'country_name' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'country_id',
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
