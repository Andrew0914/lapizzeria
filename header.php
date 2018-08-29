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
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" class="logotipo">
                    </a>
                </div>
                <!-- /LOGO -->
                <!-- INFORMAION ENCABEZADO -->
                <div class="informacion-encabezado">
                    <!-- REDES SOCIALES--> 
                    <div class="redes-sociales">
                        <?php 
                            // argumentos para desplegar el menu
                            $args= array(
                                "theme_location"=> "social-menu",
                                "container"=> "nav",
                                "container-id" => "menu-social",
                                "container-class"=>"menu-social",
                                "link_before"=> "<span class='sr-text'>",
                                "link_after"=> "</span>"
                            );
                            // imprime el menu
                            wp_nav_menu($args);
                        ?>
                    </div>
                    <!-- /REDES SOCIALES-->
                    <!--  DIRECCION -->
                    <div class="direccion">
                        <p>Avenida Siempre Viva 18, Colonia Azul,145000</p>
                        <p>Tel: 55 664 4404</p>
                    </div>
                    <!--  /DIRECCION -->
                </div>
                <!-- /INFORMAION ENCABEZADO -->
            </div>
            <!-- /CONTENEDOR -->
        </header>
        <!-- MENU PRINCIPAL-->
        <nav class="menu-sitio">
            <div class="contenedor navegacion">
                <?php
                    // argumentos para desplegar el menu
                    $args= array(
                        "theme_location"=> "header-menu",
                        "container"=> "nav",
                        "container-class"=>"menu-sitio"
                    );

                    // imprime el menu
                    wp_nav_menu($args);
                ?>
            </div>
        </nav>
        <!-- /MENU PRINCIPAL-->