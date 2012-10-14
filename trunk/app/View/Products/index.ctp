<?php
$this->extend('/Common/AdminIndex');
$this->assign('LeftProduct', 'LeftMenuActions');
$this->assign('LeftCustomer', '');
$this->assign('LeftNews', '');
$this->assign('LeftEvent', '');
$this->start('manageRightMenu');
?>
<div class="manageRightMenu" >
    <ul>
        <li><?php echo $this->Html->link(__('Tour'), array('controller' => 'Tours', 'action' => 'index')); ?></li>
        <li class='active '><?php echo $this->Html->link(__('Product'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Cooking Class'), array('controller' => 'cookingclasses', 'action' => 'index')); ?></li>
    </ul>
</div>

<div class="mangeRightSubMenu"> 
    <div class="selected"><?php echo $this->Html->link(__('Product List'), array('action' => 'index')); ?></div>
    <div class="unselected"><?php echo $this->Html->link(__('Add Product'), array('action' => 'add')); ?></div>
</div>
<?php
$this->end();

$this->start('manageRightContent');
?>
<div class="Products index">
	<table cellpadding="0" cellspacing="0" id="js-datatable">
	<thead>
		<tr>
                <!--<th>ID</th>-->
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
    <?php foreach ($products as $product): ?>
        <tr>
					<!--<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>-->
                    <td><?php echo h($product['Product']['product_name']); ?>&nbsp;</td>
                    <td><?php echo $this->Text->truncate($product['Product']['product_description'], 40, array('ellipsis' => '...')); ?></td>
                    <td><?php echo h($product['Product']['product_price']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['product_name'])); ?>
                    </td>
        </tr>
    <?php endforeach; ?>
	</tbody>
    </table>
    <p>
        <?php
//        echo $this->Paginator->counter(array(
//            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//        ));
        ?>	</p>

    <div class="paging">
        <?php
   //     echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
   //     echo $this->Paginator->numbers(array('separator' => ''));
   //     echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<?php $this->end(); ?>
