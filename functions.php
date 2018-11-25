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
        $google_maps_apikey = esc_html(get_option('lapizzeria_apikey'));
        wp_register_script('maps', 'https://maps.googleapis.com/maps/api/js?key='.$google_maps_apikey.'&callback=initMap',array(), '',true);
        wp_register_script('fluidboxjs',get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array(), '2.0.5',true);
        wp_register_script('scripts',get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0',true);
        //LLAMAR LOS JS
        wp_enqueue_script("jquery");
        wp_enqueue_script("fluidboxjs");
        wp_enqueue_script("maps");
        wp_enqueue_script("scripts");

        // FROM PHP TO JS
        wp_localize_script(
            'scripts',
            'opciones',
            array(
                'latitud'=> get_option('lapizzeria_latitud'),
                'longitud' => get_option('lapizzeria_longitud'),
                'zoom'=> get_option('lapizzeria_zoom')
            )
        );
    }

    /**
     * Filtra el tag de un script y agrega atributos a la etiqueta
     */
    function agregar_async_defer($tag,$handle){
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
        add_theme_support('title-tag');

        add_image_size("nosotros",437 , 291, true);
        add_image_size("especialidades",768 , 515, true);
        add_image_size("especialidades-portrait",435 , 526, true);
        update_option('thumbnail_size_w',253);
        update_option('thumbnail_size_h',164);
    }

    /**
     * Habilita el cambio dinamico del logo y pone tamaños default
     */
    function themename_custom_logo_setup() {
        $defaults = array(
            'height'      => 220,
            'width'       => 200
        );
        add_theme_support( 'custom-logo', $defaults );
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

    /**
     * Scrips para el backend de wordpress
     */
    function lapizzeria_admin_scripts(){
        //colocamos los styles y scripts para el admin
        wp_enqueue_style('sweetalertcss', get_template_directory_uri() . '/css/sweetalert2.min.css', array(), '1.0 ');
        wp_enqueue_script('sweetalertcss',get_template_directory_uri() . '/js/admin-ajax.js', array(), '1.0.0',true);
        wp_enqueue_script('adminajax',get_template_directory_uri() . '/js/sweetalert2.min.js', array('jquery'), '1.0.0',true);
        //pasamos el URL de WP ajac al admin js
        wp_localize_script('adminajax',
             'url_eliminar',
              array('ajaxurl' => admin_url('admin-ajax.php'))
            );
    }

    /*************************
    ******** ACCIONES ********
    *************************/
    add_action('wp_enqueue_scripts','lapizzeria_styles');
    add_action('init','lapizzeria_menus');
    add_action('after_setup_theme','lapizzeria_setup');
    add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
    add_action( 'init', 'lapizzeria_especialidades' );
    add_action('widgets_init','lapizzeria_widgets');
    
    /* FILTROS*/
    add_filter('script_loader_tag', 'agregar_async_defer',10,2);
    /*ADMIN*/
    add_action('admin_enqueue_scripts' , 'lapizzeria_admin_scripts');

    /***************************
     ** ADVANCE CUSTOM FIELDS **
     **************************/
    // requiere estas dos primeras lineas para integralos los custom fields
     define('ACF_LITE' , true);
     include_once 'advanced-custom-fields/acf.php';
    // el siguiente codigo se obtiene al exportar los grupos de CF desde le plugin de WP
    // se debe tambien mover la carpeta del plugin a la raiz del tema o plantilla
     if( function_exists('acf_add_local_field_group') ):
        acf_add_local_field_group(array(
            'key' => 'group_5ba6da7aeb7fa',
            'title' => 'Especialidades',
            'fields' => array(
                array(
                    'key' => 'field_5b8a09965ce0a',
                    'label' => 'Precio',
                    'name' => 'precio',
                    'type' => 'text',
                    'instructions' => 'Añade un precio al producto o especialidad',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'especialidades',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
            ),
            'active' => 1,
            'description' => '',
        ));
        
        acf_add_local_field_group(array(
            'key' => 'group_5be312e935536',
            'title' => 'Inicio',
            'fields' => array(
                array(
                    'key' => 'field_5be3131521b25',
                    'label' => 'Contenido',
                    'name' => 'contenido',
                    'type' => 'wysiwyg',
                    'instructions' => 'Agregue la descripcion',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_5be3135421b26',
                    'label' => 'Imagen',
                    'name' => 'imagen',
                    'type' => 'image',
                    'instructions' => 'Agregue la imagen',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => '21',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));
        
        acf_add_local_field_group(array(
            'key' => 'group_5ba6da7b21dc3',
            'title' => 'Sobre Nosotros',
            'fields' => array(
                array(
                    'key' => 'field_5b899356bff0c',
                    'label' => 'imagen 1',
                    'name' => 'imagen_1',
                    'type' => 'image',
                    'instructions' => 'Agrega la imagen 1 de la cuadricula',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'return_format' => 'id',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5b8993c5bff10',
                    'label' => 'Descripcion 1',
                    'name' => 'descripcion_1',
                    'type' => 'wysiwyg',
                    'instructions' => 'Escribe la descripcion de la imagen 1',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'tabs' => 'all',
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_5b8993a5bff0e',
                    'label' => 'imagen 2',
                    'name' => 'imagen_2',
                    'type' => 'image',
                    'instructions' => 'Agrega la imagen 2 de la cuadricula',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'return_format' => 'id',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5b8993e7bff11',
                    'label' => 'Descripcion 2',
                    'name' => 'descripcion_2',
                    'type' => 'wysiwyg',
                    'instructions' => 'Escribe la descripcion de la imagen 2',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'tabs' => 'all',
                    'delay' => 0,
                ),
                array(
                    'key' => 'field_5b8993babff0f',
                    'label' => 'imagen 3',
                    'name' => 'imagen_3',
                    'type' => 'image',
                    'instructions' => 'Agrega la imagen 3 de la cuadricula',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'return_format' => 'id',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5b8993f4bff12',
                    'label' => 'Descripcion 3',
                    'name' => 'descripcion_3',
                    'type' => 'wysiwyg',
                    'instructions' => 'Escribe la descripcion de la imagen 3',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'tabs' => 'all',
                    'delay' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => '10',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
            ),
            'active' => 1,
            'description' => '',
        ));
        
        endif;
?>