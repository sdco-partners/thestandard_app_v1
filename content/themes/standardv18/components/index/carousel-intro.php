<?php
  /*
  * Section =>  CAROUSEL-INTRO
  */
?>

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