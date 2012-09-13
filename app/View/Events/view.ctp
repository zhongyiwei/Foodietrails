<div class="events view">
<h2><?php  echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Name'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Description'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Date'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Images'), array('controller' => 'event_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Image'), array('controller' => 'event_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Users'), array('controller' => 'event_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event User'), array('controller' => 'event_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Event Images'); ?></h3>
	<?php if (!empty($event['EventImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Even Image Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['EventImage'] as $eventImage): ?>
		<tr>
			<td><?php echo $eventImage['id']; ?></td>
			<td><?php echo $eventImage['event_id']; ?></td>
			<td><?php echo $eventImage['even_image_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'event_images', 'action' => 'view', $eventImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'event_images', 'action' => 'edit', $eventImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'event_images', 'action' => 'delete', $eventImage['id']), null, __('Are you sure you want to delete # %s?', $eventImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event Image'), array('controller' => 'event_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Event Users'); ?></h3>
	<?php if (!empty($event['EventUser'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['EventUser'] as $eventUser): ?>
		<tr>
			<td><?php echo $eventUser['id']; ?></td>
			<td><?php echo $eventUser['event_id']; ?></td>
			<td><?php echo $eventUser['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'event_users', 'action' => 'view', $eventUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'event_users', 'action' => 'edit', $eventUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'event_users', 'action' => 'delete', $eventUser['id']), null, __('Are you sure you want to delete # %s?', $eventUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event User'), array('controller' => 'event_users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
