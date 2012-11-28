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
<li><?php echo $this->Form->postLink(__('Delete This Order'), array('action' => 'delete', $giftvoucherOrder['GiftvoucherOrder']['id']), null, __('Are you sure you want to delete # %s gift voucher order?', $giftvoucherOrder['User']['user_email'])); ?> </li>
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
        <dt>Gifter Email</dt>
        <dd>
            <?php echo $this->Html->link($giftvoucherOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $giftvoucherOrder['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt>Recipient Email</dt>
        <dd>
            <?php if ($giftvoucherOrder['GiftvoucherOrder']['recipient_id'] != null){$recipientID = $giftvoucherOrder['GiftvoucherOrder']['recipient_id']; echo $this->Html->link($recipientEmail[$recipientID], array('controller' => 'users', 'action' => 'view', $giftvoucherOrder['GiftvoucherOrder']['recipient_id'])); }?>
            &nbsp;
        </dd>
        <dt>Gift Voucher</dt>
        <dd>
            <?php echo $this->Html->link($giftvoucherOrder['GiftVoucher']['gift_voucher_name'], array('controller' => 'gift_vouchers', 'action' => 'view', $giftvoucherOrder['GiftVoucher']['id'])); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Gift Purchase Date'); ?></dt>
        <dd>
            <?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_purchase_date']); ?>
            &nbsp;
        </dd>
                <dt><?php echo __('Gift Due Date'); ?></dt>
        <dd>
            <?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_due_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Gift Redeem Code'); ?></dt>
        <dd>
            <?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_redeem_code']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Gift Redeem Status'); ?></dt>
        <dd>
            <?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_redeem_status']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>
