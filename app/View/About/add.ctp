<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftFAQ', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
		<li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerForms', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('About Foodie Trails'), array('action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('About Foodie Trails List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Details About'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="about form">
    <?php echo $this->Form->create('About'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('about_description', array('id' => 'about_description', 'class' => 'ckeditor'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'about_description',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder?>/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
</script>
<?php $this->end(); ?>