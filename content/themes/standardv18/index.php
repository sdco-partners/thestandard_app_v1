<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
									<h3>james island life+style</h3>
									<p>NOW OPEN</p>
									<a href="<?php echo get_page_link(12) ?>" class="button">inquire now</a>
								</article>
							</div>
							<div class="col-2 layout-td">
								<article class="text">
									<h2>hello james.</h2>
									<p>The Charleston island with an indie spirit. Edged by rivers and salt marsh, the James I. life + style is urban but closer to nature—Wappoo Creek and Stono River sunsets, bicycling and boating, sea island farm markets. We’re less blockbuster and more indy film. For dinner, we’re looking for a good wine or local beer and maybe some roasted Folly River oysters or wood-fired pizza. Easier island living, the outdoors, the kitchen—it all matters. One bridge from the peninsula, but we’re definitely different over here.</p>
									<hr class="line">
									<p class="tagline">the standard is rising.</p>
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
						<div class="col-1 layout-td excerpt">
							<div class="layout-table">
								<div class="sub-col-1 layout-td">
									<h3><a href="<?php echo get_page_link(10) ?>"><span>See for</span> yourself</a></h3>
									<div class="text">
										<p>Take a look at the full array of amenities from the clubhouse lounge to the fully-stocked gym and beautiful pool.</p>
										<a href="<?php echo get_page_link(10) ?>" class="button">view galleries</a>
									</div>
								</div>
								<div class="sub-col-2 layout-td" style="background:url(<?php bloginfo('template_directory') ?>/assets/temp/image-home-1.jpg) no-repeat center center;background-size:cover;"></div>
							</div>
						</div>
						<div class="spacer"></div>
						<div class="col-2 layout-td excerpt">
							<div class="layout-table">
								<div class="sub-col-1 layout-td">
									<h3><a href="https://1849373v2.onlineleasing.realpage.com" target="_blank"><span>Now</span> leasing</a></h3>
									<div class="text">
										<p>Studio apartments, One-Bedroom, Two-Bedroom, Three-Bedroom, and Live-Work Homes available for lease.</p>
										<a href="<?php echo get_page_link(2) ?>" class="button">view floor plans</a>
									</div>
								</div>
								<div class="sub-col-2 layout-td" style="background:url(<?php bloginfo('template_directory') ?>/assets/temp/image-home-2.jpg) no-repeat center center;background-size:cover;"></div>
							</div>
						</div>
					</div>
					<aside class="promo layout-table">
						<div class="col-1 col layout-td">
							<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-water.png" height="57" width="57" alt="water" class="water-icon">
							<h2>The Standard<br>is rising</h2>
							<hr class="line">
							<h3>in the<br>maybank-Terrace<br>neighborhood</h3>
							<hr class="line">
							<h2>of james island.</h2>
							<a href="<?php echo get_page_link(8) ?>" class="button">explore the area</a>
						</div>
						<div class="col-2 col layout-td">
							<div class="info">
								<p class="texts">Convenient &amp; central—only 2.5 miles to downtown and 8 miles to Folly Beach.</p>
								<p class="label">the perfect location.</p>
							</div>
						</div>
					</aside>
				</div>
			</div>
	    </div>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>