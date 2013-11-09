jQuery(document).ready(function() {

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