<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Order'), array('action' => 'edit', $productOrder['ProductOrder']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Order'), array('action' => 'delete', $productOrder['ProductOrder']['id']), null, __('Are you sure you want to delete # %s product order?', $productOrder['User']['user_email'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourOrders', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassOrders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherOrders', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Product Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="productOrders view">
    <dl>
        <dt><?php echo __('Product Name'); ?></dt>
        <dd>
            <?php echo $this->Html->link($productOrder['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $productOrder['Product']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Email'); ?></dt>
        <dd>
            <?php echo $this->Html->link($productOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $productOrder['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Purchase Quantity'); ?></dt>
        <dd>
            <?php echo h($productOrder['ProductOrder']['product_purchase_quantity']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Purchase Date'); ?></dt>
        <dd>
            <?php echo h($productOrder['ProductOrder']['product_purchase_date']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>
