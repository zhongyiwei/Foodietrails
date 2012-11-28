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
        <li class='active '><?php echo $this->Html->link(__('Tour Order'), array('controller' => 'tourorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product Order'), array('controller' => 'productorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Tour Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Order'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourOrders index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Tour Name</th>
                <th>User Email</th>
                <th>Tour Holding Date</th>
                <th>Quantity</th>
                <th>Tour Purchase Date</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tourOrders as $tourOrder): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($tourOrder['TourDate']['tour_date'], array('controller' => 'tourdates', 'action' => 'view', $tourOrder['TourDate']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($tourOrder['Tour']['tour_name'], array('controller' => 'tours', 'action' => 'view', $tourOrder['Tour']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($tourOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $tourOrder['User']['id'])); ?>
                    </td>
                    <td><?php echo h($tourOrder['TourOrder']['tour_purchase_quantity']); ?>&nbsp;</td>
                    <td><?php echo h($tourOrder['TourOrder']['tour_purchase_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $tourOrder['TourOrder']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tourOrder['TourOrder']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tourOrder['TourOrder']['id']), null, __('Are you sure you want to delete # %s?', $tourOrder['User']['user_email'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?> 
        </tbody> 
    </table>
</div>
<?php $this->end(); ?>