<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Vourcher'), array('action' => 'edit', $giftVoucher['GiftVoucher']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Vourcher'), array('action' => 'delete', $giftVoucher['GiftVoucher']['id']), null, __('Are you sure you want to delete # %s?', $giftVoucher['GiftVoucher']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Gift Vourcher List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Gift Vourcher'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="giftVouchers view">
    <dl>
        <dt>Gift Voucher Name</dt>
        <dd>
            <?php // echo $this->Html->link($giftVoucher['GiftVoucher']['gift_voucher_name']); ?>
            <?php echo ($giftVoucher['GiftVoucher']['gift_voucher_name']); ?>
            &nbsp;
        </dd>
        <dt>Gift Message</dt>
        <dd>
            <?php echo ($giftVoucher['GiftVoucher']['gift_message']); ?>
            &nbsp;
        </dd>
        <dt>Gift Price</dt>
        <dd>
            <?php echo h($giftVoucher['GiftVoucher']['gift_price']); ?>
            &nbsp;
        </dd>
        <dt>Gift Type</dt>
        <dd>
            <?php echo h($giftVoucher['GiftVoucher']['gift_type']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>
