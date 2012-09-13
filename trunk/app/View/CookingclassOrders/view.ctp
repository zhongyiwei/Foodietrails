<div class="cookingclassOrders view">
<h2><?php  echo __('Cookingclass Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cookingclassOrder['CookingclassOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cookingclassOrder['CookingClass']['id'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassOrder['CookingClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cookingclassOrder['User'][''], array('controller' => 'users', 'action' => 'view', $cookingclassOrder['User']['y'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class Order Quantity'); ?></dt>
		<dd>
			<?php echo h($cookingclassOrder['CookingclassOrder']['cooking_class_order_quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cookingclass Order'), array('action' => 'edit', $cookingclassOrder['CookingclassOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cookingclass Order'), array('action' => 'delete', $cookingclassOrder['CookingclassOrder']['id']), null, __('Are you sure you want to delete # %s?', $cookingclassOrder['CookingclassOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclass Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cooking Classes'), array('controller' => 'cooking_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cooking Class'), array('controller' => 'cooking_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
