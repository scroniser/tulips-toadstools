<?php
/**
 * Tulips and Toadstools functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tulips_and_Toadstools
 */

if ( ! function_exists( 'tulips_and_toadstools_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tulips_and_toadstools_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tulips and Toadstools, use a find and replace
	 * to change 'tulips-and-toadstools' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tulips-and-toadstools', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'tulips-and-toadstools' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tulips_and_toadstools_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'tulips-and-toadstools' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'tulips_and_toadstools_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tulips_and_toadstools_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tulips_and_toadstools_content_width', 640 );
}
add_action( 'after_setup_theme', 'tulips_and_toadstools_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tulips_and_toadstools_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tulips-and-toadstools' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tulips-and-toadstools' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'tulips_and_toadstools_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function tulips_and_toadstools_scripts() {
	wp_enqueue_style( 'tulips-and-toadstools-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );

	wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');

	wp_enqueue_script( 'tulips-and-toadstools-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tulips-and-toadstools-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ), true );
}
add_action( 'wp_enqueue_scripts', 'tulips_and_toadstools_scripts' );

function themeslug_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_events_images_section' , array(
    'title'       => __( 'Event Images', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload images for the events',
) );
    $wp_customize->add_setting( 'themeslug_events_images', array(
    	'sanitize_callback' => 'absint'
    	) );

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'cropped_image', array(
    'section'  => 'themeslug_events_images_section',
    'label'    => __( 'Event Images', 'themeslug' ),
    'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
    'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
    'width'       => 557,
    'height'      => 312,
    'settings' => 'themeslug_events_images',
) ) );

}
add_action( 'customize_register', 'themeslug_theme_customizer' );

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

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

