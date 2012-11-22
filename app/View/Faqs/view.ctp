<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->assign('LeftFaq','LeftMenuActions');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This FAQ'), array('action' => 'edit', $faq['Faq']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This FAQ'), array('action' => 'delete', $faq['Faq']['id']), null, __('Are you sure you want to delete # %s?', $faq['Faq']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
   <ul>
        <li class='active '><?php echo $this->Html->link(__('FAQs'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('FAQs List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add FAQ'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="faqs view">
<h2></h2>
	<dl>
		<!--<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faq['User'][''], array('controller' => 'users', 'action' => 'view', $faq['User']['y'])); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($faq['Faq']['faq_status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>