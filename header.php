<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>La Pizzeria</title>
        <?php
            wp_head();
        ?>
    </head>
    <body>
        <header class="encabezado_sitio">
            <!-- CONTENEDOR -->
            <div class="contenedor">
                <!-- LOGO -->
                <div class="logo">
                    <a href="<?php echo esc_url( home_url("/") ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg">
                    </a>
                </div>
                <!-- /LOGO -->
            </div>
            <!-- /CONTENEDOR -->
        </header>