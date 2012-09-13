<div class="tourImages form">
<?php echo $this->Form->create('TourImage'); ?>
	<fieldset>
		<legend><?php echo __('Add Tour Image'); ?></legend>
	<?php
		echo $this->Form->input('tour_id');
		echo $this->Form->input('tour_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tour Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
	</ul>
</div>
