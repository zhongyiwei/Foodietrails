<div class="cookingclasses view">
<h2><?php  echo __('Cookingclass'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class Name'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class Description'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class Price'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooking Class Location'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_location']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cookingclass'), array('action' => 'edit', $cookingclass['Cookingclass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cookingclass'), array('action' => 'delete', $cookingclass['Cookingclass']['id']), null, __('Are you sure you want to delete # %s?', $cookingclass['Cookingclass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclasses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass'), array('action' => 'add')); ?> </li>
	</ul>
</div>
