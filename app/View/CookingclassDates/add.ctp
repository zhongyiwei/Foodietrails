<?php
$this->extend('/Common/AdminAdd');
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
        <li class='active '><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourdates', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassdates', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Class Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class Date'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassDates form">
    <?php echo $this->Form->create('CookingclassDate'); ?>
    <?php
    $progressStatus = array('Incomplete' => 'Incomplete', 'Completed' => 'Completed');
    echo $this->Form->input('cookingclass_id', array('type' => 'select', 'options' => $cookingclassName));
    echo $this->Form->input('cookingclass_date');
    echo $this->Form->input('cookingclass_time');
    echo $this->Form->input('cookingclass_progress', array('type' => 'select', 'options' => $progressStatus));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>