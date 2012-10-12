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
<div class="feedback form">
<?php echo $this->Form->create('Feedback'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('tour_id', array('type'=>'select','options'=>$tours)));
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
		<legend><?php echo __('Edit Feedback'); ?></legend>
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
    