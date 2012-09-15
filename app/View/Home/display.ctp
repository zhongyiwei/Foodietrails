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
                <li><?php echo $this->Html->image("Picture1.jpg", array("alt" => "Masala Trails",'title'=>'Masala Trails', 'width'=>700));?></li>
                <li><?php echo $this->Html->image("Picture2.jpg", array("alt" => "Indian Trails",'title'=>'Indian Trails', 'width'=>700));?></li>
                <li><?php echo $this->Html->image("Picture3.jpg", array("alt" => "Afriaca Trails",'title'=>'Afriaca Trails', 'width'=>700));?></li>
            </ul>
        </div>
    </div>
    <div class="contentChooser"> </div>
</div>
<table width="200" border="1">
    <tr>
        <td><div style="width: 720px" class="line">
                <div class="tourTitle"> <span>Masala Trails</span> </div>
                <div class="tourImage"><?php echo $this->Html->image("MT1.jpg", array("alt" => "Afriaca Trails",'title'=>'Afriaca Trails', 'height'=>'125px','border'=>0));?></div>
                <div class="tourDetails"> <b>Country: </b>Australia <?php // print_r($tour); ?><br>
                    <b>Duration: </b>1 Day<br>
                    <b>Description: </b> <span id="gv1_ctl18_lblDescription">Come explore with us the flavours of Indian food, learn about the spices and the regions and delight your palette. The opportunity to learn from our experts the uses of the spices in the various foods and their benefits... </span> <a href="" id="" style="font-size:11px; text-decoration:underline; color:blue; cursor:pointer">Read More</a> <br>
                    <div class="countingBox">
                        <div class="countingBoxAlignment"><span class="countingBoxFont">1 of 3</span></div>
                    </div>
                    <br>
                </div>
                <div class="price"><span style="font-size: 16px;">from </span><br>
                    AU$ 1505<br>
                    <br>
                </div>
                <div style="clear:both;"></div>
            </div></td>
        <td>&nbsp;</td>
        <td style="vertical-align:top">
            <div class="sidetab">
                <div class="title2">Featured Tour</div>
            </div>
        </td>
    </tr>
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
