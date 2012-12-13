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
        <li class='active '><?php echo $this->Html->link(__('User'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'countries', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'userSubscriptions', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('User List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></div>
        <div class="unselected"><?php echo $this->Html->link(__('Download User Details'), array('action' => '/export/User_Details_On_' . date("Ymd") . '.csv')); ?>

</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="users form">
    <?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
                $roleType=array('Admin'=>'Administrator','Customer'=>'Customer');
		echo $this->Form->input('user_role',array('options'=>$roleType,'default'=>'User','label'=>'Role'));
		echo $this->Form->input('user_first_name',array('label'=>'First Name'));
		echo $this->Form->input('user_surname',array('label'=>'Surame'));
		echo $this->Form->input('user_contacts',array('label'=>'Contact No'));
		echo $this->Form->input('user_email',array('label'=>'Email'));
		echo $this->Form->input('user_password',array('type'=>'password','label'=>'Password'));
		echo $this->Form->input('user_address',array('label'=>'Address'));
                echo $this->Form->input('country_id', array('type'=>'select','options'=>$countries));
		echo $this->Form->input('user_dietary_requirement',array('label'=>'Dietary Requirements'));
		echo $this->Form->input('user_spl_assistance',array('label'=>'Special Assistance'));
		echo $this->Form->input('user_referee',array('label'=>'Referee'));
//		echo $this->Form->input('user_postcode');
//		echo $this->Form->input('user_state');
		
//                                    echo $this->Form->checkbox('user_emailsubscription', array( 'value' => 'Yes' )); 
//		echo $this->Form->input('Event');
//		echo $this->Form->input('News');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>