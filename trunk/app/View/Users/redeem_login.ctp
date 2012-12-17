<?php $this->assign('title', "Foodie Trails - Log In"); ?>
<?php
echo $this->Html->css('loginPage.css');
echo $this->Session->flash();
?>
<h1>Gift Voucher Redeem</h1>
<p>To redeem your gift voucher, register/login is required to verify your identity</p>
<?php echo $this->Session->flash(); ?>
<table>
    <tr>        
        <td style="width:500px">
            <?php echo $this->Form->create('User'); ?>

            <?php
            echo $this->Form->input('user_first_name', array('label' => 'First Name'));
            echo $this->Form->input('user_surname', array('label' => 'Last Name'));
            echo $this->Form->input('user_contacts', array('label' => 'Contact Number'));
            echo $this->Form->input('user_email', array('label' => 'Email Address'));
            echo $this->Form->input('user_password', array('type' => 'password', 'label' => 'Password'));
            echo $this->Form->input('passwd_confirm', array('type' => 'password', 'value' => '', 'label' => 'Confirm Password'));

            echo $this->Form->input('user_address', array('label' => 'Address'));
            echo $this->Form->input('country_id', array('type' => 'select', 'options' => $countries));
            echo $this->Form->input('user_dietary_requirement', array('label' => 'Dietary Requirement'));
            echo $this->Form->input('user_spl_assistance', array('label' => 'Special Assistance'));
            echo $this->Form->input('user_referee', array('label' => 'Referee'));
            echo $this->Form->input('user_postcode', array('label' => 'Post code'));
            
//		echo $this->Form->input('Event');
//		echo $this->Form->input('News');
            ?>

            <?php echo $this->Form->end(__('Submit')); ?>
        </td>
        <td>
            <?php echo $this->Html->link(__('Existing Customer? Login here'), array('action' => "loginForRedeem?def=$def&id=$id")); ?>
            		    <div style="margin-top:20px"><?php echo $this->Html->link(__('Forgot Password?'), array('controller' => 'users', 'action' => 'forgotten_password')); ?></div>
<!--            <form action="<?php echo $this->webroot; ?>users/login" method="post" >
            <?php // echo $this->Form->create('User');  ?>
                <legend style="font-weight:normal;">Existing Customer? Login here ↓</legend>
            <?php
            echo $this->Form->input('user_email');
            echo $this->Form->input('user_password', array('type' => 'password'));
            echo $this->Form->end(__('Login', array('class' => 'login')));
            ?>
            </form>-->
        </td>
    </tr>
</table>