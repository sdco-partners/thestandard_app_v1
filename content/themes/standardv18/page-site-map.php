<?php
/**
 *
 * Template Name: Virtual
 *
 */
 get_header(); ?>

	<div class="page-sitemap page-opening">
		<div class="container">

			<div class="sitemap-link sitemap-title">site map</div>

			<div class="box layout-table">

				<img src="<?php bloginfo('template_directory') ?>/assets/images/watermark.png" height="106" width="106" alt="The Standard | James Island" class="watermark">
				
				<div class="col-1">

					<a class="sitemap-link" href="<?= get_page_link(2); ?>">floor plans</a>

					<div class="floor-plans-list">
						<?php
					  	$args = array(
					        'post_type'       => 'floor-plan', // custom post type
					        'post_status'     => 'publish', // only show published posts
					        'orderby' 		  => 'menu_order',
					        'posts_per_page'  => -1 // show all posts
					    );
					    $query = new WP_Query($args); ?>
					    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

						<?php endwhile; endif; ?>
						<?php wp_reset_postdata();?>
					</div>

				</div>

				<div class="col-2">
					<a class="sitemap-link" href="<?= get_page_link(6); ?>">life+style</a>
					<a class="sitemap-link" href="<?= get_page_link(8); ?>">neighborhood</a>
					<a class="sitemap-link" href="<?= get_page_link(10); ?>">gallery</a>
					<a class="sitemap-link" href="<?= get_page_link(608); ?>">virtual tour</a>
					<a class="sitemap-link" href="<?= get_page_link(12); ?>">connect</a>
					<a class="sitemap-link" href="https://property.onesite.realpage.com/welcomehome?siteid=3603334" target="_blank">resident portal</a>
				</div>

			</div>

		</div>
	</div>

<?php get_footer(); ?>