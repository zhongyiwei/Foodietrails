<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View Feedback'), array('action' => 'view', $this->Form->value('Feedback.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $this->Form->value('Feedback.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Feedback.feedback_title'))); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Feedback'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'countries', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'userSubscriptions','action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Feedback List'), array('action' => 'index')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="Feedback form">
    <?php echo $this->Form->create('Feedback'); ?>
    <fieldset>
        <?php
        //echo $this->Form->input('page_id', $tours);
        echo $this->Form->input('first_name');
        echo $this->Form->input('feedback_description');
        $status = array('Show' => 'Show', 'Hide' => 'Hide');
        echo $this->Form->input('feedback_status', array('options' => $status, 'default' => 'Hide'));
        $types = array('Tour' => 'Tour', 'Cookingclass' => 'Cookingclass');
        //echo $this->Form->input('feedback_type',array('options'=>$types));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
