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
            <td>Product Name</td>
            <td>Unit Price</td>
            <td>Qty</td>
            <td>Subtotal</td>
            <td>Remove</td>
        </tr>
        <form method="post" action="/tours/checkout/<?php echo $SC[$ar_keys[0]]['Tour']['id']; ?>">
            <?php
            $total = 0;
            for ($i = 0; $i < count($SC); $i++) {
                $total += $SC["cartData$i"]['subTotal'];
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $SC["cartData$i"]['Tour']['tour_name']; ?></td>
                    <td><?php echo $SC["cartData$i"]['Tour']['tour_price_per_certificate']; ?> AU$</td>
                    <td>
                            <input type="textField" name="<?php echo $SC["cartData$i"]['Tour']['id']; ?>Qty" style="width:30px;" value="<?php
                    if ($SC["cartData$i"]['Qty'] == "") {
                        echo 1;
                    } else {
                        echo $SC["cartData$i"]['Qty'];
                    }
                    ?>"/>

                    </td>
                    <td><?php echo $SC["cartData$i"]['subTotal']; ?> AU$</td>
                    <td><a href="/tours/deleteCheckoutItem/<?php echo $SC["cartData$i"]['Tour']['id']; ?>" >Delete</a> </td>
                </tr>
    <?php }; ?>
            <tr>
                <td colspan="6"style="text-align:right;"><p style="font-weight:bold;">Total: <?php echo $total; ?> AU$</p></td>
            </tr>
    </table>
    <button type="submit" title="Update Shopping Cart" style="padding: 5px; font-size:14px;">Update Shopping Cart</button>
    </form>
    <button type="button" title="Proceed to Checkout" style="padding: 5px; font-size:14px;" onclick="window.location='/../users/customerLogin';">Proceed to Check Out</button>
<?php
} else {
    echo "<p>You have not book anything yet.</p><p>Please click " . $this->Html->link(__('here'), array('controller' => 'home', 'action' => 'display')) . " to continue your browsing.</p>";
};
?>