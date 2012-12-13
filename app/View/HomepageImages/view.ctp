<?php
$this->extend('/Common/AdminView');
$this->assign('LeftProduct', '');
$this->assign('LeftOrder', '');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->assign('LeftWebsite', 'LeftMenuActions');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Image'), array('action' => 'edit', $homePageImage['HomePageImage']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Image'), array('action' => 'delete', $homePageImage['HomePageImage']['id']), null, __('Are you sure you want to delete this image?')); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>

<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerForms', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homePageImages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepageLists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutusPages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Home Page Image List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Home Page Image'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="homepageImages view">
    <dl>
        <dt><?php echo __('Image Name'); ?></dt>
        <dd>
            <img src="<?php echo ($homePageImage['HomePageImage']['image_name']); ?>  " width="780px">
            &nbsp;
        </dd>
        <dt><?php echo __('Publish Status'); ?></dt>
        <dd>
            <?php echo h($homePageImage['HomePageImage']['publish_status']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Image Description'); ?></dt>
        <dd>
            <?php echo h($homePageImage['HomePageImage']['image_description']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>