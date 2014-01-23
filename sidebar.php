<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Spinelli Prestigio
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>

		<?php
			$args_featured_sidebar = array(
				'post_type' => 'propiedad',
				'posts_per_page' => 5,
				'meta_key' => 'propiedad_destacada',
				'meta_value' => true
			);
			$sidebar_query = new WP_Query( $args_featured_sidebar );
		?>

		<aside id="sidebar-property-featured" class="widget">
			<header class="widget-header">
				<h1 class="widget-title">Propiedades destacadas</h1>
			</header><!-- .widget-header -->

		<?php if( $sidebar_query->have_posts() ) : ?>
		<?php while( $sidebar_query->have_posts() ) : $sidebar_query->the_post(); ?>
			<div class="sidebar-property-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				
				<?php
					// Must be inside a loop.

					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/no-foto-thumb.png" />';
					}
					?>			
				
					<h1><?php the_title(); ?></h1>
				</a>
			</div>
		<?php endwhile; ?>			
		<?php endif; ?>
		
		</aside><!-- #sidebar-property-featured -->
	</div><!-- #secondary -->
