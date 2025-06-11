<?php
/**
 * Title: Hero Slider
 * Slug: yourplatform/hero-slider
 * Categories: yourplatform
 */

$hero_slider_cat = get_field('hero_slider');
// echo "<pre>"; print_r($hero_slider_cat); exit;

$latest_posts = new WP_Query([
  'posts_per_page' => $hero_slider_cat['slider_post_count'],
  'category__in'   => $hero_slider_cat['slider_post_category'], 
  'post_status'    => 'publish',
]);

if ($latest_posts->have_posts()) :
?>
<!-- wp:group {"className":"hero-slider-wrapper"} -->
<div class="wp-block-group hero-slider-wrapper">
  <div class="swiper hero-swiper">
    <div class="swiper-wrapper">

      <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
        <?php
          $background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
          $title = get_the_title();
          $excerpt = get_the_excerpt(); // Or use get_the_content()
          $permalink = get_permalink();
        ?>
        <div class="swiper-slide">
          <div class="slide-content d-flex flex-row flex-nowrap align-items-center"
               style="background-image: url('<?php echo esc_url($background_image); ?>'); background-size: cover; background-position: center;">
            <div class="slider_info d-flex flex-column flex-nowrap align-items-start">
              <h2 class="m-0"><?php echo esc_html($title); ?></h2>
              <p><?php echo esc_html($excerpt); ?></p>
              <a class="m-0 slider_btn" href="<?php echo esc_url($permalink); ?>" class="button">Read More</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>

    </div>

    <div class="swiper-pagination heroPagination d-flex flex-column flex-nowrap align-items-end gap-10"></div>
  </div>

  <div class="swiper_bottom_bar d-flex flex-nowrap justify-content-center align-items-center">
    <h3>
      <a href="<?php echo esc_url($hero_slider_cat['bottom_bar']['link']); ?>" target="_blank">
        <?php echo esc_html(ucfirst($hero_slider_cat['bottom_bar']['caption'])); ?>
      </a>
    </h3>
  </div>
</div>
<!-- /wp:group -->

<?php
  wp_reset_postdata();
endif;
?>
