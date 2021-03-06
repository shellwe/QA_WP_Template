<?php
/**
 * QA_WP_Template functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package QA_WP_Template
 */

/**
 * Start --- My PHP code
 */

function custom_redirect_fuction()
{
    global $redirect_to;
   if (!isset($_GET['redirect_to']))
   {
      $redirect_to = get_option('siteurl');
    }
}
add_action('login_form', 'custom_redirect_fuction');

//This is a not smart work around as it ignores security but until I find out where the SSL Cert is I gotta use this
// https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#php-56-certificate-verification-failure

/**
 * End --- My PHP code
 */


if ( ! function_exists( 'qa_wp_template_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function qa_wp_template_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on QA_WP_Template, use a find and replace
	 * to change 'qa_wp_template' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'qa_wp_template', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'qa_wp_template' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'qa_wp_template_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'qa_wp_template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qa_wp_template_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qa_wp_template_content_width', 640 );
}
add_action( 'after_setup_theme', 'qa_wp_template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function qa_wp_template_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'qa_wp_template' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'qa_wp_template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'qa_wp_template_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function qa_wp_template_scripts() {
	wp_enqueue_style( 'qa_wp_template-style', get_stylesheet_uri() );

	wp_enqueue_script( 'uglified javascript', get_template_directory_uri() . '/js/all.min.js', array(), '20151215', true );

	//wp_enqueue_script( 'qa_wp_template-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qa_wp_template_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
