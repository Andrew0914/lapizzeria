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

        if(isset($_POST['enviar']) && $_POST['oculto']== 1){
            $nombre = sanitize_text_field($_POST['nombre']);
            $fecha = sanitize_text_field($_POST['fecha']);
            $email = sanitize_email($_POST['email']);
            $telefono = sanitize_text_field($_POST['telefono']);
            $mensaje = sanitize_text_field($_POST['mensaje']);

            $datos = array(
                "nombre" => $nombre,
                "fecha" => $fecha,
                "correo" => $email,
                "telefono" => $telefono,
                "mensaje"=> $mensaje
            );
            
            $formato = array('%s','%s','%s','%s','%s');

            $wpdb->insert($tabla,$datos,$formato);
        }
    }

    /**
     * Acciones
     */
    add_action('init','lapizzeria_guardar');
?>