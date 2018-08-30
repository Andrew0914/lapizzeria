<?php

    /*************************
    ******** FUNCIONES ******
    *************************/

    /**
    * Carga las hojas de estilos y scripts
    */
    function lapizzeria_styles(){
        //Registrar los CSS
        wp_register_style('normalize',get_template_directory_uri() . '/css/normalize.css',array(), '8.0.0');
        wp_register_style('fontawesome',get_template_directory_uri() . '/css/font-awesome.min.css',array('normalize'), '4.7.0');
        wp_register_style('mis_estilos',get_template_directory_uri() . '/style.css',array('normalize'), '1.0');
        //Llamar los CSS
        wp_enqueue_style('normalize');
        wp_enqueue_style('fontawesome');
        wp_enqueue_style('mis_estilos');
        // registrar JS
        wp_enqueue_script('scripts',get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0',true);
    }

    /**
     * Carga los navs o seccioens de menu, no los menus fisicos esos son desde el admin
     */
    function lapizzeria_menus(){
        register_nav_menus(array(
            'header-menu' => __('Header Menu','lapizzeria'),
            'social-menu' => __('Social Menu', 'lapizzeria')
        ));
    }

    /*************************
    ******** ACCIONES ********
    *************************/
    add_action('wp_enqueue_scripts','lapizzeria_styles');
    add_action('init','lapizzeria_menus');
?>