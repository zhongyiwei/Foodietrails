<?php
echo $this->Html->css('detailPage.css');
?>
<h1 class="tourHeader"><?php echo $cookingclass['Cookingclass']['cooking_class_name'] ?></h1>
<table width="200" border="1" style="width:760px" class="detailT">
    <tr style="border-top:1px solid #DDD;">    
        <?php
        for ($i = 0; $i < count($weekArray); $i++) {
            echo "<td><p class='calendarP '>" . $weekArray[$i] . "</p><p class='calendarP dateP'>" . $dateArray[$i] . "</p></td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $id = $cookingclass['Cookingclass']['id'];

        for ($i = 0; $i < count($cookingclassDateArray); $i++) {
            $status = true;
            for ($j = 0; $j < count($cookingclassDateData); $j++) {
                if ($cookingclassDateArray[$i] == $cookingclassDateData[$j]['CookingclassDate']['cookingclass_date'] && $cookingclassDateData[$j]['display']==true) {
                    $tourDateId = $cookingclassDateData[$j]['CookingclassDate']['id'];
                    echo "<td><p class='calendarP' style='margin-left: 0px;'>";
                    echo $this->Html->image("Book.png", array("alt" => "Click to Book", 'name' => "Foodie Trails Logo", 'width' => "90", 'style' => "", 'url' => array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'Cooking Class', 'id' => "$id", 'dateId' => "$tourDateId"))));
                    echo "</p></td>";
                    $status = false;
                    break;
                }
            }
            if ($status == true) {
                echo "<td></td>";
            }
        }
        ?>
    </tr>
</table>
<table width="200px" border="1" style="width:250px; ">
    <tr>
        <td style="vertical-align:middle;border-bottom: 0px;">Price Per Person</td>
        <td  style="border-bottom: 0px;"><div class="tourPrice"><?php echo $cookingclass['Cookingclass']['cooking_class_price']; ?></div></td>
    </tr>
</table>
<?php
//                echo $this->Html->image("Book.png", array("alt" => "Book", 'name' => "Book", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'tours', 'action' => 'checkout',$tour['Tour']['id'])));
//echo $this->Html->link(__(''), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'CookingClass', 'id' => "$id")), array("class" => "tourBook"));
//echo $this->Html->link(__(''), array('controller' => 'tours', 'action' => 'checkout', $tour['Tour']['id']), array("class" => "tourBook"));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add', '?' => array('def' => 'CookingClass', 'id' => "$id")), array("class" => "feedback"));
//echo $this->Html->image("feedback_button.jpg", array("alt" => "Feedback", 'name' => "Feedback", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'feedbacks', 'action' => 'add',$cookingclass['Cookingclass']['id'])));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add'));
//echo $this->Html->link(__('Redeem this cooking class with your gift voucher!'), array('controller' => 'users', 'action' => 'redeemLogin', '?' => array('def' => 'Cooking Class', 'id' => "$id")), array("class" => "redeem", 'style' => 'color:#1872a3;font-weight:normal; margin-left:486px;'));
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
