<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Prestigio
 */
?>
<?php if ( ! dynamic_sidebar( 'property-search' ) ) : ?>

	<aside id="search" class="widget widget_search">
		<?php get_search_form(); ?>
	</aside>

<?php endif; // end sidebar widget area ?>
