<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <?php
            echo $this->Html->css('reset');
			echo $this->Html->css('cake.generic.css');
            echo $this->Html->css('index');
            echo $this->Html->css('craftyslide');

            ?>
            <script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
            <script type="text/javascript" src="js/craftyslide.js"></script>
            <script type="text/javascript" src="js/jquery.roundabout.js"></script>
            <title><?php echo $this->fetch('title'); ?></title>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <a href="home"><img src="../../../img/LOGO.jpg" alt="Foodie Trails Logo" name="Foodie Trails Logo" height="90" id="Insert_logo" style="background: #FFF; display:block; float:left" /></a>
                <div class="headerRight">
                    <p class="headerRightText">Contact Us: 0452660748<br/>
                        Taste the blend of flavours, Experience the culture, Explore the regions</p>
                </div>
            </div>
            <div class="menu">
                <div class="submenu submenu_selected">Home</div>
                <div class="submenu">International Culinary Tours </div>
                <div class="submenu">Walking Food Tours</div>
                <div class="submenu">Media</div>
                <div class="submenu">Deals</div>
                <div class="submenu">Events</div>
                <div class="submenu">Food Tours Melbourne</div>
                <div class="submenu">About Us</div>
            </div>
            <div class="content">
                <?php echo $this->fetch('content'); ?>
            </div>
            <div class="footer">
                <table width="920" border="0">
                    <tr>
                        <td style="vertical-align:middle"><span>About Us</span>
                            <span>Tours</span>
                            <span>Media</span>
                            <span>Deals</span>
                            <span>Events</span></td>
                        <td style="vertical-align:middle" align="right"><img src="../../../../../img/BH.png" width="60" alt="BH"></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>