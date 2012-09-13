<div class="cookingclassOrders form">
<?php echo $this->Form->create('CookingclassOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cookingclass Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cooking_class_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('cooking_class_order_quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CookingclassOrder.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CookingclassOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cookingclass Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cooking Classes'), array('controller' => 'cooking_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cooking Class'), array('controller' => 'cooking_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
