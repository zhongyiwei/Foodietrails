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
        <li><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourDates', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassDates', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Cooking Class Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class Date'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassDates index">
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                <th>Holding Date</th>
                <th>Cooking Class Name</th>
                <th>Holding Time</th>
                <th>Price</th>
                <th>Progress</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cookingclassDates as $cookingclassDate): ?>
                <tr>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_date']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($cookingclassDate['Cookingclass']['cooking_class_name'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassDate['Cookingclass']['id'])); ?>
                    </td>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_time']); ?>&nbsp;</td>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cooking_class_price']); ?>&nbsp;</td>
                    <td><?php echo h($cookingclassDate['CookingclassDate']['cookingclass_progress']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $cookingclassDate['CookingclassDate']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cookingclassDate['CookingclassDate']['id'])); ?>
                        <?php $info = $cookingclassDate['Cookingclass']['cooking_class_name'] . " on " . $cookingclassDate['CookingclassDate']['cookingclass_date'];
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cookingclassDate['CookingclassDate']['id']), null, __('Are you sure you want to delete # %s?', $info));
                        ?>
                        <?php
                        if ($cookingclassDate['CookingclassDate']['cookingclass_progress'] == "Completed") {
                            echo $this->Html->link(__('Send Feedback Email'), array('action' => 'requestFeedback', $cookingclassDate['CookingclassDate']['id']), array('style' => 'padding:2px 9px;'), __('Sending email will take some time due to large amount of people, are you sure you want to proceed?'));
                        } else {
                            echo $this->Html->link(__('Send Notification Email'), array('action' => 'notification', $cookingclassDate['CookingclassDate']['id']), null, __('Sending email will take some time due to large amount of people, are you sure you want to proceed?'));
                        }
                        ?>
                    </td>
                </tr>
<?php endforeach; ?>
        </tbody> 
    </table>
</div>
<?php $this->end(); ?>


