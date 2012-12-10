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
        <li class='active '><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Product Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Product Order'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="productOrders index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>User Email</th>
                <th>Quantity</th>
                <th>Purchase Date</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productOrders as $productOrder): ?>

                <tr>
                    <td>
                        <?php echo $this->Html->link($productOrder['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $productOrder['Product']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($productOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $productOrder['User']['id'])); ?>
                    </td>
                    <td><?php echo h($productOrder['ProductOrder']['product_purchase_quantity']); ?>&nbsp;</td>
                    <td><?php echo h($productOrder['ProductOrder']['product_purchase_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $productOrder['ProductOrder']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $productOrder['ProductOrder']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $productOrder['ProductOrder']['id']), null, __('Are you sure you want to delete # %s product order?', $productOrder['User']['user_email'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->end(); ?>