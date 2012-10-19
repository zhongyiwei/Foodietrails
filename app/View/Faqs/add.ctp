<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
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
    <div class="unselected"><?php echo $this->Html->link(__('FAQS List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add FAQs'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="Faqs form">
<?php echo $this->Form->create('Faq'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('faq_description', array('id' => 'faq_description', 'class' => 'ckeditor'));
		echo $this->Form->input('faq_status');
                echo $this->Form->input('user_id');
		
       	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'faq_description',{
        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
   CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
   function BrowseServer()
    {
        var finder = new CKFinder();
        finder.basePath = '../';	
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField( fileUrl )
    {
        document.getElementById( 'xFilePath' ).value = fileUrl;
    }
</script>
<?php $this->end(); ?>


