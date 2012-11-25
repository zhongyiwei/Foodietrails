<?php 
//print_r($product);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="tourHeader">Products</h1>
<table width="400" border="1">
    <tr>
        <td style="border-bottom: none; width:500px"><div style="width: 900px" class="line">
                <?php foreach ($products as $product): ?>
                <div class="productImage"><?php $productThumbnail = $product['Product']['product_thumbnail']; ?>
                <div class="productTitle"> <span><?php echo h($product['Product']['product_name']); ?></span> </div>
                    <img src='<?php echo $productThumbnail ?>' alt = "<?php echo $product['Product']['product_name']; ?>" title = '<?php echo $product['Product']['product_name']; ?>' height = '150px' width = '200px' border = 0/></div>
                <div class="productDetails"><?php
                $description = $this->Text->truncate($product['Product']['product_description'], 400, array('ellipsis' => '...'));
                echo $description;
                ?>
                </div>
                <div class="productPrice"><br>
                    $<?php echo $product['Product']['product_price']; ?><br>
                
                    <div class="actions">
                <?php $id = $product['Product']['id'];
                    echo $this->Html->link(__('Buy'), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'Product', 'id' => "$id")));
                ?>
                 
                </div>
                <div style="clear:both;"></div>
            </div>
        </td>
        <?php endforeach; ?>
    </tr>
</table>