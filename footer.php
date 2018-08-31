    <footer>
        <?php
            // argumentos para desplegar el menu en el footer
            $args= array(
                "theme_location"=> "header-menu",
                "container"=> "nav",
                "after" => "<span class='separador'> | </span>"
            );
            // imprime el menu
            wp_nav_menu($args);
        ?>
        <div class="ubicacion">
            <p>Avenida Siempre Viva 18, Colonia Azul,145000</p>
            <p>Tel: 55 664 4404</p>
        </div>
        <div class="copyright">
            <p>Todos los derechos reservados <?php echo date('Y'); ?></p>   
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>