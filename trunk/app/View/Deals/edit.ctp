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
<div class="deals form">
    <?php echo $this->Form->create('Deal'); ?>
        <?php
        echo $this->Form->input('id');
        $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
        echo $this->Form->input('content', array('id' => 'content', 'class' => 'ckeditor'));
        echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private'));
        ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'content',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder ?>/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>
<?php $this->end(); ?>
