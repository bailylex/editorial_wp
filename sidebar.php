<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package editorial_wp
 */
?>

<div id="sidebar">
	<div class="inner">
		<!-- Search -->
		<section id="search" class="alt">
			<?php echo get_search_form(); ?>
		</section><!-- #search -->

		<!-- Menu -->
		<nav id="menu">
			<header class="major">
				<h2><?php echo esc_html('Menu'); ?></h2>
			</header>
			<!-- Menu -->
			<?php
			wp_nav_menu(array(
				'theme_location' => 'sidebar-menu',
				'container'      => false,
				'fallback_cb'    => false
			));
			?>
		</nav><!-- #menu -->

		<!-- Archive -->
		<section>
			<header class="major">
				<?php the_archive_title( '<h2>', '</h2>' ); ?>
			</header>
			<div class="mini-posts">
				<?php 
				// Display only 3 posts
				$num_sidebar_posts = array(
					'posts_per_page' => 3
				);
				$num_sidebar_posts_query = new WP_Query($num_sidebar_posts);

				if ($num_sidebar_posts_query->have_posts()):
					/* Start the Loop */
					while ($num_sidebar_posts_query->have_posts()):
						$num_sidebar_posts_query->the_post();
						?>

						<article>
							<!-- Thumbnail -->
							<?php if (has_post_thumbnail()) : ?>
							<a href="<?php echo esc_url(get_permalink()); ?>" class="image"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?><!-- #thumbnail -->
							<p><?php the_excerpt(); ?></p>
						</article>

					<?php
					endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
				endif;
				wp_reset_postdata();
				?>
			</div>
			<ul class="actions">
				<li><a href="#" class="button"><?php echo esc_html__('More', 'editorial_wp'); ?></a></li>
			</ul>
		</section><!-- #archive -->

		<!-- Custom widgets -->
		<?php dynamic_sidebar('editorial-wp-sidebar'); ?>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</p>
		</footer><!-- #footer -->
	</div><!-- #inner -->
</div><!-- #section -->
