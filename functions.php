<?php
    // Tablas personalizadas
    require get_template_directory().'/inc/database.php';
    //Funciones para las reservaciones
    require get_template_directory().'/inc/reservaciones.php';
    // Opciones para el tema
    require get_template_directory().'/inc/opciones.php';
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
        wp_register_style("googlefonts", "https://fonts.googleapis.com/css?family=Mukta|Open+Sans|Raleway",array(), '1.0.0');
        wp_register_style("fluidboxcss", get_template_directory_uri() ."/css/fluidbox.min.css",array('normalize'), '2.0.5');
        wp_register_style('mis_estilos',get_template_directory_uri() . '/style.css',array('normalize'), '1.0');
        //LLAMAR LOS CSS
        wp_enqueue_style('normalize');
        wp_enqueue_style('fontawesome');
        wp_enqueue_style("googlefonts");
        wp_enqueue_style("fluidboxcss");
        wp_enqueue_style('mis_estilos');
        // REGISTRAR LOS  JS
        wp_register_script('maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB8n0ohtTuLLiepP-5Ov04ckyCWq3cbXOY&callback=initMap',array(), '',true);
        wp_register_script('fluidboxjs',get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array(), '2.0.5',true);
        wp_register_script('scripts',get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0',true);
        //LLAMAR LOS JS
        wp_enqueue_script("maps");
        wp_enqueue_script("jquery");
        wp_enqueue_script("fluidboxjs");
        wp_enqueue_script("scripts");
    }

    function agregar_async_defer($tag,$handle){
        echo $tag;
        if('maps' !== $handle)
            return $tag;
        return str_replace(' src', ' async="async" defer="defer" src',$tag);
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
        add_image_size("especialidades",768 , 515, true);
        add_image_size("especialidades-portrait",435 , 526, true);
        update_option('thumbnail_size_w',253);
        update_option('thumbnail_size_h',164);
    }

    /**
     * Agrega un custom post field, en el menu del wp admin
     */
    function lapizzeria_especialidades() {
        $labels = array(
            'name'               => _x( 'Pizzas', 'lapizzeria' ),
            'singular_name'      => _x( 'Pizzas', 'post type singular name', 'lapizzeria' ),
            'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
            'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
            'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
            'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
            'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
            'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
            'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
            'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
            'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
            'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
            'not_found'          => __( 'No Pizzases found.', 'lapizzeria' ),
            'not_found_in_trash' => __( 'No Pizzases found in Trash.', 'lapizzeria' )
        );
    
        $args = array(
            'labels'             => $labels,
        'description'        => __( 'Description.', 'lapizzeria' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'especialidades' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
        );
    
        register_post_type( 'especialidades', $args );
    }

    /**
    * Registra la zona de widgets
    */
    function lapizzeria_widgets(){
        register_sidebar(array(
            'name'=>'Blog Sidebar',
            'id'=>'blog_sidebar',
            'before_widget'=>'<div class="widget">',
            'after_widget'=> '</div>',
            'before_title'=>'<h3>',
            'after_title'=>'</h3>'
        ));
    }

    /*************************
    ******** ACCIONES ********
    *************************/
    add_action('wp_enqueue_scripts','lapizzeria_styles');
    add_action('init','lapizzeria_menus');
    add_action('after_setup_theme','lapizzeria_setup');
    add_action( 'init', 'lapizzeria_especialidades' );
    add_action('widgets_init','lapizzeria_widgets');
    
    /* FILTROS*/
    add_filter('script_loader_tag', 'agregar_async_defer',10,2);
?>