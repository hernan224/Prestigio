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
		<?php the_content(); 
		
			$location = get_field('location');
		?>

		<div <?php if( !empty($location) ):	?>	id="tab-container" <?php endif; ?>		
		class="property-details">
		
			<ul class="property-tabs clear">
				<li><a href="#property-tab-details">Detalles de la propiedad</a></li>
				
				<?php if( !empty($location) ):	?>	
				<li><a href="#property-tab-map">Ver mapa</a></li>
				<?php endif; ?>
				
			</ul>

			<!-- <h2 class="property-details-title">Detalles de la propiedad</h2> -->

			<div id="property-tab-details">

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

			</div><!-- #property-tab-details -->

				

			<?php if( !empty($location) ):	?>
			
			<div id="property-tab-map">

				<div class="property-details-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
				
			</div><!-- #property-tab-map -->

			<?php endif; ?>

			
			
		</div><!-- .property-details -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
