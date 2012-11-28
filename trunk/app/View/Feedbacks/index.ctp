<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', 'LeftMenuActions');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
	<ul>
		<li><?php echo $this->Html->link(__('User'),  array('controller' => 'Users', 'action' => 'index')); ?></li>
                <li  class='active '><?php echo $this->Html->link(__('Feedback'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Country'), array('controller' => 'Countries','action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'UserSubscriptions','action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Feedback List'), array('action' => 'index')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="products index">
	<table cellpadding="0" cellspacing="0" id="js-datatable">
	<thead>
	<tr>
		<!--<th>Page ID</th>-->
		<th>Full Name</th>		
        <th>Description</th>
		<th>Status</th>
		<th>Type</th>
        <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
            <?php foreach ($feedbacks as $feedback): ?>
               <tr>
                    <!--<td><?php echo h($feedback['Feedback']['id']); ?>&nbsp;</td>-->
                    <!--<td><?php echo h($feedback['Feedback']['page_id']); ?>&nbsp;</td>--> 
					<td><?php echo h($feedback['Feedback']['first_name']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate(h($feedback['Feedback']['feedback_description']),20,array('ellipsis'=>'...')); ?>&nbsp;</td>
					<td><?php echo h($feedback['Feedback']['feedback_status']); ?>&nbsp;</td>
					<td><?php echo h($feedback['Feedback']['feedback_type']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $feedback['Feedback']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feedback['Feedback']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s feedback?',$feedback['Feedback']['first_name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
			</tbody>
    </table>
    <p>
        <?php
//        echo $this->Paginator->counter(array(
//            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//        ));
        ?>	</p>

<!--    <div class="paging">
        <?php
   //     echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
   //     echo $this->Paginator->numbers(array('separator' => ''));
   //     echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>-->
</div>
<?php $this->end(); ?>
