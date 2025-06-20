<?php
/**
 * Title: Sidebar with Profile and Widgets
 * Slug: yourplatform/sidebar
 * Categories: sidebar
 */

 $social_links = ThemeOptions::get_social_links();

$get_sidebar_widgets_info = ThemeOptions::get_sidebar_widgets_info();
// echo "<pre>"; print_r($get_sidebar_widgets_info); exit;

?>
<!-- wp:group {"className":"sidebar","layout":{"type":"default"}} -->
<div class="wp-block-group d-flex flex-column flex-nowrap gap-30 side_bar_content sticky-bottom">

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"width":280,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized">
      <img src="<?php echo esc_url($get_sidebar_widgets_info['row1']['image']); ?>" alt="kiko" width="280"/>
    </figure>
    <!-- /wp:image -->

    <!-- wp:heading {"level":6,"className":"subheading"} -->
    <h6 class="subheading"><?php echo esc_html($get_sidebar_widgets_info['row1']['title']); ?></h6>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p><?php echo esc_html($get_sidebar_widgets_info['row1']['description']); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"linkDestination":"custom","href":"<?php echo esc_url($get_sidebar_widgets_info['row2']['url']); ?>"} -->
    <figure class="wp-block-image side_bar_ad_image_1">
      <a href="<?php echo esc_url($get_sidebar_widgets_info['row2']['url']); ?>">
        <img src="<?php echo esc_url($get_sidebar_widgets_info['row2']['image']); ?>" alt="ad-square-2" height="200"/>
      </a>
    </figure>
    <!-- /wp:image -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group d-flex flex-column flex-nowrap gap-30">
    <!-- wp:heading {"level":5} -->
    <h5 class="m-0 sidebar_sec_title"><?php echo esc_html($get_sidebar_widgets_info['row3']['title']); ?></h5>
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
  
  <!-- Popular Categories -->
  <?php
  if (
      !empty($get_sidebar_widgets_info['row4']['categories']) &&
      is_array($get_sidebar_widgets_info['row4']['categories'])
  ) {
      $category_id = $get_sidebar_widgets_info['row4']['categories'][0]['id'];

      if (!empty($category_id)) {
          $term = get_term_by('id', $category_id, 'category');

          if ($term && !is_wp_error($term)) {
              $section_title = esc_html($get_sidebar_widgets_info['row4']['title']);
              ?>

              <!-- Sidebar: Popular Posts from Selected Category -->
              <div class="wp-block-group d-flex flex-column flex-nowrap gap-30 align-items-start most_popular">
                  <h5 class="m-0 sidebar_sec_title wp-block-heading"><?php echo $section_title; ?></h5>

                  <div class="most_popular_post w-100">
                      <?php
                      $query = new WP_Query([
                          'post_type'      => 'post',
                          'posts_per_page' => 3,
                          'post_status'    => 'publish',
                          'orderby'        => 'date',
                          'order'          => 'DESC',
                          'cat'            => $category_id,
                      ]);

                      if ($query->have_posts()) :
                          while ($query->have_posts()) : $query->the_post(); ?>
                              <div class="post-card d-flex flex-column align-items-start mb-3">
                                  <a href="<?php the_permalink(); ?>">
                                      <?php if (has_post_thumbnail()) : ?>
                                          <?php the_post_thumbnail('medium', ['style' => 'width: 100%; height: auto;']); ?>
                                      <?php endif; ?>
                                      <h6 class="mt-2"><?php the_title(); ?></h6>
                                      <small><?php echo get_the_date(); ?></small>
                                  </a>
                              </div>
                          <?php endwhile;
                          wp_reset_postdata();
                      else :
                          echo '<p>No posts found in this category.</p>';
                      endif;
                      ?>
                  </div>
              </div>

              <?php
          }
      }
  }
  ?>


  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"linkDestination":"custom","href":"<?php echo esc_url($get_sidebar_widgets_info['row2']['url']); ?>"} -->
    <figure class="wp-block-image side_bar_ad_image_1">
      <a href="<?php echo esc_url($get_sidebar_widgets_info['row2']['p2_url']); ?>">
        <img src="<?php echo esc_url($get_sidebar_widgets_info['row2']['p2_image']); ?>" alt="ad-square-2" height="200" style="height:100px"/>
      </a>
    </figure>
    <!-- /wp:image -->
  </div>
  <!-- /wp:group -->

  <!-- Hot Destinations -->
  <?php
  if (
      !empty($get_sidebar_widgets_info['row5']['categories']) &&
      is_array($get_sidebar_widgets_info['row5']['categories'])
  ) {
      $category_id = $get_sidebar_widgets_info['row5']['categories'][0]['id'];

      if (!empty($category_id)) {
          $term = get_term_by('id', $category_id, 'category');

          if ($term && !is_wp_error($term)) {
              $section_title = esc_html($get_sidebar_widgets_info['row5']['title']);
              ?>

              <!-- Sidebar: Popular Posts from Selected Category -->
              <div class="wp-block-group d-flex flex-column flex-nowrap gap-30 align-items-start most_popular">
                  <h5 class="m-0 sidebar_sec_title wp-block-heading"><?php echo $section_title; ?></h5>

                  <div class="most_popular_post w-100">
                      <?php
                      $query = new WP_Query([
                          'post_type'      => 'post',
                          'posts_per_page' => 3,
                          'post_status'    => 'publish',
                          'orderby'        => 'date',
                          'order'          => 'DESC',
                          'cat'            => $category_id,
                      ]);

                      if ($query->have_posts()) :
                          while ($query->have_posts()) : $query->the_post(); ?>
                              <div class="post-card d-flex flex-column align-items-start mb-3">
                                  <a class="w-100" href="<?php the_permalink(); ?>">
                                      <?php if (has_post_thumbnail()) : ?>
                                          <?php the_post_thumbnail('medium', ['style' => 'width: 100%; height: 200px; object-fit: cover']); ?>
                                      <?php endif; ?>
                                      <h6 class="mt-2"><?php the_title(); ?></h6>
                                      <small><?php echo get_the_date(); ?></small>
                                  </a>
                              </div>
                          <?php endwhile;
                          wp_reset_postdata();
                      else :
                          echo '<p>No posts found in this category.</p>';
                      endif;
                      ?>
                  </div>
              </div>

              <?php
          }
      }
  }
  ?>


  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:image {"linkDestination":"custom","href":"<?php echo esc_url($get_sidebar_widgets_info['row2']['url']); ?>"} -->
    <figure class="wp-block-image side_bar_ad_image_1">
      <a href="<?php echo esc_url($get_sidebar_widgets_info['row2']['p3_url']); ?>">
        <img src="<?php echo esc_url($get_sidebar_widgets_info['row2']['p3_image']); ?>" alt="ad-square-2" height="200" style="height:100px"/>
      </a>
    </figure>
    <!-- /wp:image -->
  </div>
  <!-- /wp:group -->

  <!-- News Letter Form -->
  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group d-flex flex-column flex-nowrap gap-30 sidebar_newsletter">
    <!-- wp:heading {"level":5} -->
    <h5 class="m-0 sidebar_sec_title"><?php echo esc_html($get_sidebar_widgets_info['row6']['title']); ?></h5>
    <!-- /wp:heading -->

    <!-- wp:html -->
    <p><?php echo esc_html($get_sidebar_widgets_info['row6']['description']); ?></p>
    
    <?php
    if (!empty($get_sidebar_widgets_info['row6']['contact_form']) && is_array($get_sidebar_widgets_info['row6']['contact_form'])) {
        $form_id = $get_sidebar_widgets_info['row6']['contact_form'][0]['id'];
        echo do_shortcode('[contact-form-7 id="' . intval($form_id) . '"]');
    }
    ?>
    <!-- /wp:html -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
