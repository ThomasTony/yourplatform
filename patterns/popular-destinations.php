<?php
/**
 * Title: Popular Destinations
 * Slug: yourplatform/popular-destinations
 * Categories: featured, travel
 * Keywords: travel, destinations, featured
 */

// Get ACF group field (assumes 'editions' is a taxonomy term field)
$popular_destinations = get_field('popular_destinations');
$parent_cat = $popular_destinations['editions'];

$parent_cat_id = $parent_cat instanceof WP_Term ? $parent_cat->term_id : (int) $parent_cat;
$subcategories = [];

if ($parent_cat_id) {
    $subcategories = get_terms([
        'taxonomy'   => 'category',
        'parent'     => $parent_cat_id,
        'hide_empty' => false,
    ]);
}

?>

<!-- wp:group {"className":"featured-category-section light-color","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-padding featured-category-section popular_destination_section d-flex flex-column flex-nowrap align-items-center gap-40">
  <!-- wp:heading {"level":5,"className":"section-title"} -->
  <h5 class="section-title"><?php echo esc_html($popular_destinations['title']); ?></h5>
  <!-- /wp:heading -->

  <?php if (!empty($subcategories)): ?>
    <div class="popular-destinations container swiper-container popular-destination-swiper">
      <div class="swiper-wrapper">

        <?php foreach ($subcategories as $subcategory): ?>
          <?php
            $cat_link = get_category_link($subcategory->term_id);
            $cat_name = $subcategory->name;
            $cat_image_url = get_field('image', 'category_' . $subcategory->term_id);
          ?>
          <div class="swiper-slide popular-destination-card">
            <div class="category-card d-flex flex-column flex-nowrap align-content-center align-items-center gap-15">
              <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo esc_attr($cat_name); ?>"  width="300" height="200" />
              <a href="<?php echo esc_url($cat_link); ?>">
                <p class="has-text-align-center"><strong><?php echo esc_html($cat_name); ?></strong></p>
              </a>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  <?php else: ?>
    <p>No popular destinations found.</p>
  <?php endif; ?>
</div>
<!-- /wp:group -->
