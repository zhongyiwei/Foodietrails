<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
 <ul>
        <li class='active '><?php echo $this->Html->link(__('Events'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Events Images'), array('controller' => 'eventimages', 'action' => 'index')); ?></li>
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
		echo $this->Form->input('event_description', array('id' => 'cooking_class_description', 'class' => 'ckeditor'));
		echo $this->Form->input('event_date');
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
</script>
<?php $this->end(); ?>
