<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Gift Voucher List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Gift Voucher'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="giftVouchers form">
    <?php echo $this->Form->create('GiftVoucher'); ?>
    <?php
    $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
    $productType = array('Tour' => 'Tour', 'Cooking Class' => 'Cooking Class', 'Mixed' => 'Mixed');
    echo $this->Form->input('gift_voucher_name');
    ?>
    <div  style="margin-left:0px;">
        <span style="font-weight:bold">Email Message</span>
        <br/>
        <span class="reminder">Available Variable: {first_name}, {epxire_date},  {redeem_code}, {term_link}, {logo}
            <br/>Please use these variables to organize ur email message.
            <br/>The Email Font is Century Gothic, Please do not change the font in text editor if you want to keep the Century Gothic Font. 
        </span>
    </div>
    <?php
    echo $this->Form->input('gift_message', array('id' => 'gift_message', 'class' => 'ckeditor', 'label' => 'Email Message'));
    echo $this->Form->input('gift_price',array('label'=>'Price'));
    echo $this->Form->input('gift_type', array('type' => 'select', 'options' => $productType,'label'=>'Type'));
    echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private','label'=>'Status'));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'gift_message',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder ?>/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>
<?php $this->end(); ?>
