// variable sin conflicto jquery
$ = jQuery.noConflict();

function eliminarRegistro(idRegistro) {
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
                swal(
                    'Registro eliminado',
                    'Da click en el boton para continuar!',
                    'success'
                );
            }
        },
        error: function(xhr, status, error) {
            alert("No se ha eliminado: " + xhr.responseText);
        }
    });
}

function confirmarEliminado(idRegistro) {
    swal({
        title: 'Estas seguro de eliminar?',
        text: "Esta accion no e puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminalo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            eliminarRegistro(idRegistro);
        }
    });
}


$(document).ready(function() {
    // obtener la url de admin-ajax.php
    $(".borrar-registro").click(function(e) {
        e.preventDefault();
        confirmarEliminado($(this).attr("data-reservaciones"));
    });
});