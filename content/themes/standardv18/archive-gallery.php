<?php get_header(); ?>
	<?php 
		$object = get_queried_object_id();
		$galleries = new wp_query(array('post_type' => 'gallery','nopaging' => true, 'order' => 'DESC'));
	?>
	<div class="page-gallery">
		<div class="container">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/watermark.png" height="106" width="106" alt="The Standard James I." class="watermark">
			<div class="gallery">
				<div class="box">
					<nav class="navigation">
						<?php if ( $galleries->have_posts() ) : while ( $galleries->have_posts() ) : $galleries->the_post(); ?>
							<?php $images = get_field('images') ?>
							<?php if (count($images) > 0): ?>
								<a href="<?php the_permalink() ?>" <?php echo ($post->ID == $object) ? 'class="active"' : '' ?>><?php the_title(); ?></a>
							<?php endif ?>
						<?php endwhile; endif; ?>
					</nav>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $gallery = get_field('images') ?>
						<?php if (have_rows('images')): ?>
							<div id="gallery-images" class="gallery-images">
								<nav class="pager">
									<div class="boxed">
										<a href="#" class="left ir" id="gallery-left">left</a><a href="#" class="right ir" id="gallery-right">right</a>
									</div>
								</nav>
								<?php while(have_rows('images')): the_row(); ?>
									<?php if (get_row_layout() == 'one_up'): ?>
										<?php $image = get_sub_field('image') ?>
										<div class="slide one-up">
											<img src="<?php echo bfi_thumb($image['url'],array('width' => 965,'height' => 540)) ?>" width="965" height="540" class="img">
											<p>&nbsp;<?php echo $image['caption'] ?>&nbsp;</p>
										</div>
									<?php endif ?>
									<?php if (get_row_layout() == 'two_up'): ?>
										<?php 
											$image_left = get_sub_field('image_left');
											$image_right = get_sub_field('image_right');
										?>
										<div class="slide two-up group">
											<img src="<?php echo bfi_thumb($image_left['url'],array('width' => 482,'height' => 540)) ?>" width="482" height="540" class="img left">
											<img src="<?php echo bfi_thumb($image_right['url'],array('width' => 482,'height' => 540)) ?>" width="482" height="540" class="img right">
											<p>&nbsp;<?php echo $image['caption'] ?>&nbsp;</p>
										</div>
									<?php endif ?>
								<?php endwhile; ?>
							</div>
						<?php endif ?>
					<?php break; endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>