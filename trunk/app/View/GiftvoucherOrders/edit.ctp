<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Order'), array('action' => 'view', $this->Form->value('GiftvoucherOrder.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Order'), array('action' => 'delete', $this->Form->value('GiftvoucherOrder.id')), null, __('Are you sure you want to delete this gift voucher order?')); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourOrders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassOrders', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherOrders', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Gift Voucher Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Gift Voucher Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="giftvoucherOrders form">
    <?php echo $this->Form->create('GiftvoucherOrder'); ?>
    <?php
    $redeemStatus = array('Not Redeemed' => 'Not Redeemed', 'Redeemed' => 'Redeemed');
    echo $this->Form->input('user_id', array('label' => 'Gifter Email Address', 'type' => 'select', 'options' => $userEmail));
    echo $this->Form->input('recipient_id', array('label' => 'Recipient Email Address', 'type' => 'select', 'options' => $userEmail));
//    echo $this->Form->input('recipient_id', array('label' => 'Recipient Email Address', 'type' => 'select', 'options' => $userEmail));
    echo $this->Form->input('gift_voucher_id', array('type' => 'select', 'options' => $giftName));
    echo $this->Form->input('gift_redeem_code');
    echo $this->Form->input('gift_redeem_status', array('type' => 'select', 'options' => $redeemStatus));
    echo $this->Form->input('gift_purchase_date');
    echo $this->Form->input('gift_due_date');
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>