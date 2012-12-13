<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerForms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homePageImages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepageLists', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutusPages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
     <div class="selected"><?php echo $this->Html->link(__('About Us Overview'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add About Us Content'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();
$this->start('manageRightContent');
?>
<div class="aboutusPages form">
<?php echo $this->Form->create('AboutusPage'); ?>
	<?php
		echo $this->Form->input('content',array('id' => 'aboutUsContent', 'news' => 'ckeditor'));
	?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'aboutUsContent',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder?>/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
   CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>
<?php $this->end(); ?>