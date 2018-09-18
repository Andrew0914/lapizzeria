<?php

    /**
     * FUNCIONES
     */

     /**
      * Alamacena los datos del formulario de reservaciones
      */
    function lapizzeria_guardar(){
        if(isset($_POST['enviar']) && $_POST['oculto']== 1){
            
        }
    }

    /**
     * Acciones
     */
    add_action('init','lapizzeria_guardar');
?>