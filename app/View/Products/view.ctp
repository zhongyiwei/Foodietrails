<div class="products view">
<h2><?php  echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Description'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Images'), array('controller' => 'product_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Image'), array('controller' => 'product_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Orders'), array('controller' => 'product_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Order'), array('controller' => 'product_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Product Images'); ?></h3>
	<?php if (!empty($product['ProductImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Image Name'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['ProductImage'] as $productImage): ?>
		<tr>
			<td><?php echo $productImage['id']; ?></td>
			<td><?php echo $productImage['product_image_name']; ?></td>
			<td><?php echo $productImage['product_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'product_images', 'action' => 'view', $productImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'product_images', 'action' => 'edit', $productImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'product_images', 'action' => 'delete', $productImage['id']), null, __('Are you sure you want to delete # %s?', $productImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Image'), array('controller' => 'product_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Product Orders'); ?></h3>
	<?php if (!empty($product['ProductOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Product Purchase Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['ProductOrder'] as $productOrder): ?>
		<tr>
			<td><?php echo $productOrder['id']; ?></td>
			<td><?php echo $productOrder['product_id']; ?></td>
			<td><?php echo $productOrder['user_id']; ?></td>
			<td><?php echo $productOrder['product_purchase_quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'product_orders', 'action' => 'view', $productOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'product_orders', 'action' => 'edit', $productOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'product_orders', 'action' => 'delete', $productOrder['id']), null, __('Are you sure you want to delete # %s?', $productOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Order'), array('controller' => 'product_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
