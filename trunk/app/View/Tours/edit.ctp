<?php
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
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
        <li class='active '><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour List'), array('controller' => 'tours', 'action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour'), array('controller' => 'tours', 'action' => 'add')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Tour Type List'), array('controller' => 'tourtypes', 'action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Type'), array('controller' => 'tourtypes', 'action' => 'add')); ?></div>
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
//        $tourType = array('Private' => 'Private Tours', 'Public' => 'Public Tours', 'International' => 'International Tours');
        $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
        echo $this->Form->input('id');
        echo $this->Form->input('tour_name',array('label'=>'Name'));
        echo $this->Form->input('tour_description', array('id' => 'tour_description', 'class' => 'ckeditor','label'=>'Description'));
        echo $this->Form->input('tour_vendor_name',array('label'=>'Vendor Name'));
//        echo $this->Form->input('tour_price_per_certificate');
        echo $this->Form->input('tour_long_description', array('label'=>'Long Description'));
        echo $this->Form->input('tour_notes', array('label'=>'Notes'));
        echo $this->Form->input('tour_paricipant_guidlines',array('label'=>'Participant Guidlines'));
        echo $this->Form->input('tour_location',array('label'=>'Location'));
        echo $this->Form->input('tour_duration',array('label'=>'Duration'));
        echo $this->Form->input('tour_weather',array('label'=>'Weather'));
        echo $this->Form->input('tour_spectator',array('label'=>'Spectator'));
        echo $this->Form->input('tour_max_num_on_day',array('label'=>'Max No. On Day'));
        echo $this->Form->input('tour_email_notification',array('label'=>'Email Notification'));
        echo $this->Form->input('contactInfo');
        echo $this->Form->input('tour_type_id', array('options' => $tourType, 'default' => 'Public'));
        echo $this->Form->input('tour_thumbnail', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
        echo $this->Form->button('Browse Server', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:5px;margin-top:-55px; margin-left:530px'));
        echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'tour_description',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder ?>/js/ckfinder/ckfinder.html',
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
