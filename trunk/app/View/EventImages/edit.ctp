<div class="eventImages form">
<?php echo $this->Form->create('EventImage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('even_image_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EventImage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EventImage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Event Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
