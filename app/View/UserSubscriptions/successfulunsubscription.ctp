<?php $this->assign('title', "Foodie Trails - Unsubscribed Successful"); ?>
<?php
echo "You have succesfully unsubscribed to the newsletter, click ".$this->Html->link(__('here'), array('controller' => 'home', 'action' => 'index')) . " to return to home page.</p>";
?>