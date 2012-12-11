<?php 
$productName = $product['Product']['product_name'];
$this->assign('title', "Foodie Trails - $productName");
?>
<?php
//print_r($feedback);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="productHeader"><?php echo $product['Product']['product_name'] ?></h1>
<table width="200px" border="1" style="width:350px; ">
    <tr>
        <td style="vertical-align:middle;">Price Per Person</td>
        <td><div class="productPrice"><?php echo $product['Product']['product_price']; ?></div></td>
    </tr>
</table>
<?php
$id = $product['Product']['id'];
echo $this->Html->link(__(''), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'Product', 'id' => "$id")), array("class" => "productImage2"));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add', '?' => array('def' => 'Product', 'id' => "$id")), array("class" => "feedback",'style'=>'margin-top:-86px'));
?>
<?php echo $product['Product']['product_description']; ?>
