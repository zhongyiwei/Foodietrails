<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftDate', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Date'), array('action' => 'edit', $cookingclassDate['CookingclassDate']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Date'), array('action' => 'delete', $cookingclassDate['CookingclassDate']['id']), null, __('Are you sure you want to delete', $cookingclassDate['CookingclassDate']['id']),'?'); ?> </li>

<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li ><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourdates', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassdates', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Class Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add a Cooking Class Date'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassDates view">
    <dl>
        <dt><?php echo __('Cooking Class Name'); ?></dt>
        <dd>
            <?php echo $this->Html->link($cookingclassDate['Cookingclass']['cooking_class_name'], array('controller' => 'cooking_classes', 'action' => 'view', $cookingclassDate['Cookingclass']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Cooking Class Holding Date'); ?></dt>
        <dd>
            <?php echo h($cookingclassDate['CookingclassDate']['cookingclass_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Cooking Class Holding Time'); ?></dt>
        <dd>
            <?php echo h($cookingclassDate['CookingclassDate']['cookingclass_time']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Cooking Class Progress'); ?></dt>
        <dd>
            <?php echo h($cookingclassDate['CookingclassDate']['cooking_class_progress']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>


