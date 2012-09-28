<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct','');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this User'), array('action' => 'view', $this->Form->value('User.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this User'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.user_first_name'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('User'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('User List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></div>
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
		echo $this->Form->input('user_password',array('type'=>'password','value'=>''));
		echo $this->Form->input('user_address');
		echo $this->Form->input('user_dietary_requirement');
		echo $this->Form->input('user_spl_assistance');
		echo $this->Form->input('user_referee');
//		echo $this->Form->input('user_postcode');
//		echo $this->Form->input('user_state');
		echo $this->Form->input('country_id', array('type'=>'select','options'=>$countries));
		//echo $this->Form->input('Event');
		//echo $this->Form->input('News');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_role');
		echo $this->Form->input('user_first_name');
		echo $this->Form->input('user_surname');
		echo $this->Form->input('user_contacts');
		echo $this->Form->input('user_email');
		echo $this->Form->input('user_password');
		echo $this->Form->input('user_address');
		echo $this->Form->input('user_dietary_requirement');
		echo $this->Form->input('user_spl_assistance');
		echo $this->Form->input('user_referee');
//		echo $this->Form->input('user_postcode');
//		echo $this->Form->input('user_state');
		echo $this->Form->input('country_id');
		//echo $this->Form->input('Event');
		//echo $this->Form->input('News');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!--- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclass Orders'), array('controller' => 'cookingclass_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass Order'), array('controller' => 'cookingclass_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faqs'), array('controller' => 'faqs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faq'), array('controller' => 'faqs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Vouchers'), array('controller' => 'gift_vouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Voucher'), array('controller' => 'gift_vouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Orders'), array('controller' => 'product_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Order'), array('controller' => 'product_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('controller' => 'tour_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Order'), array('controller' => 'tour_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
	</ul>
</div> --->
