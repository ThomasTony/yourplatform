<?php
/**
 * Title: Signup Form with Background
 * Slug: yourplatform/subscribe-form
 * Categories: newsletter, signup, yourplatform
 */

 $call_to_action = get_field('call_to_action');

 if($call_to_action):

?>

<!-- wp:group {"align":"full","className":"subscribe-form has-background","style":{"background":{"backgroundImage":"url('<?php echo esc_url($call_to_action['bg_image']); ?>')","backgroundPosition":"center center","backgroundSize":"cover","backgroundAttachment":"fixed"}}} -->
<div class="wp-block-group alignfull subscribe-form has-background section-padding d-flex flex-row flex-nowrap align-content-center justify-content-center" style="background-image:url('<?php echo esc_url($call_to_action['bg_image']); ?>');background-position:center center;background-size:cover;background-attachment:fixed;">
  <div class="wp-block-group__inner-container s_form_container d-flex flex-column flex-nowrap align-items-center gap-30">

    <!-- wp:heading {"level":5,"className":"widget-title"} -->
    <h5 class="widget-title "><?php echo esc_html($call_to_action['title']); ?></h5>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p><?php echo esc_html($call_to_action['tagline']); ?></p>
    <!-- /wp:paragraph -->
  
    <?php echo do_shortcode('[contact-form-7 id="2e6db2a" title="Newsletter"]'); ?>
    
    <!-- wp:html -->
    <!-- <form class="" method="post">
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
    </form> -->
    <!-- /wp:html -->

  </div>
</div>
<!-- /wp:group -->

<?php

endif;

?>