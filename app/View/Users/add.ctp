<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('User'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'countries', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'userSubscriptions', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('User List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="users form">
    <?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
                $roleType=array('Admin'=>'Administrator','Customer'=>'Customer');
		echo $this->Form->input('user_role',array('options'=>$roleType,'default'=>'User'));
		echo $this->Form->input('user_first_name');
		echo $this->Form->input('user_surname');
		echo $this->Form->input('user_contacts');
		echo $this->Form->input('user_email');
		echo $this->Form->input('user_password',array('type'=>'password'));
		echo $this->Form->input('user_address');
		echo $this->Form->input('user_dietary_requirement');
		echo $this->Form->input('user_spl_assistance');
		echo $this->Form->input('user_referee');
//		echo $this->Form->input('user_postcode');
//		echo $this->Form->input('user_state');
		echo $this->Form->input('country_id', array('type'=>'select','options'=>$countries));
//                                    echo $this->Form->checkbox('user_emailsubscription', array( 'value' => 'Yes' )); 
//		echo $this->Form->input('Event');
//		echo $this->Form->input('News');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>