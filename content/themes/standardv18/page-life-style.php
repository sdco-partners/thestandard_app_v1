<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php $images = get_field('header_images') ?>
		<div class="page-life-style">
			<div class="page-opening">
				<nav class="pager">
					<a href="#amenities" id="opening-left" class="ir arrow left">left</a><a href="#" id="opening-right" class="ir arrow right">right</a>
				</nav>
				<div class="content group">
					<div class="container">
						<div class="col">
							<article class="text">
								<?php the_content(); ?>
								<a href="#amenities" class="button has-arrow-down navigate">the amenities</a>
							</article>
						</div>
					</div>
				</div>
				<div id="header-slides" class="slides">
					<?php foreach ($images as $image): ?>
						<div class="slide" style="background:url(<?php echo $image['url'] ?>) no-repeat top center;background-size:cover;"></div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="main-content">
				<div class="container">
					<div class="excerpt">
						<p>Construction follows the green building practices established by the <a href="https://www.nahb.org/en/research/nahb-priorities/green-building-remodeling-and-development.aspx">National Association of Home Builders</a></p>
					</div>
					<div id="amenities" class="amenities">
						<header class="layout-table">
							<div class="sub-col-1 layout-td"><h2>the standard amenities</h2></div>
							<div class="sub-col-2 layout-td"><p>including four courtyards, a clubhouse, and saltwater pool</p></div>
						</header>
						<div class="list layout-table">
							<div class="col layout-td">
								<?php if (have_rows('amenities')): ?>
									<?php $break = count(get_field('amenities'))/2 ?>
									<?php $i=1;while(have_rows('amenities')): the_row(); ?>
										<div class="row layout-table">
											<div class="arrow layout-td">
												<img src="<?php bloginfo('template_directory') ?>/assets/images/icon-arrow-right.png" height="16" width="19" alt="arrow" class="img">
											</div>
											<div class="text layout-td">
												<p><?php the_sub_field('text') ?></p>
											</div>
										</div>
										<?php if ($i == $break): ?>
											</div><div class="col layout-td">
										<?php endif ?>
									<?php $i++;endwhile ?>
								<?php endif ?>
							</div>
						</div>
					</div>
					<div class="showmap">
						<a href="#maps" id="toggle-map" class="button has-arrow-down">site plan</a>
					</div>
					<aside id="maps" class="maps hidden">
						<?php $image = get_field('site_plan') ?>
						<img src="<?php echo $image['url'] ?>" height="<?php echo $image['height'] ?>" width="<?php echo $image['width'] ?>" alt="Site Plan Image" class="map">
					</aside>
					<?php if (have_rows('the_team')): ?>
						<?php $break = count(get_field('the_team'))/2 ?>
						<div class="team layout-table">
							<div class="col-1 layout-td">
								<h3>the<br>standard<br>team</h3>
								<div class="lined"><div class="dot"></div></div>
							</div>
							<div class="col-2 layout-td">
								<div class="row layout-table">
									<?php $i=1;while(have_rows('the_team')): the_row(); ?>
										<div class="layout-td col">
											<h5><a href="<?php the_sub_field('link') ?>" target="_blank"><?php the_sub_field('company') ?></a></h5>
											<hr class="line">
											<p><?php the_sub_field('location') ?></p>
										</div>
										<?php if ($i == $break): ?>
											</div><div class="row layout-table">
										<?php endif ?>
									<?php $i++;endwhile; ?>
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>