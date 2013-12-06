<?php
/**
 * Spinelli Prestigio functions and definitions
 *
 * @package Spinelli Prestigio
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 665; /* pixels */

if ( ! function_exists( 'prestigio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prestigio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Spinelli Prestigio, use a find and replace
	 * to change 'prestigio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'prestigio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 310, 310, true );
	add_image_size( 'slider', 1040, 480, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'prestigio' ),
		'secondary' => __( 'Secondary Menu', 'prestigio' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // prestigio_setup
add_action( 'after_setup_theme', 'prestigio_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function prestigio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'prestigio' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'prestigio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function prestigio_scripts() {

	/* Register Google Fonts */
	wp_register_style( 'prestigio-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Condensed:700' );
	wp_enqueue_style( 'prestigio-fonts');

	/* Register style.css */
	wp_enqueue_style( 'prestigio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	/* Register Owl Carousel */
	if ( is_front_page() ||  is_single() ) {
		wp_enqueue_style( 'prestigio-owl-carousel-style', get_template_directory_uri() . '/inc/owl-carousel/owl.carousel.css', array(), false );
		wp_enqueue_style( 'prestigio-owl-carousel-theme', get_template_directory_uri() . '/inc/owl-carousel/owl.theme.css', array(), false );		
		wp_enqueue_script( 'prestigio-owl-carousel', get_template_directory_uri() . '/inc/owl-carousel/owl.carousel.js', array( 'jquery' ), false );		
	}

	if ( is_front_page() || is_single() ) {
		wp_enqueue_script( 'prestigio-scripts-carrusel', get_template_directory_uri() . '/js/prestigio-scripts-carrusel.js', array( 'jquery' ), false, true );
	}

	/* Google Map for Advanced Custom Fields & easyTabs para mostrar mapa */
	if ( is_single() ) {
		wp_enqueue_script( 'prestigio-acf-map-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), false );
		wp_enqueue_script( 'prestigio-acf-map-render', get_template_directory_uri() . '/js/acf-map.js', array(), false );

		wp_enqueue_script( 'prestigio-easytabs', get_template_directory_uri() . '/js/jquery.easytabs.min.js', array( 'jquery' ), false );
		wp_enqueue_script( 'prestigio-scripts-tabs', get_template_directory_uri() . '/js/prestigio-scripts-tabs.js', array( 'jquery' ), false, true );
	}

    wp_enqueue_script(' prestigio-html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), false );
	
}
add_action( 'wp_enqueue_scripts', 'prestigio_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Propiedades Custom Post Type
 */
function prestigio_propiedades() {

	$labels = array(
		'name'                => 'Propiedades',
		'singular_name'       => 'Propiedad',
		'menu_name'           => 'Propiedades',
		'parent_item_colon'   => 'Propiedad padre',
		'all_items'           => 'Todas las propiedades',
		'view_item'           => 'Ver propiedad',
		'add_new_item'        => 'Agregar nueva propiedad',
		'add_new'             => 'Nueva propiedad',
		'edit_item'           => 'Editar propiedad',
		'update_item'         => 'Actualizar propiedad',
		'search_items'        => 'Buscar propiedades',
		'not_found'           => 'No hay propiedades',
		'not_found_in_trash'  => 'No hay propiedades en la Papelera',
	);
	$args = array(
		'label'               => 'propiedad',
		'description'         => 'Información de propiedades',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'propiedad', $args );
}
add_action( 'init', 'prestigio_propiedades', 0 );

/*
 * Register Operación Custom Taxonomy for Propiedades Custom Post Type
 */
function prestigio_propiedades_taxonomies()  {

	// Add new taxonomy for Operation

	$labels = array(
		'name'                       => _x( 'Operaciones', 'Taxonomy General Name', 'prestigio' ),
		'singular_name'              => _x( 'Operación', 'Taxonomy Singular Name', 'prestigio' ),
		'menu_name'                  => __( 'Operación', 'prestigio' ),
		'all_items'                  => __( 'Todas las operaciones', 'prestigio' ),
		'parent_item'                => __( 'Operación padre', 'prestigio' ),
		'parent_item_colon'          => __( 'Operación padre:', 'prestigio' ),
		'new_item_name'              => __( 'Nueva operación', 'prestigio' ),
		'add_new_item'               => __( 'Agregar operación', 'prestigio' ),
		'edit_item'                  => __( 'Editar operación', 'prestigio' ),
		'update_item'                => __( 'Actualizar operación', 'prestigio' ),
		'separate_items_with_commas' => __( 'Separar operaciones con comas', 'prestigio' ),
		'search_items'               => __( 'Buscar operaciones', 'prestigio' ),
		'add_or_remove_items'        => __( 'Agregar o remover operaciones', 'prestigio' ),
		'choose_from_most_used'      => __( 'Elegir entre las más usadas', 'prestigio' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'operacion', 'propiedad', $args );

	// Add new taxonomy for Property Type

	$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'prestigio' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'prestigio' ),
		'menu_name'                  => __( 'Tipo', 'prestigio' ),
		'all_items'                  => __( 'Todos los tipos', 'prestigio' ),
		'parent_item'                => __( 'Tipo padre', 'prestigio' ),
		'parent_item_colon'          => __( 'Tipo padre:', 'prestigio' ),
		'new_item_name'              => __( 'Nuevo tipo', 'prestigio' ),
		'add_new_item'               => __( 'Agregar nuevo tipo', 'prestigio' ),
		'edit_item'                  => __( 'Editar tipo', 'prestigio' ),
		'update_item'                => __( 'Actualizar tipo', 'prestigio' ),
		'separate_items_with_commas' => __( 'Separar tipos con comas', 'prestigio' ),
		'search_items'               => __( 'Buscar tipos', 'prestigio' ),
		'add_or_remove_items'        => __( 'Agregar o remover tipos', 'prestigio' ),
		'choose_from_most_used'      => __( 'Elegir entre los más usados', 'prestigio' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tipo', 'propiedad', $args );

}

// Hook into the 'init' action
add_action( 'init', 'prestigio_propiedades_taxonomies', 0 );

// Wrap gallery in a div

add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr ) 
{
    global $post, $wp_locale;
    static $instance = 0;

    $instance ++;

    if ( isset( $attr['orderby'] ) ) 
    {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if( !$attr['orderby'] )
        {
            unset( $attr['orderby'] );
        }
    }

    extract( shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'figcaption',
        'columns'    => 3,
        'size'       => 'full',
        'attachment' => 'large',
        'include'    => '',
        'exclude'    => ''
    ), $attr ) );

    $id = intval( $id );

    if ( 'RAND' == $order )
    {
        $orderby = 'none';
    }
    if ( !empty( $include ) ) 
    {
        $include      = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array( 
            'include'        => $include, 
            'post_status'    => 'inherit', 
            'post_type'      => 'attachment', 
            'post_mime_type' => 'image', 
            'order'          => $order, 
            'orderby'        => $orderby 
        ));

        $attachments = array();
        foreach( $_attachments as $key => $val ) 
        {
            $attachments[ $val->ID ] = $_attachments[ $key ];
        }
    } 
    elseif ( !empty( $exclude ) ) 
    {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array( 
            'post_parent'    => $id, 
            'exclude'        => $exclude, 
            'post_status'    => 'inherit', 
            'post_type'      => 'attachment', 
            'post_mime_type' => 'image', 
            'order'          => $order, 
            'orderby'        => $orderby
        ));
    } 
    else 
    {
        $attachments = get_children( array(
            'post_parent'    => $id, 
            'post_status'    => 'inherit', 
            'post_type'      => 'attachment', 
            'post_mime_type' => 'image', 
            'order'          => $order, 
            'orderby'        => $orderby
        ));
    }

    if( empty( $attachments ) )
    {
        return;
    }

    if( is_feed() ) 
    {
        $output = '';
        foreach( $attachments as $att_id => $attachment )
        {
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        }

        return $output;
    }

    $itemtag    = tag_escape( $itemtag );
    $captiontag = tag_escape( $captiontag );
    $columns    = intval( $columns );
    $itemwidth  = $columns > 0 ? floor( 100 / $columns ) : 100;
    $float      = is_rtl() ? 'right' : 'left';
    $selector   = "gallery-{$instance}";
    $output     = apply_filters( 'gallery_style', '' );
    $i          = 0;

    // The div
    $output .= '<div id="property-gallery" class="owl-carousel owl-theme">';

        foreach( $attachments as $id => $attachment ) 
        {
            $link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false );

            $output .= "<{$itemtag} class='item'>";
            $output .= "$link";

            if ( $captiontag && trim( $attachment->post_excerpt ) ) 
            {
                $output .= "<{$captiontag}>" . wptexturize( $attachment->post_excerpt ) . "</{$captiontag}>";
            }
            $output .= "</{$itemtag}>";

            if ( $columns > 0 && ++$i % $columns == 0 )
            {
                $output .= '';
            }
        }

        $output .= "\n";

    // End div
    $output .= '</div>';

    return $output;
}