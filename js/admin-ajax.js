// variable sin conflicto jquery
$ = jQuery.noConflict();

$(document).ready(function() {
    // obtener la url de admin-ajax.php
    $(".borrar-registro").click(function(e) {
        e.preventDefault();
        var idRegistro = $(this).attr("data-reservaciones");
        $.ajax({
            type: "post",
            url: url_eliminar.ajaxurl,
            data: {
                action: 'lapizzeria_eliminar',
                id: idRegistro,
                tipo: 'eliminar'
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});