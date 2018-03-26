<?php
  /*
  * Section =>  PROMO
  */
?>
<aside class="promo layout-table">
	<div class="col-1 col layout-td">
		<?php $icon = get_field( "promo_icon" );
		$link = get_field( "promo_left-link" ); ?>
		<img src="<?php echo $icon[ "url" ]; ?>" height="57" width="57" alt="<?php echo $icon[ "alt" ]; ?>" class="water-icon">
		<?php echo get_field( "promo_left" ); ?>
		<a href="<?php echo $link[ "url" ]; ?>" class="button"><?php echo $link[ "title" ]; ?></a>
	</div>
	<div class="col-2 col layout-td">
		<div class="info">
			<?php echo get_field( "promo_right" ); ?>
		</div>
	</div>
</aside>