<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package editorial_wp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class('is-preload'); ?>>
		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<div id="main">
				<div class="inner">
					<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo">
							<strong><?php bloginfo('name'); ?></strong> <?php 
							$editorial_wp_description = get_bloginfo('description', 'display');
							if ($editorial_wp_description || is_customize_preview()):
								?>
								<?php 
								echo $editorial_wp_description; /* WPCS: xss ok. */ 
							endif;
								?>
							</a>
						<!-- Social menu -->
						<?php
						wp_nav_menu(array(
							'menu'           => 'social',
							'theme_location' => 'social-menu',
							'menu_class' => 'icons',
							'container' => false,
							'link_before'    => '<span class="label">',
							'link_after'     => '</span>',
							'fallback_cb'    => false
						));
						?><!-- #social menu -->
					</header><!-- #header -->
