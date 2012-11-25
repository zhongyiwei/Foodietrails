<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftDate', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourdates', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassdates', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Cooking Class Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Date Order'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassDates index">
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                 <th>Cooking Class Name</th>
                <th>Cooking Class Holding Date</th>
                <th>Cooking Class Holding Time</th>
                <th>Cooking Class Progress</th>

                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cookingclassDates as $cookingclassDate): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($cookingclassDate['Cookingclass']['cooking_class_name'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassDate['Cookingclass']['id'])); ?>

                    </td>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_date']); ?>&nbsp;</td>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_time']); ?>&nbsp;</td>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cooking_class_progress']); ?>&nbsp;</td>

                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $cookingclassDate['CookingclassDate']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cookingclassDate['CookingclassDate']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cookingclassDate['CookingclassDate']['id']), null, __('Are you sure you want to delete # %s?', $cookingclassDate['CookingclassDate']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
</tbody> 
</table>
</div>
<?php $this->end(); ?>


