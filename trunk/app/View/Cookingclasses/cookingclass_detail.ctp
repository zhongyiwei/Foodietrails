<?php
//print_r($tour);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="tourHeader"><?php echo $cookingclass['Cookingclass']['cooking_class_name'] ?></h1>
<table width="200px" border="1" style="width:250px; ">
    <tr>
        <td style="vertical-align:middle;">Price Per Person</td>
        <td><div class="tourPrice"><?php echo $cookingclass['Cookingclass']['cooking_class_price']; ?></div></td>
    </tr>
</table>
<?php
$id = $cookingclass['Cookingclass']['id'];
//                echo $this->Html->image("Book.png", array("alt" => "Book", 'name' => "Book", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'tours', 'action' => 'checkout',$tour['Tour']['id'])));
echo $this->Html->link(__(''), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'CookingClass', 'id' => "$id")), array("class" => "tourBook"));
//echo $this->Html->link(__(''), array('controller' => 'tours', 'action' => 'checkout', $tour['Tour']['id']), array("class" => "tourBook"));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add',$cookingclass['Cookingclass']['id']), array("class" => "feedback"));
//echo $this->Html->image("feedback_button.jpg", array("alt" => "Feedback", 'name' => "Feedback", 'height' => "100", 'width' => "150", 'url' => array('controller' => 'feedbacks', 'action' => 'add',$cookingclass['Cookingclass']['id'])));
echo $this->Html->link(__(''), array('controller' => 'feedbacks', 'action' => 'add'));
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
