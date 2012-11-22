<?php
$this->extend('/Common/AdminAdd');
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
    <div class="unselected"><?php echo $this->Html->link(__('Home Page List'), array('action' => 'index')); ?></div>
    <div class="selected"><?php echo $this->Html->link(__('Add Home Image List'), array('action' => 'add')); ?></div>
</div>

<?php
$this->end();
$this->start('manageRightContent');
?>
<div class="homepageLists form">
    <?php echo $this->Form->create('HomepageList'); ?>
    <?php
    $options['Tour'] = '';
    $options['Cooking Class'] = '';
    $options['Product'] = '';

    $options['Tour'] = $allTours;
    $options['Cooking Class'] = $allCookingClasses;
    $options['Product'] = $allProducts;

    $productType = array('Tour' => 'Tour', 'Cooking Class' => 'Cooking Class', 'Product' => 'Product');
    echo $this->Form->input('list_type', array('label' => 'List Type <span style="font-weight:normal; font-size:14px; color:#999;">(Choose the product type you want your product to be displayed)</span>', 'options' => $productType));
    echo $this->Form->input('product_id', array('options' => $options));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>