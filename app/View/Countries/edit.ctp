<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View Country'), array('action' => 'view', $this->Form->value('Country.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $this->Form->value('Country.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Country.country_name'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks','action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Country'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'userSubscriptions','action' => 'index')); ?></li>
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
<div class="countries form">
    <?php echo $this->Form->create('Country'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('country_name');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
