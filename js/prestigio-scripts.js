jQuery(document).ready(function() {
	
	/* Owl Carousel -> Slider */
	jQuery("#front-slider").owlCarousel({
		autoPlay: 3500,
        navigation : false,
		slideSpeed : 900,
		paginationSpeed : 650,
		stopOnHover: true,
		singleItem: true
	});

	/* Owl Carousel -> Carrusel */
	var $owl_carousel = jQuery(".property-post-list");
	$owl_carousel.owlCarousel({
		autoPlay: false,
		items : 3,
		itemsDesktop : [1000,3],
		itemsDesktopSmall : [979,2],
		itemsTablet: [767,1],
		itemsMobile : false
    });

    /* Owl Carousel -> Carrusel botones */
	jQuery(".venta-next").click(function(){
		event.preventDefault();
		$owl_carousel.trigger('owl.next');
	});
	jQuery(".venta-prev").click(function(){
		event.preventDefault();
		$ow_carousel.trigger('owl.prev');
	});
});