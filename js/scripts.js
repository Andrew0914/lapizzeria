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
$ = jQuery.noConflict();

function ajustaMapa(altura) {
    var mapa = $("#map");
    var ubicacionSeccion = $(".ubicacion-reservacion");
    if (altura <= 0) {
        mapa.css("height", ubicacionSeccion.height());
    } else {
        mapa.css("height", altura);
    }
}


$(document).ready(function() {

    // accion menu mobil
    $(".mobile-menu a").click(function() {
        $("nav.menu-sitio").toggle("slow");
    });

    // reaccionando al cambio de tamaño de pantalla
    var breakpoint = 768;
    $(window).resize(function() {
        if ($(document).width() >= breakpoint) {
            $("nav.menu-sitio").show();
        } else {
            $("nav.menu-sitio").hide();
        }
    });

    // GALERIA FLUID BOX
    $('.gallery a').each(function() {
        $(this).attr({ 'data-fluidbox': '' });
    });

    if ($('[data-fluidbox]').length > 0) {
        $('[data-fluidbox]').fluidbox();
    }
    // AJUSTES PARA EL MAPA
    if ($(document).width() >= breakpoint) {
        ajustaMapa(0);
    } else {
        ajustaMapa(300);
    }
});