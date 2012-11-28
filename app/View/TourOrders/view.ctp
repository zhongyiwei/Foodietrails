<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftDate', '');
$this->assign('LeftOrder', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Order'), array('action' => 'edit', $tourOrder['TourOrder']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Order'), array('action' => 'delete', $tourOrder['Tour']['id']), null, __('Are you sure you want to delete # %s?', $tourOrder['User']['user_email'])); ?> </li>
<?php
$this->end();
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
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Order'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourOrders view">
    <dl>
        <dt><?php echo __('Tour'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tourOrder['Tour']['tour_name'], array('controller' => 'tours', 'action' => 'view', $tourOrder['Tour']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tourOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $tourOrder['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Holding Date'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tourOrder['TourDate']['tour_date'], array('controller' => 'tourdates', 'action' => 'view', $tourOrder['TourDate']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Purchase Quantity'); ?></dt>
        <dd>
            <?php echo h($tourOrder['TourOrder']['tour_purchase_quantity']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>