<?php
/**
 * Title: Header
 * Slug: yourplatform/header
 * Categories: yourplatform
 */

 $menu = ThemeOptions::get_header_menu();
 $social_links = ThemeOptions::get_social_links();

?>
<!-- wp:group -->
  <!-- wp:html -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top site-header">
  <div class="container">
    
    <!-- Site logo -->
    <!-- /wp:html -->
        <!-- wp:site-logo /-->
    <!-- wp:html -->

    <!-- Toggler for offcanvas menu -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop menu -->
    <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex">
      <?php
        if ($menu instanceof WP_Term) {
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
      <!-- <span class="navbar-text">
        <ul class="d-flex align-items-center gap-20">
          <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-searchengin"></i></a></li>
        </ul>
      </span> -->
    </div>

    <!-- Offcanvas menu for mobile -->
    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
      <div class="offcanvas-header">
        <!-- <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5> -->
        <!-- Site logo -->
        <!-- /wp:html -->
            <!-- wp:site-logo /-->
        <!-- wp:html -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column flex-nowrap gap-20">
        <div class="mobile_nav">
          <?php
            if ($menu instanceof WP_Term) {
                wp_nav_menu([
                    'menu'       => $menu->term_id,
                    'menu_class' => 'yp__header d-flex flex-column gap-10',
                    'container'  => false,
                    'fallback_cb' => false,
                    'echo'       => true,
                    'depth'      => 1,
                ]);
            }
          ?>
        </div>

        <div class="mobile_nav_social_links">
          <h2 class="nav_title mb-2 fw-semibold">Follow Us</h2>
          <ul class="d-flex flex-column p-0 m-0 gap-20">
            <?php
              foreach($social_links as $k => $links){
            ?>
                <li class="list-unstyled">
                    <a class="nav-link <?php echo $k; ?> d-flex align-items-center gap-10" href="<?php echo $links; ?>" target="_blank">
                      <span class="d-block"><?php echo ucfirst($k); ?></span>
                    </a>
                </li>
            <?php
              }
            ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</nav>

  <!-- /wp:html -->
<!-- /wp:group -->
