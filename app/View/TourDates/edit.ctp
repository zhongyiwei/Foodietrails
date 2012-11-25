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
<li><?php echo $this->Html->link(__('View this Date'), array('action' => 'view', $this->Form->value('TourDate.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Date'), array('action' => 'delete', $this->Form->value('TourDate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TourDate.tour_name'))); ?></li>
<?php
$this->end();
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
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Date'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourDates form">
    <?php echo $this->Form->create('TourDate'); ?>

    <?php
    echo $this->Form->input('tour_id', array('type' => 'select', 'options' => $tourName));
   // debug($tours);
    echo $this->Form->input('tour_date');
    echo $this->Form->input('tour_time');
    echo $this->Form->input('tour_progress');

    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>


