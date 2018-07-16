<?php
/**
 * editorial_wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package editorial_wp
 */

if ( ! function_exists( 'editorial_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function editorial_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on editorial_wp, use a find and replace
		 * to change 'editorial_wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'editorial_wp', get_template_directory() . '/languages' );

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
			'sidebar-menu' => esc_html__('Sidebar', 'editorial_wp'),
			'social-menu'  => esc_html__('Social', 'editorial_wp')
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
		add_theme_support( 'custom-background', apply_filters( 'editorial_wp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'editorial_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function editorial_wp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'editorial_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'editorial_wp_content_width', 0 );

/*
 * Length of excerpt is 22 words.
 */
function editorial_wp_excerpt_length($length) {
	return 22;
}
add_filter('excerpt_length', 'editorial_wp_excerpt_length');

/* 
 * Change the excerpt more string
 */
function editorial_wp_more_excerpt( $more ) {
	return null;
}
add_filter( 'excerpt_more', 'editorial_wp_more_excerpt' );

/*
 * Remove css attributes from thumbnail
 */
function editorial_wp_remove_img_attr($html) {
	return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter('post_thumbnail_html', 'editorial_wp_remove_img_attr');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function editorial_wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'editorial_wp' ),
		'id'            => 'editorial-wp-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'editorial_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'editorial_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function editorial_wp_scripts() {
	// Styles and fonts
	wp_enqueue_style( 'editorial_wp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'editorial_wp-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, '4.7', 'all' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic|Roboto+Slab:400,700' );

	// JavaScript
	wp_enqueue_script( 'editorial_wp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'editorial_wp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('browser', get_template_directory_uri() . '/assets/js/browser.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script('breakpoints', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script('util', get_template_directory_uri() . '/assets/js/util.js', array('jquery'), '20151215', true );
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'editorial_wp_scripts' );

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

