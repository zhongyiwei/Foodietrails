<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View Feedback'), array('action' => 'view', $this->Form->value('Feedback.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $this->Form->value('Feedback.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Feedback.feedback_title'))); ?> </li>
<?php

$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'users','action' => 'index')); ?></li>
		<li class='active '><?php echo $this->Html->link(__('Feedback'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour Feedback List'), array('action' => 'index')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="Feedback form">
<?php echo $this->Form->create('Feedback'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('tour_id', array('type'=>'select','options'=>$tourNames));
		echo $this->Form->input('full_name');
		echo $this->Form->input('feedback_description');
		echo $this->Form->input('feedback_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
<div class="feedback form">
<?php echo $this->Form->create('Feedback'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tour Feedback'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tour_id');
		echo $this->Form->input('full_name');
		echo $this->Form->input('feedback_description');
		echo $this->Form->input('feedback_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>