<?php
/**
 * Title: Sidebar with Profile and Widgets
 * Slug: yourplatform/sidebar
 * Categories: sidebar
 */

 $social_links = ThemeOptions::get_social_links();

?>
<!-- wp:group {"className":"sidebar","layout":{"type":"default"}} -->
<div class="wp-block-group d-flex flex-column flex-nowrap gap-30">

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"width":280,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized">
      <img src="http://localhost/works/yourplatform/wp-content/uploads/2025/06/train.png" alt="kiko" width="280"/>
    </figure>
    <!-- /wp:image -->

    <!-- wp:heading {"level":6,"className":"subheading"} -->
    <h6 class="subheading">India’s First In-Train Magazine.</h6>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>India’s first in-train magazine offers travelers engaging content like travel tips, destination highlights, and entertainment, making the journey more enjoyable and informative.</p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"linkDestination":"custom","href":"https://1.envato.market/4jo01"} -->
    <figure class="wp-block-image"><a href="https://1.envato.market/4jo01"><img src="https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/10/ad-square-2-300x201.jpg" alt="ad-square-2"/></a></figure>
    <!-- /wp:image -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group d-flex flex-column flex-nowrap gap-30">
    <!-- wp:heading {"level":5} -->
    <h5 class="m-0 sidebar_sec_title">Follow Us</h5>
    <!-- /wp:heading -->

    <!-- wp:social-links {"iconColor":"primary","iconColorValue":"#000000","layout":{"type":"flex","justifyContent":"left"}} -->
    <ul class="wp-block-social-links has-icon-color side_bar_social_links m-0">
        <?php
            foreach($social_links as $k => $links){
        ?>
            <li class="sidebar_social_li">
                <a class="nav-link <?php echo $k; ?> d-flex align-items-center gap-10" href="<?php echo $links; ?>" target="_blank"></a>
            </li>
        <?php
            }
        ?>
    </ul>
    <!-- /wp:social-links -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group d-flex flex-column flex-nowrap gap-30 align-items-start most_popular">
    <!-- wp:heading {"level":5} -->
    <h5 class="m-0 sidebar_sec_title">Most Popular</h5>
    <!-- /wp:heading -->

    <!-- wp:query {"query":{"perPage":3,"orderBy":"date","order":"desc"},"displayLayout":{"type":"list"}} -->
    <div class="wp-block-query m-0 most_popular_post">
      <!-- wp:post-template -->
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group d-flex flex-column flex-nowrap align-items-start">
          <!-- wp:post-featured-image {"isLink":true,"width":"100%", "height":"280px"} /-->
          <!-- wp:group -->
          <div class="wp-block-group d-flex flex-column flex-nowrap gap-1">
            <!-- wp:post-terms {"term":"category"} /-->
            <!-- wp:post-title {"isLink":true} /-->
            <!-- wp:post-date /-->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
      <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group  d-flex flex-column flex-nowrap gap-30">
  <!-- wp:heading {"level":5} -->
  <h5 class="m-0 sidebar_sec_title">Hot Destinations</h5>
  <!-- /wp:heading -->
  <!-- wp:query {"query":{"perPage":3,"orderBy":"date","order":"desc"},"displayLayout":{"type":"list"}} -->
    <div class="wp-block-query m-0 most_popular_post">
      <!-- wp:post-template -->
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group d-flex flex-column flex-nowrap align-items-start">
          <!-- wp:post-featured-image {"isLink":true,"width":"100%", "height":"280px"} /-->
          <!-- wp:group -->
          <div class="wp-block-group d-flex flex-column flex-nowrap gap-1">
            <!-- wp:post-terms {"term":"category"} /-->
            <!-- wp:post-title {"isLink":true} /-->
            <!-- wp:post-date /-->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
      <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group d-flex flex-column flex-nowrap gap-30 ">
    <!-- wp:heading {"level":5} -->
    <h5 class="m-0 sidebar_sec_title">Newsletter</h5>
    <!-- /wp:heading -->

    <!-- wp:html -->
    <form class="mc4wp-form" method="post">
      <p>Sign up to the weekly travel newsletter for the latest posts, city guides, and the useful travel tips and secrets.</p>
      <div class="fields-container">
        <input type="email" name="EMAIL" placeholder="Your Email" required>
        <input type="submit" value="Subscribe">
      </div>
      <p>
        <label>
          <input name="AGREE_TO_TERMS" type="checkbox" value="1" required> <a href="#" target="_blank">I have read and agree to the terms &amp; conditions</a>
        </label>
      </p>
    </form>
    <!-- /wp:html -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
