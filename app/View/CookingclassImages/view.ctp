<div class="cookingclassImages view">
<h2><?php  echo __('Cookingclass Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cookingclassImage['CookingclassImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cookingclassImage['CookingClass']['id'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassImage['CookingClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class Image Name'); ?></dt>
		<dd>
			<?php echo h($cookingclassImage['CookingclassImage']['cooking_class_image_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cookingclass Image'), array('action' => 'edit', $cookingclassImage['CookingclassImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cookingclass Image'), array('action' => 'delete', $cookingclassImage['CookingclassImage']['id']), null, __('Are you sure you want to delete # %s?', $cookingclassImage['CookingclassImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclass Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cooking Classes'), array('controller' => 'cooking_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cooking Class'), array('controller' => 'cooking_classes', 'action' => 'add')); ?> </li>
	</ul>
</div>
