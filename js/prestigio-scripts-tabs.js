jQuery(document).ready(function() {
	//var map, center;

/* Mapa Leaflet */
/* Script para mostrar el mapa */
    var $marker = jQuery('#marker');
    var leaf_lat = $marker.data('lat');
    var leaf_lng = $marker.data('lng');


    var mapaProp = L.map('property-details-map').setView([leaf_lat, leaf_lng], 16);

    var cloudmadeUrl = 'http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
        subDomains = ['otile1','otile2','otile3','otile4'],
        cloudmadeAttrib = '<a href="http://open.mapquest.co.uk" target="_blank">MapQuest</a>, <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> bajo licencia <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC-BY-SA</a>';

    var cloudmade2 = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttrib, subdomains: subDomains});

    cloudmade2.addTo(mapaProp);

    /* Marcadores*/
    var prop_mark = L.marker(
        [leaf_lat, leaf_lng]
    ).addTo(mapaProp);


    /* Property details tabs */
    /* Script para hacer andar los tabs */
    jQuery('#property-tab-wrapper').easytabs()



    /** Silder galer�a propiedad individual **/
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