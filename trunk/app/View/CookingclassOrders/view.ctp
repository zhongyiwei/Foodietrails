<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Vourcher'), array('action' => 'edit', $cookingclassOrder['CookingclassOrder']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Vourcher'), array('action' => 'delete', $cookingclassOrder['CookingclassOrder']['id']), null, __('Are you sure you want to delete this order?')); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourOrders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassOrders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherOrders', 'action' => 'index')); ?></li>
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
<div class="cookingclassOrders view">
    <dl>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo $this->Html->link($cookingclassOrder['CookingClass']['cooking_class_name'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassOrder['CookingClass']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Email'); ?></dt>
        <dd>
            <?php echo $this->Html->link($cookingclassOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $cookingclassOrder['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Order Date'); ?></dt>
        <dd>
            <?php echo h($cookingclassOrder['CookingClassDate']['cookingclass_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Order Quantity'); ?></dt>
        <dd>
            <?php echo h($cookingclassOrder['CookingclassOrder']['cooking_class_order_quantity']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Purchase Date'); ?></dt>
        <dd>
            <?php echo h($cookingclassOrder['CookingclassOrder']['cooking_class_order_date']); ?>
            &nbsp;
        </dd>

    </dl>
</div>
<?php $this->end(); ?>