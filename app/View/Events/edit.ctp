<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct','');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','LeftMenuActions');
$this->assign('LeftFaq','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Event'), array('action' => 'view', $this->Form->value('Event.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Event'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.tour_name'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
 <div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Events'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Events List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Event'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_name');
		echo $this->Form->input('event_description', array('id' => 'event_description', 'class' => 'ckeditor'));
		echo $this->Form->input('event_date');
		echo $this->Form->input('event_thumbnail', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
        echo $this->Form->button('Browse Server', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:5px;margin-top:-55px; margin-left:530px;float:left'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'event_description',{
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
