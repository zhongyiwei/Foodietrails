<div class="tourDates form">
<?php echo $this->Form->create('TourDate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tour Date'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tour_id');
		echo $this->Form->input('tour_date');
		echo $this->Form->input('tour_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TourDate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TourDate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tour Dates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
	</ul>
</div>
