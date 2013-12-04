jQuery(document).ready(function() {
		
	/* Property details tabs */
	/* Script para hacer andar los tabs */
	jQuery('#property-tab-wrapper').easytabs(); 
	
	
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

	
});