<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit Feedback'), array('action' => 'edit', $feedback['Feedback']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?> </li>
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
    <div class="unselected"><?php echo $this->Html->link(__('Feedback List'), array('action' => 'index')); ?></div>
  
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="Feedback view">
<!--<h2><?php  echo __('User'); ?></h2>-->
	<dl>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page Id'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['page_id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Full Name'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['full_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['feedback_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['feedback_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['feedback_type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>

<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
</div>
<div class="related">
	<h3><?php echo __('Related Cookingclass Orders'); ?></h3>
	<?php if (!empty($user['CookingclassOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cooking Class Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cooking Class Order Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['CookingclassOrder'] as $cookingclassOrder): ?>
		<tr>
			<td><?php echo $cookingclassOrder['id']; ?></td>
			<td><?php echo $cookingclassOrder['cooking_class_id']; ?></td>
			<td><?php echo $cookingclassOrder['user_id']; ?></td>
			<td><?php echo $cookingclassOrder['cooking_class_order_quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cookingclass_orders', 'action' => 'view', $cookingclassOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cookingclass_orders', 'action' => 'edit', $cookingclassOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cookingclass_orders', 'action' => 'delete', $cookingclassOrder['id']), null, __('Are you sure you want to delete # %s?', $cookingclassOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cookingclass Order'), array('controller' => 'cookingclass_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Faqs'); ?></h3>
	<?php if (!empty($user['Faq'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Faq Description'); ?></th>
		<th><?php echo __('Faq Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Faq'] as $faq): ?>
		<tr>
			<td><?php echo $faq['id']; ?></td>
			<td><?php echo $faq['user_id']; ?></td>
			<td><?php echo $faq['faq_description']; ?></td>
			<td><?php echo $faq['faq_status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'faqs', 'action' => 'view', $faq['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'faqs', 'action' => 'edit', $faq['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'faqs', 'action' => 'delete', $faq['id']), null, __('Are you sure you want to delete # %s?', $faq['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Faq'), array('controller' => 'faqs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Feedbacks'); ?></h3>
	<?php if (!empty($user['Feedback'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tour Id'); ?></th>
		<th><?php echo __('Feedback Description'); ?></th>
		<th><?php echo __('Feedback Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Feedback'] as $feedback): ?>
		<tr>
			<td><?php echo $feedback['id']; ?></td>
			<td><?php echo $feedback['user_id']; ?></td>
			<td><?php echo $feedback['tour_id']; ?></td>
			<td><?php echo $feedback['feedback_description']; ?></td>
			<td><?php echo $feedback['feedback_status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'feedbacks', 'action' => 'view', $feedback['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'feedbacks', 'action' => 'edit', $feedback['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'feedbacks', 'action' => 'delete', $feedback['id']), null, __('Are you sure you want to delete # %s?', $feedback['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gift Vouchers'); ?></h3>
	<?php if (!empty($user['GiftVoucher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Gift Message'); ?></th>
		<th><?php echo __('Gift Recipient Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GiftVoucher'] as $giftVoucher): ?>
		<tr>
			<td><?php echo $giftVoucher['id']; ?></td>
			<td><?php echo $giftVoucher['user_id']; ?></td>
			<td><?php echo $giftVoucher['gift_message']; ?></td>
			<td><?php echo $giftVoucher['gift_recipient_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gift_vouchers', 'action' => 'view', $giftVoucher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gift_vouchers', 'action' => 'edit', $giftVoucher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gift_vouchers', 'action' => 'delete', $giftVoucher['id']), null, __('Are you sure you want to delete # %s?', $giftVoucher['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gift Voucher'), array('controller' => 'gift_vouchers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Product Orders'); ?></h3>
	<?php if (!empty($user['ProductOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Product Purchase Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ProductOrder'] as $productOrder): ?>
		<tr>
			<td><?php echo $productOrder['id']; ?></td>
			<td><?php echo $productOrder['product_id']; ?></td>
			<td><?php echo $productOrder['user_id']; ?></td>
			<td><?php echo $productOrder['product_purchase_quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'product_orders', 'action' => 'view', $productOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'product_orders', 'action' => 'edit', $productOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'product_orders', 'action' => 'delete', $productOrder['id']), null, __('Are you sure you want to delete # %s?', $productOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Order'), array('controller' => 'product_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tour Orders'); ?></h3>
	<?php if (!empty($user['TourOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tour Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tour Purchase Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['TourOrder'] as $tourOrder): ?>
		<tr>
			<td><?php echo $tourOrder['id']; ?></td>
			<td><?php echo $tourOrder['tour_id']; ?></td>
			<td><?php echo $tourOrder['user_id']; ?></td>
			<td><?php echo $tourOrder['tour_purchase_quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tour_orders', 'action' => 'view', $tourOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tour_orders', 'action' => 'edit', $tourOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tour_orders', 'action' => 'delete', $tourOrder['id']), null, __('Are you sure you want to delete # %s?', $tourOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tour Order'), array('controller' => 'tour_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($user['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Name'); ?></th>
		<th><?php echo __('Event Description'); ?></th>
		<th><?php echo __('Event Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['event_name']; ?></td>
			<td><?php echo $event['event_description']; ?></td>
			<td><?php echo $event['event_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related News'); ?></h3>
	<?php if (!empty($user['News'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('News Title'); ?></th>
		<th><?php echo __('News Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['News'] as $news): ?>
		<tr>
			<td><?php echo $news['id']; ?></td>
			<td><?php echo $news['news_title']; ?></td>
			<td><?php echo $news['news_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'news', 'action' => 'view', $news['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'news', 'action' => 'edit', $news['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'news', 'action' => 'delete', $news['id']), null, __('Are you sure you want to delete # %s?', $news['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div> -->
