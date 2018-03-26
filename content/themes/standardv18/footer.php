        <footer class="main-footer">
            <div class="container layout-table">
                <?php include( locate_template( "components/foot/contact-info.php" ) );
                include( locate_template( "components/foot/social.php" ) );
                include( locate_template( "components/foot/company-info.php" ) ); ?>
            </div>
        </footer>
        <?php wp_footer(); 
        include( locate_template( "components/foot/integrations.php" ) ); ?>
    </body>
</html>