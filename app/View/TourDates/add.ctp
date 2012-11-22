<div class="tourDates form">
<?php echo $this->Form->create('TourDate'); ?>
	<fieldset>
		<legend><?php echo __('Add Tour Date'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Tour Dates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
	</ul>
</div>
