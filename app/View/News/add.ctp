<?php
$this->extend('/Common/AdminAdd');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', 'LeftMenuActions');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('News'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('News List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add News'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="news form">
    <?php echo $this->Form->create('News'); ?>
    <fieldset>
        <?php
        $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
        echo $this->Form->input('news_title');
        echo $this->Form->input('news_description', array('id' => 'news_description', 'news' => 'ckeditor'));
        echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private'));
        //echo $this->Form->input('User');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'news_description',{
        filebrowserBrowseUrl : '<?php echo $pathForFinder ?>/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>
<?php $this->end(); ?>





<!--div class="news form">
<?php echo $this->Form->create('News'); ?>
        <fieldset>
                <legend><?php echo __('Add News'); ?></legend>
<?php
echo $this->Form->input('news_title');
echo $this->Form->input('news_description');
echo $this->Form->input('User');
?>
        </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>

                <li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        </ul>
</div-->
