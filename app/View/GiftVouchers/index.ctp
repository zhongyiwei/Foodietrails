<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Gift Template List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Gift Voucher Template'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="giftVouchers index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Gift Voucher Name</th>
                <th>Gift Message</th>
                <th>Gift Price</th>
                <th>Gift Type</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($giftVouchers as $giftVoucher): ?>
                <tr>
                    <td><?php echo h($giftVoucher['GiftVoucher']['gift_voucher_name']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate($giftVoucher['GiftVoucher']['gift_message'], 20, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <td><?php echo h($giftVoucher['GiftVoucher']['gift_price']); ?>
                    <td><?php echo h($giftVoucher['GiftVoucher']['gift_type']); ?>               
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $giftVoucher['GiftVoucher']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $giftVoucher['GiftVoucher']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $giftVoucher['GiftVoucher']['id']), null, __('Are you sure you want to delete # %s?', $giftVoucher['GiftVoucher']['gift_voucher_name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php $this->end(); ?>
