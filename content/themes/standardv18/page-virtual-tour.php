<?php
/**
 *
 * Template Name: Virtual
 *
 */

get_header(); ?>

<div class="page-gallery">
	<div class="container">
		<img src="<?php bloginfo('template_directory') ?>/assets/images/watermark.png" height="106" width="106" alt="The Standard James I." class="watermark">
		<div class="gallery">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : 
					the_post(); ?>

				<style>
		         	#pano {
		                width: 100%;
		                height: 562px;
		                max-width: 900px;
		                margin: 0 auto;
		                -webkit-box-shadow: -1px 9px 18px -6px rgba(0,0,0,0.75);
		                -moz-box-shadow: -1px 9px 18px -6px rgba(0,0,0,0.75);
		                box-shadow: -1px 9px 18px -6px rgba(0,0,0,0.75);
		           	}
	            </style>
				<div id="pano"></div>

				<?php endwhile; 
			endif; ?>
		</div>
	</div>
</div>

<script src="//lcp360.cachefly.net/panoskin.min.js">
</script>

<script>
    PANOSKIN.createViewer( {
      id: 'pano',
      tour: '59c57968902bca5ce84ce7fa'
    } );
</script>

<?php get_footer();