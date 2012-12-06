<?php

App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property ProductImage $ProductImage
 * @property ProductOrder $ProductOrder
 */
class Product extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'product_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Product Name cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'product_description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Product Description cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'product_price' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The Product Price cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'naturalNumber' => array(
                'rule' => array('decimal',2),
                'message' => 'The product price should be a valid number only (e.g. 125.00).  '
            ),
        ),
        'product_thumbnail' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please upload an image for the Product.',
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
        'ProductOrder' => array(
            'className' => 'ProductOrder',
            'foreignKey' => 'product_id',
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
