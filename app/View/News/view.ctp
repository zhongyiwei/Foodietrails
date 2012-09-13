<div class="news view">
<h2><?php  echo __('News'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['News']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('News Title'); ?></dt>
		<dd>
			<?php echo h($news['News']['news_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('News Description'); ?></dt>
		<dd>
			<?php echo h($news['News']['news_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit News'), array('action' => 'edit', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete News'), array('action' => 'delete', $news['News']['id']), null, __('Are you sure you want to delete # %s?', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($news['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Role'); ?></th>
		<th><?php echo __('User First Name'); ?></th>
		<th><?php echo __('User Surname'); ?></th>
		<th><?php echo __('User Contacts'); ?></th>
		<th><?php echo __('User Email'); ?></th>
		<th><?php echo __('User Password'); ?></th>
		<th><?php echo __('User Address'); ?></th>
		<th><?php echo __('User Dietary Requirement'); ?></th>
		<th><?php echo __('User Spl Assistance'); ?></th>
		<th><?php echo __('User Referee'); ?></th>
		<th><?php echo __('User Postcode'); ?></th>
		<th><?php echo __('User State'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($news['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['user_role']; ?></td>
			<td><?php echo $user['user_first_name']; ?></td>
			<td><?php echo $user['user_surname']; ?></td>
			<td><?php echo $user['user_contacts']; ?></td>
			<td><?php echo $user['user_email']; ?></td>
			<td><?php echo $user['user_password']; ?></td>
			<td><?php echo $user['user_address']; ?></td>
			<td><?php echo $user['user_dietary_requirement']; ?></td>
			<td><?php echo $user['user_spl_assistance']; ?></td>
			<td><?php echo $user['user_referee']; ?></td>
			<td><?php echo $user['user_postcode']; ?></td>
			<td><?php echo $user['user_state']; ?></td>
			<td><?php echo $user['country_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['y'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['y'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['y']), null, __('Are you sure you want to delete # %s?', $user['y'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
