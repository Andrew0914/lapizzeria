<?php get_header(); ?>
    <!-- LOOP DE WORDPRESS -->
    <?php
        while(have_posts()){
    ?>  
        <?php the_post(); ?>
        <div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
            <div class="contenido-hero">
                <div class="texto-hero">
                    <?php the_title("<h1>" , "</h1>"); ?>
                </div>
            </div>
        </div>

        <div class="principal contenedor contacto">
            <main class="contenido-paginas">
                <form class="reserva-contacto" method="post">
                    <h2>Realiza una reservacion</h2>
                    <div class="campo">
                        <input type="text" required name="nombre" placeholder="Nombre">
                    </div>
                    <div class="campo">
                        <input type="date" required name="fecha" placeholder="Fecha">
                    </div>
                    <div class="campo">
                        <input type="email" required name="email" placeholder="Email">
                    </div>
                    <div class="campo">
                        <input type="tel" required name="telefono" placeholder="Telefono">
                    </div>
                    <div class="campo">
                        <textarea name="mensaje" placeholder="Mensaje"></textarea>
                    </div>
                    <input type="submit" class="boton" name="enviar"/>
                    <input type="hidden" name="oculto" value="1"/>
                </form>
            </main>
        </div>

    <?php } ?>
    <!-- /LOOP WORDPRESS -->
<?php get_footer(); ?>