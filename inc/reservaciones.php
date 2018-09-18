<?php

    /**
     * FUNCIONES
     */

     /**
      * Alamacena los datos del formulario de reservaciones
      */
    function lapizzeria_guardar(){
        if(isset($_POST['enviar']) && $_POST['oculto']== 1){
            $nombre = sanitize_text_field($_POST['nombre']);
            $fecha = sanitize_text_field($_POST['fecha']);
            $email = sanitize_email($_POST['email']);
            $telefono = sanitize_text_field($_POST['telefono']);
            $mensaje = sanitize_text_field($_POST['mensaje']);
        }
    }

    /**
     * Acciones
     */
    add_action('init','lapizzeria_guardar');
?>