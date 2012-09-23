<?php
//print_r($SC);
?>
<table width="200" border="1">
    <?php if ($SC[0]['Tour']['tour_name'] != "") { ?>
        <tr>
            <td>&nbsp;</td>
            <td>Product Name</td>
            <td>Unit Price</td>
            <td>Qty</td>
            <td>Subtotal</td>
            <td>Remove</td>
        </tr>
        <?php
        $total = 0;
        for ($i = 0; $i < count($SC); $i++) {
            $total += $SC[$i]['subTotal'];
            ?>
            <tr>
                <td></td>
                <td><?php echo $SC[$i]['Tour']['tour_name']; ?></td>
                <td><?php echo $SC[$i]['Tour']['tour_price_per_certificate']; ?> AU$</td>
                <td>
                    <form method="post" action="/tours/checkout/<?php echo $SC[$i]['Tour']['id']; ?>">
                        <input type="textField" name="<?php echo $SC[$i]['Tour']['tour_name']; ?>Qty" style="width:30px;" value="<?php
        if ($SC[$i]['Qty'] == "") {
            echo 1;
        } else {
            echo $SC[$i]['Qty'];
        }
            ?>"/>

                </td>
                <td><?php echo $SC[$i]['subTotal']; ?> AU$</td>
                <td><a href="/tours/deleteCheckoutItem/<?php echo $SC[$i]['Tour']['id']; ?>" >Delete</a> </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="6"style="text-align:right;"><p style="font-weight:bold;">Total: <?php echo $total; ?> AU$</p></td>
        </tr>
    </table>
    <button type="submit" title="Update Shopping Cart" style="padding: 5px; font-size:14px;">Update Shopping Cart</button>
    </form>
    <button type="button" title="Proceed to Checkout" style="padding: 5px; font-size:14px;" onclick="window.location='/../users/customerLogin';">Proceed to Check Out</button>
<?php }else{
    echo "<p>You have not book anything yet.</p><p>Please click ". $this->Html->link(__('here'), array('controller' => 'home', 'action' => 'display')) ." to continue your browsing.</p>";
}
?>