jQuery(document).ready(function() {
		
	/* Property details tabs */
	/* Script para hacer andar los tabs */
	jQuery('#property-tab-wrapper').easytabs(); 
	
	
	/** Silder galería propiedad individual **/
    jQuery("#property-gallery").owlCarousel({
        singleItem : true,

        // Autoplay
        autoPlay : true,
        stopOnHover : true,

        // Responsive
        responsiveRefreshRate : 200,

        // Pagination
        pagination : true,
        paginationNumbers: false
    });
});