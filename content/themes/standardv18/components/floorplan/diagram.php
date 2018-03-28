<?php
  /*
  * Section =>  DIAGRAM
  */
  ?>
<div class="col-1">
	<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full'); ?>
	<img src="<?php echo $image[0] ?>" alt="place holder" width="580" height="480" class="img">
	<?php if (get_field('pdf')): ?>
		<a href="<?php the_field('pdf') ?>" target="_blank" class="button">print a pdf</a>
	<?php endif ?>
</div>