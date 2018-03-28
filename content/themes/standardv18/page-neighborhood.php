<?php
/**
 *
 * Template Name: NEIGHBORHOOD
 *
 */

get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php $images = get_field('header_images') ?>
		<div class="page-about">
			<div class="page-opening">
				<nav class="pager">
					<a href="#" id="opening-left" class="ir arrow left">left</a><a href="#" id="opening-right" class="ir arrow right">right</a>
				</nav>
				<div class="content">
					<div class="col">
						<article class="welcome">
							<img src="<?php bloginfo('template_directory') ?>/assets/images/watermark-alt.png" width="106" height="106" class="water-mark">
							<?php the_content(); ?>
							<a href="#neighborhood-map" class="button has-arrow-down navigate">check it out</a>
						</article>
					</div>
				</div>
				<div id="header-slides" class="slides">
					<?php foreach ($images as $image): ?>
						<div class="slide" style="background:url(<?php echo $image['url'] ?>) no-repeat top center;background-size:cover;"></div>
					<?php endforeach ?>
				</div>
			</div>
			<div id="neighborhood-map" class="neighborhood-map">
				<div class="container">
					<div class="info">
						<p class="top">James Island Life + Style.</p>
						<p class="bottom">The Standard is Rising.</p>
					</div>
					<article class="about v-center">
						<header>
							<h2>This neighborhood gets better and better</h2>
						</header>
						<div id="alt-hovers" class="text">
							<p>Within a few minutes’ walk or cycle, you can be at the <a href="#point-2">Terrace plaza</a>, home to the only theater in Charleston to show the best independent films (and serves beer and wine).</p>
							<hr class="line">
							<p>The Art Deco-styled plaza is also home to favorite lunch and dinner cafes, <a href="#point-3">Crust</a> and <a href="#point-1">Zia Taqueria</a>. Also within a half-mile is the <a href="#point-4">Charleston Flower Market</a> (natural bouquets), <a href="#point-5">The Pour House</a> (live music mecca, inside and on the back porch), the <a href="#point-6">Riverland Terrace Boat Landing</a>, and <a href="#point-8">Muddy Waters</a> (hip little coffee house).</p>
							<hr class="line">
							<p>Also near are banks, dentists and doctors, bus stops, dry cleaners, and the food trucks and farm stands of the <a href="#point-7">Sunday Brunch Farmers Market</a> every Sunday under the oak trees in Medway Park.</p>
						</div>
						<aside class="to-down-town">
							<p>Downtown Charleston – 2.5 Miles <img src="<?php bloginfo('template_directory') ?>/assets/images/icon-angled-direction.png" width="11" height="10"></p>
						</aside>
					</article>
				</div>
				<div id="map-container" class="map-container">
					<div id="dragmap" class="map">
						<div id="point-map" class="crest">
							<div class="point-hover">
								<div class="top">
									<h4>The Standard</h4>
								</div>
								<div class="bottom">
									<address>215 Promenade Vista St.<br>charleston, sc 29412</address>
									<!-- <p>843.888.8888</p> -->
								</div>
							</div>
						</div>
						<div id="point-1" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Zia Taqueria</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-martini.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1956A Maybank Hwy<br>charleston, sc 29412</address>
									<p>843.406.8877</p>
									<div class="alignright">
										<a href="http://www.ziataco.com/" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-2" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Terrace Plaza</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-ticket.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1956 Maybank Hwy<br>charleston, sc 29412</address>
									<p>843.762.4247</p>
									<div class="alignright">
										<a href="http://www.terracetheater.com/" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-3" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Crust Pizza</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-pizza.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1956 Maybank Hwy<br>charleston, sc 29412</address>
									<p>843.762.5500</p>
									<div class="alignright">
										<a href="http://www.crustwoodfirepizza.com" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-4" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Charleston Flower Market</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-flower.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1952 Maybank Hwy<br>charleston, sc 29412</address>
									<p>843.795.0015</p>
									<div class="alignright">
										<a href="http://www.flowershopcharleston.com/" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-5" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>The Pour House</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-guitar.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1977 Maybank Hwy<br>charleston, sc 29412</address>
									<p>843.571.4343</p>
									<div class="alignright">
										<a href="http://www.charlestonpourhouse.com/" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-6" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Riverland Terrace Boat Landing</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-anchor.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>plymouth ave<br>charleston, sc 29412</address>
									<!-- <p>888.888.8888</p> -->
									<div class="alignright">
										<a href="http://http://scgreatoutdoors.com/park-riverlandterracepublicboatlanding.html" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-7" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Sunday Brunch Farmer’s Market</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-beet.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>2113 Medway Road<br>charleston, sc 29412</address>
									<p>843.580.2153</p>
									<div class="alignright">
										<a href="https://www.facebook.com/SundayBrunchFarmersMarket?ref=hl" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-7b" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Medway Park Community Garden</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-beet.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>2113 Medway Road<br>charleston, sc 29412</address>
									<p>Proud sponsor</p>
									<div class="alignright">
										<a href="<?php bloginfo('template_directory') ?>/assets/files/medway-brochure.pdf" target="_blank" class="visit">View PDF</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-8" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Muddy Waters</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-coffee.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1739 Maybank Hwy<br>charleston, sc 29412</address>
									<p>843.795.0848</p>
									<div class="alignright">
										<a href="http://www.muddywaterscoffee.com/" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
						<div id="point-9" class="point">
							<div class="point-hover">
								<div class="top">
									<h4>Harris Teeter<br>(Opening Soon)</h4>
									<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-point-teeter.png" height="39" width="39" alt="Anchor" class="icon">
								</div>
								<div class="bottom">
									<address>1739 Maybank Hwy<br>charleston, sc 29412</address>
									<!-- <p>888.888.8888</p> -->
									<div class="alignright">
										<a href="http://www.harristeeter.com/" target="_blank" class="visit">visit site</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="favorite-spots">
				<div class="container">
					<header>
						<h2>Our Favorite Spots</h2>
					</header>
					<div class="spots">
						<nav id="spot-navigation" class="navigation group">
							<?php $i=1;if (have_rows('favorite_spots')): ?>
								<?php while(have_rows('favorite_spots')): the_row(); ?>
									<?php $image = get_sub_field('map_image') ?>
									<a href="#spot-<?php echo $i ?>" data-map="<?php echo $image['url'] ?>" <?php echo ($i == 1) ? 'class="active"' : '' ?>><span><?php the_sub_field('title') ?></span></a>	
								<?php $i++;endwhile; ?>
							<?php endif ?>
						</nav>
						<?php if (have_rows('favorite_spots')): ?>
							<?php $i=1;while(have_rows('favorite_spots')): the_row(); ?>
								<div id="spot-<?php echo $i ?>" <?php echo ($i!=1) ? 'class="hide the-spot"' : 'class="the-spot"' ?>>
									<h4><?php the_sub_field('description') ?></h4>
									<?php if (have_rows('spots')): ?>
										<div class="locations">
											<ul class="locations group container">
												<?php while(have_rows('spots')): the_row(); ?>
												<li><a href="<?php the_sub_field('link') ?>" target="_blank"><?php the_sub_field('name') ?></a></li>
												<?php endwhile ?>
											</ul>
										</div>
									<?php endif ?>
								</div>
							<?php $i++;endwhile; ?>
						<?php endif; ?>
						<div class="showmap">
							<a href="#maps" id="toggle-map" class="button has-arrow-down">show map</a>
						</div>
						<aside id="maps" class="maps hidden">
							<?php if (have_rows('favorite_spots')): ?>
								<?php while(have_rows('favorite_spots')): the_row(); ?>
									<?php $image = get_sub_field('map_image') ?>
									<img src="<?php echo $image['url'] ?>" height="<?php echo $image['height'] ?>" width="<?php echo $image['widht'] ?>" alt="Map" id="i-am-the-map" class="map">
								<?php break;endwhile; ?>
							<?php endif; ?>
						</aside>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>