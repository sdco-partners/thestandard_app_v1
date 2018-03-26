<?php
  /*
  * Section =>  COMPANY-INFO
  */
?>
<div class="layout-td col-3">
    <div class="info">
        <time><?php echo get_field("company_hours", "options"); ?></time>
        <p class="label">office hours</p>
    </div>
    <div class="layout-table alt">
        <div class="layout-td info">
            <p>
                <?php $image = get_field( "company_management", "options" ); ?>
                <img src="<?php echo $image[ "url" ]; ?>" height="<?php echo $image[ "height" ]; ?>" width="<?php echo $image[ "width" ]; ?>" alt="<?php echo $image[ "alt" ]; ?>">
            </p>
            <p class="label">professionally managed by</p>
        </div>
        <div class="layout-td info">
            <p><a href="http://www.woodfieldinvestments.com" target="_blank"><?php echo get_field("company_investors", "options"); ?></a></p>
            <p class="label">owned by</p>
        </div>
    </div>
</div>