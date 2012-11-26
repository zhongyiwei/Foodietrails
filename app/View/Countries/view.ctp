<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), null, __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks','action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Country'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'UserSubscriptions','action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Country List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Country'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="countries view">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
<?php echo h($country['Country']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Country Name'); ?></dt>
        <dd>
<?php echo h($country['Country']['country_name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>