<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package editorial_wp
 */

?>

<?php if (is_active_sidebar('editorial-wp-sidebar')): ?>
	<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text" name="s" id="query" placeholder="Search" value="<?php echo get_search_query(); ?>" />
	</form>
<?php endif; ?>
