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
		
			$location = get_field('mapa');
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
					<li><?php the_terms( $post->ID, 'tipo', '<span>Propiedad: </span>', ', ', ' ' ); ?></li>
					
					<li><?php the_terms( $post->ID, 'operacion', '<span>Operación: </span>', ', ', ' ' ); ?></li>
					
					<?php $direccion = get_field('direccion');
						if( !empty($direccion) ):?>
					<li><span>Dirección: </span><?php echo $direccion; ?></li>
					<?php endif; ?>
					
					<?php $localidad = get_field('localidad');
						if( !empty($localidad) ):?>
					<li><span>Localidad: </span><?php echo $localidad; ?></li>
					<?php endif; ?>
					
					<?php $zona = get_field('zona');
						if( !empty($zona) ):?>
					<li><span>Zona: </span><?php echo $zona; ?></li>
					<?php endif; ?>
				</ul>

				<ul class="property-details-list">
					<?php $superficie_lote = get_field('superficie_lote');
						if( !empty($superficie_lote) ):?>
					<li><span>Superficie del lote: </span><?php echo $superficie_lote; ?></li>
					<?php endif; ?>
					
					<?php $superficie_cubierta = get_field('superficie_cubierta');
						if( !empty($superficie_cubierta) ):?>
					<li><span>Superficie cubierta: </span><?php echo $superficie_cubierta; ?></li>
					<?php endif; ?>
					
					<?php $ambientes = get_field('ambientes');
						if( !empty($ambientes) ):?>
					<li><span>Ambientes: </span><?php echo $ambientes; ?></li>
					<?php endif; ?>
					
					<?php $codigo_propiedad = get_field('codigo_propiedad');
						if( !empty($codigo_propiedad) ):?>
					<li><span>Código de propiedad: </span><?php echo $codigo_propiedad; ?></li>
					<?php endif; ?>
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
