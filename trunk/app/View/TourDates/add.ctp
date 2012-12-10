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
    <div class="unselected"><?php echo $this->Html->link(__('Tour Date List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Tour Date'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourOrders form">
    <?php echo $this->Form->create('TourDate'); ?>
    <?php
    $progressStatus = array('Incomplete' => 'Incomplete', 'Completed' => 'Completed');
    echo $this->Form->input('tour_id', array('type' => 'select', 'options' => $tourName));
    echo $this->Form->input('tour_date',array('label'=>'Date'));
    echo $this->Form->input('tour_time',array('label'=>'Time'));
    echo $this->Form->input('tour_price_per_certificate',array('label'=>'Price'));
    echo $this->Form->input('tour_progress', array('type' => 'select', 'options' => $progressStatus,'label'=>'Progress'));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>

