<div class="tours index">
	<h2><?php echo __('Tours'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_name'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_description'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_vendor_name'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_price_per_certificae'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_long_description'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_notes'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_paricipant_guidlines'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_location'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_duration'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_weather'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_spectator'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_max_num_on_day'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_price_per_certificate'); ?></th>
			<th><?php echo $this->Paginator->sort('tour_type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tours as $tour): ?>
	<tr>
		<td><?php echo h($tour['Tour']['id']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_name']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_description']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_vendor_name']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_price_per_certificae']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_long_description']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_notes']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_paricipant_guidlines']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_location']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_duration']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_weather']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_spectator']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_max_num_on_day']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_price_per_certificate']); ?>&nbsp;</td>
		<td><?php echo h($tour['Tour']['tour_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tour['Tour']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tour['Tour']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tour['Tour']['id']), null, __('Are you sure you want to delete # %s?', $tour['Tour']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tour'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Giftvouchers'), array('controller' => 'tour_giftvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Giftvoucher'), array('controller' => 'tour_giftvouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Images'), array('controller' => 'tour_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Image'), array('controller' => 'tour_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('controller' => 'tour_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Order'), array('controller' => 'tour_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dates'), array('controller' => 'dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Date'), array('controller' => 'dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
