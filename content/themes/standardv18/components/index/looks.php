<?php
  /*
  * Section =>  LOOKS
  */
?>
<div class="looks layout-table">
	<?php $count = 1;
	$total = get_field( "middle_repeater" ); 
	if( have_rows( "middle_repeater" ) ) :
		while( have_rows( "middle_repeater" ) ) : 
			the_row(); ?>

			<div class="col-1 layout-td excerpt">
				<div class="layout-table">
					<div class="sub-col-1 layout-td">
						<?php $image = get_sub_field( "photo" ); 
						$link = get_sub_field( "link" ); ?>
						<h3><?php echo get_sub_field( "headline" ); ?></h3>
						<div class="text">
							<p><?php echo get_sub_field( "paragraph" );  ?></p>
							<a href="<?php echo $link[ "url" ]; ?>" target="<?php echo $link[ "target" ]; ?>" class="button">
								<?php echo $link[ "title" ]; ?>
							</a>
						</div>
					</div>
					<div class="sub-col-2 layout-td" style="background:url(<?php echo $image[ "url" ]; ?>) no-repeat center center;background-size:cover;"></div>
				</div>
			</div>

			<?php if ( $count !== $total ) : ?>
				<div class="spacer"></div>
			<?php endif; ?>

			<?php $count++;
		endwhile;
	endif; ?>
</div>