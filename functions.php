<?php

    /*************************
    ******** FUNCIONES ******
    *************************/

    /**
    * Carga las hojas de estilos y scripts
    */
    function lapizzeria_styles(){
        //REGISTRAR LOS CC
        wp_register_style('normalize',get_template_directory_uri() . '/css/normalize.css',array(), '8.0.0');
        wp_register_style('fontawesome',get_template_directory_uri() . '/css/font-awesome.min.css',array('normalize'), '4.7.0');
        wp_register("googlefonts", "https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Raleway",array(), '1.0.0');
        wp_register_style('mis_estilos',get_template_directory_uri() . '/style.css',array('normalize'), '1.0');
        //LLAMAR LOS CSS
        wp_enqueue_style('normalize');
        wp_enqueue_style('fontawesome');
        wp_enqueue_style("googlefonts");
        wp_enqueue_style('mis_estilos');
        // REGISTRAR LOS  JS
        wp_register_script('scripts',get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0',true);
        //LLAMAR LOS JS
        wp_enqueue_script("jquery");
        wp_enqueue_script("scripts");
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
    
    /**
     * Habilita el soporte para imagenes destacadas
     */
    function lapizzeria_setup(){
        add_theme_support("post-thumbnails");
        add_image_size("nosotros",437 , 291, true);
    }

    /*************************
    ******** ACCIONES ********
    *************************/
    add_action('wp_enqueue_scripts','lapizzeria_styles');
    add_action('init','lapizzeria_menus');
    add_action('after_setup_theme','lapizzeria_setup');
?>