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

	/* Owl Carousel -> Carrusel Venta*/
    var $carrusel_venta = jQuery("#carrusel-venta");
    $carrusel_venta.owlCarousel({
		autoPlay: false,
		items : 3,
		itemsDesktop : [1000,3],
		itemsDesktopSmall : [979,2],
		itemsTablet: [710,1],
		itemsMobile : false
    });

    /* Owl Carousel -> Carrusel botones */
	jQuery("#venta-siguiente").click(function(event){
		event.preventDefault();
        $carrusel_venta.trigger('owl.next');
	});
	jQuery("#venta-anterior").click(function(event){
		event.preventDefault();
        $carrusel_venta.trigger('owl.prev');
	});

	/* Owl Carousel -> Carrusel Alquiler*/
    var $carrusel_alquiler = jQuery("#carrusel-alquiler");
    $carrusel_alquiler.owlCarousel({
		autoPlay: false,
		items : 3,
		itemsDesktop : [1000,3],
		itemsDesktopSmall : [979,2],
		itemsTablet: [710,1],
		itemsMobile : false
    });

    /* Owl Carousel -> Carrusel botones */
	jQuery("#alquiler-siguiente").click(function(event){
		event.preventDefault();
        $carrusel_alquiler.trigger('owl.next');
	});
	jQuery("#alquiler-anterior").click(function(event){
		event.preventDefault();
        $carrusel_alquiler.trigger('owl.prev');
	});
	
});