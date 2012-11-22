<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','LeftMenuActions');
$this->assign('LeftFaq','');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Events'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Events List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Event'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="events index">
	<table cellpadding="0" cellspacing="0" id="js-datatable">
	<thead>
	<tr>
			<!--<th>ID</th>-->
			<th>Event Name</th>
			<th>Event Description</th>
			<th>Event Date</th>
			<!--<th>event_thumbnail</th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($events as $event): ?>
	<tr>
		<!--<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($event['Event']['event_name']); ?>&nbsp;</td>
		<td><?php echo  $this->Text->truncate($event['Event']['event_description'],20,array('ellipsis'=>'...')); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['event_date']); ?>&nbsp;</td>
		<!--<td><?php echo h($event['Event']['event_thumbnail']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['event_name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
	</table>
</div>
<?php $this->end(); ?>