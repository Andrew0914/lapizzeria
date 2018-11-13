<?php
    
    /******************
    * FUNCIONES
    ******************/

    /**
     * Agrega los menus y submenus de opciones
     */
    function lapizzeria_ajustes(){
        add_menu_page("La Pizzeria", "Ajustes Pizzeria", "administrator", "lapizzeria_ajustes", "lapizzeria_opciones", '', 20);
        add_submenu_page("lapizzeria_ajustes", "Reservaciones", "Reservaciones", "administrator", "lapizzeria_reservaciones", "lapizzeria_reservaciones");
        // registramos las opciones , para que wp las pueda modificar
        add_action("admin_init","lapizzeria_registrar_opciones");
    }

    /**
     * Registra las opciones del menu de opciones para que WP las entienda
     */
    function lapizzeria_registrar_opciones(){
        // opciones de la direccion
        register_setting("lapizzeria_opciones_grupo", "lapizzeria_direccion");
        register_setting("lapizzeria_opciones_grupo", "lapizzeria_telefono");
        // opciones para la ubicacion en maps
        register_setting("lapizzeria_opciones_gmap", "lapizzeria_latitud");
        register_setting("lapizzeria_opciones_gmap", "lapizzeria_longitud");
        register_setting("lapizzeria_opciones_gmap", "lapizzeria_zoom");
        register_setting("lapizzeria_opciones_gmap", "lapizzeria_apikey");
    }

    /**lapizzeria_direccion
     * Genera el formulario de opciones para modificarlas
     */
    function lapizzeria_opciones(){
        $active_tab = 'direccion';
        if(isset($_GET['tab'])){
            $active_tab = $_GET['tab'];
        }
        echo "<div class='wrap'>";
            echo "<h1>La Pizzeria Ajustes</h1>";
            // tabs de contenido
            echo "<h2 class='nav-tab-wrapper'>";
                echo "<a href='?page=lapizzeria_ajustes&tab=direccion' class='nav-tab ". ($active_tab == "direccion" ? "nav-tab-active": "") . "'>Direccion</a>";
                echo "<a href='?page=lapizzeria_ajustes&tab=maps' class='nav-tab ". ($active_tab == "maps" ? "nav-tab-active": "") . "'>Ubicacion Mapa</a>";
            echo "</h2><br>";
            echo "<form method='post' action='options.php'>";
                if($active_tab == 'direccion'){
                    // indicamos a WP el grupo de opciones que va a usar para este formulario
                    settings_fields("lapizzeria_opciones_grupo");
                    // despues de indicar, le dicemosque las use
                    do_settings_sections("lapizzeria_opciones_grupo");
                    echo "<table ='table-form'>";
                        // direccion
                        echo "<tr valing='top'>";
                            echo "<th scope='row' align='left'>Direccion </th>";
                            echo "<td> <input type='text' name='lapizzeria_direccion' value='".esc_attr(get_option("lapizzeria_direccion"))."'></td>";
                        echo "</tr>";
                        // telefono
                        echo "<tr valing='top'>";
                            echo "<th scope='row' align='left'>Telfono </th>";
                            echo "<td> <input type='text' name='lapizzeria_telefono' value='".esc_attr(get_option("lapizzeria_telefono"))."'></td>";
                        echo "</tr>";
                    echo "</table>";
                }else if($active_tab == 'maps'){
                    // opciones del mapa
                    settings_fields("lapizzeria_opciones_gmap");
                    do_settings_sections("lapizzeria_opciones_gmap");
                    echo "<table ='table-form'>";
                        // latitud
                        echo "<tr valing='top'>";
                            echo "<th scope='row' align='left'>Latiud </th>";
                            echo "<td> <input type='text' name='lapizzeria_latitud' value='".esc_attr(get_option("lapizzeria_latitud"))."'></td>";
                        echo "</tr>";
                        // longitud
                        echo "<tr valing='top'>";
                            echo "<th scope='row' align='left'>Longitud </th>";
                            echo "<td> <input type='text' name='lapizzeria_longitud' value='".esc_attr(get_option("lapizzeria_longitud"))."'></td>";
                        echo "</tr>";
                        // zoom
                        echo "<tr valing='top'>";
                            echo "<th scope='row' align='left'>Zoom </th>";
                            echo "<td> <input type='number' name='lapizzeria_zoom' value='".esc_attr(get_option("lapizzeria_zoom"))."'></td>";
                        echo "</tr>";
                        // apikey
                        echo "<tr valing='top'>";
                            echo "<th scope='row' align='left'>ApiKey</th>";
                            echo "<td> <input type='text' name='lapizzeria_apikey' value='".esc_attr(get_option("lapizzeria_apikey"))."'></td>";
                        echo "</tr>";
                    echo "</table>";
                }
                // generamos el boton se submit
                submit_button();
            echo "</form>";
        echo "</div>";
    }

    /**
     * Genra la tabla con las reservaciones almacenadas de los clientes
     */
    function lapizzeria_reservaciones(){
        echo "<div class='wrap'>";
            echo "<h1>Reservaciones</h1>";
            echo "<table class='wp-list-table widefat striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class='manage-column'>ID</th> <th class='manage-column'>Nombre</th> <th class='manage-column'>Fecha</th> <th class='manage-column'>Correo</th> <th class='manage-column'>Telefono</th> <th class='manage-column'>Mensaje</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    global $wpdb;
                    $reservaciones_table = $wpdb->prefix.'reservaciones';
                    $registros = $wpdb->get_results("SELECT * FROM $reservaciones_table",ARRAY_A);
                    foreach($registros as $row){
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['fecha'] . "</td>";
                            echo "<td>" . $row['correo'] . "</td>";
                            echo "<td>" . $row['telefono'] . "</td>";
                            echo "<td>" . $row['mensaje'] . "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        echo "</div>";
    }

    /*********************
    * ACCIONES
    *********************/
    add_action("admin_menu","lapizzeria_ajustes");

?>