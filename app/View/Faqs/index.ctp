<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->assign('LeftFaq','LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Faqs'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('FAQs List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add FAQs'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="faqs index">
	<table cellpadding="0" cellspacing="0" id="js-datatable">
	<thead>
	<tr>
				<th>Question</th>
				<th>Answer</th>
                <th>Status</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($faqs as $faq): ?>
	<tr>
		<!--<td><?php echo h($faq['Faq']['user_id']); ?>&nbsp;</td>-->
		<td><?php echo  $this->Text->truncate(h($faq['Faq']['question']),20,array('ellipsis'=>'...')); ?>&nbsp;</td>
		<td><?php echo  $this->Text->truncate(h($faq['Faq']['answer']),20,array('ellipsis'=>'...')); ?>&nbsp;</td>
		<td><?php echo h($faq['Faq']['faq_status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $faq['Faq']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $faq['Faq']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $faq['Faq']['id']), null, __('Are you sure you want to delete # %s?', $faq['Faq']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
	</table>
	<p>
	<?php
//	echo $this->Paginator->counter(array(
//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//	));
	?>	</p>

	<div class="paging">
	<?php
//		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
//		echo $this->Paginator->numbers(array('separator' => ''));
//		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php $this->end(); ?>
