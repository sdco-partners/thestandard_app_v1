<?php get_header(); ?>
    <?php if ( have_posts() ) : 
	    while ( have_posts() ) : 
	    	the_post(); ?>
    	<?php $images = get_field('header_images') ?>
	    <div class="page-front-page">
	    	<div class="page-opening">
				<nav class="pager">
					<a href="#" id="opening-left" class="ir arrow left">left</a><a href="#" id="opening-right" class="ir arrow right">right</a>
				</nav>
				<div class="content group">
					<div class="container">
						<img src="<?php bloginfo('template_directory') ?>/assets/images/watermark.png" height="106" width="106" alt="The Standard St James Island" class="watermark">
						<div class="layout-table">
							<div class="col-1 layout-td">
								<article class="text">
									<h3><?php echo get_field( "header_header" ); ?></h3>
									<p><?php echo get_field( "header_tagline" ); ?></p>
									<?php $link = get_field( "overlay_cta" ); ?>
									<a href="<?php echo $link[ "url" ]; ?>" target="<?php echo $link[ "target" ]; ?>" class="button">
										<?php echo $link[ "title" ]; ?>
									</a>
								</article>
							</div>
							<div class="col-2 layout-td">
								<article class="text">
									<h2><?php echo get_field( "intro_title" ); ?></h2>
									<p><?php echo get_field( "intro_desc" ); ?></p>
									<hr class="line">
									<p class="tagline"><?php echo get_field( "intro_cta" ); ?></p>
								</article>
							</div>
						</div>
					</div>
				</div>
				<div id="header-slides" class="slides">
					<?php foreach( $images as $image ): ?>
						<div class="slide" style="background:url(<?php echo $image['url'] ?>) no-repeat top center;background-size:cover;"></div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="main-content">
				<div class="container">
					<div class="looks layout-table">
						<?php $count = 1;
						$total = get_field( "middle_repeater" ); 
						if( have_rows( "middle_repeater" ) ) :
							while( have_rows( "middle_repeater" ) ) : 
								the_row(); ?>

								<div class="col-1 layout-td excerpt">
									<div class="layout-table">
										<div class="sub-col-1 layout-td">
											<?php $image = get_sub_field( "photo" ); 
											$link = get_sub_field( "link" ); ?>
											<h3><?php echo get_sub_field( "headline" ); ?></h3>
											<div class="text">
												<p><?php echo get_sub_field( "paragraph" );  ?></p>
												<a href="<?php echo $link[ "url" ]; ?>" target="<?php echo $link[ "target" ]; ?>" class="button">
													<?php echo $link[ "title" ]; ?>
												</a>
											</div>
										</div>
										<div class="sub-col-2 layout-td" style="background:url(<?php echo $image[ "url" ]; ?>) no-repeat center center;background-size:cover;"></div>
									</div>
								</div>

								<?php if ( $count !== $total ) : ?>
									<div class="spacer"></div>
								<?php endif; ?>

								<?php $count++;
							endwhile;
						endif; ?>
					</div>
					<aside class="promo layout-table">
						<div class="col-1 col layout-td">
							<?php $icon = get_field( "promo_icon" );
							$link = get_field( "promo_left-link" ); ?>
							<img src="<?php echo $icon[ "url" ]; ?>" height="57" width="57" alt="<?php echo $icon[ "alt" ]; ?>" class="water-icon">
							<?php echo get_field( "promo_left" ); ?>
							<a href="<?php echo $link[ "url" ]; ?>" class="button"><?php echo $link[ "title" ]; ?></a>
						</div>
						<div class="col-2 col layout-td">
							<div class="info">
								<?php echo get_field( "promo_right" ); ?>
							</div>
						</div>
					</aside>
				</div>
			</div>
	    </div>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>