<div class="tourOrders view">
<h2><?php  echo __('Tour Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tourOrder['TourOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tourOrder['Tour']['id'], array('controller' => 'tours', 'action' => 'view', $tourOrder['Tour']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tourOrder['User'][''], array('controller' => 'users', 'action' => 'view', $tourOrder['User']['y'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Purchase Quantity'); ?></dt>
		<dd>
			<?php echo h($tourOrder['TourOrder']['tour_purchase_quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tour Order'), array('action' => 'edit', $tourOrder['TourOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tour Order'), array('action' => 'delete', $tourOrder['TourOrder']['id']), null, __('Are you sure you want to delete # %s?', $tourOrder['TourOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tours'), array('controller' => 'tours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('controller' => 'tours', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
