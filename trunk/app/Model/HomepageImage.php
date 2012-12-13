<?php
App::uses('AppModel', 'Model');
/**
 * HomepageImage Model
 *
 */
class HomePageImage extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'image_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please upload an image from the server. ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publish_status' => array(
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
