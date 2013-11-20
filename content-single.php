<?php
/**
 * @package Spinelli Prestigio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<div class="property-details">

			<h2 class="property-details-title">Detalles de la propiedad</h2>
			<ul class="property-details-list">
				<li><?php the_terms( $post->ID, 'tipo', '<span>Tipo de propiedad: </span>', ', ', ' ' ); ?></li>
				<li><span>Dirección: </span><?php the_field( 'direccion' ); ?></li>
				<li><span>Localidad: </span><?php the_field( 'localidad' ); ?></li>
				<li><span>Zona: </span><?php the_field( 'zona' ); ?></li>
			</ul>

			<ul class="property-details-list">
				<li><span>Superficie del lote: </span><?php the_field( 'superficie_lote' ); ?></li>
				<li><span>Superficie cubierta: </span><?php the_field( 'superficie_cubierta' ); ?></li>
				<li><span>Ambientes: </span><?php the_field( 'ambientes' ); ?></li>
				<li><span>Código de propiedad: </span><?php the_field( 'codigo_propiedad' ); ?></li>
			</ul>
			
		</div><!-- .property-details -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
