<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This List'), array('action' => 'edit', $homepageList['HomepageList']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This List'), array('action' => 'delete', $homepageList['HomepageList']['id']), null, __('Are you sure you want to delete # %s?', $homepageList['HomepageList']['id'])); ?> </li>
<?php
$this->end();
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
    <div class="unselected"><?php echo $this->Html->link(__('Home Page List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Home Image List'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="homepageLists view">
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($homepageList['HomepageList']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('List Type'); ?></dt>
        <dd>
            <?php echo h($homepageList['HomepageList']['list_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product'); ?></dt>
        <dd>
            <?php
            // echo $this->Html->link($homepageList['Product']['id'], array('controller' => 'products', 'action' => 'view', $homepageList['Product']['id']));
            echo $productName;
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>