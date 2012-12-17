<?php
$eventName = $event['Event']['event_name'];
$this->assign('title', "Foodie Trails - $eventName ");
//print_r($event);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="tourHeader">
<?php echo $event['Event']['event_name']?>
</h1>
<?php echo $event['Event']['event_description']; ?>
<h2 class="tourParticipantGuide">Date:</h2>
<p><?php echo $event['Event']['event_date'];?></p>