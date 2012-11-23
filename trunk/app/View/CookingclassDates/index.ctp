<div class="cookingclassDates index">
	<h2><?php echo __('Cookingclass Dates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cookingclass_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cookingclass_date'); ?></th>
			<th><?php echo $this->Paginator->sort('cookingclass_time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($cookingclassDates as $cookingclassDate): ?>
	<tr>
		<td><?php echo h($cookingclassDate['CookingclassDate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cookingclassDate['Cookingclass']['id'], array('controller' => 'cookingclasses', 'action' => 'view', $cookingclassDate['Cookingclass']['id'])); ?>
		</td>
		<td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_date']); ?>&nbsp;</td>
		<td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cookingclassDate['CookingclassDate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cookingclassDate['CookingclassDate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cookingclassDate['CookingclassDate']['id']), null, __('Are you sure you want to delete # %s?', $cookingclassDate['CookingclassDate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cookingclass Date'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cookingclasses'), array('controller' => 'cookingclasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass'), array('controller' => 'cookingclasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
