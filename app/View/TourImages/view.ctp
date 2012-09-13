<div class="tourImages view">
<h2><?php  echo __('Tour Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tourImage['TourImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tourImage['Tour']['id'], array('controller' => 'tours', 'action' => 'view', $tourImage['Tour']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Name'); ?></dt>
		<dd>
			<?php echo h($tourImage['TourImage']['tour_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tour Image'), array('action' => 'edit', $tourImage['TourImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tour Image'), array('action' => 'delete', $tourImage['TourImage']['id']), null, __('Are you sure you want to delete # %s?', $tourImage['TourImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
	</ul>
</div>
