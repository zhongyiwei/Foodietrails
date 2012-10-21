<!--<h1 class="contactHeading">Himanshi</h1>
<img src="<?php echo $this->webroot; ?>img/ContactUsP1.png" align="right" height="300px" style="margin: -50px 50px;"/>
<p class="contactP">P O Box 8634, Armadale VIC 3143</p>
<p class="contactP">Telephone: 1800 667 791</p>
<p class="contactP">Fax: 1800 667 824</p>
<p class="contactP">Email:<a href="mailto:tours@foodietrails.com<h1 class="contactHeading">Himanshi</h1>
.au" style="font-weight: normal;margin-left:10px;">tours@foodietrails.com.au</a></p>-->

<form method="post" action="<?php echo $this->webroot; ?>about/contactUs/">
    <table width="200" border="1">
        <tr>
            <td width="150px">First Name <span style="color:red">*</span></td>
            <td><?php
echo $this->Form->input('first_name', array('label' => false, 'div' => false));
if (isset($validationErrorsArray['first_name'])) {
    echo "<div class='input text required error'>" . $validationErrorsArray['first_name'][0] . "</div>";
};
?></td>
        </tr>
        <tr>
            <td>Last Name <span style="color:red">*</span></td>
            <td><?php
echo $this->Form->input('last_name', array('label' => false, 'div' => false));
if (isset($validationErrorsArray['last_name'])) {
    echo "<div class='input text required error'>" . $validationErrorsArray['last_name'][0] . "</div>";
};
?></td>
        </tr>
        <tr>
            <td>Your E-mail <span style="color:red">*</span></td>
            <td><?php
echo $this->Form->input('email', array('label' => false, 'div' => false));
if (isset($validationErrorsArray['email'])) {
    echo "<div class='input text required error'>" . $validationErrorsArray['email'][0] . "</div>";
};
?></td>
        </tr>
        <tr>
            <td>Phone </td>
            <td><?php echo $this->Form->input('phone', array('label' => false, 'div' => false)); ?></td>
        </tr>
        <tr>
            <td>Inquiring About</td>
            <td><?php
                for ($i = 0; $i < count($menu); $i++) {
                    $name = $menu[$i]['Tour']['tour_name'];
                    $publicTourName["$name"] = $name;
                }
                for ($i = 0; $i < count($menu5); $i++) {
                    $name = $menu5[$i]['Tour']['tour_name'];
                    $privateTourName["$name"] = $name;
                }
                for ($i = 0; $i < count($menu6); $i++) {
                    $name = $menu6[$i]['Tour']['tour_name'];
                    $internationalTourName["$name"] = $name;
                }
                for ($i = 0; $i < count($menu2); $i++) {
                    $name = $menu2[$i]['Event']['event_name'];
                    $eventName["$name"] = $name;
                }
                for ($i = 0; $i < count($menu3); $i++) {
                    $name = $menu3[$i]['Cookingclass']['cooking_class_name'];
                    $cookingClass["$name"] = $name;
                }
                $options['Public Tour'] = $publicTourName;
                $options['Private Tour'] = $privateTourName;
                $options['International Tour'] = $internationalTourName;

                $options['Event'] = $eventName;
                $options['Cooking Class'] = $cookingClass;
                echo $this->Form->select('inquiring', $options, array('label' => false, 'div' => false));
?></td>
        </tr>
        <tr>
            <td>I wan to </td>
            <td><?php
                $options = array(
                    'make a booking' => 'Make a booking',
                    'check availablity' => 'Check Availablity',
                    'want more Information' => 'Want more Information',
                    'talk about other issues' => 'Other');
                echo $this->Form->select('wantto', $options, array('label' => false, 'div' => false, 'multiple' => 'checkbox'));
?></td>
        </tr>
        <tr>
            <td>Your Message <span style="color:red">*</span></td>
            <td><?php
                echo $this->Form->input('message', array('label' => false, 'div' => false, 'type' => 'textarea'));
                if (isset($validationErrorsArray['message'])) {
                    echo "<div class='input text required error'>" . $validationErrorsArray['message'][0] . "</div>";
                };
?></td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="<?php
                     if (isset($Error)) {
                         echo $Error[1];
                     }
?>" style="padding:0px;margin-bottom: 0px">
<?php
require_once('recaptchalib.php');
$publickey = "6LeF-dcSAAAAAJpOKKcC_TuETypGQgUPXwNZTHyh";
echo recaptcha_get_html($publickey);
if (isset($Error)) {
    echo $Error[0];
}
//                    print_r($validationErrorsArray);
?>
                </div>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0px;" colspan="2"><?php echo $this->Form->end(__('Submit')); ?></td>
        </tr>
    </table>
</form>