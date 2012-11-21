<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct','');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->assign('LeftFaq','LeftMenuActions');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this FAQ'), array('action' => 'view', $this->Form->value('Faq.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this FAQ'), array('action' => 'delete', $this->Form->value('Faq.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Faq.faq_description'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
 <div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Faqs'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('FAQs List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add FAQs'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="faqs form">
<?php echo $this->Form->create('Faq'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('question');
		echo $this->Form->input('answer');
		$status = array('Show'=>'Show','Hide'=>'Hide');
		echo $this->Form->input('faq_status',array('options'=>$status,'default'=>'Hide'));
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
    //the textarea id is given here to override the editor uploader with ckfinder.
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


