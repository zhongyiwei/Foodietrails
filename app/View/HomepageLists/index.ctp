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
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homepageimages', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepagelists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutuspages', 'action' => 'index')); ?></li>      
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Home Page List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Home Page List'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();
$this->start('manageRightContent');
?>
<div class="homepageLists index">
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                <!--<th><?php Id ?></th>-->
                <th>List Type</th>
                <th>Product Name</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($homepageLists); $i++) { ?>
                <tr>
                    <!--<td><?php echo h($homepageLists[$i]['HomepageList']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($homepageLists[$i]['HomepageList']['list_type']); ?>&nbsp;</td>
                    <td>
                        <?php
                        // echo $this->Html->link($homepageList['Product']['id'], array('controller' => 'products', 'action' => 'view', $homepageList['Product']['id'])); 
                        echo h($productName[$i]);
                        ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $homepageLists[$i]['HomepageList']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $homepageLists[$i]['HomepageList']['id'])); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $homepageLists[$i]['HomepageList']['id']), null, __('Are you sure you want to delete this list?')); ?>
                    </td>
                </tr>
<?php }; ?>
        </tbody>
    </table>
</div>
<?php $this->end(); ?>