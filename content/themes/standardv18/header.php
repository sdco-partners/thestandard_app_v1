<!DOCTYPE html>
<html>
    <head>
        <?php include( locate_template( "components/head/popdown.php" ) ); ?>
    </head>
    <body id="standard" <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KL7B24J"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <?php if( is_front_page() && get_field('popdown') ) {
            include( locate_template( "components/head/popdown.php" ) ); 
        }; ?>

        <header class="main-header">
            <?php include( locate_template( "components/head/gradient.php" ) ); 
            include( locate_template( "components/head/layout.php" ) ); ?>
        </header>