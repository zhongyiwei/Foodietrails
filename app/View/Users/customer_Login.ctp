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
<!--            <form action="<?php echo $this->webroot; ?>users/login" method="post" >
            <?php // echo $this->Form->create('User'); ?>
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