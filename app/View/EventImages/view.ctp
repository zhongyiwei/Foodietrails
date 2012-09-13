<div class="eventImages view">
<h2><?php  echo __('Event Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventImage['EventImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventImage['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventImage['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Image Name'); ?></dt>
		<dd>
			<?php echo h($eventImage['EventImage']['even_image_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Image'), array('action' => 'edit', $eventImage['EventImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event Image'), array('action' => 'delete', $eventImage['EventImage']['id']), null, __('Are you sure you want to delete # %s?', $eventImage['EventImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
