<?php
App::uses('AppModel', 'Model');
/**
 * GiftVoucher Model
 *
 * @property GiftvoucherOrder $GiftvoucherOrder
 */
class GiftVoucher extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'gift_voucher_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gift_message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Gift message cannot be empty. ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gift_voucher_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The Gift Voucher name cannot be empty. ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gift_price' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'The Gift price must be numbers only. (e.g. 125.00)',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                    //rule 2 - notempty
            'rule2' => array(
                'rule' => array('notEmpty'),
                'message' => "The Gift price cannot be empty. "
            ),
		),
		'gift_type' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'GiftvoucherOrder' => array(
			'className' => 'GiftvoucherOrder',
			'foreignKey' => 'gift_voucher_id',
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
