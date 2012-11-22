<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct','');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->assign('LeftFaq','LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Faqs'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('FAQs List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add FAQs'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<?php echo $this->Form->create('Faq'); ?>
<fieldset>
    <?php
	$statusType = array('Show' => 'Show', 'Hide' => 'Hide');
		echo $this->Form->input('question', array('id' => 'question1', 'class' => 'ckeditor'));
		echo $this->Form->input('answer', array('id' => 'answer1', 'class' => 'ckeditor'));
		echo $this->Form->input('faq_status', array('options' => $statusType));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</fieldset>

<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'question1',{
	        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
	var ck_newsContent = CKEDITOR.replace( 'answer1',{
        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;

</script>
<?php $this->end(); ?>