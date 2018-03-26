<?php
  /*
  * Section =>  MOBILE MENU
  */
?>
<div id="mobile-menu" class="mobile-menu">
    <div class="mobile-center">
        <div class="layout-td primary-navigation">
            <a href="#mobile-menu" class="close-menu js-menu-toggle">x</a>
            <nav>
                <a href="<?php echo get_page_link(2) ?>" <?php echo (is_page(2)) ? 'class="active"' : '' ?>>Floor Plans</a>
                <a href="<?php echo get_page_link(6) ?>" <?php echo (is_page(6)) ? 'class="active"' : '' ?>>Life+Style</a>
                <a href="<?php echo get_page_link(8) ?>" <?php echo (is_page(8)) ? 'class="active"' : '' ?>>Neighborhood</a>
                <a href="<?php echo get_permalink(sj_find_first_gallery()) ?>" <?php echo (is_singular('gallery')) ? 'class="active"' : '' ?>>Gallery</a>
                <a href="<?php echo get_page_link(608) ?>" <?php echo (is_page(608)) ? 'class="active"' : '' ?>>Virtual Tour</a>
                <a href="<?php echo get_page_link(12) ?>" <?php echo (is_page(12)) ? 'class="active"' : '' ?>>Connect</a>
            </nav>
        </div>
        <div class="layout-td etc">
            <?php include( locate_template( "components/head/portal.php" ) ); 
            include( locate_template( "components/head/crest.php" ) );?>
        </div>
    </div>
</div>