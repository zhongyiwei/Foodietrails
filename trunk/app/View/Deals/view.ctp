<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftDeal', 'LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Deal'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Deal List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Deal'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();
$this->start('manageRightContent');
?>
<div class="deals view">
    <dl>
        <dt><?php echo __('Content'); ?></dt>
        <dd>
            <?php echo ($deal['Deal']['content']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Publish Status'); ?></dt>
        <dd>
            <?php echo h($deal['Deal']['publish_status']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>