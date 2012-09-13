<div class="productOrders view">
<h2><?php  echo __('Product Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productOrder['ProductOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productOrder['Product']['id'], array('controller' => 'products', 'action' => 'view', $productOrder['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productOrder['User'][''], array('controller' => 'users', 'action' => 'view', $productOrder['User']['y'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Purchase Quantity'); ?></dt>
		<dd>
			<?php echo h($productOrder['ProductOrder']['product_purchase_quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Order'), array('action' => 'edit', $productOrder['ProductOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Order'), array('action' => 'delete', $productOrder['ProductOrder']['id']), null, __('Are you sure you want to delete # %s?', $productOrder['ProductOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
