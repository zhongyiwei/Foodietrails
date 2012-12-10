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
<li><?php echo $this->Html->link(__('Edit This Tour Date'), array('action' => 'edit', $tourDate['TourDate']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Tour Date'), array('action' => 'delete', $tourDate['TourDate']['id']), null, __('Are you sure you want to delete # %s?', $tourDate['TourDate']['tour_date'])); ?> </li>
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
<div class="tourDates view">
    <dl>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tourDate['Tour']['tour_name'], array('controller' => 'tours', 'action' => 'view', $tourDate['Tour']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Holding Date'); ?></dt>
        <dd>
            <?php echo h($tourDate['TourDate']['tour_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Holding Time'); ?></dt>
        <dd>
            <?php echo h($tourDate['TourDate']['tour_time']); ?>
            &nbsp;
        </dd>
       <dt><?php echo __('Progress'); ?></dt>
        <dd>
            <?php echo h($tourDate['TourDate']['tour_progress']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>

