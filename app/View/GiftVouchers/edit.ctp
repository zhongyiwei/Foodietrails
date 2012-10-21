<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Voucher'), array('action' => 'view', $this->Form->value('GiftVoucher.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Voucher'), array('action' => 'delete', $this->Form->value('GiftVoucher.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GiftVoucher.id'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Gift Vourcher List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Gift Vourcher'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="giftVoucher form">
    <?php echo $this->Form->create('GiftVoucher'); ?>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('user_id', array('style' => 'display:none', 'label' => false));
    echo $this->Form->input('gift_message', array('id' => 'gift_message', 'class' => 'ckeditor'));
    echo $this->Form->input('gift_recipient_name');
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'gift_message',{
        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>
<?php $this->end(); ?>
