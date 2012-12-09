
<?php
echo $this->Form->create('User');
echo $this->Form->input('user_first_name', array('label' => 'First Name'));
echo $this->Form->input('user_surname', array('label' => 'Sur Name'));
echo $this->Form->input('user_contacts', array('label' => 'Phone Number'));
echo $this->Form->input('user_email', array('label' => 'Email Address'));
echo $this->Form->input('user_password', array('type' => 'password', 'value' => '', 'label' => 'Password'));
echo $this->Form->input('user_address', array('label' => 'Home Address'));
echo $this->Form->input('user_dietary_requirement', array('label' => 'Dietary Requirement'));
echo $this->Form->input('user_spl_assistance', array('label' => 'Sql Assistance'));
echo $this->Form->input('user_referee', array('label' => 'Referee'));
echo $this->Form->input('country_id', array('type' => 'select', 'options' => $countries));
echo $this->Form->end(__('Submit'));
?>
<div class="<?php
if (isset($Error)) {
    echo $Error[1];
}
?>" style="padding:0px;margin-bottom: 0px">
     <?php
     require_once('recaptchalib.php');
     echo recaptcha_get_html($publicKey);
     if (isset($Error)) {
         echo $Error[0];
     }
     ?>
</div>