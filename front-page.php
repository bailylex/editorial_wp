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

<!-- Posts -->
<section>
	<header class="major">
		<h2>Ipsum sed dolor</h2>
	</header>
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
	</div>
</section><!-- #posts -->

<?php
get_sidebar();
get_footer();
