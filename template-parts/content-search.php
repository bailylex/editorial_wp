<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package editorial_wp
 */

?>

<article>
	<header class="main">
		<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink())), '</a></h2>'); ?>

		<?php if ('post' === get_post_type()): ?>
			<div class="entry-meta">
				<?php
				editorial_wp_posted_on();
				editorial_wp_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<span class="image main"><?php editorial_wp_post_thumbnail(); ?></span>

	<p><?php the_excerpt(); ?></p>

	<footer class="entry-footer">
		<?php editorial_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
