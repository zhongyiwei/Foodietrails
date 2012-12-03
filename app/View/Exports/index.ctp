<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftExport', 'LeftMenuActions');
$this->start('manageRightMenu');
?>
<?php
$this->end();

$this->start('manageRightContent');
?>
<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Tour Orders List for Current & Future Tours: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportTour", 'type' => 'post')); ?>
        <td style="width:280px">Please select Tour Dates: </td>
        <td style="width:280px"><?php echo $this->Form->input('tour_date_id', array('type' => 'select', 'options' => $tourDates, 'label' => false)); ?></td>
        <td><?php
        $options = array(
            'label' => 'Export',
            'div' => array(
                'class' => 'export',
            )
        );
        echo $this->Form->end($options);
        ?></td>
    </tr>
</table>

<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Tour Orders List for Previous Tours: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportTour", 'type' => 'post')); ?>
        <td style="width:280px">Please select Tour Dates: </td>
        <td style="width:280px"><?php echo $this->Form->input('tour_date_id', array('type' => 'select', 'options' => $tourDatesPre, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>

<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Cooking Class Orders List for Current & Future Cooking Classes: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportCookingClass", 'type' => 'post')); ?>
        <td style="width:280px">Please select Cooking Class Dates: </td>
        <td style="width:280px"><?php echo $this->Form->input('cookingclass_date_id', array('type' => 'select', 'options' => $cookingClassDates, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>

<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Cooking Class Orders List for Previous Classes: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportCookingClass", 'type' => 'post')); ?>
        <td style="width:280px">Please select Cooking Class Dates: </td>
        <td style="width:280px"><?php echo $this->Form->input('cookingclass_date_id', array('type' => 'select', 'options' => $cookingClassDatesPre, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>
<hr style="    width: 800px;     margin: 50px 0px;     ">
<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Products based on a period: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportProduct", 'type' => 'post')); ?>
        <td style="width:280px">Please select the Period: <br/><span class="reminder">Reminder: Begin Date should be smaller than End Date</span></td>
        <td style="width:280px">Begin Date:
            <?php
            echo $this->Form->input('beginDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?><br/>
            End Date:
            <?php
            echo $this->Form->input('endDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?>
            <?php // echo $this->Form->input('cookingclass_date_id', array('type' => 'select', 'options' => $cookingClassDatesPre, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>

<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Gift Voucher based on a period: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportGiftVoucher", 'type' => 'post')); ?>
        <td style="width:280px">Please select the Period: <br/><span class="reminder">Reminder: Begin Date should be smaller than End Date</span></td>
        <td style="width:280px">Begin Date:
            <?php
            echo $this->Form->input('beginDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?><br/>
            End Date:
            <?php
            echo $this->Form->input('endDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?>
            <?php // echo $this->Form->input('cookingclass_date_id', array('type' => 'select', 'options' => $cookingClassDatesPre, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>

<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Tour based on a period: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportTourPeriod", 'type' => 'post')); ?>
        <td style="width:280px">Please select the Period: <br/><span class="reminder">Reminder: Begin Date should be smaller than End Date</span></td>
        <td style="width:280px">Begin Date:
            <?php
            echo $this->Form->input('beginDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?><br/>
            End Date:
            <?php
            echo $this->Form->input('endDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?>
            <?php // echo $this->Form->input('cookingclass_date_id', array('type' => 'select', 'options' => $cookingClassDatesPre, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>

<table width="200" border="1" class="exportTable">
    <tr>
        <td colspan="3" class="exportTitle">Cooking Class based on a period: </td>
    </tr>
    <tr>
        <?php echo $this->Form->create('exports', array('action' => "exportCKPeriod", 'type' => 'post')); ?>
        <td style="width:280px">Please select the Period: <br/><span class="reminder">Reminder: Begin Date should be smaller than End Date</span></td>
        <td style="width:280px">Begin Date:
            <?php
            echo $this->Form->input('beginDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?><br/>
            End Date:
            <?php
            echo $this->Form->input('endDate', array('label' => false
                , 'dateFormat' => 'DMY'
                , 'minYear' => date('Y') - 15
                , 'maxYear' => date('Y') + 3, 'type' => 'date'));
            ?>
            <?php // echo $this->Form->input('cookingclass_date_id', array('type' => 'select', 'options' => $cookingClassDatesPre, 'label' => false)); ?></td>
        <td><?php echo $this->Form->end($options); ?></td>
    </tr>
</table>
<?php $this->end(); ?>