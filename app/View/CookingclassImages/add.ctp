<div class="cookingclassImages form">
<?php echo $this->Form->create('CookingclassImage'); ?>
	<fieldset>
		<legend><?php echo __('Add Cookingclass Image'); ?></legend>
	<?php
		echo $this->Form->input('cooking_class_id');
		echo $this->Form->input('cooking_class_image_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cookingclass Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cooking Classes'), array('controller' => 'cooking_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cooking Class'), array('controller' => 'cooking_classes', 'action' => 'add')); ?> </li>
	</ul>
</div>
