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

		<?php $location = get_field( 'mapa' ); ?>

		<div id="property-tab-wrapper" class="property-details">
		
			<ul class="property-tabs clear">
				<li><a id="tab-detalle-btn" href="#property-tab-details"><i class="fa fa-info-circle"></i>   Detalles de la propiedad</a></li>
				
			<?php if( !empty( $location["lat"] ) && !empty( $location["lng"] ) ): ?>
				<li><a id="tab-map-btn" href="#property-tab-map"><i class="fa fa-globe"></i>   Ver mapa</a>


                </li>
			<?php endif; ?>				
			</ul>

			<div id="property-tab-details" class="clear">

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

            <?php if( !empty( $location["lat"] ) && !empty( $location["lng"] ) ): ?>

                <?php
                    $texto_popup="<h3>". get_the_title(); "</h3>";
                    $texto_popup.="<p><strong>Dirección: </strong> ".get_field( 'direccion' )."</p>";
                    $texto_popup.="<p><strong>Localidad: </strong> ".get_field( 'localidad' )."</p>";

                ?>
			
			<div id="property-tab-map">
				<div id="property-details-map">
					<!--<div id="marker" class="marker" data-lat="<?php /*echo $location['lat']; */?>" data-lng="<?php /*echo $location['lng']; */?>"></div>-->
                    <?php //echo do_shortcode( '[su_gmap address="'.$location["lat"].','.$location["lng"].'"]' ); ?>
                    <?php echo do_shortcode( '[mapsmarker mlat="'.$location["lat"].'" mlon="'.$location["lng"].'" mpopuptext="'.$texto_popup.'" basemap="mapquest_osm" zoom="16"  mapwidth="100" mapwidthunit="%" mapheight="400"]' ); ?>
				</div>
			</div><!-- #property-tab-map -->

			<?php endif; ?>

		</div><!-- .property-details -->

		<div class="property-social">
			<?php echo do_shortcode( '[shareaholic app="share_buttons" id="610199"]' ); ?>
		</div>

		<div class="property-contact-form">
			<h2>Consultar por esta propiedad</h2>
			<?php insert_cform( 'Consulta propiedad' ); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
