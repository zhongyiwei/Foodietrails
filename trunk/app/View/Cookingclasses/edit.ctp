<div class="cookingclasses form">
<?php echo $this->Form->create('Cookingclass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cookingclass'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cooking_class_name');
		echo $this->Form->input('cooking_class_description');
		echo $this->Form->input('cooking_class_price');
		echo $this->Form->input('cooking_class_location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cookingclass.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cookingclass.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cookingclasses'), array('action' => 'index')); ?></li>
	</ul>
</div>
