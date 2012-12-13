<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Type'), array('action' => 'view', $this->Form->value('TourType.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Type'), array('action' => 'delete', $this->Form->value('TourType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TourType.tour_type_name'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour List'), array('controller' => 'tours', 'action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour'), array('controller' => 'tours', 'action' => 'add')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Tour Type List'), array('controller' => 'tourTypes', 'action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Type'), array('controller' => 'tourTypes', 'action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourTypes form">
    <?php echo $this->Form->create('TourType'); ?>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('tour_type_name');
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>

