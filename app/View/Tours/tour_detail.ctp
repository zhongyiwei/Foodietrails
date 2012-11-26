<?php
echo $this->Html->css('detailPage.css');
?>
<h1 class="tourHeader"><?php echo $tour['Tour']['tour_name'] ?></h1>
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
//        $options = $tourDateList;
//        $tourId = $tourDateData[0]['TourDate']['tour_id'];
//        $attributes = array('legend' => false, 'style' => 'padding:20px');
//        print_r($options);
//        for ($i = 0; $i < count($tourDateArray); $i++) {
//            for ($j = 0; $j < count($tourDateData); $j++) {
//                if ($tourDateArray[$i] == $tourDateData[$j]['TourDate']['tour_date']) {
//                    echo "<td><p class='calendarP' style='margin-left: 15px;'>";
//                    echo $this->Form->radio('chosenDate', $options, $attributes);
//                    echo "</p></td>";
//                    break;
//                } else {
//                    echo "<td></td>";
//                }
//            }
//        }
//        echo $this->Form->radio('chosenDate', $options, $attributes);
        ?>
        <?php
        $id = $tour['Tour']['id'];

        for ($i = 0; $i < count($tourDateArray); $i++) {
            $status = true;
            for ($j = 0; $j < count($tourDateData); $j++) {
                if ($tourDateArray[$i] == $tourDateData[$j]['TourDate']['tour_date'] && $tourDateData[$j]['display'] == true) {
                    $tourDateId = $tourDateData[$j]['TourDate']['id'];

                    echo "<td><p class='calendarP' style='margin-left: 0px;'>";
//                echo "<input type='radio' name='dateChoosen' id='date$tourDateId' style='padding:20px' value='4' onclick='formSubmit()' >";
                    echo $this->Html->image("Book.png", array("alt" => "Click to Book", 'name' => "Click to Book", 'width' => "90", 'style' => "", 'url' => array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'Tour', 'id' => "$id", 'dateId' => "$tourDateId"))));
                    echo "</p></td>";
                    $status = false;
                    break;
                } else if ($tourDateArray[$i] == $tourDateData[$j]['TourDate']['tour_date'] && $tourDateData[$j]['display'] == false) {
                    echo "<td><p class='calendarP' style='margin-left: 0px;'>";
                    echo $this->Html->image("soldout.png", array("alt" => "This tour has sold out", 'name' => "This tour has sold out", 'width' => "90", 'style' => ""));
                    echo "</p></td>";
                    $status = false;
                }
            }
            if ($status == true) {
                echo "<td></td>";
            }
        }
        ?>
    </tr>
</table>
<table width="200px" border="1" style="width:250px; margin-bottom: 0px;margin-left: 665px;">
    <tr>
        <td style="vertical-align:middle; border-bottom: 0px">Price Per Person</td>
        <td style="border-bottom: 0px;"><div class="tourPrice"><?php echo $tour['Tour']['tour_price_per_certificate']; ?></div></td>
    </tr>
</table>
<?php
//                echo $this->Html->image("Book.png", array("alt" => "Book", 'name' => "Book", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'tours', 'action' => 'checkout',$tour['Tour']['id'])));
//echo $this->Html->link(__(''), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'Tour', 'id' => "$id")), array("class" => "tourBook"));
//echo $this->Html->link(__(''), array('controller' => 'tours', 'action' => 'checkout', $tour['Tour']['id']), array("class" => "tourBook"));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add', '?' => array('def' => 'Tour', 'id' => "$id")), array("class" => "feedback"));
//echo $this->Html->image("feedback_button.jpg", array("alt" => "Feedback", 'name' => "Feedback", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'feedbacks', 'action' => 'add',$tour['Tour']['id'])));
//echo $this->Html->link(__('Redeem this tour with your gift voucher!'), array('controller' => 'giftvouchers', 'action' => 'redeem', '?' => array('def' => 'Tour','id' => "$id")), array("class" => "redeem", 'style'=>'color:#1872a3;font-weight:normal;'));
echo $this->Html->link(__('Redeem this tour with your gift voucher!'), array('controller' => 'users', 'action' => 'redeemLogin', '?' => array('def' => 'Tour', 'id' => "$id")), array("class" => "redeem", 'style' => 'color:#1872a3;font-weight:normal;'));
?>
<?php echo $tour['Tour']['tour_description']; ?>
<h2 class="tourParticipantGuide">Participant Guidelines</h2>
<p><?php echo $tour['Tour']['tour_paricipant_guidlines']; ?></p>
<h2 class="tourParticipantGuide">Location</h2>
<p><?php echo $tour['Tour']['tour_location']; ?></p>
<h2 class="tourParticipantGuide">Duration</h2>
<p><?php echo $tour['Tour']['tour_duration']; ?></p>
<h2 class="tourParticipantGuide">Weather Requirements</h2>
<p><?php echo $tour['Tour']['tour_weather']; ?></p>
<h2 class="tourParticipantGuide">People Limit</h2>
<p><?php echo $tour['Tour']['tour_max_num_on_day']; ?></p>

<h2 class="tourParticipantGuide">Feedback</h2>
<p><?php foreach ($feedbacks as $feedback): ?>
    <tr>
        <td><?php echo $feedback['Feedback']['first_name']; ?> said "<?php echo $feedback['Feedback']['feedback_description']; ?>"<p /></td>
    </tr>
<?php endforeach; ?></p>
