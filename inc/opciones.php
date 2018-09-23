<?php
    
    /**
    * FUNCIONES
    */

    function lapizzeria_ajustes(){
        add_menu_page("La Pizzeria", "Ajustes Pizzeria", "administrator", "lapizzeria_ajustes", "lapizzeria_ajustes", '', 20);
        add_submenu_page("lapizzeria_ajustes", "Reservaciones", "Reservaciones", "administrator", "lapizzeria_reservaciones", "lapizzeria_reservaciones");
    }

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

    /**
    * ACCIONES
    */
    add_action("admin_menu","lapizzeria_ajustes");

?>