<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct','LeftMenuActions');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Cooking Class'), array('action' => 'view', $this->Form->value('Cooking_class.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Cooking Class'), array('action' => 'delete', $this->Form->value('Cooking_class.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cooking_class.cooking_class_name'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Class List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclasses form">
<?php echo $this->Form->create('Cookingclass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cookingclass'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cooking_class_name');
		echo $this->Form->input('cooking_class_description');
		echo $this->Form->input('cooking_class_price');
		echo $this->Form->input('cooking_class_location');
		echo $this->Form->input('cooking_class_thumbnail', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
        echo $this->Form->button('Browse Server', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:5px;margin-top:-55px; margin-left:530px'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'tour_description',{
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