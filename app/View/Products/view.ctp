<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','LeftMenuActions');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Product'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Product List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Product'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="products view">
<h2><?php  echo __('Product'); ?></h2>
	<dl>
<!--		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Product Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Description'); ?></dt>
		<dd>
			<?php echo ($product['Product']['product_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Thumbnail'); ?></dt>
        <dd>
            <img src="<?php echo ($product['Product']['product_thumbnail']);?>" height="100px">
            &nbsp;
        </dd>
	</dl>
</div>
<?php $this->end(); ?>