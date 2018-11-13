var map;
// inicializa el mapa
function initMap() {
    var location = { lat: parseFloat(opciones.latitud), lng: parseFloat(opciones.longitud) };
    map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: parseInt(opciones.zoom)
    });

    var marker = new google.maps.Marker({
        position: location,
        label: 'La Pizzeria',
        title: 'La pizzeria',
        map: map
    });

}

// variable sin conflicto jquery
jQ = jQuery.noConflict();

function ajustaMapa(altura) {
    var mapa = jQ("#map");
    var ubicacionSeccion = jQ(".ubicacion-reservacion");
    if (altura <= 0) {
        mapa.css("height", ubicacionSeccion.height());
    } else {
        mapa.css("height", altura);
    }
}


jQ(document).ready(function() {

    // accion menu mobil
    jQ(".mobile-menu a").click(function() {
        jQ("nav.menu-sitio").toggle("slow");
    });

    // reaccionando al cambio de tamaño de pantalla
    var breakpoint = 768;
    jQ(window).resize(function() {
        if (jQ(document).width() >= breakpoint) {
            jQ("nav.menu-sitio").show();
        } else {
            jQ("nav.menu-sitio").hide();
        }
    });

    // GALERIA FLUID BOX
    jQ('.gallery a').each(function() {
        jQ(this).attr({ 'data-fluidbox': '' });
    });

    if (jQ('[data-fluidbox]').length > 0) {
        jQ('[data-fluidbox]').fluidbox();
    }
    // AJUSTES PARA EL MAPA
    if (jQ(document).width() >= breakpoint) {
        ajustaMapa(0);
    } else {
        ajustaMapa(300);
    }
});