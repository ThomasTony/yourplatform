<?php
/**
 * Title: Latest Articles Grid
 * Slug: yourplatform/latest-articles
 * Categories: featured, posts, yourplatform
 */

 $latest_articles = get_field('latest_articles');

?>

<div class="wp-block-group container py-80 latest-articles">
	<div class="d-flex flex-column flex-nowrap align-items-center gap-40">
		<h5 class="wp-block-heading section_title"><?php echo esc_html($latest_articles['title']); ?></h5>

		<div class="wp-block-query post_content w-100 post_list_container">
			<?php

			$latest_posts = new WP_Query([
				'posts_per_page' => $latest_articles['number_of_post'],
				'category__in'   => $latest_articles['category'], 
				'post_status'    => 'publish',
				'post_type'      => 'post',
				'orderby'        => 'date',
				'order'          => 'DESC',
			]);
			

			if ($latest_posts->have_posts()) :
				while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>

					<article <?php post_class(); ?>>
						<!-- Featured Image -->
						<div class="featured-img">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('medium', [
									'class' => 'attachment-eaven_small size-eaven_small wp-post-image',
									'alt' => get_the_title(),
								]); ?>
							</a>
						</div>

						<!-- Content -->
						<div class="post-content d-flex flex-column flex-nowrap align-items-center">
							<header class="post-header">
								<!-- Meta Date -->
								<div class="post-meta date_post">
									<div class="meta-item">
										<a href="<?php the_permalink(); ?>">
											<time class="published" datetime="<?php echo get_the_date('c'); ?>">
												<?php echo get_the_date('F j, Y'); ?>
											</time>
										</a>
									</div>
								</div>

								<!-- Categories -->
								<div class="cat-links">
									<?php
									$cats = get_the_category();
									if ($cats) {
										$cat_links = array_map(function ($cat) {
											return '<a href="' . esc_url(get_category_link($cat->term_id)) . '" rel="category tag">' . esc_html($cat->name) . '</a>';
										}, $cats);
										echo implode(' - ', $cat_links);
									}
									?>
								</div>

								<!-- Title -->
								<h2 class="post-title d-flex flex-column align-items-center gap-10">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
							</header>

							<!-- Excerpt -->
							<div class="post-excerpt">
								<p><?php echo wp_trim_words(get_the_excerpt(), 30, ' …'); ?></p>
							</div>

							<!-- Read More -->
							<div class="more-btn">
								<a class="button" href="<?php the_permalink(); ?>"><span>Read More</span></a>
							</div>

							<!-- Footer Meta -->
							<!-- <footer class="post-footer">
								<div class="post-like loftocean-like-meta" data-post-id="<?php the_ID(); ?>" data-like-count="<?php echo (int) get_post_meta(get_the_ID(), 'post_likes', true); ?>">
									<i class="fa fa-heart"></i>
									<span class="count"><?php echo (int) get_post_meta(get_the_ID(), 'post_likes', true); ?></span>
								</div>
								<div class="comments-link">
									<a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i></a>
									<span class="count"><?php echo get_comments_number(); ?></span>
								</div>
								
							</footer> -->
						</div>
					</article>

				<?php endwhile;
				wp_reset_postdata();
			else : ?>
				<p>No posts found.</p>
			<?php endif; ?>
		</div>
	</div>
</div>
