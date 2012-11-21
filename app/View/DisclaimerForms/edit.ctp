<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Form'), array('action' => 'view', $this->Form->value('DisclaimerForm.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Form'), array('action' => 'delete', $this->Form->value('DisclaimerForm.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DisclaimerForm.id'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homepageimages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepagelists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutuspages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Disclaimer Form List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Disclaimer Form'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="disclaimerForms form">
    <?php echo $this->Form->create('DisclaimerForm'); ?>
    <fieldset>
        <?php
//		echo $this->Form->input('id');
        echo $this->Form->input('form_name', array('label' => 'Upload your Form', 'id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
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