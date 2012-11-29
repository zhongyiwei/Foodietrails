<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour Order List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Tour Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourOrders form">
    <?php echo $this->Form->create('TourOrder'); ?>
    <?php
    echo $this->Form->input('tour_id', array('type' => 'select', 'options' => $tourName));
    echo $this->Form->input('user_id', array('type' => 'select', 'options' => $userEmail));
    echo $this->Form->input('tour_date_id', array('type' => 'select', 'options' => $tourHoldingDate));
    echo $this->Form->input('tour_purchase_quantity');
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
