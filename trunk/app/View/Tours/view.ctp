<div class="tours view">
<h2><?php  echo __('Tour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Name'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Description'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Vendor Name'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_vendor_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Price Per Certificae'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_price_per_certificae']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Long Description'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_long_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Notes'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Paricipant Guidlines'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_paricipant_guidlines']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Location'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Duration'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Weather'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_weather']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Spectator'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_spectator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Max Num On Day'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_max_num_on_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Price Per Certificate'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_price_per_certificate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Type'); ?></dt>
		<dd>
			<?php echo h($tour['Tour']['tour_type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tour'), array('action' => 'edit', $tour['Tour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tour'), array('action' => 'delete', $tour['Tour']['id']), null, __('Are you sure you want to delete # %s?', $tour['Tour']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Giftvouchers'), array('controller' => 'tour_giftvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Giftvoucher'), array('controller' => 'tour_giftvouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Images'), array('controller' => 'tour_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Image'), array('controller' => 'tour_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tour Orders'), array('controller' => 'tour_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tour Order'), array('controller' => 'tour_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dates'), array('controller' => 'dates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Date'), array('controller' => 'dates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Feedbacks'); ?></h3>
	<?php if (!empty($tour['Feedback'])): ?>
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
		foreach ($tour['Feedback'] as $feedback): ?>
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
	<h3><?php echo __('Related Tour Giftvouchers'); ?></h3>
	<?php if (!empty($tour['TourGiftvoucher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tour Id'); ?></th>
		<th><?php echo __('Gift Voucher Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tour['TourGiftvoucher'] as $tourGiftvoucher): ?>
		<tr>
			<td><?php echo $tourGiftvoucher['id']; ?></td>
			<td><?php echo $tourGiftvoucher['tour_id']; ?></td>
			<td><?php echo $tourGiftvoucher['gift_voucher_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tour_giftvouchers', 'action' => 'view', $tourGiftvoucher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tour_giftvouchers', 'action' => 'edit', $tourGiftvoucher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tour_giftvouchers', 'action' => 'delete', $tourGiftvoucher['id']), null, __('Are you sure you want to delete # %s?', $tourGiftvoucher['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tour Giftvoucher'), array('controller' => 'tour_giftvouchers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tour Images'); ?></h3>
	<?php if (!empty($tour['TourImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tour Id'); ?></th>
		<th><?php echo __('Tour Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tour['TourImage'] as $tourImage): ?>
		<tr>
			<td><?php echo $tourImage['id']; ?></td>
			<td><?php echo $tourImage['tour_id']; ?></td>
			<td><?php echo $tourImage['tour_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tour_images', 'action' => 'view', $tourImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tour_images', 'action' => 'edit', $tourImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tour_images', 'action' => 'delete', $tourImage['id']), null, __('Are you sure you want to delete # %s?', $tourImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tour Image'), array('controller' => 'tour_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tour Orders'); ?></h3>
	<?php if (!empty($tour['TourOrder'])): ?>
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
		foreach ($tour['TourOrder'] as $tourOrder): ?>
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
	<h3><?php echo __('Related Dates'); ?></h3>
	<?php if (!empty($tour['Date'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tour['Date'] as $date): ?>
		<tr>
			<td><?php echo $date['id']; ?></td>
			<td><?php echo $date['date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'dates', 'action' => 'view', $date['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'dates', 'action' => 'edit', $date['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dates', 'action' => 'delete', $date['id']), null, __('Are you sure you want to delete # %s?', $date['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Date'), array('controller' => 'dates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
