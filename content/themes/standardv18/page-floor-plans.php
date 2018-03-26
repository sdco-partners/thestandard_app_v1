<?php get_header(); ?>
	<?php  
		$types = get_terms('type-floor-plan',array('hide_empty' => false,'parent' => 0));

		$tax_query = array(
			array('taxonomy' => 'type-floor-plan','terms' => $types[0])
		);
		$initialplans = new wp_query(array('post_type' => 'floor-plan','nopaging' => true,'tax_query' => $tax_query));
	?>
	<div class="page-living">
		<div class="page-opening">
			<div class="page-living-header content">
				<div class="container">
					<div class="col">
						<div class="lined"><div class="dot"></div></div>
						<h3>well-crafted spaces</h3>
						<p>Each of The Standard’s 280 well-crafted living spaces features spacious layouts, wood flooring, stainless steel appliances, walk-in closets, and elevator entrances for upper floors.</p>
						<a href="#layouts" class="button has-arrow-down navigate">see the plans</a>
					</div>
				</div>	
			</div>		
		</div>
		<div id="layouts" class="layouts">
			<div class="container">
				<div class="box">
					<nav id="floor-plans-navigation" class="navigation js-load-floorplans">
						<?php $i=1;foreach ($types as $type): ?>
							<a href="<?php echo get_term_link($type) ?>" data-termid="<?php echo $type->term_id ?>" <?php echo ($i === 1) ? 'class="active planns"' : 'class="planns"' ?>><?php echo $type->name ?></a>
						<?php $i++;endforeach ?>
						<?php 
							$image = wp_get_attachment_image_src( 280,'full' );
						?>
						<a href="#" class="js-load-sitemap" data-img="<?= $image[0] ?>" data-pdf="<?php bloginfo('template_directory') ?>/assets/maps/TheStandard_SiteMap_REV6.pdf">Site Map</a>
					</nav>
					<nav id="floor-plans-subnavigation" class="subnavigation js-load-floorplan">
						<?php $i=1;if ( $initialplans->have_posts() ) : while ( $initialplans->have_posts() ) : $initialplans->the_post(); ?>
							<a href="<?php the_permalink(); ?>" data-postid="<?php the_ID(); ?>" <?php echo ($i === 1) ? 'class="active"' : '' ?>><?php the_title(); ?></a>
						<?php $i++;endwhile; endif; ?>
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
											<p><a href="<?php the_permalink(); ?>" style="text-decoration:none;"><span id="floorplan-name"><?php the_title(); ?></span></a></p>
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
	<!-- templates -->
	<script id="template-subnavigation" type="x-tmpl-mustache">
		{{#plans}}
			<a href="{{ link }}" data-postid="{{ id }}" {{ #active }}class="active"{{ /active }}>{{ name }}</a>
		{{/plans}}
	</script>
	<script id="template-floorplan" type="x-tmpl-mustache">
		<div class="layout-box group">
			<div class="col-1">
				<img src="{{ img }}" alt="{{ name }}" width="580" height="480" class="img">
				{{ #pdf }}
					<a href="{{ pdf }}" target="_blank" class="button">print a pdf</a>
				{{ /pdf }}
			</div>
			<div class="col-2">
				<div class="info">
					<div class="row layout-table two-up">
						<div class="col layout-td">
							<p><a href="{{ link }}" style="text-decoration:none;"><span id="floorplan-name">{{ name }}</span></a></p>
							<p class="label">unit name</p>
						</div>
						<div class="col layout-td">
							<p><span id="floorplan-size"></span> sq ft</p>
							<p class="label">size</p>
						</div>
						<div class="col layout-td plan">
							<!-- <p><span id="floorplan-price-min"></span> <span id="emdash">&mdash;</span> <span id="floorplan-price-max"></span></p> -->
							<p>Starting At ${{floor_plan_price}} </p>
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
				{{ #apartments }}
					<div class="open-units">
						<div class="box">
							<header>
								<h2>Apartment Homes</h2>
							</header>
							<div class="openings">
								<div class="row layout-table">
									<div class="info layout-td">
										<div class="layout-table">
											<div class="data layout-td">
												<p>{{ apt_no }}</p>
												<p class="label">apt no.</p>
											</div>
											<div class="data layout-td">
												<p>${{ price }}/mo</p>
												<p class="label">price</p>
											</div>
											<div class="data layout-td">
												<p>{{ available }}</p>
												<p class="label">available</p>
											</div>
										</div>
										<div class="dot"></div>
									</div>
									<div class="now layout-td">
										<a href="mailto:thestandardmgr@greystar.com?subject=Inquiry for Apartment {{ apt_no }}" class="lease">Lease Now</a>
									</div>
								</div>
							</div>
						</div>
					{{ /apartments }}
				</div>
			</div>
		</div>
	</script>
	<script id="template-sitemap" type="x-tmpl-mustache">
		<div class="layout-box group">
			<div class="col centered">
				<img src="{{ img }}" alt="{{ name }}" width="580" height="480" class="img">
				{{ #pdf }}
					<a href="{{ pdf }}" target="_blank" class="button">print a pdf</a>
				{{ /pdf }}
			</div>
		</div>
	</script>
<?php get_footer(); ?>