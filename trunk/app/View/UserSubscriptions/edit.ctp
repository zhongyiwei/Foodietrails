<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View Subscription'), array('action' => 'view', $this->Form->value('UserSubscription.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete Subscription'), array('action' => 'delete', $this->Form->value('UserSubscription.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserSubscription.user_email'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'countries','action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Subscription'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Subscription List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Subscription'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="userSubscriptions form">
<?php echo $this->Form->create('UserSubscription'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('user_email');
		echo $this->Form->input('subscription_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
