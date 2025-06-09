<section class="hero-section alignfull">
  <div class="hero-single-page-image"></div>

  <div class="single-page-hero-overlay d-flex flex-column flex-nowrap align-items-center justify-content-center text-center py-100 gap-10">

    <?php if ( is_category() ) : ?>
      <h1 class="single-page-hero-title m-0"><?php single_cat_title(); ?></h1>
    <?php elseif ( is_singular() ) : ?>
      <h1 class="single-page-hero-title m-0"><?php the_title(); ?></h1>
    <?php else : ?>
      <h1 class="single-page-hero-title m-0"><?php bloginfo('name'); ?></h1>
    <?php endif; ?>

  </div>
</section>
