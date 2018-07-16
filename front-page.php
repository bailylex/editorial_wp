<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package editorial_wp
 */

get_header();
?>

<!-- Banner plugin -->
<!-- Section plugin -->

<section>
	<?php if (get_theme_mod('editorial_wp_front_posts_title')): ?>
		<header class="major">
			<h2><?php echo get_theme_mod('editorial_wp_front_posts_title'); ?></h2>
		</header><!-- .major -->
	<?php endif; ?>

	<!-- Posts -->
	<div class="posts">
		<?php
		if (have_posts()):
			while (have_posts()):
				the_post();
		?>

		<article>
			<!-- Thumbnail -->
			<?php if (has_post_thumbnail()) : ?>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="image"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?><!-- #thumbnail -->

			<h3><?php the_title(); ?></h3>

			<?php the_excerpt(); ?>

			<ul class="actions">
				<li><a href="<?php echo esc_url(get_permalink()); ?>" class="button"><?php printf(esc_html__('More', 'editorial_wp')); ?></a></li>
			</ul>
		</article><!-- #post -->

		<?php 
			endwhile;
		endif;

		wp_reset_query();
		?>
	</div><!-- .posts -->
	
	<!-- Pagination -->
	<ul class="pagination">
		<?php 
		the_posts_pagination(array(
			'mid_size'  => 3,
			'prev_text' => __('Prev', 'editorial_wp'),
			'next_text' => __('Next', 'editorial_wp')
		)); 
		?>
	</ul>
</section>

<?php
get_footer();
