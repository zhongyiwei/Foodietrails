<div class="userSubscriptions index">
	<h2><?php echo __('User Subscriptions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_email'); ?></th>
			<th><?php echo $this->Paginator->sort('subscription_status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($userSubscriptions as $userSubscription): ?>
	<tr>
		<td><?php echo h($userSubscription['UserSubscription']['id']); ?>&nbsp;</td>
		<td><?php echo h($userSubscription['UserSubscription']['user_email']); ?>&nbsp;</td>
		<td><?php echo h($userSubscription['UserSubscription']['subscription_status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userSubscription['UserSubscription']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userSubscription['UserSubscription']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userSubscription['UserSubscription']['id']), null, __('Are you sure you want to delete # %s?', $userSubscription['UserSubscription']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Subscription'), array('action' => 'add')); ?></li>
	</ul>
</div>
