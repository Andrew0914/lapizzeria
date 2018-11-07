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
                <!-- forma de llamar por el template part con un guion -->
                <?php get_template_part("templates/formulario", "contacto"); ?>
            </main>
        </div>

    <?php } ?>
    <!-- /LOOP WORDPRESS -->
<?php get_footer(); ?>