<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Order'), array('action' => 'edit', $giftvoucherOrder['GiftvoucherOrder']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Order'), array('action' => 'delete', $giftvoucherOrder['GiftvoucherOrder']['id']), null, __('Are you sure you want to delete # %s?', $giftvoucherOrder['GiftvoucherOrder']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
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
<div class="giftvoucherOrders view">
    <dl>
        <dt>User Email</dt>
        <dd>
            <?php echo $this->Html->link($giftvoucherOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $giftvoucherOrder['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt>Gift Voucher</dt>
        <dd>
            <?php echo $this->Html->link($giftvoucherOrder['GiftVoucher']['gift_voucher_name'], array('controller' => 'gift_vouchers', 'action' => 'view', $giftvoucherOrder['GiftVoucher']['id'])); ?>
            &nbsp;
        </dd>
        <dt>Purchase Quantity</dt>
        <dd>
            <?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_purchase_quantity']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Gift Purchase Date'); ?></dt>
        <dd>
            <?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_purchase_date']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>
