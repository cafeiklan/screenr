<?php
/**
 * Screenr functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Screenr
 */

if ( ! function_exists( 'screenr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function screenr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Screenr, use a find and replace
	 * to change 'screenr' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'screenr', get_template_directory() . '/languages' );

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
    add_post_type_support( 'page', 'excerpt' );
    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
    add_theme_support( 'post-thumbnails' );
	add_image_size( 'screenr-blog-grid-small', 350, 200, true );
	add_image_size( 'screenr-blog-grid', 540, 300, true );
    add_image_size( 'screenr-blog-list', 790, 400, true );

	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 240,
		'flex-height' => true,
		//'header-text' => array( 'site-title', 'site-description' ),
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'screenr' ),
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
	add_theme_support( 'custom-background', apply_filters( 'screenr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif;
add_action( 'after_setup_theme', 'screenr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function screenr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'screenr_content_width', 640 );
}
add_action( 'after_setup_theme', 'screenr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function screenr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'screenr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'screenr' ),
		'id'            => 'footer-1',
		'description'   => screenr_sidebar_desc( 'footer-1' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'screenr' ),
		'id'            => 'footer-2',
		'description'   => screenr_sidebar_desc( 'footer-2' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'screenr' ),
		'id'            => 'footer-3',
		'description'   => screenr_sidebar_desc( 'footer-3' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'screenr' ),
		'id'            => 'footer-4',
		'description'   => screenr_sidebar_desc( 'footer-4' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );



}
add_action( 'widgets_init', 'screenr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function screenr_scripts() {
	wp_enqueue_style( 'screenr-fonts', screenr_fonts_url(), array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', false, '4.0.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', false, '4.0.0' );
	wp_enqueue_style( 'screenr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'screenr-plugin', get_template_directory_uri() . '/assets/js/plugin.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.0.0', true );
	wp_enqueue_script( 'screenr-theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_localize_script( 'jquery', 'Screenr', array(
        'ajax_url' 			 => admin_url( 'admin-ajax.php' ),
        'full_screen_slider' => ( get_theme_mod( 'slider_fullscreen' ) ) ? true : false,
        'header_layout' 	 => get_option( 'header_layout' ),
        'slider_parallax' 	 => get_theme_mod( 'slider_parallax', 1 ),
        'is_home_front_page' => ( is_page_template( 'template-frontpage.php' ) && is_front_page() ) ? 1 : 0,
    ) );

}
add_action( 'wp_enqueue_scripts', 'screenr_scripts' );

if ( ! function_exists( 'screenr_fonts_url' ) ) :
	/**
	 * Register default Google fonts
	 */
	function screenr_fonts_url() {
	    $fonts_url = '';

	 	/* Translators: If there are characters in your language that are not
	    * supported by Open Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $open_sans = _x( 'on', 'Open Sans font: on or off', 'screenr' );

	    /* Translators: If there are characters in your language that are not
	    * supported by Merriweather, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $raleway = _x( 'on', 'Merriweather font: on or off', 'screenr' );

		/* Translators: If there are characters in your language that are not
	    * supported by Montserrat, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $montserrat = _x( 'on', 'Montserrat font: on or off', 'screenr' );

	    if ( 'off' !== $raleway || 'off' !== $open_sans ) {
	        $font_families = array();

	        if ( 'off' !== $raleway ) {
	            $font_families[] = 'Merriweather:400,400italic,700,700italic,900,900italic,300italic,300';
	        }

	        if ( 'off' !== $open_sans ) {
	            $font_families[] = 'Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic';
	        }

			if ( 'off' !== $montserrat ) {
	            $font_families[] = 'Montserrat:400,700';
	        }

	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }

	    return esc_url_raw( $fonts_url );
	}
endif;

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
 * Slider
 */
require get_template_directory() . '/inc/class-slider.php';

/**
 * Add theme info page
 */
require get_template_directory() . '/inc/dashboard.php';
