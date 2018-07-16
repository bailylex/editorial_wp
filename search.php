<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package editorial_wp
 */

get_header();
?>

	<section>
		<?php if (have_posts()): ?>
			<header class="major">
				<h2>
					<?php
					/* translators: %s: search query. */
					printf(esc_html__('Search Results for: %s', 'editorial_wp'), '<span>' . get_search_query() . '</span>');
					?>
				</h2>
			</header><!-- .major -->

			<!-- Posts results -->
			<div class="posts">
				<?php
				while (have_posts()):
					the_post();
				
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part('template-parts/content', 'search');

				endwhile;

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

		<?php 
		else:
			get_template_part('template-parts/content', 'none');
		endif; 
		?>
	</section>

<?php
get_footer();
