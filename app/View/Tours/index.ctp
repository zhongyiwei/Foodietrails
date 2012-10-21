<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Gift Voucher'), array('controller' => 'giftvouchers', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Tour List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tours index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
<!--                <th>ID</th>-->
                <th>Name</th>
                <!--<th>tour_description</th>-->
                <!--<th>vendor</th>-->
                <th>Price</th>
                <!--<th>tour_long_description</th>-->
                <th>Notes</th>
                <!--<th>tour_paricipant_guidlines</th>-->
                <th>Location</th>
                <th>Duration</th>
                <!--<th>tour_weather</th>-->
                <th>Spectator</th>
                <th>People Limit</th>
                <th>Type</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tours as $tour): ?>
                <tr>
    <!--                    <td><?php echo h($tour['Tour']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($tour['Tour']['tour_name']); ?>&nbsp;</td>
                    <!--<td><?php echo h($tour['Tour']['tour_description']); ?>&nbsp;</td>-->
                    <!--<td><?php echo h($tour['Tour']['tour_vendor_name']); ?>&nbsp;</td>-->
                    <td><?php echo h($tour['Tour']['tour_price_per_certificate']); ?>&nbsp;</td>
                    <!--<td><?php echo h($tour['Tour']['tour_long_description']); ?>&nbsp;</td>-->
                    <td><?php echo $this->Text->truncate(h($tour['Tour']['tour_notes']), 10, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <!--<td><?php echo h($tour['Tour']['tour_paricipant_guidlines']); ?>&nbsp;</td>-->
                    <td><?php echo $this->Text->truncate(h($tour['Tour']['tour_location']), 10, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <td><?php echo h($tour['Tour']['tour_duration']); ?>&nbsp;</td>
                    <!--<td><?php echo h($tour['Tour']['tour_weather']); ?>&nbsp;</td>-->
                    <td><?php echo $this->Text->truncate(h($tour['Tour']['tour_spectator']), 10, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <td><?php echo h($tour['Tour']['tour_max_num_on_day']); ?>&nbsp;</td>
                    <td><?php echo h($tour['Tour']['tour_type']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $tour['Tour']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tour['Tour']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tour['Tour']['id']), null, __('Are you sure you want to delete # %s?', $tour['Tour']['tour_name'])); ?>
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

    <div class="paging">
        <?php
        //     echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        //     echo $this->Paginator->numbers(array('separator' => ''));
        //     echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<?php $this->end(); ?>
