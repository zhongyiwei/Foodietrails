<?php
$this->extend('/Common/AdminAdd');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
     <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Classes List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Cooking Classes'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="Cooking Classes form">
    <?php echo $this->Form->create('Cookingclasses'); ?>
    <fieldset>
        <!--<legend><?php echo __('Add Cooking Class'); ?></legend>-->
		<?php
		echo $this->Form->input('cooking_class_name');
		echo $this->Form->input('cooking_class_description', array('id' => 'cooking_class_description', 'class' => 'ckeditor'));
		echo $this->Form->input('cooking_class_price');
		echo $this->Form->input('cooking_class_location');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'cooking_class_description',{
        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>
<?php $this->end(); ?>
