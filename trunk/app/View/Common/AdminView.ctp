<?php
echo $this->Html->css('admin');
?>
<table width="auto" border="1">
    <tr>
        <td rowspan="2">
            <div class="actions">
                <h3><?php echo __('Menu'); ?></h3>
                <ul>
                    <li class="<?php echo $this->fetch('LeftProduct'); ?>"><?php echo $this->Html->link(__('Product Management'), array('controller' => 'tours','action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftCustomer'); ?>"><?php echo $this->Html->link(__('User Management'), array('controller' => 'users', 'action' => 'index')); ?></li>
                    <!--<li><?php echo $this->Html->link(__('Report Management'), array('controller' => 'reports', 'action' => 'index')); ?></li>-->
                    <li class="<?php echo $this->fetch('LeftNews'); ?>"><?php echo $this->Html->link(__('News Management'), array('controller' => 'news', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->fetch('LeftEvent'); ?>"><?php echo $this->Html->link(__('Events Management'), array('controller' => 'events', 'action' => 'index')); ?></li>  
                    <hr class="MenuSeparator"/>
                    <?php echo $this->fetch('LeftEditMenu'); ?>					
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
            <?php echo $this->fetch('manageRightContent'); ?>
        </td>
    </tr>
</table>