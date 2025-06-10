<?php
/**
 * Title: Header
 * Slug: yourplatform/header
 * Categories: yourplatform
 */

 $menu = ThemeOptions::get_header_menu();
?>
<!-- wp:group -->
  <!-- wp:html -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
  
      <div class="collapse navbar-collapse justify-content-around" id="navbarText">
        <!-- /wp:html -->
                <!-- wp:site-logo /-->
        <!-- wp:html -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- /wp:html -->
         <!-- wp:html -->
        <?php
           
            if ( $menu instanceof WP_Term ) {
                wp_nav_menu([
                    'menu'       => $menu->term_id,
                    'menu_class' => 'yp__header',
                    'container'  => false,
                    'fallback_cb' => false,
                    'echo'       => true,
                    'depth'      => 1,
                    'items_wrap' => '<ul id="%1$s" class="%2$s" style="display:flex; justify-content:center;">%3$s</ul>',
                ]);
            }
        ?>
        <!-- /wp:html -->
        <!-- wp:html -->
        <span class="navbar-text">
          <!-- Navbar text with an inline element -->
           <ul class="d-flex align-items-center gap-20">
              <li>
                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa-brands fa-searchengin"></i></i></a>
              </li>
           </ul>
        </span>
      </div>
    </div>
  </nav>
  <!-- /wp:html -->
<!-- /wp:group -->
