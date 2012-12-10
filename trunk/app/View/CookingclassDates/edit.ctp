  
<?php
            
$this->extend('/Common/AdminEdit');
$this->assign('LeftProduct', '');
$this->assign('LeftDate', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('View this Date'), array('action' => 'view', $this->Form->value('CookingclassDate.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Date'), array('action' => 'delete', $this->Form->value('CookingclassDate.id')), null, __('Are you sure you want to delete ', $this->Form->value('CookingclassDate.cooking_class_name'), '?')); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourdates', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassdates', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Cooking Class Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Class Date'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclassDates form">
        <script>
    $(function() {
        $( "#datepicker" ).datepicker({
            	dateFormat : 'dd/mm/yy', altFormat : 'yy-mm-dd' 

        });
    });
    </script>
    
    <?php echo $this->Form->create('CookingclassDate'); ?>

    <?php
    
            echo $this->Html->css('jquery-ui');

            echo $this->Html->script(array('jquery-1.8.2' , 'jquery-ui'));
            
    $progressStatus = array('Incomplete' => 'Incomplete', 'Completed' => 'Completed');
    echo $this->Form->input('cookingclass_id', array('type' => 'select', 'options' => $cookingclassName));
    //echo $this->Form->input('cookingclass_date');
    			echo $this -> Form -> input('cookingclass_date', array('id' => 'datepicker' ,'class' => 'datepicker', 'type' => 'text', 'empty' => false, 'label' => array('text' => 'Cooking Class Date'), 'style' => 'align:left','label'=>'Date'));
    echo $this->Form->input('cookingclass_time',array('label'=>'Time'));
    echo $this->Form->input('cooking_class_price',array('label'=>'Price'));
    echo $this->Form->input('cookingclass_progress', array('type' => 'select', 'options' => $progressStatus,'label'=>'Progress'));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>

