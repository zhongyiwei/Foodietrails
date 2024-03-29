<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', 'LeftMenuActions');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('News'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('News List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add News'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>


<div class="news index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <!--<th>ID</th>-->
                <th>News Title</th>
                <th>News Description</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $news): ?>
                <tr>
                    <!--<td><?php echo h($news['News']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($news['News']['news_title']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate($news['News']['news_description'], 40, array('ellipsis' => '...')); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $news['News']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $news['News']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $news['News']['id']), null, __('Are you sure you want to delete # %s?', $news['News']['news_title'])); ?>
                        <?php
                        if ($news['News']['send_status'] == 'false') {
                            echo $this->Html->link(__('Send to subscribers'), array('action' => 'emailsubscriber', $news['News']['id']), null, __('Sending email will take some time due to large amount of subscribers, are you sure you want to proceed?'));
                            ;
                        } else {
                            echo $this->Html->link(__('Resend this news'), array('action' => 'emailsubscriber', $news['News']['id']), array('style' => 'padding-left:13px; padding-right:13px;'), __('Sending email will take some time due to large amount of subscribers, are you sure you want to proceed?'));
                        }
                        ?>
                        <?php echo $this->Html->link(__('Preview'), array('action' => 'preview', $news['News']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
//	echo $this->Paginator->counter(array(
//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//	));
        ?>	</p>

    <!--	<div class="paging">
    <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
            </div>
    </div>
    -->
    <?php $this->end(); ?>

    <!--div class="actions">
            <h3><?php echo __('Actions'); ?></h3>
            <ul>
                    <li><?php echo $this->Html->link(__('New News'), array('action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
            </ul>
    </div--->
