<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'Users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'Feedbacks', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'Countries','action' => 'index')); ?></li>
        <li class='active'><?php echo $this->Html->link(__('Subscription'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Subscription List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Subscription'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="userSubscriptions index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>email</th>	
                <th>status</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($userSubscriptions as $userSubscription): ?>
	<tr>
		<!--<td><?php echo h($userSubscription['UserSubscription']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($userSubscription['UserSubscription']['user_email']); ?>&nbsp;</td>
		<td><?php echo h($userSubscription['UserSubscription']['subscription_status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userSubscription['UserSubscription']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userSubscription['UserSubscription']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userSubscription['UserSubscription']['id']), null, __('Are you sure you want to delete # %s?', $userSubscription['UserSubscription']['user_email'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
        </tbody>
    </table>
    <p>
</div>
<?php $this->end(); ?>



