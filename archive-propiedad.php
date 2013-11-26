<?php
/**
 * The template for displaying Archive Propiedades.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spinelli Prestigio
 */

get_header(); ?>

	<section id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="entry-title">Listado de propiedades</h1>
			</header><!-- .page-header -->

		<?php if ( have_posts() ) : ?>

			<ul class="property-post-list">

			<?php while ( have_posts() ) : the_post(); ?>

				<li>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
							<a href="<?php the_permalink();?>" class="property-post-link">
								<?php the_post_thumbnail( 'thumbnail' ); ?>

								<div class="property-list-meta">
									<h1 class="entry-title"><?php the_title(); ?></h1>

									<div class="meta-wrapper">
										<span>Dirección: <?php the_field( 'direccion' ); ?></span>
										<span>Localidad: <?php the_field( 'localidad' ); ?></span>
										<span>Ambientes: <?php the_field( 'ambientes' ); ?></span>
									</div>

								</div><!-- .property-list-meta -->

							</a><!-- .property-list-wrapper -->
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				</li>

			<?php endwhile; ?>

			</ul><!-- .property-post-list -->

			<?php prestigio_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
