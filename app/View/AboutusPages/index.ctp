<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerForms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homePageImages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepageLists', 'action' => 'index')); ?></li>
        <li  class='active '><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutusPages', 'action' => 'index')); ?></li>        
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('About Us Overview'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add About Us Content'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();
$this->start('manageRightContent');
?>
<div class="aboutusPages index">
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
                <th>Content</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aboutusPages as $aboutusPage): ?>
                <tr>
                    <!--<td><?php // echo h($aboutusPage['AboutusPage']['id']);  ?>&nbsp;</td>-->
                    <td><?php echo $this->Text->truncate(h($aboutusPage['AboutusPage']['content']), 50, array('ellipsis' => '...')); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $aboutusPage['AboutusPage']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aboutusPage['AboutusPage']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aboutusPage['AboutusPage']['id']), null, __('Are you sure you want to delete this about page detal?')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->end(); ?>