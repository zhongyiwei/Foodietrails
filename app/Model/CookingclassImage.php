<?php
App::uses('AppModel', 'Model');
/**
 * CookingclassImage Model
 *
 * @property CookingClass $CookingClass
 */
class CookingclassImage extends AppModel {

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
		'cooking_class_image_name' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CookingClass' => array(
			'className' => 'CookingClass',
			'foreignKey' => 'cooking_class_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
