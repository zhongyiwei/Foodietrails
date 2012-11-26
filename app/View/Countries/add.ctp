<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
       <li><?php echo $this->Html->link(__('User'),  array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks', 'action' => 'index')); ?></li>
        <li class='active'><?php echo $this->Html->link(__('Country'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'userSubscriptions', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Country List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Country'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('country_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>