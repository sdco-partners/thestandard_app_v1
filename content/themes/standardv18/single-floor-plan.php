<?php get_header(); ?>
	
	<?php if( have_posts() ) : while ( have_posts() ) : the_post() ?>

	<div class="page-living">
		<div class="page-opening">
		</div>

		<div id="layouts" class="layouts">
			<div class="container">
				<div class="box">

					<nav id="floor-plans-subnavigation" class="subnavigation js-load-floorplan">
						<a href="<?php the_permalink(); ?>" data-postid="<?php the_ID(); ?>" class="active"><?php the_title(); ?></a>
					</nav>

					<div id="floor-plan">
						<div class="layout-box group">
							<div class="col-1">
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full'); ?>
								<img src="<?php echo $image[0] ?>" alt="place holder" width="580" height="480" class="img">
								<?php if (get_field('pdf')): ?>
									<a href="<?php the_field('pdf') ?>" target="_blank" class="button">print a pdf</a>
								<?php endif ?>
							</div>
							<div class="col-2">
								<div class="info">
									<div class="row layout-table two-up">
										<div class="col layout-td plan">
											<p><span id="floorplan-name"><?php the_title(); ?></span></p>
											<p class="label">unit name</p>
										</div>
										<div class="col layout-td plan">
											<p><span id="floorplan-size"></span> sq ft</p>
											<p class="label">size</p>
										</div>
										<div class="col layout-td plan">
											<!-- <p><span id="floorplan-price-min"></span> <span id="emdash">&mdash;</span> <span id="floorplan-price-max"></span></p> -->
											<p>Starting At $<?php echo get_field('floor_plan_price'); ?></p>
											<p class="label">price</p>
										</div>
									</div>
									<div class="row layout-table three-up">
										<div class="col layout-td">
											<p><span id="floorplan-bed"></span></p>
											<p class="label">bed</p>
										</div>
										<div class="col layout-td">
											<p><span id="floorplan-bath"></span></p>
											<p class="label">bath</p>
										</div>
										<div class="col layout-td">
											<p><a href="https://1849373v2.onlineleasing.realpage.com" target="_blank">check availability</a></p>
											<p class="label">apartment homes available</p>
										</div>
									</div>
								</div>
								<?php if (the_row('apartments')): ?>
									<div class="open-units">
										<div class="box">
											<header>
												<h2>Apartment Homes</h2>
											</header>
											<div class="openings">
												<?php while(the_row('apartments')): the_row(); ?>
													<div class="row layout-table">
														<div class="info layout-td">
															<div class="layout-table">
																<div class="data layout-td">
																	<p><?php the_sub_field('number') ?></p>
																	<p class="label">apt no.</p>
																</div>
																<div class="data layout-td">
																	<p>$<?php the_sub_field('price') ?>/mo</p>
																	<p class="label">price</p>
																</div>
																<div class="data layout-td">
																	<p><?php the_sub_field('available') ?></p>
																	<p class="label">available</p>
																</div>
															</div>
															<div class="dot"></div>
														</div>
														<div class="now layout-td">
															<a href="mailto:thestandardmgr@greystar.com?subject=Inquiry for Apartment <?php the_sub_field('number') ?>" class="lease">Lease Now</a>
														</div>
													</div>
												<?php endwhile; ?>
											</div>
										</div>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; endif; ?>
	
<?php get_footer(); ?>