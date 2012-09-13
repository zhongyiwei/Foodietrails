<div class="productImages view">
<h2><?php  echo __('Product Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productImage['ProductImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Image Name'); ?></dt>
		<dd>
			<?php echo h($productImage['ProductImage']['product_image_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productImage['Product']['id'], array('controller' => 'products', 'action' => 'view', $productImage['Product']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Image'), array('action' => 'edit', $productImage['ProductImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Image'), array('action' => 'delete', $productImage['ProductImage']['id']), null, __('Are you sure you want to delete # %s?', $productImage['ProductImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
