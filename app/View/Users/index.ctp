<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct','');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('User'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('User List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="users index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_role','Role'); ?></th>
			<th><?php echo $this->Paginator->sort('user_first_name', 'First Name'); ?></th>
			<th><?php echo $this->Paginator->sort('user_surname','Surname'); ?></th>
			<th><?php echo $this->Paginator->sort('user_contacts', 'Contact No'); ?></th>
			<th><?php echo $this->Paginator->sort('user_email', 'Email'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('user_password'); ?></th> -->
			<th><?php echo $this->Paginator->sort('user_address','Address'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('user_dietary_requirement'); ?></th>
			<th><?php echo $this->Paginator->sort('user_spl_assistance'); ?></th>
			<th><?php echo $this->Paginator->sort('user_referee'); ?></th> -->
			<th><?php echo $this->Paginator->sort('user_postcode','Postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('user_state','State'); ?></th>
			<!-- <th><?php echo $this->Paginator->sort('country_id'); ?></th> -->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_first_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_surname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_contacts']); ?>&nbsp;</td>
		<td><?php echo $this->Text->truncate(h($user['User']['user_email']),10,array('ellipsis'=>'...')); ?>&nbsp;</td>
		<!-- <td><?php echo h($user['User']['user_password']); ?>&nbsp;</td> -->
		<td><?php echo $this->Text->truncate(h($user['User']['user_address']),10,array('ellipsis'=>'...')); ?>&nbsp;</td>
		<!-- <td><?php echo h($user['User']['user_dietary_requirement']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_spl_assistance']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_referee']); ?>&nbsp;</td> -->
		<td><?php echo h($user['User']['user_postcode']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_state']); ?>&nbsp;</td>
		<!-- <td>
			<?php echo $this->Html->link($user['Country']['id'], array('controller' => 'countries', 'action' => 'view', $user['Country']['id'])); ?>
		</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['user_first_name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<?php $this->end(); ?>

<--- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cookingclass Orders'), array('controller' => 'cookingclass_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cookingclass Order'), array('controller' => 'cookingclass_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faqs'), array('controller' => 'faqs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faq'), array('controller' => 'faqs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Vouchers'), array('controller' => 'gift_vouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Voucher'), array('controller' => 'gift_vouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Orders'), array('controller' => 'product_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Order'), array('controller' => 'product_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('controller' => 'tour_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Order'), array('controller' => 'tour_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List News'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
	</ul>
</div> --->
