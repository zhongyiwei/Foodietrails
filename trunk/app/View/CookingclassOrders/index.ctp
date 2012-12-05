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
        <li class='active '><?php echo $this->Html->link(__('Cooking Class Order'), array('controller' => 'cookingclassorders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher Order'), array('controller' => 'giftvoucherorders', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Cooking Class Order List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class Order'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassOrders index">
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                <th>Holding Date</th>
                <th>Name</th>
                <th>User Email</th>
                <th>Quantity</th>
                <th>Purchase Date</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cookingclassOrders as $cookingclassOrder): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($cookingclassOrder['CookingClassDate']['cookingclass_date'], array('controller' => 'cookingclassdates', 'action' => 'view', $cookingclassOrder['CookingClassDate']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($cookingclassOrder['CookingClass']['cooking_class_name'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassOrder['CookingClass']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($cookingclassOrder['User']['user_email'], array('controller' => 'users', 'action' => 'view', $cookingclassOrder['User']['id'])); ?>
                    </td>
                    <td><?php echo h($cookingclassOrder['CookingclassOrder']['cooking_class_order_quantity']); ?>&nbsp;</td>
                    <td><?php echo h($cookingclassOrder['CookingclassOrder']['cooking_class_order_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $cookingclassOrder['CookingclassOrder']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cookingclassOrder['CookingclassOrder']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cookingclassOrder['CookingclassOrder']['id']), null, __('Are you sure you want to delete # % s order?', $cookingclassOrder['User']['user_email'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
</tbody> 
</table>
</div>
<?php $this->end(); ?>