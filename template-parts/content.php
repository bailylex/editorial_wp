<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package editorial_wp
 */

?>

<!-- Post content -->
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="main">
		<?php
		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );

		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			
			<div class="entry-meta">
				<?php
				editorial_wp_posted_on();
				editorial_wp_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .main -->

	<span class="image main"><?php editorial_wp_post_thumbnail(); ?></span>

	<?php
	the_content( sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'editorial_wp' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'editorial_wp' ),
		'after'  => '</div>',
	) );
	?>

	<footer class="entry-footer">
		<?php editorial_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</section>
