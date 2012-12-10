<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Order'), array('action' => 'view', $this->Form->value('ProductOrder.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Order'), array('action' => 'delete', $this->Form->value('ProductOrder.id')), null, __('Are you sure you want to delete this product order?')); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourorders', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Product Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Product Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="productOrders form">
    <?php echo $this->Form->create('ProductOrder'); ?>
    <?php
    echo $this->Form->input('product_id', array('type' => 'select', 'options' => $productName));
    echo $this->Form->input('user_id', array('type' => 'select', 'options' => $userEmail));
    echo $this->Form->input('product_purchase_quantity',array('label'=>'Purchase Qty'));
    echo $this->Form->input('product_purchase_date',array('label'=>'Purchase Date'));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>

