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

		<?php
			
			 if( has_post_thumbnail() ){ 
					the_post_thumbnail( 'large' ); 
				} else {
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/no-foto-slide.png" />';
				}
			?>



        <?php
            /** Estraer la galeria del cotnenido para utilizarlos por separado **/

            $gallery = get_post_gallery(0,false);

            $content = strip_shortcode_gallery( get_the_content() );
            $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );

        ?>


		<?php $location = get_field( 'mapa' ); ?>

		<div id="property-tab-wrapper" class="property-details">
		
			<ul class="property-tabs clear">
				<li><a id="tab-detalle-btn" href="#property-tab-details"><i class="fa fa-info-circle"></i>   Detalles de la propiedad</a></li>
				
                <?php if( $gallery ): ?>
                    <li><a id="tab-gal-btn" href="#property-tab-gal"><i class="fa fa-picture-o"></i>   Ver fotos</a>
                    </li>
                <?php endif; ?>

                <?php if( !empty( $location["lat"] ) && !empty( $location["lng"] ) ): ?>
                    <li><a id="tab-map-btn" href="#property-tab-map"><i class="fa fa-globe"></i>   Ver mapa</a>


                    </li>
                <?php endif; ?>
			</ul>


                <div id="property-tab-details" class="clear property-tab-content property-tab-bg">

                    <div class="prop-lista-caracteristicas clear">
                        <ul class="property-details-list">

                            <li><span>Código de propiedad: </span><?php the_field( 'codigo_propiedad' ); ?></li>

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
                        <?php if( get_field( 'superficie_lote' ) ):
                            $unidad = get_field('unidad');
                            ?>
                            <li><span>Superficie del lote: </span><?php the_field( 'superficie_lote' ); ?>

                            <?php if($unidad && $unidad==='hectarea')
                                        {echo "has."; }
                                    else
                                        {echo " m<sup>2</sup>";}

                            ?></li>
                        <?php endif; ?>

                        <?php if( get_field( 'superficie_cubierta' ) ): ?>
                            <li><span>Superficie cubierta: </span><?php the_field( 'superficie_cubierta' ); ?> m<sup>2</sup></li>
                        <?php endif; ?>

                        <?php if( get_field( 'ambientes' ) ): ?>
                            <li><span>Ambientes: </span><?php the_field( 'ambientes' ); ?></li>
                        <?php endif; ?>

                        <?php if( get_field( 'habitaciones' ) ): ?>
                            <li><span>Habitaciones: </span><?php the_field( 'habitaciones' ); ?></li>
                        <?php endif; ?>

                        <?php if( get_field( 'baños' ) ): ?>
                            <li><span>Baños: </span><?php the_field( 'baños' ); ?></li>
                        <?php endif; ?>

                        </ul>

                    </div>

                    <div class="prop-descripcion">
                        <?php
                        /* Mostrar la descripción, sin la galeria */
                        echo $content; ?>
                    </div>

                </div><!-- #property-tab-details -->

                <?php if( $gallery ): ?>
                <div id="property-tab-gal" class="clear property-tab-content property-tab-bg">

                    <?php echo do_shortcode('[gallery link="file" ids="'.$gallery['ids'].'"]' ) ?>
                </div> <!-- #property-tab-gal -->
                <?php endif; ?>


                <?php if( !empty( $location["lat"] ) && !empty( $location["lng"] ) ): ?>

                    <?php
                        $texto_popup="<h3>". get_the_title(); "</h3>";
                        $texto_popup.="<p><strong>Dirección: </strong> ".get_field( 'direccion' )."</p>";
                        $texto_popup.="<p><strong>Localidad: </strong> ".get_field( 'localidad' )."</p>";

                    ?>

                <div id="property-tab-map" class="property-tab-content">
                    <div id="property-details-map">
                        <!--<div id="marker" class="marker" data-lat="<?php /*echo $location['lat']; */?>" data-lng="<?php /*echo $location['lng']; */?>"></div>-->
                        <?php //echo do_shortcode( '[su_gmap address="'.$location["lat"].','.$location["lng"].'"]' ); ?>
                        <?php/* echo do_shortcode( '[mapsmarker mlat="'.$location["lat"].'" mlon="'.$location["lng"].'" mpopuptext="'.$texto_popup.'" basemap="googleLayer_roadmap" zoom="16"  mapwidth="100" mapwidthunit="%" mapheight="400"]' ); */?>
						
						<?php echo do_shortcode('[google-map-v3 shortcodeid="TO_BE_GENERATED" width="100%" height="400" zoom="16" maptype="roadmap" mapalign="center" directionhint="false" language="es" poweredby="false" maptypecontrol="false" pancontrol="true" zoomcontrol="false" scalecontrol="true" streetviewcontrol="false" scrollwheelcontrol="false" draggable="true" tiltfourtyfive="false" enablegeolocationmarker="false" enablemarkerclustering="false" addmarkermashup="false" addmarkermashupbubble="false" addmarkerlist="'.$location["lat"].','.$location['lng'].'{}1-default.png" bubbleautopan="true" distanceunits="km" showbike="false" showtraffic="false" showpanoramio="false"]'); ?>
						
						
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
