<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','LeftMenuActions');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
       <li><?php echo $this->Html->link(__('User'),  array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller'=> 'countries', 'action' => 'index')); ?></li>
        <li class='active'><?php echo $this->Html->link(__('Subscription'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Subscription List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Subscription'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="userSubscriptions form">
<?php echo $this->Form->create('UserSubscription'); ?>
	<fieldset>
	<?php
            $status1=array('Yes'=>'Yes','No'=>'No');
		echo $this->Form->input('user_email',array('label'=>'Email'));
		echo $this->Form->input('subscription_status',array('options'=>$status1,'default'=>'Yes','label'=>'Status'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>