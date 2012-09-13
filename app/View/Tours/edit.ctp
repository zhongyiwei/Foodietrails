<div class="tours form">
<?php echo $this->Form->create('Tour'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tour_name');
		echo $this->Form->input('tour_description');
		echo $this->Form->input('tour_vendor_name');
		echo $this->Form->input('tour_price_per_certificae');
		echo $this->Form->input('tour_long_description');
		echo $this->Form->input('tour_notes');
		echo $this->Form->input('tour_paricipant_guidlines');
		echo $this->Form->input('tour_location');
		echo $this->Form->input('tour_duration');
		echo $this->Form->input('tour_weather');
		echo $this->Form->input('tour_spectator');
		echo $this->Form->input('tour_max_num_on_day');
		echo $this->Form->input('tour_price_per_certificate');
		echo $this->Form->input('tour_type');
		echo $this->Form->input('Date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tour.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tour.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tours'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Giftvouchers'), array('controller' => 'tour_giftvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Giftvoucher'), array('controller' => 'tour_giftvouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Images'), array('controller' => 'tour_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Image'), array('controller' => 'tour_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('controller' => 'tour_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Order'), array('controller' => 'tour_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dates'), array('controller' => 'dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Date'), array('controller' => 'dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
