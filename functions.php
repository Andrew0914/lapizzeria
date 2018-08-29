<?php

    /*************************
    ******** FUNCIONES ******
    *************************/

    /**
    * Carga las hojas de estilos
    */
    function lapizzeria_styles(){
        //Registro de hojas de estilo
        wp_register_style('normalize',get_template_directory_uri() . '/css/normalize.css',array(), '8.0.0');
        wp_register_style('mis_estilos',get_template_directory_uri() . '/style.css',array('normalize'), '1.0');
        //Encolando los estilos
        wp_enqueue_style('normalize');
        wp_enqueue_style('mis_estilos');
    }

    /*************************
    ******** ACCIONES ********
    *************************/
    add_action('wp_enqueue_scripts','lapizzeria_styles');
?>