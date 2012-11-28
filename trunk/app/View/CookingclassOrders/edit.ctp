<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Order'), array('action' => 'view', $this->Form->value('CookingclassOrder.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Order'), array('action' => 'delete', $this->Form->value('CookingclassOrder.id')), null, __('Are you sure you want to delete this order?')) ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Class Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassOrders form">
    <?php echo $this->Form->create('CookingclassOrder'); ?>
        <?php
        echo $this->Form->input('cooking_class_id', array('type' => 'select', 'options' => $cookingclassName));
        echo $this->Form->input('user_id', array('type' => 'select', 'options' => $userEmail));
        echo $this->Form->input('cooking_class_date_id', array('type' => 'select', 'options' => $cookingclassDate));
        echo $this->Form->input('cooking_class_order_quantity');
        echo $this->Form->input('cooking_class_order_date',array('label'=>'Cooking Class Purchase Date'));
        ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>