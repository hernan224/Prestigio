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
	 
	<?php /** Mostrar todas als imágenes pertenecientes a la propiedad en forma de carrusel **/  ?>
		<?php
			$images =& get_children( array (
				'post_parent' => $post->ID,
				'post_type' => 'attachment',
				'post_mime_type' => 'image'
			));

			if ( empty($images) ) {
			// no attachments here
			} else {
				
				echo '<div id="galeria-propiedad" class="owl-carousel owl-theme owl-theme-propiedad">';
				
					foreach ( $images as $attachment_id => $attachment ) :?>
					
					<?php $url_imagen = wp_get_attachment_image_src( $attachment_id, 'full' ); ?>
					
					  <a href="<?php echo $url_imagen[0]; ?>">	
						<?php echo wp_get_attachment_image( $attachment_id, 'slider' );?>
					  </a>
					
					<?php endforeach; 
				
				echo '</div>';
			}
		?>
	
		<?php the_content(); ?>

		<?php $location = get_field( 'mapa' ); ?>

		<div id="property-tab-wrapper" class="property-details">
		
			<ul class="property-tabs clear">
				<li><a href="#property-tab-details">Detalles de la propiedad</a></li>
				
			<?php if( !empty( $location ) ): ?>	
				<li><a href="#property-tab-map">Ver mapa</a></li>
			<?php endif; ?>
				
			</ul>

			<div id="property-tab-details">

				<ul class="property-details-list">
					<li><?php the_terms( $post->ID, 'tipo', '<span>Propiedad: </span>', ', ', ' ' ); ?></li>
					
					<li><?php the_terms( $post->ID, 'operacion', '<span>Operación: </span>', ', ', ' ' ); ?></li>
					
				<?php if( get_field( 'direccion' ) ): ?>
					<li><span>Dirección: </span><?php the_field( 'direccion' ); ?></li>
				<?php endif; ?>
					
				<?php if( get_field( 'localidad' ) ): ?>
					<li><span>Localidad: </span><?php the_field( 'localidad' ); ?></li>
				<?php endif; ?>
					
				<?php if( get_field( 'zona' ) ): ?>
					<li><span>Zona: </span><?php the_field( 'zona' ); ?></li>
				<?php endif; ?>
				</ul>

				<ul class="property-details-list">
				<?php if( get_field( 'superficie_lote' ) ): ?>
					<li><span>Superficie del lote: </span><?php the_field( 'superficie_lote' ); ?></li>
				<?php endif; ?>
					
				<?php if( get_field( 'superficie_cubierta' ) ): ?>
					<li><span>Superficie cubierta: </span><?php the_field( 'superficie_cubierta' ); ?></li>
				<?php endif; ?>
					
				<?php if( get_field( 'ambientes' ) ): ?>
					<li><span>Ambientes: </span><?php the_field( 'ambientes' ); ?></li>
				<?php endif; ?>
					
				<?php if( get_field( 'codigo_propiedad ') ): ?>
					<li><span>Código de propiedad: </span><?php the_field( 'codigo_propiedad' ); ?></li>
				<?php endif; ?>
				</ul>

			</div><!-- #property-tab-details -->

			<?php if( !empty( $location ) ): ?>
			
			<div id="property-tab-map">
				<div id="property-details-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			</div><!-- #property-tab-map -->

			<?php endif; ?>

		</div><!-- .property-details -->

		<div class="property-contact-form">
			<h2>Consultar por esta propiedad</h2>
			<?php insert_cform( 'Consulta propiedad' ); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
