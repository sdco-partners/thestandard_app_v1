<?php
  /*
  * Section =>  SOCIAL
  */
?>
<div class="layout-td col-2">
    <img src="<?php bloginfo('template_directory') ?>/assets/images/logo-alt.png" height="66" width="270" alt="The Standard">
    <div class="social">
        <!-- <a href="#" class="ir twitter">twitter</a> -->
        <?php if( have_rows( "social_repeater", "options" ) ) :
            while(have_rows( "social_repeater", "options" ) ) :
                the_row(); 
                $link = get_sub_field( "link" ); ?>
                <a href="<?php echo $link[ "url" ]; ?>" target="<?php echo $link[ "url" ]; ?>" class="ir <?php echo $link[ "title" ]; ?>">
                    <?php echo $link[ "title" ]; ?>
                </a>
            <?php endwhile;
        endif; ?>
        </br>
        <?php if( have_rows( "logos_repeater", "options" ) ) :
            while(have_rows( "logos_repeater", "options" ) ) :
                the_row(); 
                $logo = get_sub_field( "logo" ); ?>
                <div style="display: inline-block; vertical-align: middle; margin-top: 10px;">
                    <img src="<?php echo $logo[ "url" ]; ?>" width="<?php echo $logo[ "width" ]; ?>" height="<?php echo $logo[ "height" ]; ?>" alt="<?php echo $logo[ "alt" ]; ?>">
                </div>
            <?php endwhile;
        endif; ?>
    </div>
    <p><a href="https://www.greystar.com/privacy/us-policy" target="_blank">Privacy Policy</a></p>
    <br>
    <p><a href="<?= get_page_link(619); ?>">Site Map</a></p>
    <br>
    <p>site by <a href="http://sdcopartners.com/" target="_blank">SDCO Partners</a></p>
</div>