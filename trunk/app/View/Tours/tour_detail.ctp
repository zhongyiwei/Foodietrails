<?php
//print_r($feedback);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="tourHeader"><?php echo $tour['Tour']['tour_name'] ?></h1>
<table width="200px" border="1" style="width:250px; margin-bottom: 20px;">
    <tr>
        <td style="vertical-align:middle;">Price Per Person</td>
        <td><div class="tourPrice"><?php echo $tour['Tour']['tour_price_per_certificate']; ?></div></td>
    </tr>
</table>
<?php
$id = $tour['Tour']['id'];
//                echo $this->Html->image("Book.png", array("alt" => "Book", 'name' => "Book", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'tours', 'action' => 'checkout',$tour['Tour']['id'])));
echo $this->Html->link(__(''), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'Tour', 'id' => "$id")), array("class" => "tourBook"));
//echo $this->Html->link(__(''), array('controller' => 'tours', 'action' => 'checkout', $tour['Tour']['id']), array("class" => "tourBook"));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add', '?' => array('def' => 'Tour', 'id' => "$id")), array("class" => "feedback"));
//echo $this->Html->image("feedback_button.jpg", array("alt" => "Feedback", 'name' => "Feedback", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'feedbacks', 'action' => 'add',$tour['Tour']['id'])));

//echo $this->Html->link(__('Redeem this tour with your gift voucher!'), array('controller' => 'giftvouchers', 'action' => 'redeem', '?' => array('def' => 'Tour','id' => "$id")), array("class" => "redeem", 'style'=>'color:#1872a3;font-weight:normal;'));
echo $this->Html->link(__('Redeem this tour with your gift voucher!'), array('controller' => 'users', 'action' => 'redeemLogin', '?' => array('def'=>'Tour','id' => "$id")), array("class" => "redeem", 'style'=>'color:#1872a3;font-weight:normal;'));
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
