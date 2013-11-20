<?php
/**
 * The template for displaying Archive Propiedades.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spinelli Prestigio
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Listado de propiedades</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_post_thumbnail( 'thumbnail' ); ?>

							<div class="property-details">
								<ul>
									<li><?php the_terms( $post->ID, 'tipo', 'Tipo de propiedad: ', ', ', ' ' ); ?>
									<li>Dirección: <?php the_field( 'direccion' ); ?>
									<li>Localidad: <?php the_field( 'localidad' ); ?>
									<li>Zona: <?php the_field( 'zona' ); ?>
									<li>Superficie del lote: <?php the_field( 'superficie_lote' ); ?>
									<li>Superficie cubierta: <?php the_field( 'superficie_cubierta' ); ?>
									<li>Ambientes: <?php the_field( 'ambientes' ); ?>
									<li>Código de propiedad: <?php the_field( 'codigo_propiedad' ); ?>
								</ul>

							</div>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php prestigio_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
