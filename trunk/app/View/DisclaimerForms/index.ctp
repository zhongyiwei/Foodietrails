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
        <li class='active '><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homePageImages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepageLists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutusPages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Disclaimer Form List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Disclaimer Form'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="disclaimerForms index">
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                            <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
                <th>Disclaimer Form</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disclaimerForms as $disclaimerForm): ?>
                <tr>
                        <!--<td><?php echo h($disclaimerForm['DisclaimerForm']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($disclaimerForm['DisclaimerForm']['form_name']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $disclaimerForm['DisclaimerForm']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $disclaimerForm['DisclaimerForm']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $disclaimerForm['DisclaimerForm']['id']), null, __('Are you sure you want to delete this disclaimer form?')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->end(); ?>
