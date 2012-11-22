<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Image'), array('action' => 'view', $this->Form->value('HomepageImage.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Image'), array('action' => 'delete', $this->Form->value('HomepageImages.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('HomepageImage.id'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homepageimages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepagelists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutuspages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Home Page Image List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Home Page Image'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="homepageImages form">
    <?php echo $this->Form->create('HomepageImage'); ?>
    <?php
    $statusType = array('Show' => 'Show', 'Hide' => 'Hide');

    echo $this->Form->input('image_name', array('label' => 'Upload your Image', 'id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
    echo $this->Form->button('Browse Server', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:5px;margin-top:-55px; margin-left:530px;float:left'));
    echo $this->Form->input('publish_status', array('options' => $statusType));
    echo $this->Form->input('image_description');
    ?>
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