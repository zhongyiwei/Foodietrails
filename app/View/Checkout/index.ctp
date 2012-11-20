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
            <td style="font-weight: bold">Remove</td>
        </tr>
        <form method="post" action="<?php echo $this->webroot; ?>checkout/?def=Tour&id=<?php echo "#" ?>">
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
                            <input type="textField" name="<?php echo $SC["cartData$i"]['Tour']['id']; ?>TQty" style="width:30px;" value="<?php
            if ($SC["cartData$i"]['Qty'] == "") {
                echo 1;
            } else {
                echo $SC["cartData$i"]['Qty'];
            }
                    ?>"/>

                        </td>
                        <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                        <td><a href="<?php echo $this->webroot; ?>checkout/deleteCheckoutItem/?def=Tour&id=<?php echo $SC["cartData$i"]['Tour']['id']; ?>">Delete</a> </td>
                    </tr>
                <?php } else if ($SC["cartData$i"]['Identifier'] == "CookingClass") {
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $SC["cartData$i"]['Cookingclass']['cooking_class_name']; ?></td>
                        <td><?php echo $SC["cartData$i"]['Cookingclass']['cooking_class_price']; ?> AU$</td>
                        <td>
                            <input type="textField" name="<?php echo $SC["cartData$i"]['Cookingclass']['id']; ?>CCQty" style="width:30px;" value="<?php
            if ($SC["cartData$i"]['Qty'] == "") {
                echo 1;
            } else {
                echo $SC["cartData$i"]['Qty'];
            }
                    ?>"/>

                        </td>
                        <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                        <td><a href="<?php echo $this->webroot; ?>checkout/deleteCheckoutItem/?def=CookingClass&id=<?php echo $SC["cartData$i"]['Cookingclass']['id']; ?>" >Delete</a> </td>
                    </tr>
                    <?php
                } else if ($SC["cartData$i"]['Identifier'] == "Product") {
                    ?><tr>
                        <td></td>
                        <td><?php echo $SC["cartData$i"]['Product']['product_name']; ?></td>
                        <td><?php echo $SC["cartData$i"]['Product']['product_price']; ?> AU$</td>
                        <td>
                            <input type="textField" name="<?php echo $SC["cartData$i"]['Product']['id']; ?>PQty" style="width:30px;" value="<?php
            if ($SC["cartData$i"]['Qty'] == "") {
                echo 1;
            } else {
                echo $SC["cartData$i"]['Qty'];
            }
                    ?>"/>

                        </td>
                        <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                        <td><a href="<?php echo $this->webroot; ?>checkout/deleteCheckoutItem/?def=Product&id=<?php echo $SC["cartData$i"]['Product']['id']; ?>" >Delete</a> </td>
                    </tr>
                    <?php
                } else if ($SC["cartData$i"]['Identifier'] == "GiftVoucher") {
                    ?><tr>
                        <td></td>
                        <td><?php echo $SC["cartData$i"]['GiftVoucher']['gift_voucher_name']; ?></td>
                        <td><?php echo $SC["cartData$i"]['GiftVoucher']['gift_price']; ?> AU$</td>
                        <td>
                            <input type="textField" name="<?php echo $SC["cartData$i"]['GiftVoucher']['id']; ?>GQty" style="width:30px;" value="<?php
            if ($SC["cartData$i"]['Qty'] == "") {
                echo 1;
            } else {
                echo $SC["cartData$i"]['Qty'];
            }
                    ?>"/>

                        </td>
                        <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                        <td><a href="<?php echo $this->webroot; ?>checkout/deleteCheckoutItem/?def=GiftVoucher&id=<?php echo $SC["cartData$i"]['GiftVoucher']['id']; ?>" >Delete</a> </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="6"style="text-align:right;"><p style="font-weight:bold;">Total: <?php echo $total; ?> AU$</p></td>
            </tr>
    </table>
    <button type="submit" title="Update Shopping Cart" style="padding: 5px; font-size:14px;">Update Shopping Cart</button>
    </form>
    <button type="button" title="Proceed to Checkout" style="padding: 5px; font-size:14px;" onclick="window.location='<?php echo $this->webroot; ?>users/customerLogin';">Proceed to Check Out</button>
    <?php
} else {
    echo "</table><p>You have not book anything yet.</p><p>Please click " . $this->Html->link(__('here'), array('controller' => 'home', 'action' => 'display')) . " to continue your browsing.</p>";
};
?>