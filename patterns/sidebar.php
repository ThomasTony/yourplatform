<?php
/**
 * Title: Sidebar with Profile and Widgets
 * Slug: yourplatform/sidebar
 * Categories: sidebar
 */
?>

<!-- wp:group {"className":"sidebar","layout":{"type":"default"}} -->
<div class="wp-block-group sidebar">

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"width":280,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/10/kiko-300x300.jpg" alt="kiko" width="280"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"level":6,"className":"subheading"} -->
    <h6 class="subheading">About Kiko</h6>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Traveller. Blogger. Writer. I have traveled to over 60 countries around the world since 2015! Like all great travellers, I have seen more than I remember and remember more than I have seen.</p>
    <!-- /wp:paragraph -->

    <!-- wp:image {"width":160,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/10/kiko-signature-dark-300x97.png" alt="kiko-signature-dark" width="160"/></figure>
    <!-- /wp:image -->
  </div>
  <!-- /wp:group -->

  <!-- wp:image {"linkDestination":"custom","href":"https://1.envato.market/4jo01"} -->
  <figure class="wp-block-image"><a href="https://1.envato.market/4jo01"><img src="https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/10/ad-square-2-300x201.jpg" alt="ad-square-2"/></a></figure>
  <!-- /wp:image -->

  <!-- wp:heading {"level":5} -->
  <h5>Follow Us</h5>
  <!-- /wp:heading -->

  <!-- wp:social-links {"iconColor":"primary","iconColorValue":"#000000","layout":{"type":"flex","justifyContent":"left"}} -->
  <ul class="wp-block-social-links has-icon-color">
    <!-- wp:social-link {"url":"http://www.facebook.com/","service":"facebook"} /-->
    <!-- wp:social-link {"url":"http://twitter.com/loftocean","service":"twitter"} /-->
    <!-- wp:social-link {"url":"http://youtube.com","service":"youtube"} /-->
    <!-- wp:social-link {"url":"http://pinterest.com/#","service":"pinterest"} /-->
    <!-- wp:social-link {"url":"http://vimeo.com","service":"vimeo"} /-->
  </ul>
  <!-- /wp:social-links -->

  <!-- wp:heading {"level":5} -->
  <h5>Most Popular</h5>
  <!-- /wp:heading -->

  <!-- wp:query {"query":{"perPage":3,"orderBy":"date","order":"desc"},"displayLayout":{"type":"list"}} -->
  <div class="wp-block-query">
    <!-- wp:post-template -->
      <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
      <div class="wp-block-group">
        <!-- wp:post-featured-image {"isLink":true,"width":"100px"} /-->
        <!-- wp:group -->
        <div class="wp-block-group">
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

  <!-- wp:heading {"level":5} -->
  <h5>Hot Destinations</h5>
  <!-- /wp:heading -->

  <!-- wp:columns -->
  <div class="wp-block-columns">
    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:cover {"url":"https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/06/laura-cros-721690-unsplash-768x512.jpg","dimRatio":50,"contentPosition":"center center"} -->
      <div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><a href="https://demo.loftocean.com/eaven-travel/category/destinations/australia/"><p class="has-text-align-center"><strong>Australia</strong></p></a></div></div>
      <!-- /wp:cover -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:cover {"url":"https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/06/yoosun-won-32420-unsplash-768x510.jpg","dimRatio":50,"contentPosition":"center center"} -->
      <div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><a href="https://demo.loftocean.com/eaven-travel/category/destinations/europe/italy/"><p class="has-text-align-center"><strong>Italy</strong></p></a></div></div>
      <!-- /wp:cover -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:cover {"url":"https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/06/evan-krause-395362-unsplash-768x512.jpg","dimRatio":50,"contentPosition":"center center"} -->
      <div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><a href="https://demo.loftocean.com/eaven-travel/category/destinations/asia/thailand/"><p class="has-text-align-center"><strong>Thailand</strong></p></a></div></div>
      <!-- /wp:cover -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

  <!-- wp:heading {"level":5} -->
  <h5>Newsletter</h5>
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
