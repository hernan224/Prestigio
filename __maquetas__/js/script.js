jQuery(document).ready(function() {

/** Scripts Home **/
  /** Slider propiedades detacadas **/

    jQuery("#carousel-propiedades-destacadas").owlCarousel({
        autoPlay: 3500,
        navigation : false, // Show next and prev buttons
        slideSpeed : 900,
        paginationSpeed : 650,
        stopOnHover:true,
        singleItem:true

    });


  /** Carrusel propiedades en venta **/
    var $carrusel_venta = jQuery("#carrusel-venta");
    $carrusel_venta.owlCarousel({

        autoPlay: false, //Set AutoPlay to 3 seconds

        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,2],
        itemsTablet: [767,1], //2 items between 600 and 0
        itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option

    });
    /** Botones **/
    jQuery(".venta-next").click(function(event){
        event.preventDefault();
        $carrusel_venta.trigger('owl.next');
    })
    jQuery(".venta-prev").click(function(event){
        event.preventDefault();
        $carrusel_venta.trigger('owl.prev');
    })


  /** Carrusel propiedades en venta **/
    var $carrusel_alquiler = jQuery("#carrusel-alquiler");
    $carrusel_alquiler.owlCarousel({

        autoPlay: false, //Set AutoPlay to 3 seconds

        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [990,2],
        itemsTablet: [768,1], //2 items between 600 and 0
        itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option

    });
    /** Botones **/
    jQuery(".alquiler-next").click(function(event){
        event.preventDefault();
        $carrusel_alquiler.trigger('owl.next');
    })
    jQuery(".alquiler-prev").click(function(event){
        event.preventDefault();
        $carrusel_alquiler.trigger('owl.prev');
    })





    /** Scrips propiedad individual **/
    /** Silder galería propiedad individual **/
    jQuery("#galeria-propiedad").owlCarousel({
        singleItem : true,

        //Autoplay
        autoPlay : true,
        stopOnHover : true,

        // Navigation
        navigation : true,
        navigationText : ["<",">"],
        //rewindNav : false,

        //Auto height
        autoHeight : true,

        //Pagination
        pagination : true,
        paginationNumbers: true
    });

    /** Fancybox fotos galería propiedad individual **/
    jQuery(".fancy-gal").fancybox({
        openEffect	: 'none',
        closeEffect	: 'none'
    });

    /** Fancybox para mostrar google maps
     * (el boton debe llevar la clase fancybox.iframe para que funcione) **/
    jQuery('.fancy-map').fancybox({
        maxWidth	: 960,
        maxHeight	: 600,
        fitToView	: false,
        width		: '70%',
        height		: '70%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

    /** Función que lanza la galería de fotos **/
    jQuery('.fancy-gal_btn').click(function(event) {
        event.preventDefault();
        jQuery('#galeria-propiedad .fancy-gal').first().trigger("click");
    });

});