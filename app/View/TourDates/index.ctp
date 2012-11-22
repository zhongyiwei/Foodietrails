<div class="tourDates index">
	<h2><?php echo __('Tour Dates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_date'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tourDates as $tourDate): ?>
	<tr>
		<td><?php echo h($tourDate['TourDate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tourDate['Tour']['id'], array('controller' => 'tours', 'action' => 'view', $tourDate['Tour']['id'])); ?>
		</td>
		<td><?php echo h($tourDate['TourDate']['tour_date']); ?>&nbsp;</td>
		<td><?php echo h($tourDate['TourDate']['tour_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tourDate['TourDate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tourDate['TourDate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tourDate['TourDate']['id']), null, __('Are you sure you want to delete # %s?', $tourDate['TourDate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tour Date'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
	</ul>
</div>
