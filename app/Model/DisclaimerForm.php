<?php
App::uses('AppModel', 'Model');
/**
 * DisclaimerForm Model
 *
 */
class DisclaimerForm extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'form_name' => array(
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
