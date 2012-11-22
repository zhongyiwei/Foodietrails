<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','LeftMenuActions');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This News'), array('action' => 'edit', $news['News']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This News'), array('action' => 'delete', $news['News']['id']), null, __('Are you sure you want to delete # %s?', $news['News']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
   <ul>
        <li class="active"><?php echo $this->Html->link(__('News'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('News List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add News'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="news view">
	<dl>
<!--		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['News']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('News Title'); ?></dt>
		<dd>
			<?php echo h($news['News']['news_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('News Description'); ?></dt>
		<dd>
			<?php echo ($news['News']['news_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>


