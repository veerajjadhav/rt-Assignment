<?php

/**
 * rt assignment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rt_assignment
 */
if ( !function_exists( 'rt_assignment_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rt_assignment_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rt assignment, use a find and replace
		 * to change 'rt-assignment' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rt-assignment', get_template_directory() . '/languages' );

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
			'menu-1'		 => esc_html__( 'Primary', 'rt-assignment' ),
			'header-menu'	 => esc_html__( 'Top-menu', 'rt-assignment' ),
			'main-nav'		 => esc_html__( 'main-nav', 'rt-assignment' ),
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
		add_image_size( 'slider-image', 677, 400, true );

// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rt_assignment_custom_background_args', array(
			'default-color'	 => 'ffffff',
			'default-image'	 => '',
		) ) );

// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo' );
	}

endif;
add_action( 'after_setup_theme', 'rt_assignment_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rt_assignment_content_width() {
	$GLOBALS[ 'content_width' ] = apply_filters( 'rt_assignment_content_width', 640 );
}

add_action( 'after_setup_theme', 'rt_assignment_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rt_assignment_widgets_init() {
	register_sidebar( array(
		'name'			 => esc_html__( 'Sidebar', 'rt-assignment' ),
		'id'			 => 'sidebar-1',
		'description'	 => esc_html__( 'Add widgets here.', 'rt-assignment' ),
		'before_widget'	 => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</section>',
		'before_title'	 => '<h2 class="widget-title">',
		'after_title'	 => '</h2>',
	) );
}

add_action( 'widgets_init', 'rt_assignment_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rt_assignment_scripts() {

	$query_args = array(
		'family' => 'Droid+Serif:400,700'
	);
	wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_style( 'google_fonts' );

	wp_enqueue_script( 'rt-assignment-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/lib/slick/slick.css' );

	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/lib/slick/slick.min.js', array( 'jquery' ) );



	wp_enqueue_style( 'rt-assignment-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ) );

	wp_enqueue_script( 'rt-assignment-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'rt_assignment_scripts' );

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

require get_template_directory() . '/lib/customizer/customizer.php';

