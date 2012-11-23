<div class="cookingclassDates view">
<h2><?php  echo __('Cookingclass Date'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cookingclassDate['CookingclassDate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cookingclass'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cookingclassDate['Cookingclass']['id'], array('controller' => 'cookingclasses', 'action' => 'view', $cookingclassDate['Cookingclass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cookingclass Date'); ?></dt>
		<dd>
			<?php echo h($cookingclassDate['CookingclassDate']['cookingclass_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cookingclass Time'); ?></dt>
		<dd>
			<?php echo h($cookingclassDate['CookingclassDate']['cookingclass_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cookingclass Date'), array('action' => 'edit', $cookingclassDate['CookingclassDate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cookingclass Date'), array('action' => 'delete', $cookingclassDate['CookingclassDate']['id']), null, __('Are you sure you want to delete # %s?', $cookingclassDate['CookingclassDate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclass Dates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass Date'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclasses'), array('controller' => 'cookingclasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass'), array('controller' => 'cookingclasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
