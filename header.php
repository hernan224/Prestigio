<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Prestigio
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php
    /** Generando la nueva busqueda **/
    $args = my_search_args();
    $busqueda_propiedad = new WP_Advanced_Search($args);
 ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		<nav id="property-navigation" class="secondary-navigation" role="navigation">			
			<div class="menu_propiedades"><?php wp_nav_menu( array('theme_location' => 'secondary' ) ); ?></div>
			
			<div class="property-search"><?php /** El formulario de busqueda **/ $busqueda_propiedad->the_form(); ?></div> <!-- Acá va el formualrio de busqueda -->
			
		</nav><!-- #property-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

        <?php /** Mostrar breadcrumb navigation dependiendo la seccion **/ ?>

        <?php if (!is_front_page()): /*Si no es home*/?>
            <p class="breadcrumb">

                <a href="/">Index </a>

                <?php if (is_archive()) : /*Si es archive*/
                    /* Obtengo las query vars 'tipo' y 'propiedad' */
                    $bread_tipo = get_query_var('tipo');
                    $bread_operacion = get_query_var('operacion');
                    ?>

                    <?php
                    /** Si existe la variables 'operacion', busco el link a su archive **/
                    if ($bread_operacion):
                        $bread_operacion_link = get_term_link($bread_operacion, 'operacion');
                        ?>

                        <?php
                        /**  Si existe el link al archive, muestro el item en el breadcrumb  **/
                        if ( !is_wp_error( $bread_operacion_link )) : ?>
                            >  <a href="<?php echo $bread_operacion_link; ?>"> <?php echo $bread_operacion ?></a>
                        <?php endif; ?>

                    <?php endif;?>

                    <?php
                    /** Si existe la variables 'tipo', busco el link a su archive **/
                    if ($bread_tipo):
                        $bread_tipo_link = get_term_link($bread_tipo, 'tipo');
                        ?>

                        <?php
                        /**  Si existe el link al archive, muestro el item en el breadcrumb  **/
                        if ( !is_wp_error( $bread_tipo_link )) : ?>
                            >  <a href="<?php echo $bread_tipo_link; ?>"> <?php echo $bread_tipo ?></a>
                        <?php endif; ?>

                    <?php endif;?>

                <?php elseif ( is_page()): /*Si es una página muestro el título*/

                    global $post;
                    $titulo_pagina = get_the_title($post->ID);

                    echo "> $titulo_pagina"
                ?>

                <?php elseif (is_single()): /** Si es single **/
                    global $post;

                    $term_tipo = get_the_terms($post->ID, 'tipo');
                    $term_operacion = get_the_terms($post->ID, 'operacion');
                    $titulo_prop = $post->post_title
                    ?>

                    <?php
                    /** Si existe la variables 'operacion', busco el link a su archive **/
                    if ($term_operacion && ! is_wp_error( $term_operacion )):
                        echo ' o-1 ';
                        $term_operacion_link = get_term_link($term_operacion[0][slug], 'operacion');
                        $term_operacion_nombre = $term_operacion[0][name];
                        ?>

                        <?php
                        /**  Si existe el link al archive, muestro el item en el breadcrumb  **/
                        if ( !is_wp_error( $term_operacion_link )) : echo ' o-2 ';?>
                            >  <a href="<?php echo $term_operacion_link; ?>"> <?php echo $term_operacion_nombre ?> </a>
                        <?php endif; ?>

                    <?php endif;?>

                    <?php
                    /** Si existe la variables 'operacion', busco el link a su archive **/
                    if ($term_tipo && ! is_wp_error( $term_tipo )):
                        echo ' t-1 ';
                        $term_tipo_link = get_term_link($term_tipo[0][slug], 'tipo');
                        $term_tipo_nombre = $term_tipo[0][name];
                        ?>

                        <?php
                        /**  Si existe el link al archive, muestro el item en el breadcrumb  **/
                        if ( !is_wp_error( $term_tipo_link )) : echo ' t-2 ';?>

                            >  <a href="<?php echo $term_tipo_link; ?>"> <?php echo $term_tipo_nombre ?> </a>
                        <?php endif; ?>

                    <?php endif;?>

                    <?php /** Muestro el titulo **/

                    echo "> $titulo_prop"

                    ?>
                <?php endif; ?>


        <?php endif; /*Si no es home*/ ?>