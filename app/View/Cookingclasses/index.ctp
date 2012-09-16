<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct','LeftMenuActions');
$this->assign('LeftCustomer','');
$this->assign('LeftNews','');
$this->assign('LeftEvent','');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'tours', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Product'), array('controller' => 'products', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Cooking Class'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Cooking Classes List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Cooking Classes'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="cookingclasses index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cooking_class_name'); ?></th>
			<th><?php echo $this->Paginator->sort('cooking_class_description'); ?></th>
			<th><?php echo $this->Paginator->sort('cooking_class_price'); ?></th>
			<th><?php echo $this->Paginator->sort('cooking_class_location'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($cookingclasses as $cookingclass): ?>
	<tr>
		<td><?php echo h($cookingclass['Cookingclass']['id']); ?>&nbsp;</td>
		<td><?php echo h($cookingclass['Cookingclass']['cooking_class_name']); ?>&nbsp;</td>
		<td><?php echo h($cookingclass['Cookingclass']['cooking_class_description']); ?>&nbsp;</td>
		<td><?php echo h($cookingclass['Cookingclass']['cooking_class_price']); ?>&nbsp;</td>
		<td><?php echo h($cookingclass['Cookingclass']['cooking_class_location']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cookingclass['Cookingclass']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cookingclass['Cookingclass']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cookingclass['Cookingclass']['id']), null, __('Are you sure you want to delete # %s?', $cookingclass['Cookingclass']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>
<p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<?php $this->end(); ?>

