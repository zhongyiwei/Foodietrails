<div class="cookingclassDates form">
<?php echo $this->Form->create('CookingclassDate'); ?>
	<fieldset>
		<legend><?php echo __('Add Cookingclass Date'); ?></legend>
	<?php
		echo $this->Form->input('cookingclass_id');
		echo $this->Form->input('cookingclass_date');
		echo $this->Form->input('cookingclass_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cookingclass Dates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cookingclasses'), array('controller' => 'cookingclasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass'), array('controller' => 'cookingclasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
