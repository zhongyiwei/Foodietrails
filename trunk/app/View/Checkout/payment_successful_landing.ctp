<?php $this->assign('title', "Foodie Trails - Payment Successful");?>
<?php
        echo "You have successfully purchased your product, click ".$this->Html->link(__('here'), array('controller' => 'home', 'action' => 'index')) . " to return to home page.</p>";
?>