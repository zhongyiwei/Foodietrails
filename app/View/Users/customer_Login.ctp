<?php
            echo $this->Html->css('loginPage.css');
?>
<h1>CHECKOUT</h1>
<p>1. Check Out Method</p>
<table>
    <tr>        
        <td style="width:500px">
            <p>New Customer</p>
            <?php echo $this->Form->create('User'); ?>

            <?php
            echo $this->Form->input('user_first_name');
            echo $this->Form->input('user_surname');
            echo $this->Form->input('user_contacts');
            echo $this->Form->input('user_email');
            echo $this->Form->input('user_password', array('type' => 'password'));
            echo $this->Form->input('user_address');
            echo $this->Form->input('user_dietary_requirement');
            echo $this->Form->input('user_spl_assistance');
            echo $this->Form->input('user_referee');
            echo $this->Form->input('user_postcode');
            echo $this->Form->input('user_state');
            echo $this->Form->input('country_id', array('type' => 'select', 'options' => $countries));
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