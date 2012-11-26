<h1 class="tourHeader">Sitemap</h1>
<ul><li class="parent_sitemap"><?php echo $this->Html->link(__('Home'), array('controller' => 'Home', 'action' => 'display')); ?><p /></li></ul>
<ul><li class="parent_sitemap"> Tours</li>
    <ul><li class="indent_sitemap"> Public Tours</li>
        <?php if ($menu != null) { ?><ul>
            <?php for ($i = 0; $i < count($menu); $i++) {
                ?>
                    <li class="indent_sitemap2"> <?php
            $publicTourName = $menu[$i]['Tour']['tour_name'];
            echo $this->Html->link(__($publicTourName), array('controller' => 'Tours', 'action' => 'tourDetail', $menu[$i]['Tour']['id']));
        }
            ?>
                </li>
            <?php } ?></ul>
    </ul>
    <ul><li class="indent_sitemap">Private Tours</li>
        <?php
        if ($menu5 != null) {
            for ($i = 0; $i < count($menu5); $i++) {
                ?>
                <ul><li class="indent_sitemap2"> <?php
        $privateTourName = $menu5[$i]['Tour']['tour_name'];
        echo $this->Html->link(__($privateTourName), array('controller' => 'Tours', 'action' => 'tourDetail', $menu5[$i]['Tour']['id']));
    }
            ?>
                </li></ul>
        <?php } ?>
    </ul>
    <ul><li class="indent_sitemap">International Tours</li>
        <?php
        if ($menu6 != null) {
            for ($i = 0; $i < count($menu6); $i++) {
                ?>
                <ul><li class="indent_sitemap2"> <?php
        $internationalTourName = $menu6[$i]['Tour']['tour_name'];
        echo $this->Html->link(__($internationalTourName), array('controller' => 'Tours', 'action' => 'tourDetail', $menu6[$i]['Tour']['id']));
    }
            ?>
                </li></ul>
        <?php } ?>
    <p /></ul>
</ul>
<ul><li class="parent_sitemap">Events</li>
    <?php for ($i = 0; $i < count($menu2); $i++) { ?>
        <ul><li class="indent_sitemap"> <?php
        $eventName = $menu2[$i]['Event']['event_name'];
        echo $this->Html->link(__($eventName), array('controller' => 'Events', 'action' => 'event_detail', $menu2[$i]['Event']['id']));
        ?></li></ul>

    <?php } ?>
<p /></ul>
<ul><li class="parent_sitemap"> <?php echo $this->Html->link(__('Products'), array('controller' => 'Products', 'action' => 'product_details')); ?><p /><p /></li>
    <ul><li class="parent_sitemap">Media</li>
        <?php for ($i = 0; $i < count($menu4); $i++) { ?>
            <ul><li class="indent_sitemap"> <?php
            $mediaName = $menu4[$i]['News']['news_title'];
            echo $this->Html->link(__($mediaName), array('controller' => 'News', 'action' => 'news_detail', $menu4[$i]['News']['id']));
            ?></li></ul>

        <?php } ?>
        <p />
        <ul><li class="parent_sitemap">Cooking Classes</li>
            <?php for ($i = 0; $i < count($menu3); $i++) { ?>
                <ul><li class="indent_sitemap"> <?php
                $cookingClassName = $menu3[$i]['Cookingclass']['cooking_class_name'];
                echo $this->Html->link(__($cookingClassName), array('controller' => 'Cookingclasses', 'action' => 'cookingclass_detail', $menu3[$i]['Cookingclass']['id']));
                ?></li></ul>

            <?php } ?>
            <p />
        </ul>
        <ul><li class="parent_sitemap">Gift Voucher</li>
            <?php for ($i = 0; $i < count($menu8); $i++) { ?>
                <ul><li class="indent_sitemap"> <?php
                $giftVoucherName = $giftVoucher[$i]['GiftVoucher']['gift_voucher_name'];
                echo $this->Html->link(__($giftVoucherName), array('controller' => 'checkout', 'action' => 'index', '?' => array('def' => 'GiftVoucher', 'id' => "$giftVoucherName")));
                ?></li></ul>

            <?php } ?>
            <p />
        </ul>
        <ul><li class="parent_sitemap">About Us</li>
            <ul><li class="indent_sitemap"><?php echo $this->Html->link(__('Contact Us'), array('controller' => 'About', 'action' => 'contactUs')); ?></li></ul>
            <ul><li class="indent_sitemap"><a href="http://foodietrails.com.au/blogweb/index.php">Blogs</a></li></ul>
            <ul><li class="indent_sitemap"><?php echo $this->Html->link(__('About Foodie Trails Inc.'), array('controller' => 'About', 'action' => 'aboutCompany')); ?></li></ul>
            <ul><li class="indent_sitemap"><?php echo $this->Html->link(__('FAQs.'), array('controller' => 'Faqs', 'action' => 'faq_view')); ?></li></ul>
        </ul>