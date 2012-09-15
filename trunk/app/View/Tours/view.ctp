<?php
$this->extend('/Common/AdminView');
$this->start('LeftEditMenu');
?>
<li><?php echo $this->Html->link(__('Edit This Tour'), array('action' => 'edit', $tour['Tour']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete This Tour'), array('action' => 'delete', $tour['Tour']['id']), null, __('Are you sure you want to delete # %s?', $tour['Tour']['id'])); ?> </li>
<?php
$this->end();
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li class='active '><?php echo $this->Html->link(__('Tour'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="unselected"><?php echo $this->Html->link(__('Tour List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Tour'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="tours view">
    <!--<h2><?php echo __('Tour'); ?></h2>-->
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Name'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Vendor Name'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_vendor_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Price Per Certificae'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_price_per_certificae']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Long Description'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_long_description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Notes'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_notes']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Paricipant Guidlines'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_paricipant_guidlines']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Location'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_location']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Duration'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_duration']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Weather'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_weather']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Spectator'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_spectator']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Max Num On Day'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_max_num_on_day']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Type'); ?></dt>
        <dd>
            <?php echo h($tour['Tour']['tour_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Description'); ?></dt>
        <dd>
            <?php echo ($tour['Tour']['tour_description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tour Thumbnail'); ?></dt>
        <dd>
            <img src="<?php echo ($tour['Tour']['tour_thumbnail']);?>" height="100px">
            &nbsp;
        </dd>
    </dl>
</div>
<?php $this->end(); ?>
