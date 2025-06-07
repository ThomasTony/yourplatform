<?php
/**
 * Title: Latest Articles Grid
 * Slug: yourplatform/latest-articles
 * Categories: featured, posts, yourplatform
 */
?>

<style>

    .latest-articles{
        padding: 80px 0;;
    }

    .latest-card__thumb {
        position: relative;
        width: 70%;
        overflow: hidden;
    }

    .post_list_container article{
        position: relative;
        margin-bottom: calc(100% - 85%);
    }

    .post_list_container article .featured-img a img{
        width: 75%;
        height: 300px;
        object-fit: cover;
    }

    .post_list_container article .post-content{
        position: absolute;
        right: 0;
        bottom: -20%;
        width: 50%;
        background: #fff;
        box-shadow: 5px 5px 20px rgb(0 0 0 / 7%);
        padding: 22px 20px 30px;
    }

    .post-meta.date_post{
        position: absolute;
        top: -6%;
        background: #000;
        padding: 0 10px;
        margin-bottom: 0;
        background: #262626;
        border-radius: 999px;
    }

    .post-header .post-meta.date_post .meta-item time{
        color: #fff;
        line-height: 1.6;
    }

    .post-header .cat-links a{
        position: relative;
        display: inline-block;
        color: var(--primary-color);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-size: 0.6875rem;
        line-height: 25px;
    }

    .post-header .post-title{
        font-family: var(--heading-font);
        font-size: 1.375rem;
        font-weight: 600;
        letter-spacing: 0;
        line-height: 1.3;   
        word-break: break-word;
    }

    .post-header .post-title a{
        color: var(--light-text-color);
    }

    .post-header .post-title:hover a{
        color: var(--primary-color);    
    }

    .post-header .post-title::after{
        content: "";
        display: block;
        width: 25px;
        height: 2px;
        background: var(--primary-color);
    }

    .post-content .post-excerpt p{
        font-family: var(--body-font);
        font-size: 0.9375rem;
        color: var(--text-color);
    }

    .post-content .more-btn .button {
        padding: 0 20px;
        line-height: 32px;
        font-size: 10px;
        font-size: 0.625rem;background-image: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
    }

    .post-content .more-btn .button:hover {
        -webkit-transform: translateY(2px);
        -ms-transform: translateY(2px);
        transform: translateY(2px);
    }


</style>

<div class="wp-block-group container section-padding latest-articles">
	<div class="d-flex flex-column flex-nowrap align-items-center gap-40">
		<h5 class="wp-block-heading section_title">Latest Articles</h5>

		<div class="wp-block-query post_content w-100 post_list_container">
			<?php
			$latest_posts = new WP_Query([
				'posts_per_page' => 5,
				'post_type'      => 'post',
				'post_status'    => 'publish',
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
