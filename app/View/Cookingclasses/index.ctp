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
        <li class='active '><?php echo $this->Html->link(__('Cooking Class'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>        
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Cooking Classes List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Classes'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclasses index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                            <!--<th>id</th>-->
                <th>Cooking Class Name</th>
                <th>Cooking Class Description</th>
                <th>Cooking Class Price</th>
                <th>Cooking Class Location</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cookingclasses as $cookingclass): ?>
                <tr>
                        <!--<td><?php echo h($cookingclass['Cookingclass']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($cookingclass['Cookingclass']['cooking_class_name']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate($cookingclass['Cookingclass']['cooking_class_description'], 50, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <td><?php echo h($cookingclass['Cookingclass']['cooking_class_price']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate(h($cookingclass['Cookingclass']['cooking_class_location']), 50, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $cookingclass['Cookingclass']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cookingclass['Cookingclass']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cookingclass['Cookingclass']['id']), null, __('Are you sure you want to delete # %s?', $cookingclass['Cookingclass']['cooking_class_name'])); ?>
                        <?php echo $this->Html->link(__('Preview'), array('action' => 'preview', $cookingclass['Cookingclass']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->end(); ?>

