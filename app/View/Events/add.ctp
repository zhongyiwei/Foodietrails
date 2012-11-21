<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','LeftMenuActions');
$this->assign('LeftFaq','');
$this->assign('LeftWebsite', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
 <ul>
        <li class='active '><?php echo $this->Html->link(__('Event'), array('action' => 'index')); ?></li>
 </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Events List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Event'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
	<?php
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

