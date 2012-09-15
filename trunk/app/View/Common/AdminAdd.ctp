<?php
echo $this->Html->script('ckeditor/ckeditor');
echo $this->Html->script('ckfinder/ckfinder');
echo $this->Html->css('admin');
?>
<table width="auto" border="1">
    <tr>
        <td rowspan="2">
		            <div class="actions">
                <h3><?php echo __('Menu'); ?></h3>
                <ul>
                    <li class="LeftMenuActions"><?php echo $this->Html->link(__('Product Management'), array('action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('Customer Management'), array('controller' => 'users', 'action' => 'index')); ?></li>
                    <!--<li><?php echo $this->Html->link(__('Report Management'), array('controller' => 'reports', 'action' => 'index')); ?></li>-->
                    <li><?php echo $this->Html->link(__('News Management'), array('controller' => 'news', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('Events Management'), array('controller' => 'events', 'action' => 'index')); ?></li>  
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