<?php
/**
 * The front page template file.
 *
 * @package Prestigio
 */

get_header(); ?>

	<div id="primary" class="content-area full-width">
		<main id="front-page" class="site-front-page" role="main">

			<?php /* Front page slider */ ?>
			<?php
				$args_slider = array(
					'post_type' => 'propiedad',
					'posts_per_page' => 5,
				);
				$slider_query = new WP_Query( $args_slider );
			?>

			<div id="front-slider" class="owl-carousel">

			<?php if( $slider_query->have_posts() ) : ?>

				<?php while( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
					<div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if( has_post_thumbnail() ) {
								the_post_thumbnail( 'slider' );
							} ?>
							<div class="front-slider-meta">
								<p><?php the_terms( $post->ID, 'tipo' ); ?> en <?php the_terms( $post->ID, 'operacion' ); ?></p>
								<h1><?php the_title(); ?></h1>
							</div><!-- .front-slider-meta -->
						</a>
					</div>
				<?php endwhile; ?>			
			<?php endif; ?>

			</div> <!-- .front-slider -->

			<?php /* Últimas propiedades en alquiler */ ?>
			<div class="front-property-list">
				<header class="page-header">
					<h1 class="entry-title">Últimas propiedades en alquiler</h1>
				</header>

				<div class="list-wrapper">

				<?php 
					$args_alquiler = array(
						'post_type' => 'propiedad',
						'operacion' => 'alquiler',
						'posts_per_page' => 4,
					);
					$alquiler_query = new WP_Query( $args_alquiler );
				?>

				<?php if ( $alquiler_query->have_posts() ) : ?>

						<ul class="property-post-list owl-carousel">

						<?php while ( $alquiler_query->have_posts() ) : $alquiler_query->the_post(); ?>

							<li>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<div class="entry-content">
										<a href="<?php the_permalink();?>" class="property-post-link">
											<?php the_post_thumbnail(); ?>

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

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				</div><!-- .list-wrapper -->
			</div> <!-- .font-list-property -->

			<?php // Acá va las últimas propiedades en venta ?>
			<div class="front-proptery-list">
				<header class="page-header">
					<h1 class="entry-title">Últimas propiedades en venta</h1>
				</header>

				<div class="list-wrapper">

				<?php 
					$args_venta = array(
						'post_type' => 'propiedad',
						'operacion' => 'venta',
						'posts_per_page' => 4,
					);
					$venta_query = new WP_Query( $args_venta );
				?>

				<?php if ( $venta_query->have_posts() ) : ?>

						<ul class="property-post-list owl-carousel">

						<?php while ( $venta_query->have_posts() ) : $venta_query->the_post(); ?>

							<li>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<div class="entry-content">
										<a href="<?php the_permalink();?>" class="property-post-link">
											<?php the_post_thumbnail(); ?>

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

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				</div><!-- .list-wrapper -->
			</div> <!-- .font-list-property -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>