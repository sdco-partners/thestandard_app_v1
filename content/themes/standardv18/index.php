<?php get_header();
    if ( have_posts() ) : 
	    while ( have_posts() ) : 
	    	the_post();
    	$images = get_field('header_images') ?>
	    <div class="page-front-page">
			<?php include( locate_template( "components/index/carousel.php" ) );
			include( locate_template( "components/index/main-content.php" ) ); ?>
	    </div>
    <?php endwhile; endif;
get_footer();