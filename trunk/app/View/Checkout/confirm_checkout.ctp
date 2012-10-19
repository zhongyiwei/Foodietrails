<?php
//print_r($SC);
?>
<table width="200" border="1">
    <?php
    if (isset($SC)) {
        $ar_keys = array_keys($SC);
        rsort($ar_keys);
        ?>
        <tr>
            <td>&nbsp;</td>
            <td style="font-weight: bold">Product Name</td>
            <td style="font-weight: bold">Unit Price</td>
            <td style="font-weight: bold">Qty</td>
            <td style="font-weight: bold">Subtotal</td>
            <td></td>
        </tr>
        <?php
        $total = 0;
        for ($i = 0; $i < count($SC); $i++) {
            $total += $SC["cartData$i"]['subTotal'];
            if ($SC["cartData$i"]['Identifier'] == "Tour") {
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $SC["cartData$i"]['Tour']['tour_name']; ?></td>
                    <td><?php echo $SC["cartData$i"]['Tour']['tour_price_per_certificate']; ?> AU$</td>
                    <td>
                        <?php echo $SC["cartData$i"]['Qty']; ?>
                    </td>
                    <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                </tr>
            <?php } else if ($SC["cartData$i"]['Identifier'] == "CookingClass") {
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $SC["cartData$i"]['Cookingclass']['cooking_class_name']; ?></td>
                    <td><?php echo $SC["cartData$i"]['Cookingclass']['cooking_class_price']; ?> AU$</td>
                    <td>
                        <?php echo $SC["cartData$i"]['Qty']; ?>

                    </td>
                    <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                </tr>
                <?php
            } else if ($SC["cartData$i"]['Identifier'] == "Product") {
                ?><tr>
                    <td></td>
                    <td><?php echo $SC["cartData$i"]['Product']['product_name']; ?></td>
                    <td><?php echo $SC["cartData$i"]['Product']['product_price']; ?> AU$</td>
                    <td>
                        <?php echo $SC["cartData$i"]['Qty']; ?>
                    </td>
                    <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                </tr>
                <?php
            }
        }
        ?>
        <tr>
            <td colspan="6"style="text-align:right;"><p style="font-weight:bold; margin-bottom: 0px;margin: 0px 10px 0px 0px;">Total: <?php echo $total; ?> AU$</p></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left; border-bottom:0px">By confirming the check out, you accept the terms and conditions <?php echo $this->Html->link(__('here'), array('controller' => 'home', 'action' => 'display'),array('style'=>'margin-top:20px'));?></td>
            <td colspan="6"style="text-align:right;border-bottom:0px; "><button type="button" title="Proceed to Checkout" style="margin: 0px 20px 50px 0px; padding: 5px; font-size:14px;" onclick="window.location='<?php echo $this->webroot; ?>users/customerLogin';">Confirm Payment</button></td>
        </tr>
    </table>
    <?php
} else {
    echo "<p>You have not book anything yet.</p><p>Please click " . $this->Html->link(__('here'), array('controller' => 'home', 'action' => 'display')) . " to continue your browsing.</p>";
};
?>