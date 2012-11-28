<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftDate', 'LeftMenuActions');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour Date'), array('controller' => 'tourdates', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class Date'), array('controller' => 'cookingclassdates', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Tour Date List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour Date'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tourDates index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Tour Name</th>
                <th>Holding Date</th>
                <th>Holding Time</th>
                <th>Progress</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tourDates as $tourDate): ?>
                <tr>
                    <td><?php echo h($tourDate['TourDate']['tour_date']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($tourDate['Tour']['tour_name'], array('controller' => 'tours', 'action' => 'view', $tourDate['Tour']['id'])); ?>
                    </td>
                    <td><?php echo h($tourDate['TourDate']['tour_time']); ?>&nbsp;</td>
                    <td><?php echo h($tourDate['TourDate']['tour_progress']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $tourDate['TourDate']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tourDate['TourDate']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tourDate['TourDate']['id']), null, __('Are you sure you want to delete # %s?', $tourDate['TourDate']['id'])); ?>
                        <?php
                        if ($tourDate['TourDate']['tour_progress'] == "Completed") {
                            echo $this->Html->link(__('Send Feedback Email  '), array('action' => 'requestFeedback', $tourDate['TourDate']['id']), array('style' => 'padding:2px 9px;'), __('Sending email will take some time due to large amount of people, are you sure you want to proceed?'));
                        } else {
                            echo $this->Html->link(__('Send Notification Email'), array('action' => 'notification', $tourDate['TourDate']['id']), null, __('Sending email will take some time due to large amount of people, are you sure you want to proceed?'));
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?> 
        </tbody> 
    </table>
</div>
<?php $this->end(); ?>
