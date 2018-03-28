<?php
/**
 *
 * Template Name: SINGLE FLOORPLAN
 *
 */

get_header();
	
if( have_posts() ) :
	while ( have_posts() ) : 
		the_post(); ?>

	<div class="page-living">
		<div class="page-opening"></div>

		<div id="layouts" class="layouts">
			<div class="container">
				<div class="box">
	
					<?php include( locate_template( "components/floorplan/nav.php" ) );
					include( locate_template( "components/floorplan/content.php" ) ); ?>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; 
endif;
	
get_footer();