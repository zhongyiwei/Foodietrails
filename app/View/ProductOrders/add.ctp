<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
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
    <div class="selected"><?php echo $this->Html->link(__('Add Product Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="productOrders form">
    <?php echo $this->Form->create('ProductOrder'); ?>
    <?php
    echo $this->Form->input('product_id',array('type' => 'select', 'options' => $productName));
    echo $this->Form->input('user_id', array('type' => 'select', 'options' => $userEmail));
    echo $this->Form->input('product_purchase_quantity');
//    echo $this->Form->input('product_purchase_date');
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
