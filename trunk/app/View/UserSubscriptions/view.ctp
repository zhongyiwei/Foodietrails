<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit Subscription'), array('action' => 'edit', $userSubscription['UserSubscription']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete Subscription'), array('action' => 'delete', $userSubscription['UserSubscription']['id']), null, __('Are you sure you want to delete # %s?', $userSubscription['UserSubscription']['user_email'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'countries','action' => 'index')); ?></li>
        <li  class='active'><?php echo $this->Html->link(__('Subscription'), array('action' => 'index')); ?></li>
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
<div class="userSubscriptions view">
	<dl>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userSubscription['UserSubscription']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($userSubscription['UserSubscription']['user_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($userSubscription['UserSubscription']['subscription_status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>