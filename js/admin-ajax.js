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
                if (response.respuesta == 1) {
                    $('[data-reservaciones="' + idRegistro + '"]')
                        .parent()
                        .parent()
                        .remove();
                    alert("Eliminado con exito");
                }
            },
            error: function(xhr, status, error) {
                alert("No se ha eliminado: " + xhr.responseText);
            }
        });
    });
});