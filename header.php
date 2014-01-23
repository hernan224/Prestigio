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
			<div class="property-menu">
                <?php wp_nav_menu( array('theme_location' => 'secondary' ) ); ?>
            </div><!-- .property-menu -->
			
			<div class="property-search">
                <?php $busqueda_propiedad->the_form(); ?>
            </div><!-- .property-search -->
			
		</nav><!-- #property-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

        <?php /** Mostrar breadcrumb navigation dependiendo la seccion **/ ?>

        <?php if (!is_front_page()): /* Si no es front page */?>
            <p class="breadcrumb">

                <a href="/">Inicio </a>

                <?php if (is_archive()) : /*Si es archive*/
                    /* Obtengo las query vars 'tipo' y 'propiedad' */
                    $bread_tipo = get_query_var('tipo');
                    $bread_operacion = get_query_var('operacion');
                    ?>

                    <?php
                    /** Si existe la variables 'operacion', busco el nombre y el link a su archive **/
                    if ($bread_operacion):
                        $bread_name = get_term_by('slug', $bread_operacion, 'operacion')->name;
                        $bread_link = get_term_link($bread_operacion, 'operacion');
                        ?>

                        <?php
                        /**  Si existe el nombre y el link al archive, muestro el item en el breadcrumb  **/
                        if ( $bread_name && !is_wp_error( $bread_link )) : ?>
                            &rsaquo;  <a href="<?php echo $bread_link; ?>"> <?php echo $bread_name ?></a>
                        <?php endif; ?>

                    <?php endif; /*Fin Si existe term 'operacion'*/ ?>

                    <?php
                    /** Si existe la variables 'tipo', busco el link a su archive **/
                    if ($bread_tipo):
                        $bread_name = get_term_by('slug', $bread_tipo, 'tipo')->name;
                        $bread_link = get_term_link($bread_tipo, 'tipo');
                        ?>

                        <?php
                        /**  Si existe el nombre y el link al archive, muestro el item en el breadcrumb  **/
                        if ( $bread_name && !is_wp_error( $bread_link )) : ?>
                            &rsaquo;  <a href="<?php echo $bread_link; ?>"> <?php echo $bread_name ?></a>
                        <?php endif; ?>					
						
                    <?php endif; /*Fin Si existe term 'tipo'*/ ?>
					
						<?php
							/** Comprobar paginacion y agregar número de pagina al breadcrumb **/						
							$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : false;
							if ( $paged !== false )
							{
								// This is not a paginated page (or it's simply the first page of a paginated page/post)
								echo "&rsaquo; Página $paged";

							};						
						?>

                    <?php /* Fin si es archive */ ?>

                <?php elseif ( is_page()): /*Si es una página muestro el título*/

                    global $post;
                    $titulo_pagina = get_the_title($post->ID);

                    echo "&rsaquo; $titulo_pagina";
					
					/** Comprobar paginacion y agregar número de pagina al breadcrumb **/						
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : false;
					if ( $paged !== false )
					{
						// This is not a paginated page (or it's simply the first page of a paginated page/post)
						echo " &rsaquo; Página $paged";

					};	

                    /*Fin Si es page*/?>

                <?php elseif (is_single()): /** Si es single **/
                    global $post;
                    $term_tipo = get_the_terms($post->ID, 'tipo');
                    $term_operacion = get_the_terms($post->ID, 'operacion');
                    $titulo_prop = $post->post_title
                    ?>

                    <?php
                    /** Si existe la variables 'operacion', busco el link a su archive **/
                    if ($term_operacion && ! is_wp_error( $term_operacion )):

                        $primer_term = array_pop( $term_operacion );/*Obtengo el primer term*/
                        $term_link = get_term_link($primer_term->slug, 'operacion');
                        $term_nombre = $primer_term->name;
                        ?>

                        <?php
                        /**  Si existe el link al archive, muestro el item en el breadcrumb  **/
                        if ( !is_wp_error( $term_link ) ) : ;?>

                            &rsaquo;  <a href="<?php echo $term_link; ?>"> <?php echo $term_nombre ?> </a>
                        <?php endif; ?>

                    <?php endif; /*Fin Si existe term 'operacion'*/ ?>

                    <?php
                    /** Si existe la variables 'tipo', busco el link a su archive **/
                    if ($term_tipo && ! is_wp_error( $term_tipo )):

                        $primer_term = array_pop( $term_tipo );/*Obtengo el primer term*/
                        $term_link = get_term_link($primer_term->slug, 'tipo');
                        $term_nombre = $primer_term->name;
                        ?>

                        <?php
                        /**  Si existe el link al archive, muestro el item en el breadcrumb  **/
                        if ( !is_wp_error( $term_link ) ) : ;?>
                            &rsaquo;  <a href="<?php echo $term_link; ?>"> <?php echo $term_nombre ?> </a>
                        <?php endif; ?>

                    <?php endif; /*Fin Si existe term 'tipo'*/ ?>

                    <?php /** Muestro el titulo **/

                    echo "&rsaquo; $titulo_prop"

                    ?>
                <?php endif; /*Fin Si es single*/ ?>


        <?php endif; /* Fin Si no es front page */ ?>