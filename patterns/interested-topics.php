<?php
/**
 * Title: Interested Topics Grid
 * Slug: yourplatform/interested-topics
 * Categories: yourplatform
 */
$categories_list = get_field('featured_categories');
// echo "<pre>"; print_r($categories_list); exit;
$categories = $categories_list['category'];

if ($categories && is_array($categories)) :
  
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group container interested_stories_section d-flex flex-column flex-nowrap align-items-center gap-40">
  <h5 class="wp-block-heading section_title"><?php echo esc_html($categories_list['title']); ?></h5>

  <div class="wp-block-columns promo-block-grid interested_stories__block_column_grid ">
    <?php foreach ($categories as $category):  ?>
      <div class="wp-block-column interested_stories_section_block_column ">
        <div class="image-caption-wrapper">
          <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
            <img src="<?php echo esc_url(get_field('image', 'category_' . $category->term_id)); ?>" alt="<?php echo esc_attr($category->name); ?>" />
          </a>
          <!-- wp:paragraph {"className":"promo-category-label image_caption"} -->
          <p class="promo-category-label image_caption">
            <?php echo esc_html($category->name); ?>
          </p>
          <!-- /wp:paragraph -->
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<!-- /wp:group -->

<?php endif; ?>
