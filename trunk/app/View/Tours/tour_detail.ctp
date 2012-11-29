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
<h1 class="tourHeader"><?php echo $tour['Tour']['tour_name'] ?></h1>
<div id="slider" >
    <ul id="showTable">
        <?php
        for ($f = 0; $f < 4; $f++) {
            ?>
            <li>
                <table width="200" border="1" style="width:650px; margin-left: 25px" class="detailT"  >
                    <tr style="border-top:1px solid #DDD;">    
                        <?php
                        for ($i = $f * 7; $i < (count($weekArray) + $f * count($weekArray)) / 4; $i++) {
                            echo "<td><p class='calendarP week'>" . $weekArray[$i] . "</p><p class='calendarP dateP'>" . $dateArray[$i] . "</p></td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        $id = $tour['Tour']['id'];
                        for ($i = $f * 7; $i < (count($tourDateArray) + $f * count($tourDateArray)) / 4; $i++) {
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
                                echo "<td style='height:35px'></td>";
                            }
                        }
                        ?>
                    </tr>
                </table>
            </li>
        <?php } ?>
    </ul>
</div>
<div class="detailData" id="detailD">
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
</div>
