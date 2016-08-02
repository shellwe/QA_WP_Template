<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package QA_WP_Template
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<script src="https://use.typekit.net/ikg7gpj.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'qa_wp_template' ); ?></a>

	<header id="masthead" class="container-fluid site-header" role="banner">
        <div class="container">
            <div class="row">
                <div class="site-branding col-sm-8">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                    <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                    <nav id="site-navigation" class="main-navigation row" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'qa_wp_template' ); ?></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                    </nav><!-- #site-navigation -->
                </div><!-- .site-branding -->

                <div class="col-sm-4">
                    <form class="login-form">
                        <?php
                        if ( is_user_logged_in() ) {
                            $current_user = wp_get_current_user();
                            printf( 'Hello %s!', esc_html( $current_user->user_firstname ) );
                        } else {
                            wp_login_form();
							//wp_loginout();
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
