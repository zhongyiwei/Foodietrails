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
<li><?php echo $this->Html->link(__('View this Date'), array('action' => 'view', $this->Form->value('TourDate.id'))); ?></li>
<li><?php echo $this->Form->postLink(__('Delete this Date'), array('action' => 'delete', $this->Form->value('TourDate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TourDate.tour_date'))); ?></li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourDates', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassDates', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Date'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourDates form">
     <script>
  //  $(function() {
  //      $( "#datepicker" ).datepicker({
   //         	dateFormat : 'dd/mm/yy', altFormat : 'yy-mm-dd' 

  //      });
   // });
    </script>
    
    
    <?php echo $this->Form->create('TourDate'); ?>

    <?php
  //  echo $this->Html->css('jquery-ui');

     //       echo $this->Html->script(array('jquery-1.8.2' , 'jquery-ui'));
            
    $progressStatus = array('Incomplete' => 'Incomplete', 'Completed' => 'Completed');
    echo $this->Form->input('tour_id', array('type' => 'select', 'options' => $tourName));
    // debug($tours);
   // echo $this -> Form -> input('tour_date', array('id' => 'datepicker' ,'class' => 'datepicker', 'type' => 'text', 'empty' => false, 'label' => array('text' => 'Tour Date'), 'style' => 'align:left','label'=>'Date'));
echo $this -> Form -> input('tour_date');
   // echo $this->Form->input('tour_date');
    echo $this->Form->input('tour_time',array('label'=>'Time'));
    echo $this->Form->input('tour_price_per_certificate',array('label'=>'Price'));
    echo $this->Form->input('tour_progress', array('type' => 'select', 'options' => $progressStatus,'label'=>'Progress'));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
