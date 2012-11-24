<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li  class='active '><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Gift Voucher Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Gift Voucher Order'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="giftvoucherOrders index">
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                <th>Gifter Email</th>
                <th>Gift Voucher</th>
                <th>Due Date</th>
                <th>Redeem Status</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($giftvoucherOrders as $giftvoucherOrder): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($giftvoucherOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $giftvoucherOrder['User']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($giftvoucherOrder['GiftVoucher']['gift_voucher_name'], array('controller' => 'gift_vouchers', 'action' => 'view', $giftvoucherOrder['GiftVoucher']['id'])); ?>
                    </td>
                    <td><?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_due_date']); ?>&nbsp;</td>
                    <td><?php echo h($giftvoucherOrder['GiftvoucherOrder']['gift_redeem_status']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $giftvoucherOrder['GiftvoucherOrder']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $giftvoucherOrder['GiftvoucherOrder']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $giftvoucherOrder['GiftvoucherOrder']['id']), null, __('Are you sure you want to delete # %s?', $giftvoucherOrder['GiftvoucherOrder']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>
</div>
<?php $this->end(); ?>