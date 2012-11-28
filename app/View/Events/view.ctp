<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','LeftMenuActions');
$this->assign('LeftFaq','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['event_name'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
   <ul>
        <li class='active '><?php echo $this->Html->link(__('Events'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Events List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Event'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="events view">
<h2><?php //  echo __('Event'); ?></h2>
	<dl>
<!--		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Event Name'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Description'); ?></dt>
		<dd>
			<?php echo ($event['Event']['event_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Date'); ?></dt>
		<dd>
			<?php echo h($event['Event']['event_date']); ?>
			&nbsp;
		</dd>
			<dt><?php echo __('Event Image Name'); ?></dt>
		<dd>
			<img src="<?php echo ($event['Event']['event_thumbnail']);?>" height="100px">
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>
