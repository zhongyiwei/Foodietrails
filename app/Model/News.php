<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 * @property User $User
 */
class News extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'news_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The News Titile Cannot be Empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'news_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The News Description Cannot be Blank.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'news_users',
			'foreignKey' => 'news_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
