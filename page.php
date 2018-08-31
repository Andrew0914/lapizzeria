<?php get_header(); ?>
    <!-- LOOP DE WORDPRESS -->
    <?php
        while(have_posts()){
    ?>  
        <?php the_post(); ?>
        <div class="hero">
            <div class="contenido-hero">
                <div class="texto-hero">
                    <?php the_title("<h1>" , "</h1>"); ?>
                </div>
            </div>
        </div>

        <div class="principal contenedor">
            <main class="texto-centrado contenido-paginas">
                <?php the_content(); ?>
            </main>
        </div>
    <?php } ?>
    <!-- /LOOP WORDPRESS
<?php get_footer(); ?>