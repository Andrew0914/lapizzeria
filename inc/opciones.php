<?php
    
    /**
    * FUNCIONES
    */

    function lapizzeria_ajustes(){
        add_menu_page("La Pizzeria", "Ajustes Pizzeria", "administrator", "lapizzeria_ajustes", "lapizzeria_ajustes", '', 20);
        add_submenu_page("lapizzeria_ajustes", "Reservaciones", "Reservaciones", "administrator", "lapizzeria_reservaciones", "lapizzeria_reservaciones");
    }

    function lapizzeria_reservaciones(){}
        
    /**
    * ACCIONES
    */
    add_action("admin_menu","lapizzeria_ajustes");

?>