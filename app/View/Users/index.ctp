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
        <li class='active '><?php echo $this->Html->link(__('User'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'Feedbacks', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Country'), array('controller' => 'Countries', 'action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('Subscription'), array('controller' => 'UserSubscriptions', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('User List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Download User Details'), array('action' => '/export')); ?>
    </div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="users index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                            <!--<th>ID</th>-->
                <th>Role</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Contact No</th>
                <th>Email</th>
                <!--<th>user_password</th> -->
                <th>Address</th>
                <!--<th>user_dietary_requirement</th>
                <th>user_spl_assistance</th>
                <th>user_referee</th> -->
<!--			<th>Postcode</th>
                <th>State</th>-->
                <!-- <th><?php echo $this->Paginator->sort('country_id'); ?></th> -->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                        <!--<td><?php echo h($user['User']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($user['User']['user_role']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['user_first_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['user_surname']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['user_contacts']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate(h($user['User']['user_email']), 10, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <!-- <td><?php echo h($user['User']['user_password']); ?>&nbsp;</td> -->
                    <td><?php echo $this->Text->truncate(h($user['User']['user_address']), 10, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <!-- <td><?php echo h($user['User']['user_dietary_requirement']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['user_spl_assistance']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['user_referee']); ?>&nbsp;</td> -->
    <!--		<td><?php echo h($user['User']['user_postcode']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['user_state']); ?>&nbsp;</td>-->
                    <!-- <td>
                    <?php echo $this->Html->link($user['Country']['id'], array('controller' => 'countries', 'action' => 'view', $user['Country']['id'])); ?>
                    </td> -->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['user_first_name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        //  echo $this->Paginator->counter(array(
        //      'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        //  ));
        //  
        ?>	</p>

    <!-- <div class="paging">
    <?php
    //  echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    //  echo $this->Paginator->numbers(array('separator' => ''));
    //  echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
      </div> -->
</div>
<?php $this->end(); ?>