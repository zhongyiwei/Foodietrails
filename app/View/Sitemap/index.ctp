<h1 class="tourHeader">Sitemap</h1>
<ul><li class="parent_sitemap"><?php echo $this->Html->link(__('Home'), array('controller' => 'Home', 'action' => 'display')); ?></li></ul>
<ul><li class="parent_sitemap">Tours</li>
<?php for ($i = 0; $i < count($menu); $i++) { ?>
  <ul><li class="indent_sitemap"> <?php $tourName = $menu[$i]['Tour']['tour_name'];
   echo $this->Html->link(__($tourName), array('controller' => 'Tours', 'action' => 'tourDetail', $menu[$i]['Tour']['id']));
                                ?></li></ul>
<?php } ?>

<ul><li class="parent_sitemap">Events</li>
<?php for ($i = 0; $i < count($menu2); $i++) { ?>
    <ul><li class="indent_sitemap"> <?php $eventName = $menu2[$i]['Event']['event_name'];
                            echo $this->Html->link(__($eventName), array('controller' => 'Events', 'action' => 'event_detail', $menu2[$i]['Event']['id']));
                                ?></li></ul>

<?php } ?>
</ul>
<ul><li class="parent_sitemap">About Us</li>
<ul><li class="indent_sitemap"><?php echo $this->Html->link(__('Contact Us'), array('controller' => 'About', 'action' => 'contactUs')); ?></li></ul>
<ul><li class="indent_sitemap"><a href="http://foodietrails.com.au/blogweb/index.php">Blogs</a></li></ul>
<ul><li class="indent_sitemap"><?php echo $this->Html->link(__('About Foodie Trails Inc.'), array('controller' => 'About', 'action' => 'aboutCompany')); ?></li></ul>
</ul>