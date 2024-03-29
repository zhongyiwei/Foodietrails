<?php
echo $this->Html->css('admin');
echo $this->Html->script('jquery.dataTables.min.js');
echo $this->Html->css('jquery.dataTables.css');
$this->assign('title', "Foodie Trails Admin Portal");
?>

<table width="auto" border="1">
    <tr>
        <td rowspan="2">
            <div class="actions">
                <h3><?php echo __('Menu'); ?></h3>
                <ul>
                    <li class="<?php echo $this->fetch('LeftProduct'); ?>"><?php echo $this->Html->link(__('Product Management'), array('controller' => 'tours', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftDate'); ?>"><?php echo $this->Html->link(__('Date Management'), array('controller' => 'tourDates', 'action' => 'index')); ?></li>

                    <li class="<?php echo $this->fetch('LeftOrder'); ?>"><?php echo $this->Html->link(__('Order Management'), array('controller' => 'tourOrders', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftCustomer'); ?>"><?php echo $this->Html->link(__('User Management'), array('controller' => 'users', 'action' => 'index')); ?></li>
                    <!--<li><?php echo $this->Html->link(__('Report Management'), array('controller' => 'reports', 'action' => 'index')); ?></li>-->
                    <li class="<?php echo $this->fetch('LeftNews'); ?>"><?php echo $this->Html->link(__('News Management'), array('controller' => 'news', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftEvent'); ?>"><?php echo $this->Html->link(__('Events Management'), array('controller' => 'events', 'action' => 'index')); ?></li>  
                    <li class="<?php echo $this->fetch('LeftFaq'); ?>"><?php echo $this->Html->link(__('FAQ Management'), array('controller' => 'Faqs', 'action' => 'index')); ?></li>  
                    <li class="<?php echo $this->fetch('LeftWebsite'); ?>"><?php echo $this->Html->link(__('Website Management'), array('controller' => 'disclaimerForms', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftDeal'); ?>"><?php echo $this->Html->link(__('Deal Management'), array('controller' => 'deals', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftExport'); ?>"><?php echo $this->Html->link(__('Export Management'), array('controller' => 'exports', 'action' => 'index')); ?></li>
                </ul>
            </div>
        </td>
        <td>   
            <div class="manageRightMenuAndSubMenu" >
                <?php echo $this->fetch('manageRightMenu'); ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="index"><?php echo $this->Session->flash(); ?></div>
            <div id="showTable"><?php echo $this->fetch('manageRightContent'); ?></div>
        </td>
    </tr>
</table>
<script>
    $(document).ready(function(){
            $('#js-datatable').dataTable( {
                "aaSorting": [[ 0, "desc" ]]
            } );
        document.getElementById('showTable').style.display = 'block';
    });
</script>