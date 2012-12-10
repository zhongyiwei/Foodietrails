
<?php
echo $this->Session->flash(); 
if ($id == $current_user['id']) {
    echo $this->Form->create('User');
    echo $this->Form->input('user_first_name', array('label' => 'First Name'));
    echo $this->Form->input('user_surname', array('label' => 'Surname'));
    echo $this->Form->input('user_contacts', array('label' => 'Phone Number'));
    echo $this->Form->input('user_email', array('label' => 'Email'));
    echo $this->Form->input('user_password', array('type' => 'password', 'value' => '', 'label' => 'Password'));
    echo $this->Form->input('user_address', array('label' => 'Address'));
    echo $this->Form->input('country_id', array('type' => 'select', 'options' => $countries));
    echo $this->Form->input('user_dietary_requirement', array('label' => 'Dietary Requirement'));
    echo $this->Form->input('user_spl_assistance', array('label' => 'Special Assistance'));
    echo $this->Form->input('user_referee', array('label' => 'Referee'));    
    echo $this->Form->end(__('Submit'));
} else {
    echo "You are not authorized to enter this page.";
}
?>