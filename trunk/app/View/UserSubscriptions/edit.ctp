<div class="userSubscriptions form">
<?php echo $this->Form->create('UserSubscription'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Subscription'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_email');
		echo $this->Form->input('subscription_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserSubscription.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserSubscription.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Subscriptions'), array('action' => 'index')); ?></li>
	</ul>
</div>
