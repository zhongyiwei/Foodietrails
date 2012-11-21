<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homepageimages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepagelists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutuspages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Home Page Image List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Home Page Image'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();
$this->start('manageRightContent');
?>
<div class="homepageImages index" >
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
<!--                <th><?php echo $this->Paginator->sort('id'); ?></th>-->
                <th>Image Name</th>
                <th>Publish Status</th>
                <th>Image Description</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($homepageImages as $homepageImage): ?>
                <tr>
                    <!--<td><?php echo h($homepageImage['HomepageImage']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($homepageImage['HomepageImage']['image_name']); ?>&nbsp;</td>
                    <td><?php echo h($homepageImage['HomepageImage']['publish_status']); ?>&nbsp;</td>
                    <td><?php echo h($homepageImage['HomepageImage']['image_description']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $homepageImage['HomepageImage']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $homepageImage['HomepageImage']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $homepageImage['HomepageImage']['id']), null, __('Are you sure you want to delete # %s?', $homepageImage['HomepageImage']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->end(); ?>
