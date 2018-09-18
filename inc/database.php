<?php
    /******FUNCTIONS******/
    function lapizzeria_database(){
        // variables de la bd y tabla
        global $wpdb;
        global $lapizzeria_dbversion;
        $lapizzeria_dbversion = 0.1;
        $tabla = $wpdb->prefix . 'reservaciones';
        $charset_collate = $wpdb->get_charset_collate();
        //qury de creacion
        $sql = "CREATE TABLE $tabla (
            id INT(9) NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(100) NOT NULL,
            fecha DATETIME NOT NULL,
            correo VARCHAR(100) NOT NULL,
            telefono VARCHAR(15) NOT NULL,
            mensaje TEXT,
            PRIMARY KEY(id)
        ) $charset_collate;";
        // archivo necesario para crear una tabla
        require_once (ABSPATH.'wp-admin/includes/upgrade.php');
        // creando tabla y agregando version
        dbDelta($sql);
        add_option('lapizzeria_version',$lapizzeria_dbversion);
    }
    /******ACTIONS********/
    add_action('after_setup_theme','lapizzeria_database');
?>