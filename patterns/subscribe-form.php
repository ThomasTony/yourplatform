<?php
/**
 * Title: Signup Form with Background
 * Slug: yourplatform/signup-form
 * Categories: newsletter, signup, yourplatform
 */
?>

<!-- wp:group {"align":"full","className":"signup-form has-background","style":{"background":{"backgroundImage":"url(https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/10/dorian-mongel-340528-4-1920x1280.jpg)","backgroundPosition":"center center","backgroundSize":"cover","backgroundAttachment":"fixed"}}} -->
<div class="wp-block-group alignfull signup-form has-background" style="background-image:url(https://demo.loftocean.com/eaven-travel/wp-content/uploads/sites/41/2019/10/dorian-mongel-340528-4-1920x1280.jpg);background-position:center center;background-size:cover;background-attachment:fixed;">
  <div class="wp-block-group__inner-container">

    <!-- wp:heading {"level":5,"className":"widget-title"} -->
    <h5 class="widget-title">Don't Miss Anything New</h5>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Sign up to the weekly travel newsletter for the latest posts, city guides, and useful travel tips and secrets.</p>
    <!-- /wp:paragraph -->

    <!-- wp:html -->
    <form class="mc4wp-form" method="post">
      <div class="fields-container">
        <input type="email" name="EMAIL" placeholder="Your Email" required>
        <input type="submit" value="Subscribe">
      </div>

      <p>
        <label>
          <input name="AGREE_TO_TERMS" type="checkbox" value="1" required>
          <a href="#" target="_blank">I have read and agree to the terms &amp; conditions</a>
        </label>
      </p>
    </form>
    <!-- /wp:html -->

  </div>
</div>
<!-- /wp:group -->
