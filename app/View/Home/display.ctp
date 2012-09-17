<div class="search">
    <div class="searchBorder">
        <div class="searchPanel">
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
        </div>
        <div id="slideshow">
            <ul>
                <li><?php echo $this->Html->image("Picture1.jpg", array("alt" => "Masala Trails", 'title' => 'Masala Trails', 'width' => 700)); ?></li>
                <li><?php echo $this->Html->image("Picture2.jpg", array("alt" => "Indian Trails", 'title' => 'Indian Trails', 'width' => 700)); ?></li>
                <li><?php echo $this->Html->image("Picture3.jpg", array("alt" => "Afriaca Trails", 'title' => 'Afriaca Trails', 'width' => 700)); ?></li>
            </ul>
        </div>
    </div>
    <div class="contentChooser"> </div>
</div>
<table width="200" border="1">
    <tr>
        <td style="border-bottom: none;"><div style="width: 720px" class="line">
                <div class="tourTitle"> <span><?php echo $tourData[0]['Tour']['tour_name']; ?></span> </div>
                <div class="tourImage"><?php $tourThumbnail = $tourData[0]['Tour']['tour_thumbnail'];
echo $this->Html->image("$tourThumbnail", array("alt" => "Afriaca Trails", 'title' => 'Afriaca Trails', 'height' => '125px', 'width' => '175px', 'border' => 0)); ?></div>
                <!--<div class="tourDetails"> <b>Country: </b>Australia <?php // print_r($tour);          ?><br>-->

                <div class="tourDetails"> <b>Location: </b> <?php echo $tourData[0]['Tour']['tour_location']; ?><br>
                    <b>Duration: </b><?php echo $tourData[0]['Tour']['tour_duration']; ?> Day<br>
                    <b>Description: </b> <span id="gv1_ctl18_lblDescription"><?php $description = $this->Text->truncate($tourData[0]['Tour']['tour_description'], 10, array('ellipsis' => '...'));
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
        <td rowspan="<?php echo count($tourData); ?>" style="vertical-align:top;border-bottom: none;border-left:1px solid #DDD;">
            <div class="sidetab">
                <div class="title2">Featured Tour</div>
            </div>
        </td>
    </tr>
<?php for ($i = 1; $i < count($tourData); $i++) { ?>
        <tr>
            <td style="border-bottom: none"><div style="width: 720px" class="line">
                    <div class="tourTitle"> <span><?php echo $tourData[$i]['Tour']['tour_name']; ?></span> </div>
                    <div class="tourImage"><?php $tourThumbnail2 = $tourData[$i]['Tour']['tour_thumbnail'];
    echo $this->Html->image("$tourThumbnail2", array("alt" => "Afriaca Trails", 'title' => 'Afriaca Trails', 'height' => '125px', 'width' => '175px', 'border' => 0)); ?></div>
                    <!--<div class="tourDetails"> <b>Country: </b>Australia <?php // print_r($tour);          ?><br>-->

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
</table>

<script type="text/javascript" charset="utf-8">
    $("#slideshow").craftyslide(
    {
        'width': 600,
        'height': 250,
        'pagination': false,
        'fadetime': 500,
        'delay': 5000
    });
</script>
<?php
// print_r($tourData); ?>