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
                    <td><?php echo $SC["cartData$i"]['TourDate']['tour_price_per_certificate']; ?> AU$</td>
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
                    <td><?php echo $SC["cartData$i"]['CookingclassDate']['cooking_class_price']; ?> AU$</td>
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
            } else if ($SC["cartData$i"]['Identifier'] == "GiftVoucher") {
                ?><tr>
                    <td></td>
                    <td><?php echo $SC["cartData$i"]['GiftVoucher']['gift_voucher_name']; ?></td>
                    <td><?php echo $SC["cartData$i"]['GiftVoucher']['gift_price']; ?> AU$</td>
                    <td>
                        <?php echo $SC["cartData$i"]['Qty']; ?>
                    </td>
                    <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                </tr>
                <?php
            }
        }

        //$_SESSION['Payment_Amount'] = $total;
//        CakeSession::write('Payment_Amount', $total);
        
        
        ?>
        <tr>
            <td colspan="6"style="text-align:right;"><p style="font-weight:bold; margin-bottom: 0px;margin: 0px 10px 0px 0px;">Total: <?php echo $total; ?> AU$</p></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left; border-bottom:0px">By confirming the check out, you accept the terms and conditions <a href="<?php echo $disclaimerForm[0]['DisclaimerForm']['form_name']; ?>"  target="_blank" style="margin-top:20px;">here</a></td>
            <!--<td colspan="6"style="text-align:right;border-bottom:0px; "><button type="button" title="Confirm Payment" style="margin: 0px 20px 50px 0px; padding: 5px; font-size:14px;" onclick="window.location='<?php echo $this->webroot; ?>users/customerPayment';">Confirm Payment</button></td>-->
            <td>
                <?php
                echo $this->Form->create(null, array('url' => '/expresscheckout.php'));
                ?>
                <input type="hidden" value="<?php echo $total; ?>" name="total"/>
                <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
                </form>
            </td>
    </table>
    <?php
} else {
    //echo "<p>You have not book anything yet.</p><p>Please click " . $this->Html->link(__('here'), array('controller' => 'home', 'action' => 'index')) . " to continue your browsing.</p>";
};
?>