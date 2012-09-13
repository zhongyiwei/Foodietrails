<div class="cookingclassImages form">
<?php echo $this->Form->create('CookingclassImage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cookingclass Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cooking_class_id');
		echo $this->Form->input('cooking_class_image_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CookingclassImage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CookingclassImage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cookingclass Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cooking Classes'), array('controller' => 'cooking_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cooking Class'), array('controller' => 'cooking_classes', 'action' => 'add')); ?> </li>
	</ul>
</div>
