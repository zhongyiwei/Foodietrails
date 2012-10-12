<?php
for ($i = 0; $i < count($subscribers); $i++) {
    $email = new CakeEmail();
    $email->config('default');
//    $headers="MIME-Version: 1.0\n";
//    $headers.="Content-type: text/html; charset=iso 8859-1";
//    $email->setHeaders($headers);
    $email->emailFormat('html');
    $email->from(array('noreply@foodietrails.com' => 'Foodie Trails.com'));
    $subscribersName = $subscribers[$i]['User']['user_email'];
    $email->to("$subscribersName");
//    debug($subscribersName);
//    debug($news);
    $newsTitle = $news['News']['news_title'];
    $newsDesc = $news['News']['news_description'];
    $email->subject($newsTitle);
    $email->send($newsDesc);
}
?>
Your email has sent to all the subscribers ! Click <?php echo $this->Html->link(__('Here'), array('action' => 'index')); ?> to go back.