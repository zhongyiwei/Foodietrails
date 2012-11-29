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
<li><?php echo $this->Html->link(__('Edit This Form'), array('action' => 'edit', $disclaimerForm['DisclaimerForm']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Form'), array('action' => 'delete', $disclaimerForm['DisclaimerForm']['id']), null, __('Are you sure you want to delete this disclaimer form?')); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>

<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Disclaimer Form'), array('controller' => 'disclaimerforms', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page Image'), array('controller' => 'homepageimages', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Home Page List'), array('controller' => 'homepagelists', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('About Us'), array('controller' => 'aboutuspages', 'action' => 'index')); ?></li>
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
<div class="disclaimerForms view">
    <dl>
<!--		<dt><?php echo __('Id'); ?></dt>
            <dd>
        <?php echo h($disclaimerForm['DisclaimerForm']['id']); ?>
                    &nbsp;
            </dd>-->
        <dt><?php echo __('Form Name'); ?></dt>
        <dd>
            <a href="<?php echo $disclaimerForm['DisclaimerForm']['form_name']; ?>"  target="_blank" style="margin-top:20px;">Click the link to check disclaimer form</a>
            <?php // echo h($disclaimerForm['DisclaimerForm']['form_name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>
