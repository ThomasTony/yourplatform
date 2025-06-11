<?php

/**
 * Title: Footer
 * Slug: yourplatform/footer
 * Categories: yourplatform
 */

$footer = ThemeOptions::get_footer_settings();
// echo "<pre>";print_r($footer);exit;
?>

<!-- wp:group {"tagName":"footer","className":"site-footer","layout":{"type":"default"}} -->
<footer class="wp-block-group site-footer">

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group container">

    <!-- wp:columns -->
    <div class="wp-block-columns footer__widget">

      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:image -->
        <figure class="wp-block-image footer_col1_image">
          <img class="img-mx-w-50" src="<?php echo esc_url(wp_get_attachment_url($footer['col1']['image'])); ?>" alt="About YourPlatform" />
        </figure>
        <!-- /wp:image -->

        <!-- wp:heading {"level":5} -->
        <h5 class="footer_col_title"><?php echo esc_html($footer['col1']['title']); ?></h5>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p></p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:column -->


      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:heading {"level":5} -->
        <h5 class="footer_col_title"><?php echo esc_html($footer['col2']['title']); ?></h5>
        <!-- /wp:heading -->
        <!-- wp:html -->
        <?php
        $footer_col_2_menu = ThemeOptions::get_menu_term($footer['col2']['menu_id']);

        if ($footer_col_2_menu instanceof WP_Term) {
          wp_nav_menu([
            'menu'       => $footer_col_2_menu->term_id,
            'menu_class' => 'footer_nav_menu footer_nav_menu_col_1',
            'container'  => false,
            'fallback_cb' => false,
            'echo'       => true,
            'depth'      => 0,
            'items_wrap' => '<ul id="%1$s" class="%2$s" style="display: block; flex-direction: column;">%3$s</ul>',
          ]);
        } else {
          echo '<!-- Footer menu not found -->';
        }
        ?>

        <!-- /wp:html -->

      </div>
      <!-- /wp:column -->

      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:heading {"level":5} -->
        <h5 class="footer_col_title"><?php echo esc_html($footer['col3']['title']); ?></h5>
        <!-- /wp:heading -->

        <!-- wp:html -->
        <?php
        $footer_col_3_menu = ThemeOptions::get_menu_term($footer['col3']['menu_id']);

        if ($footer_col_3_menu instanceof WP_Term) {
          wp_nav_menu([
            'menu'       => $footer_col_3_menu->term_id,
            'menu_class' => 'footer_nav_menu footer_nav_menu_col_1',
            'container'  => false,
            'fallback_cb' => false,
            'echo'       => true,
            'depth'      => 0,
            'items_wrap' => '<ul id="%1$s" class="%2$s" style="display: block; flex-direction: column;">%3$s</ul>',
          ]);
        } else {
          echo '<!-- Footer menu not found -->';
        }
        ?>

        <!-- /wp:html -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:heading {"level":5} -->
        <h5 class="footer_col_title"><?php echo esc_html($footer['col4']['title']); ?></h5>
        <!-- /wp:heading -->
        <div class="footer_contact_info">
          <ul>
            <?php
              foreach($footer['col4']['contact_info'] as $contact_info):
            ?>
              <li>
                <span><?php echo esc_html($contact_info['name']); ?></span>
                <span>
                  <a href="">Phone : <?php echo esc_html($contact_info['phone']); ?></a>
                </span>
                <span><a href="">Email : <?php echo esc_html($contact_info['email']); ?></a>
              </span>
              </li>
            <?php
              endforeach;
            ?>
          </ul>
        </div>
      </div>
      <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"opacity":"css","backgroundColor":"gray"} -->
    <hr class="wp-block-separator has-text-color has-gray-background-color has-css-opacity" />
    <!-- /wp:separator -->

    <!-- wp:group {"layout":{"type":"flex","alignItems":"center","justifyContent":"center"}} -->
    <div class="wp-block-group">

      <!-- wp:paragraph -->
      <p> 
        <?php echo esc_html($footer['copyrights']['text']); ?>
      </p>
      <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

  </div>
  <!-- /wp:group -->

</footer>
<!-- /wp:group -->