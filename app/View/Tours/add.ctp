<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
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
    <div class="selected"><?php echo $this->Html->link(__('Add Tour'), array('controller' => 'tours', 'action' => 'add')); ?></div>
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
        <!--<legend><?php echo __('Add Tour'); ?></legend>-->
        <?php
//        $tourType = array('Private' => 'Private Tours', 'Public' => 'Public Tours', 'International' => 'International Tours');
        $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
        echo $this->Form->input('tour_name');
        echo $this->Form->input('tour_description', array('id' => 'tour_description', 'class' => 'ckeditor'));
        echo $this->Form->input('tour_vendor_name');
        echo $this->Form->input('tour_price_per_certificate');
        echo $this->Form->input('tour_long_description');
        echo $this->Form->input('tour_notes');
        echo $this->Form->input('tour_paricipant_guidlines');
        echo $this->Form->input('tour_location');
        echo $this->Form->input('tour_duration');
        echo $this->Form->input('tour_weather', array('label' => 'Tour Weather (Desription of weather condition the tour can operate)'));
        echo $this->Form->input('tour_spectator');
        echo $this->Form->input('tour_max_num_on_day');
        echo $this->Form->input('tour_type_id', array('options' => $tourType));
        echo $this->Form->input('tour_thumbnail', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
        echo $this->Form->button('Browse Server', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:5px;margin-top:-55px; margin-left:530px;float:left'));
        echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private'));
//                    echo $this->Form->input('Date');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));
    ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'tour_description',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder ?>/js/ckfinder/ckfinder.html',
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
