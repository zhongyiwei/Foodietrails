<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct','LeftMenuActions');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Tour'), array('action' => 'view', $this->Form->value('Tour.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Tour'), array('action' => 'delete', $this->Form->value('Tour.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tour.tour_name'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tours form">
    <?php echo $this->Form->create('Tour'); ?>
    <fieldset>
            <!--<legend><?php echo __('Edit Tour'); ?></legend>-->
        <?php
        $tourType = array('Private' => 'Private Tours', 'Public' => 'Public Tours', 'International' => 'International Tours');
        echo $this->Form->input('id');
        echo $this->Form->input('tour_name');
        echo $this->Form->input('tour_description', array('id' => 'tour_description', 'class' => 'ckeditor'));
        echo $this->Form->input('tour_vendor_name');
        echo $this->Form->input('tour_price_per_certificate');
        echo $this->Form->input('tour_long_description');
        echo $this->Form->input('tour_notes');
        echo $this->Form->input('tour_paricipant_guidlines');
        echo $this->Form->input('tour_location');
        echo $this->Form->input('tour_duration');
        echo $this->Form->input('tour_weather');
        echo $this->Form->input('tour_spectator');
        echo $this->Form->input('tour_max_num_on_day');
        echo $this->Form->input('tour_type',array('options'=>$tourType,'default'=>'Public'));
        echo $this->Form->input('tour_thumbnail', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
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
