<?php
echo $this->Html->css('detailPage.css');
echo $this->Html->css('screen.css');
echo $this->Html->script('easySlider1.7.js');
?>
<script type="text/javascript">
    $(document).ready(function(){	
        $("#slider").easySlider({
        });
        document.getElementById('showTable').style.display = 'block';
        document.getElementById('detailD').style.display = 'block';
    });	
</script>
<h1 class="tourHeader"><?php echo $cookingclass['Cookingclass']['cooking_class_name'] ?></h1>
<div id="slider" >
    <ul id="showTable">
        <?php
//        for ($f = 0; $f < 4; $f++) {
        ?>
        <!--            <li>
                        <table width="200" border="1" style="width:650px; margin-left: 25px" class="detailT"  >
                            <tr style="border-top:1px solid #DDD;">   --> 
        <?php
//                        for ($i = $f * 7; $i < (count($weekArray) + $f*count($weekArray)) / 4; $i++) {
//                            echo "<td><p class='calendarP week'>" . $weekArray[$i] . "</p><p class='calendarP dateP'>" . $dateArray[$i] . "</p></td>";
//                        }
        ?>
        <!--                    </tr>
                            <tr>-->
        <?php
//                        $id = $cookingclass['Cookingclass']['id'];
//
//                        for ($i = $f * 7; $i < (count($cookingclassDateArray) + $f * count($cookingclassDateArray) ) / 4; $i++) {
//                            $status = true;
//                            for ($j = 0; $j < count($cookingclassDateData); $j++) {
//                                if ($cookingclassDateArray[$i] == $cookingclassDateData[$j]['CookingclassDate']['cookingclass_date'] && $cookingclassDateData[$j]['display'] == true) {
//                                    $tourDateId = $cookingclassDateData[$j]['CookingclassDate']['id'];
//                                    echo "<td><p class='calendarP' style='margin-left: 0px;'>";
//                                    echo $this->Html->image("Book.png", array("alt" => "Click to Book", 'name' => "Click to Book", 'width' => "90", 'style' => "", 'url' => array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'CookingClass', 'id' => "$id", 'dateId' => "$tourDateId"))));
//                                    echo "</p></td>";
//                                    $status = false;
//                                    break;
//                                } else if ($cookingclassDateArray[$i] == $cookingclassDateData[$j]['CookingclassDate']['cookingclass_date'] && $cookingclassDateData[$j]['display'] == false) {
//                                    echo "<td><p class='calendarP' style='margin-left: 0px;'>";
//                                    echo $this->Html->image("soldout.png", array("alt" => "This cooking class has sold out", 'name' => "This cooking class has sold out", 'width' => "90", 'style' => ""));
//                                    echo "</p></td>";
//                                    $status = false;
//                                }
//                            }
//                            if ($status == true) {
//                                echo "<td style='height:35px'></td>";
//                            }
//                        }
        ?>
        <!--                    </tr>
                        </table>
                    </li>-->
        <?php // } ?>

        <?php
        $id = $cookingclass['Cookingclass']['id'];
        for ($j = 0; $j < count($cookingclassDateData); $j++) {
            $cookingclassDateId = $cookingclassDateData[$j]['CookingclassDate']['id'];
            $cookingclassDate = $cookingclassDateData[$j]['CookingclassDate']['cookingclass_date'];
            $cookingclassTime = $cookingclassDateData[$j]['CookingclassDate']['cookingclass_time'];
            $dateTime = $cookingclassDate . " " . $cookingclassTime;
            $date = date_create_from_format('Y-m-d H:i:s', $dateTime);
            $month = date_format($date, 'F');
            $year = date_format($date, 'Y');
            $vacancy = $cookingclassDateData[$j]['vacancy'];
            $cookingclassPrice = $cookingclassDateData[$j]['CookingclassDate']['cooking_class_price'];
            if ($cookingclassDateData[$j]['display'] == true) {
                $bookImage = $this->Html->image("Book.png", array("alt" => "Click to Book", 'name' => "Click to Book", 'width' => "130", 'style' => "", 'url' => array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'CookingClass', 'id' => "$id", 'dateId' => "$cookingclassDateId"))));
                echo "<li><table border='0' style='width:650px; margin-left: 25px' class='detailT'>
                                    <tr>
                                    <td colspan='3' style='border-top: 1px solid #DDD; font-weight:bold;'>$month - $year</td>                     
                                    </tr>
                                     <tr>
                                <td>Date: $cookingclassDate</td>
                                <td rowspan='2' style='vertical-align:middle; border-left:1px solid #DDD;'>Number of Vacancies: $vacancy</td>
                                <td rowspan='2' style='vertical-align:middle; border-left:1px solid #DDD;'>
                                <p class='calendarP' style='margin-left: 0px; '>
                                $bookImage
                                </p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                Time: $cookingclassTime
                                </td>
                                </tr>
                                </table>
                                <table width='200px' border='1' style='width:250px; margin-left: 665px;margin-top: 25px;'>
                                <tr>
                                    <td style='vertical-align:middle;border-bottom: 0px;'>Price Per Person</td>
                                    <td  style='border-bottom: 0px;'><div class='tourPrice'>$cookingclassPrice</div></td>
                                </tr>
                            </table>
                                </li>
                                ";
//                echo "<input type='radio' name='dateChoosen' id='date$tourDateId' style='padding:20px' value='4' onclick='formSubmit()' >";
            } else if ($cookingclassDateData[$j]['display'] == false) {
                $bookImage = $this->Html->image("soldout.png", array("alt" => "This cooking class has sold out", 'name' => "This cooking class has sold out", 'width' => "130", 'style' => ""));
                echo "<li><table border='0' style='width:650px; margin-left: 25px' class='detailT'>
                                    <tr>
                                    <td colspan='3' style='border-top: 1px solid #DDD; font-weight:bold;'>$month</td>                     
                                    </tr>
                                     <tr>
                                <td>Date: $cookingclassDate</td>
                                <td rowspan='2' style='vertical-align:middle; border-left:1px solid #DDD;'>Number of Vacancies: $vacancy</td>
                                <td rowspan='2' style='vertical-align:middle; border-left:1px solid #DDD;'>
                                <p class='calendarP' style='margin-left: 0px; '>
                                $bookImage
                                </p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                Time: $cookingclassTime
                                </td>
                                </tr>
                                </table>
                                <table width='200px' border='1' style='width:250px; margin-left: 665px;margin-top: 25px;'>
                                <tr>
                                    <td style='vertical-align:middle;border-bottom: 0px;'>Price Per Person</td>
                                    <td  style='border-bottom: 0px;'><div class='tourPrice'>$cookingclassPrice</div></td>
                                </tr>
                            </table>
                                </li>
                                ";
            }
        }
        if (count($cookingclassDateData) == 0) {
            echo "<li><div class='noProduct'> No Cooking Class Available Right Now</div></li>";
        }
        ?>
    </ul>
</div>
<div class="detailData" id="detailD">
    <?php
//                echo $this->Html->image("Book.png", array("alt" => "Book", 'name' => "Book", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'tours', 'action' => 'checkout',$tour['Tour']['id'])));
//echo $this->Html->link(__(''), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'CookingClass', 'id' => "$id")), array("class" => "tourBook"));
//echo $this->Html->link(__(''), array('controller' => 'tours', 'action' => 'checkout', $tour['Tour']['id']), array("class" => "tourBook"));
    echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add', '?' => array('def' => 'CookingClass', 'id' => "$id")), array("class" => "feedback"));
//echo $this->Html->image("feedback_button.jpg", array("alt" => "Feedback", 'name' => "Feedback", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'feedbacks', 'action' => 'add',$cookingclass['Cookingclass']['id'])));
//echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add'));
    echo $this->Html->link(__('Redeem this cooking class with your gift voucher!'), array('controller' => 'users', 'action' => 'redeemLogin', '?' => array('def' => 'Cooking Class', 'id' => "$id")), array("class" => "redeem", 'style' => 'color:#1872a3;font-weight:normal; '));
    ?>
    <p><?php echo $cookingclass['Cookingclass']['cooking_class_description']; ?></p>
    <h2 class="tourParticipantGuide">Location</h2>
    <p><?php echo $cookingclass['Cookingclass']['cooking_class_location']; ?></p>

    <h2 class="tourParticipantGuide">Feedback</h2>
    <p><?php foreach ($feedbacks as $feedback): ?>
        <tr>
                                 <!--<td><?php echo $feedback['Feedback']['full_name']; ?> said --> "<?php echo $feedback['Feedback']['feedback_description']; ?>"<p /></td>
    </tr>
<?php endforeach; ?></p>
</div>