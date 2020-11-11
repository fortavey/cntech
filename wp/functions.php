<?php
/**
 * cntech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cntech
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cntech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cntech_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cntech, use a find and replace
		 * to change 'cntech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cntech', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cntech' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cntech_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cntech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cntech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cntech_content_width', 640 );
}
add_action( 'after_setup_theme', 'cntech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cntech_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cntech' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cntech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cntech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cntech_scripts() {
	wp_enqueue_style( 'cntech-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cntech-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fort-app', get_template_directory_uri() . '/js/app.js', array('jquery'), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'cntech_scripts' );

function admin_style() {
	wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

add_filter('show_admin_bar', '__return_false');




add_action( 'wp_print_styles', 'off_contact_form_css', 100 );

function off_contact_form_css() {
	wp_deregister_style( 'contact-form-7' );
	wp_deregister_style( 'wp-block-library' );
}

remove_action( 'wp_head', 'wp_resource_hints', 2);

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('wp_head', 'wp_generator');

remove_action ( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );






/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Redux framework
 */
require get_template_directory() . '/inc/redux-options.php';

/**
 * Category image
 */
require get_template_directory() . '/inc/cat-img.php';

/**
 * Render gallery function
 */
require get_template_directory() . '/inc/render-gallery.php';

/**
 * Render social-icons
 */
require get_template_directory() . '/inc/render-social-icons.php';

/**
 * Register post type Keyses
 */
require get_template_directory() . '/inc/register-post-type-keyses.php';






