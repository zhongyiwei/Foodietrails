<div class="userSubscriptions view">
<h2><?php  echo __('User Subscription'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userSubscription['UserSubscription']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Email'); ?></dt>
		<dd>
			<?php echo h($userSubscription['UserSubscription']['user_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subscription Status'); ?></dt>
		<dd>
			<?php echo h($userSubscription['UserSubscription']['subscription_status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Subscription'), array('action' => 'edit', $userSubscription['UserSubscription']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Subscription'), array('action' => 'delete', $userSubscription['UserSubscription']['id']), null, __('Are you sure you want to delete # %s?', $userSubscription['UserSubscription']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Subscriptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Subscription'), array('action' => 'add')); ?> </li>
	</ul>
</div>
