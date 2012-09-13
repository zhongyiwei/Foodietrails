<div class="tourOrders form">
<?php echo $this->Form->create('TourOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tour Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tour_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('tour_purchase_quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TourOrder.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TourOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
