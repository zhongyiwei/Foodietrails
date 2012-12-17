<?php $this->assign('title', "Foodie Trails - Enquiry Send Successful");?>
<?php

echo "You have succesfully send you enquiry to our website, click ".$this->Html->link(__('here'), array('controller' => 'home', 'action' => 'index')) . " to continue your browsing.</p>";
?>