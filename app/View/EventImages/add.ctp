<?php
$this->extend('/Common/AdminAdd');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
 <ul>
        <li><?php echo $this->Html->link(__('Events'), array('controller' => 'events','action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Events Images'), array('action' => 'index')); ?></li>
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
<div class="eventImages form">
<?php echo $this->Form->create('EventImage'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('even_image_name', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
        echo $this->Form->button('Browse Server', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:5px;margin-top:-55px; margin-left:530px;float:left'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
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
