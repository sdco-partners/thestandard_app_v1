<?php
  /*
  * Section =>  CAROUSEL-SLIDES
  */
?>
<div id="header-slides" class="slides">
	<?php foreach( $images as $image ): ?>
		<div class="slide" style="background:url(<?php echo $image['url'] ?>) no-repeat top center;background-size:cover;"></div>
	<?php endforeach; ?>
</div>