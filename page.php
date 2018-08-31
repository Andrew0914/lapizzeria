<?php get_header(); ?>
    <!-- LOOP DE WORDPRESS -->
    <?php
        while(have_posts()){
    ?>  
        <?php the_post(); ?>
        <?php the_post_thumbnail("medium"); ?>
        <?php the_title("<h1>" , "</h1>"); ?>
        <div class="principal contenedor">
            <main>
                <?php the_content(); ?>
            </main>
        </div>
    <?php } ?>
    <!-- /LOOP WORDPRESS
<?php get_footer(); ?>