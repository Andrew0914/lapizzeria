<?php

    /**
     * FUNCIONES
     */

     /**
      * Alamacena los datos del formulario de reservaciones
      */
    function lapizzeria_guardar(){
        
        global $wpdb;
        $tabla = $wpdb->prefix . "reservaciones";
        // validamos el envio
        if(isset($_POST['enviar']) && $_POST['oculto']== 1){
            //sanitizamos los campos
            $nombre = sanitize_text_field($_POST['nombre']);
            $fecha = sanitize_text_field($_POST['fecha']);
            $email = sanitize_email($_POST['email']);
            $telefono = sanitize_text_field($_POST['telefono']);
            $mensaje = sanitize_text_field($_POST['mensaje']);
            // generamos los datos de insercion
            $datos = array(
                "nombre" => $nombre,
                "fecha" => $fecha,
                "correo" => $email,
                "telefono" => $telefono,
                "mensaje"=> $mensaje
            );
            // un formato por cada campo de insercion
            $formato = array('%s','%s','%s','%s','%s');
            //insertamos
            $wpdb->insert($tabla,$datos,$formato);
            // obtenemos la pagina de redireccion
            $page = get_page_by_title("Gracias por su Reserva");
            // redirigimos
            wp_redirect(get_permalink($page->ID));
            exit();
        }
    }

    /**
     * Acciones
     */
    add_action('init','lapizzeria_guardar');
?>