        <footer class="main-footer">
            <div class="container layout-table">
                <div class="layout-td col-1">
                    <div class="info">
                        <address><?php echo get_field("contact_address", "options"); ?></address>
                        <p class="label">delivery &amp; mail</p>
                    </div>           
                    <div class="layout-table">
                        <div class="layout-td info phone">
                            <p><?php echo get_field("contact_phone", "options"); ?></p>
                            <p class="label">call</p>
                        </div>
                        <div class="layout-td info">
                            <p><a href="mailto:TheStandard.Gre@lead2lease.com"><?php echo get_field("contact_email", "options"); ?></a></p>
                            <p class="label">email</p>
                        </div>
                    </div>
                </div>
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
            </div>
        </footer>
        <?php wp_footer(); ?>

        <!-- Tracking Pixel -->
        <script src="//statrack.leaselabs.com/dpx.js?cid=102549&action=100&segment=llgsthestandardatjamesisland&m=1&sifi_tuid=59365"></script>

        <!-- Start of Live Chat Button Code -->
        <div id="live_chat_status"></div>
        <!-- End of Live Chat Button Code -->

        <!-- live chat codes: Contact Form: -->
        <script type="text/javascript">
        (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
        'https://jimbray.ladesk.com/scripts/track.js',
        function(e){ LiveAgent.createButton('21e0ed13', e); });
        </script>
        <!-- end -->

         <!-- live chat codes: Chat Window: -->
        <script type="text/javascript">
        (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
        'https://jimbray.ladesk.com/scripts/track.js',
        function(e){ LiveAgent.createButton('efdc9924', e); });
        </script>
        <!-- end -->
    
    </body>
</html>