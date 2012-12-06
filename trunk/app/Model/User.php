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
        ),
        'user_surname' => array(
            'user_surname' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter your surname. '
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
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true,
                'message' => 'Please enter your Email.'
            ),
            'user_email' => array(
                'rule' => array('email'),
                'message' => 'Please enter your email correctly.'
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'The email is already been in used. ')
        ),
        'user_password' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a password with numbers and alphabets only. ',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'user_password' => array(
                'rule' => array('minLength', '8'),
                'message' => 'The password must have at least 8 characters. '
            ),
            'nospace'=>array(
                'rule'=>array('alphaNumeric'),
                'message' => 'Please enter a password with numbers and alphabets only. ',
            ),
        ),
        'user_address' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter your address.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'country_id' => array(
            'blank' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a country.',
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
//        'GiftVoucher' => array(
//            'className' => 'GiftVoucher',
//            'foreignKey' => 'user_id',
//            'dependent' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        ),
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
    );

}
