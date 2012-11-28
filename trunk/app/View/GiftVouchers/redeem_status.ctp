<div>
    <table width="200" border="0" style=" margin-top:50px; margin-bottom: 20px">
        <tr>
            <td colspan="2"><?php if ($redeemData != null) { ?><span style="font-weight:normal; margin-left: 330px;color:#088f3e; font-size:25px; ">Redeem Successful!</span><?php } else { ?><span style="font-weight:normal; margin-left: 350px;color:#ab243b; font-size:25px; ">Redeem Failed</span><?php } ?></td>
        </tr>
        <tr>
            <td style="border-bottom: 0px"><?php if ($redeemData != null) { ?>An email has been sent to you with the detailed information showing below: <?php } ?></td>
        </tr>
    </table>
    <table width="200" border="0" style="margin-bottom: 90px; border-bottom: 0px; <?php if ($identifier =="Tour"){ ?>width: 500px;margin-left: 200px;<?php }else if ($identifier =="Cooking Class"){ ?>width: 530px;margin-left: 210px;<?php } ?>">
        <tr>
            <td>Gifter Name</td>
            <td><?php
if ($redeemData != null) {
    echo $redeemData['User']['user_first_name'] . ' ' . $redeemData['User']['user_surname'];
}
?></td>
        </tr>
        <tr>
            <td>Gifter Contact Number</td>
            <td>
                <?php
                if ($redeemData != null) {
                    echo $redeemData['User']['user_contacts'];
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Gifter Email</td>
            <td>
                <?php
                if ($redeemData != null) {
                    echo $redeemData['User']['user_email'];
                }
                ?>
            </td>
        <tr>
            <td>Gift Voucher Name</td>
            <td>
                <?php
                if ($redeemData != null) {
                    echo $redeemData['GiftVoucher']['gift_voucher_name'];
                }
                ?>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0px">Gift Redeem Status</td>
            <td style="border-bottom: 0px">
                <?php
                if ($redeemData != null) {
                    echo $redeemData['GiftvoucherOrder']['gift_redeem_status'];
                }
                ?>
            </td>
            <?php
            if ($identifier == "Tour") {
                echo "
            <tr>
                <td style='border-bottom: 0px'>Tour Name</td>
                <td style='border-bottom: 0px'>";
                if ($dateData != null) {
                    echo $dateData['Tour']['tour_name']; }
                    echo "</td>
            </tr>
            <tr>
                <td style='border-bottom: 0px'>Tour Date and Time</td>
                <td style='border-bottom: 0px'>";
                    if ($dateData != null) {
                        echo $dateData['TourDate']['tour_date'] . ' at ' . $dateData['TourDate']['tour_time'];
                    }
                    echo "
                        </td>
                    </tr>";
                } else if ($identifier == 'Cooking Class') {
                    echo "
                    <tr>
                        <td style='border-bottom: 0px'>Cooking Class Name</td>
                        <td style='border-bottom: 0px'>";
                    if ($dateData != null) {
                        echo $dateData['Cookingclass']['cooking_class_name'];
                    }
                    echo "
                        </td> 
                    </tr>
                    <tr>
                        <td style='border-bottom: 0px'>Cooking Class Date and Time</td>
                        <td style='border-bottom: 0px'>
                            ";
                    if ($dateData != null) {
                        echo $dateData['CookingclassDate']['cookingclass_date'] . ' at ' . $dateData['CookingclassDate']['cookingclass_time'];
                    }
                    echo "
                        </td>
                    </tr>";
                }
                ?>
        </tr>
    </table></div>