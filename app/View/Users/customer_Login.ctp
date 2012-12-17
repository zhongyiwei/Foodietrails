<?php $this->assign('title', 'Foodie Trails - Food Tours Melbourne, Gourmet Walking Tour, Walking Food Tour, Walking Tours Melbourne ');?>

<?php
            echo $this->Html->css('loginPage.css');
            echo $this->Session->flash(); 
?>
<h1>CHECKOUT</h1>
<p>1. Check Out Method</p>
<table>
    <tr>        
        <td style="width:500px">
            <p>New Customer</p>
            <?php echo $this->Form->create('User'); ?>

            <?php
            echo $this->Form->input('user_first_name',array('label'=>'First Name'));
            echo $this->Form->input('user_surname',array('label'=>'Surname'));
            echo $this->Form->input('user_contacts',array('label'=>'Contact No.'));
            echo $this->Form->input('user_email',array('label'=>'Email'));
            echo $this->Form->input('user_password', array('type' => 'password','label'=>'Password'));
            echo $this->Form->input('passwd_confirm', array('type' => 'password', 'value' => '', 'label' => 'Confirm Password'));

            echo $this->Form->input('user_address',array('label'=>'Address'));
            echo $this->Form->input('country_id', array('type' => 'select', 'options' => $countries));
            echo $this->Form->input('user_dietary_requirement',array('label'=>'Dietary Requirements'));
            echo $this->Form->input('user_spl_assistance',array('label'=>'Special Assistance'));
            echo $this->Form->input('user_referee',array('label'=>'Referee'));          
//            echo $this->Form->checkbox('user_emailsubscription', array( 'value' => 'Yes' )); 
//		echo $this->Form->input('Event');
//		echo $this->Form->input('News');
            ?>

            <?php echo $this->Form->end(__('Submit')); ?>
        </td>
        <td>
            <?php echo $this->Html->link(__('Existing Customer? Login here'), array('action' => 'login')); ?>
		    <div style="margin-top:20px"><?php echo $this->Html->link(__('Forgot Password?'), array('controller' => 'users', 'action' => 'forgotten_password')); ?></div>
        </td>
    </tr>
</table>