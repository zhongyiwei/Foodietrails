<h1 class="sitemapHeader">Sitemap</h1>
<table width="200" border="1">
    <tr>
        <td style="width:350px;">
            <ul><li class="parent_sitemap"><?php echo $this->Html->link(__('Home'), array('controller' => 'Home', 'action' => 'index')); ?><p /></li></ul>
            <ul><li class="parent_sitemap"> Tours</li>
                <ul>
                    <?php
                    for ($i = 0; $i < count($tourTypeData); $i++) {
                        echo "<li class='indent_sitemap'><a>" . $tourTypeData[$i]['TourType']['tour_type_name'];
                        echo "</a>
                                        <ul>";
                        for ($j = 0; $j < count($tourMenu[$i]); $j++) {
                            echo "<li class='indent_sitemap2'>";
                            $tourName = $tourMenu[$i][$j]['Tour']['tour_name'];
                            echo $this->Html->link(__($tourName), array('controller' => 'Tours', 'action' => 'tourDetail', $tourMenu[$i][$j]['Tour']['id']));
                            echo "</li>";
                        }
                        echo "</ul>
                                    </li>";
                    }
                    ?>
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
                    <ul><li class="parent_sitemap">Events</li>
                        <?php for ($i = 0; $i < count($menu2); $i++) { ?>
                            <ul><li class="indent_sitemap"> <?php
                        $eventName = $menu2[$i]['Event']['event_name'];
                        echo $this->Html->link(__($eventName), array('controller' => 'Events', 'action' => 'event_detail', $menu2[$i]['Event']['id']));
                            ?></li></ul>

                        <?php } ?>
                        <p /></ul>

                    </td>
                    <td>
                        <ul><li class="parent_sitemap"><?php echo $this->Html->link(__('Products'), array('controller' => 'Products', 'action' => 'product_details')); ?><p /></li></ul>
                        <ul><li class="parent_sitemap">Media</li>
                            <li class="indent_sitemap">Newsletter Subscription
                                <ul>
                                    <li class="indent_sitemap2"><?php echo $this->Html->link(__('Subscribe'), array('controller' => 'UserSubscriptions', 'action' => 'subscribe')); ?></li>
                                    <li class="indent_sitemap2"><?php echo $this->Html->link(__('Unsubscribe'), array('controller' => 'UserSubscriptions', 'action' => 'unsubscribe')); ?></li>
                                </ul>
                            </li>
                        </ul>
                        <?php for ($i = 0; $i < count($menu4); $i++) { ?>
                            <ul><li class="indent_sitemap"> <?php
                        $mediaName = $menu4[$i]['News']['news_title'];
                        echo $this->Html->link(__($mediaName), array('controller' => 'News', 'action' => 'news_detail', $menu4[$i]['News']['id']));
                            ?></li></ul>

                        <?php } ?>
                        <p />
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



                    </td>
                    </tr>
                    </table>

