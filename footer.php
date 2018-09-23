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
            <p><?php echo esc_html(get_option("lapizzeria_direccion")); ?></p>
            <p><?php echo "Tel. " . esc_html(get_option("lapizzeria_telefono")); ?></p>
        </div>
        <div class="copyright">
            <p>Todos los derechos reservados <?php echo date('Y'); ?></p>   
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>