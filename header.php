<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- SOPORTE PARA APP WEB IOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="La pizzeria">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/contacto_bg.jpg">
        <!-- SOPORTE PARA APP WEB ANDROID -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#f19f30">
        <meta name="application-name" content="La pizzeria">
        <link rel="-icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/buscador.jpg">
        
        <title>La Pizzeria</title>
        <?php
            wp_head();
        ?>
    </head>
    <body <?php body_class(); ?> >
        <header class="encabezado-sitio">
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
                                "container_id" => "sociales",
                                "container_class"=>"sociales",
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
                        <p><?php echo esc_html(get_option("lapizzeria_direccion")); ?></p>
                        <p><?php echo "Tel. " . esc_html(get_option("lapizzeria_telefono")); ?></p>
                    </div>
                    <!--  /DIRECCION -->
                </div>
                <!-- /INFORMAION ENCABEZADO -->
            </div>
            <!-- /CONTENEDOR -->
        </header>
        <!-- MENU PRINCIPAL-->
        <div class="menu-principal">
            <div class="mobile-menu">
                <a href="#" class="mobile"><i class="fa fa-bars" aria-hidden="true"></i>Menu</a>
            </div>
            <div class="contenedor navegacion">
                <?php
                    // argumentos para desplegar el menu
                    $args= array(
                        "theme_location"=> "header-menu",
                        "container"=> "nav",
                        "container_class"=>"menu-sitio"
                    );

                    // imprime el menu
                    wp_nav_menu($args);
                ?>
            </div>
        </div>
        <!-- /MENU PRINCIPAL-->