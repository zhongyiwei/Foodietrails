<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Country $Country
 * @property CookingclassOrder $CookingclassOrder
 * @property Faq $Faq
 * @property Feedback $Feedback
 * @property GiftVoucher $GiftVoucher
 * @property ProductOrder $ProductOrder
 * @property TourOrder $TourOrder
 * @property Event $Event
 * @property News $News
 */
class User extends AppModel {

    public $name = 'User';

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['user_password'])) {
            $this->data[$this->alias]['user_password'] = AuthComponent::password($this->data[$this->alias]['user_password']);
        }
        return true;
    }

//    public function isOwnedBy($tourId, $user) {
//        return $this->field('id', array('id' => $tourId, 'user_id' => $user)) === $tourId;
//    }
// ...
    /**
     * Display field
     *
     * @var string
     */
    var $displayField = 'id';

    /**
     * Validation rules
     *
     * @var array
     */
   public $validate = array(
        'user_email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email Address cannot be Empty.'
            )
        ),
        'user_password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Password cannot be Empty.'
            )
        ),
        'id' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_role' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please choose your role.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_first_name' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'The First Name cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'The First Name can only contains letters and numbers',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_surname' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'The Surname cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'Your Surname Name can only contains letters and numbers',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_contacts' => array(
            'phone' => array(
                'rule' => array('notEmpty'),
                'message' => 'The contact cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'The Email cannot be Empty.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_password' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'The Password cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_address' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'The address cannot be Empty',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'country_id' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'The Country cannot be Empty',
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
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id',
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
        'CookingclassOrder' => array(
            'className' => 'CookingclassOrder',
            'foreignKey' => 'user_id',
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
        'Faq' => array(
            'className' => 'Faq',
            'foreignKey' => 'user_id',
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
        'GiftVoucher' => array(
            'className' => 'GiftVoucher',
            'foreignKey' => 'user_id',
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
        'ProductOrder' => array(
            'className' => 'ProductOrder',
            'foreignKey' => 'user_id',
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
            'foreignKey' => 'user_id',
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
    public $hasAndBelongsToMany = array(
        'Event' => array(
            'className' => 'Event',
            'joinTable' => 'event_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'event_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ),
        'News' => array(
            'className' => 'News',
            'joinTable' => 'news_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'news_id',
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
