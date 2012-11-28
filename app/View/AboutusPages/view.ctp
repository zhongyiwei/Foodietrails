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
<li><?php echo $this->Html->link(__('Edit This About Us'), array('action' => 'edit', $aboutusPage['AboutusPage']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This About Us'), array('action' => 'delete', $aboutusPage['AboutusPage']['id']), null,__('Are you sure you want to delete this about page detal?'));  ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>

<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homepageimages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepagelists', 'action' => 'index')); ?></li>
        <li  class='active '><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutuspages', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('About Us Overview'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add About Us Content'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="aboutusPages view">
	<dl>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo ($aboutusPage['AboutusPage']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>