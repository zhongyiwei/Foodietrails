<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct','LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Cooking Class'), array('action' => 'edit', $cookingclass['Cookingclass']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Cooking class'), array('action' => 'delete', $cookingclass['Cookingclass']['id']), null, __('Are you sure you want to delete # %s?', $cookingclass['Cookingclass']['cooking_class_name'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products','action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class'), array('action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>        
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Class List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclasses view">
<!--<h2><?php  echo __('Cookingclass'); ?></h2>-->
	<dl>
<!--		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($cookingclass['Cookingclass']['cooking_class_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_location']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Contact information'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['contactInfo']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Maxmium People on Day'); ?></dt>
		<dd>
			<?php echo h($cookingclass['Cookingclass']['cooking_class_max_num_on_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumbnail'); ?></dt>
        <dd>
            <img src="<?php echo ($cookingclass['Cookingclass']['cooking_class_thumbnail']);?>" height="100px">
            &nbsp;
        </dd>
	</dl>
</div>
<?php $this->end(); ?>