<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=270684012976952";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="search">
    <div class="searchBorder">
<!--        <div class="searchPanel">
            <h1>Pending Content</h1>
            <table class="searchTable" width="200" border="0" style="margin-left:15px; display:none;">
                <tr>
                    <td><p>City:</p></td>
                    <td><select>
                            <option>Melbourne</option>
                        </select></td>
                </tr>
                <tr>
                    <td><p>Duration:</p></td>
                    <td><select>
                            <option>1 Day</option>
                        </select></td>
                </tr>
                <tr>
                    <td><p>Budget:</p></td>
                    <td><select>
                            <option>100 Dollars</option>
                        </select></td>
                </tr>
            </table>
            <div class="buttonLocation">
                <button  class="showTourButton">Show Tours</button>
            </div>
        </div>-->
        <div id="slideshow">
            <ul>
                <li><?php echo $this->Html->image("Picture1.jpg", array("alt" => "Masala Trails", 'title' => 'Masala Trails', 'width' => 700)); ?></li>
                <li><?php echo $this->Html->image("Picture2.jpg", array("alt" => "Indian Trails", 'title' => 'Indian Trails', 'width' => 700)); ?></li>
                <li><?php echo $this->Html->image("Picture3.jpg", array("alt" => "Africa Trails", 'title' => 'Africa Trails', 'width' => 700)); ?></li>
            </ul>
        </div>
    </div>
    <div class="contentChooser"> </div>
</div>
<table width="200" border="1">
    <tr><td style="border:0px"><span class="homePageTitle">Tours</span></td>
            <td rowspan="<?php echo (count($tourData)+count($cookingClassData)+2); ?>" style="height:855px; vertical-align:top;border-bottom: none;border-left:1px solid #DDD;">
            <div class="sidetab">
                <div class="title2">Social Feeds</div>
                <div class="touradvisor">
                    <div id="TA_selfserveprop495" class="TA_selfserveprop" style="border-radius:10px;">
                        <ul id="HUhi3hDhjOU" class="TA_links krJduqL">
                            <li id="rF2wPI" class="DYM4Z7d">2 reviews of <a target="_blank" href="http://www.tripadvisor.com.au/Attraction_Review-g255100-d2513377-Reviews-Foodie_Trails-Melbourne_Victoria.html">Foodie Trails</a> in Melbourne</li>
                        </ul>
                    </div>
                    <div class="fb-activity facebookstyle" data-site="http://www.foodietrails.com.au/" data-width="240" data-height="200" data-header="true" data-linktarget="_parent" data-border-color="#ccc" data-font="segoe ui" data-recommendations="false"></div>
                    <a class="twitter-timeline" width="240px" height="150px" href="https://twitter.com/foodietrails" data-widget-id="270741683187093507">Tweets by @foodietrails</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td style="border-bottom: none; width:500px"><div style="width: 650px" class="line">
                <div class="tourTitle"> <span><?php echo $tourData[0]['Tour']['tour_name']; ?></span> </div>
                <div class="tourImage"><?php $tourThumbnail = $tourData[0]['Tour']['tour_thumbnail']; ?>
                    <img src='<?php echo $tourThumbnail ?>' alt = "<?php echo $tourData[0]['Tour']['tour_name']; ?>" title = '<?php echo $tourData[0]['Tour']['tour_name']; ?>' height = '125px' width = '175px' border = 0/></div>
                                    <!--<div class="tourDetails"> <b>Country: </b>Australia <?php // print_r($tour);             ?><br>-->

                <div class="tourDetails"> <b>Location: </b> <?php echo $tourData[0]['Tour']['tour_location']; ?><br>
                    <b>Duration: </b><?php echo $tourData[0]['Tour']['tour_duration']; ?> Day<br>
                    <b>Description: </b> <span id="gv1_ctl18_lblDescription"><?php
$description = $this->Text->truncate($tourData[0]['Tour']['tour_description'], 10, array('ellipsis' => '...'));
echo $description;
?></span> 
                    <?php echo $this->Html->link(__('Read More'), array('controller' => 'Tours', 'action' => 'tourDetail', $tourData[0]['Tour']['id']), array('class' => 'homePageLink')); ?>
                    <!--                    <div class="countingBox">
                                            <div class="countingBoxAlignment"><span class="countingBoxFont">1 of 3</span></div>
                                        </div>-->
                    <br/>
                </div>
                <div class="price"><span style="font-size: 16px;">from </span><br>
                    AU$ <?php echo $tourData[0]['Tour']['tour_price_per_certificate']; ?><br>
                    <br>
                </div>
                <div style="clear:both;"></div>
            </div>
        </td>
        <td rowspan="<?php echo count($tourData); ?>" style="border-bottom: none;">&nbsp;</td>
    </tr>
    <?php for ($i = 1; $i < count($tourData); $i++) { ?>
        <tr>
            <td style="border-bottom: none"><div style="width: 650px" class="line">
                    <div class="tourTitle"> <span><?php echo $tourData[$i]['Tour']['tour_name']; ?></span> </div>
                    <div class="tourImage"><?php $tourThumbnail2 = $tourData[$i]['Tour']['tour_thumbnail']; ?>
                        <img src='<?php echo $tourThumbnail2 ?>' alt = "<?php echo $tourData[$i]['Tour']['tour_name']; ?>" title = '<?php echo $tourData[$i]['Tour']['tour_name']; ?>' height = '125px' width = '175px' border = 0/></div>
                                         <!--<div class="tourDetails"> <b>Country: </b>Australia <?php // print_r($tour);             ?><br>-->

                    <div class="tourDetails"> <b>Location: </b> <?php echo $tourData[$i]['Tour']['tour_location']; ?><br>
                        <b>Duration: </b><?php echo $tourData[$i]['Tour']['tour_duration']; ?> Day<br>
                        <b>Description: </b> <span id="gv1_ctl18_lblDescription"><?php
    $description = $this->Text->truncate($tourData[$i]['Tour']['tour_description'], 10, array('ellipsis' => '...'));
    echo $description;
        ?></span>        <?php echo $this->Html->link(__('Read More'), array('controller' => 'Tours', 'action' => 'tourDetail', $tourData[$i]['Tour']['id']), array('class' => 'homePageLink')); ?> <br>
                        <!--                        <div class="countingBox">
                                                    <div class="countingBoxAlignment"><span class="countingBoxFont">1 of 3</span></div>
                                                </div>-->
                        <br>
                    </div>
                    <div class="price"><span style="font-size: 16px;">from </span><br>
                        AU$ <?php echo $tourData[$i]['Tour']['tour_price_per_certificate']; ?><br>
                        <br>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </td>
        </tr>
    <?php } ?>
    <tr><td style="border:0px;"><span class="homePageTitle">Cooking Classes</span></td></tr>
    <?php for ($i = 0; $i < count($cookingClassData); $i++) { ?>
        <tr>
            <td style="border-bottom: none"><div style="width: 650px" class="line">
                    <div class="tourTitle"> <span><?php echo $cookingClassData[$i]['Cookingclass']['cooking_class_name']; ?></span> </div>
                    <div class="tourImage"><?php $cookingClassThumbnail = $cookingClassData[$i]['Cookingclass']['cooking_class_thumbnail']; ?>
                        <img src='<?php echo $cookingClassThumbnail ?>' alt = "<?php echo $cookingClassData[$i]['Cookingclass']['cooking_class_name']; ?>" title = '<?php echo $cookingClassData[$i]['Cookingclass']['cooking_class_name']; ?>' height = '125px' width = '175px' border = 0/></div>
                    <div class="tourDetails"> <b>Location: </b> <?php echo $cookingClassData[$i]['Cookingclass']['cooking_class_location']; ?><br>
                        <b>Description: </b> <span id="gv1_ctl18_lblDescription"><?php
    $description = $this->Text->truncate($cookingClassData[$i]['Cookingclass']['cooking_class_description'], 10, array('ellipsis' => '...'));
    echo $description;
        ?></span>        <?php echo $this->Html->link(__('Read More'), array('controller' => 'Cookingclasses', 'action' => 'cookingclass_detail', $cookingClassData[$i]['Cookingclass']['id']), array('class' => 'homePageLink')); ?> <br>
                        <br>
                    </div>
                    <div class="price"><span style="font-size: 16px;">from </span><br>
                        AU$ <?php echo $cookingClassData[$i]['Cookingclass']['cooking_class_price']; ?><br>
                        <br>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </td>
        </tr>
    <?php } ?>     
</table>

<script type="text/javascript" charset="utf-8">
$("#slideshow").craftyslide(
{
    'width': 850,
    'height': 250,
    'pagination': false,
    'fadetime': 500,
    'delay': 5000
});
</script>
<?php
// print_r($tourData); ?>