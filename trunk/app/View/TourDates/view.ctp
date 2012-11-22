<div class="tourDates view">
<h2><?php  echo __('Tour Date'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tourDate['TourDate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tourDate['Tour']['id'], array('controller' => 'tours', 'action' => 'view', $tourDate['Tour']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Date'); ?></dt>
		<dd>
			<?php echo h($tourDate['TourDate']['tour_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Time'); ?></dt>
		<dd>
			<?php echo h($tourDate['TourDate']['tour_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tour Date'), array('action' => 'edit', $tourDate['TourDate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tour Date'), array('action' => 'delete', $tourDate['TourDate']['id']), null, __('Are you sure you want to delete # %s?', $tourDate['TourDate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Dates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Date'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
	</ul>
</div>
