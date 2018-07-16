<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package editorial_wp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function editorial_wp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'editorial-wp-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'editorial_wp_body_classes' );

/**
 * Add custom css classes to social menu links
 */
function social_links_classes( $atts, $items, $args ) {
	if ( $args->theme_location == 'social-menu' ) {
		$atts['class'] = "icon fa-{$items->title}";
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'social_links_classes', 10, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function editorial_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'editorial_wp_pingback_header' );
