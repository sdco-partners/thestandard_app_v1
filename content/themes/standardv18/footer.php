    <footer class="main-footer">
        <div class="container layout-table">
            <div class="layout-td col-1">
                <div class="info">
                    <address>215 Promenade Vista St., charleston, sc 29412</address>
                    <p class="label">delivery &amp; mail</p>
                </div>           
                <div class="layout-table">
                    <div class="layout-td info phone">
                        <p>888.781.7508</p>
                        <p class="label">call</p>
                    </div>
                    <div class="layout-td info">
                        <p><a href="mailto:TheStandard.Gre@lead2lease.com">thestandard@greystar.com</a></p>
                        <p class="label">email</p>
                    </div>
                </div>
            </div>
            <div class="layout-td col-2">
                <img src="<?php bloginfo('template_directory') ?>/assets/images/logo-alt.png" height="66" width="270" alt="The Standard">
                <div class="social">
                    <!-- <a href="#" class="ir twitter">twitter</a> -->
                    <a href="<?php the_field('facebook',12) ?>" target="_blank" class="ir facebook">facebook</a>
                    <a href="<?php the_field('instagram',12) ?>" target="_blank" class="ir instagram">instagram</a>
                    <a href="<?php the_field('intown',12) ?>" target="_blank" class="ir intown">intown</a>
                    <a href="mailto:TheStandard.Gre@lead2lease.com" class="ir email">email</a>
                    </br>
                    <div style="display: inline-block; vertical-align: middle; margin-top: 10px;"><img src="<?php bloginfo('template_directory') ?>/assets/images/smokefree_white.png" width="59" height="34" alt="smokefree"></div>
                    <div style="display: inline-block; vertical-align: middle;"><img src="<?php bloginfo('template_directory') ?>/assets/images/pet_friendly_white.png" width="34" height="30" alt="pet friendly"></div>
                    <a style="display: inline-block; vertical-align: middle;" href="https://www.greystar.com/fair-housing-statement" target="_blank"><img src="<?php bloginfo('template_directory') ?>/assets/images/equal_housing.png" width="34" height="30" /></a>
                </div>
                <p><a href="https://www.greystar.com/privacy/us-policy" target="_blank">Privacy Policy</a></p>
                <br>
                <p><a href="<?= get_page_link(619); ?>">Site Map</a></p>
                <br>
                <p>site by <a href="http://sdcopartners.com/" target="_blank">SDCO Partners</a></p>
            </div>
            <div class="layout-td col-3">
                <div class="info">
                    <time>9-6 M-F, 10-5 Sat, 1-5 Sun</time>
                    <p class="label">office hours</p>
                </div>
                <div class="layout-table alt">
                    <div class="layout-td info">
                        <p><img src="<?php bloginfo('template_directory') ?>/assets/images/logo-greystar-alt.png" height="24" width="104" alt=""></p>
                        <p class="label">professionally managed by</p>
                    </div>
                    <div class="layout-td info">
                        <p><a href="http://www.woodfieldinvestments.com" target="_blank">woodfield investments</a></p>
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