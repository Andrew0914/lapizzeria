<?php get_header(); ?>
    <!-- LOOP DE WORDPRESS -->
    <?php
        while(have_posts()){
    ?>  
        <?php the_post(); ?>
        <div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
            <div class="contenido-hero">
                <div class="texto-hero">
                    <h1><?php echo get_option('blogdescription'); ?></h1>
                    <?php the_content(); ?>
                    <?php $page = get_page_by_title("Sobre Nosotros");?>
                    <a href="<?php echo get_permalink($page->ID); ?>" class="boton naranja">Saber más</a>
                </div>
            </div>
        </div>

        <div class="principal contenedor">
            <main class="texto-centrado contenido-paginas">
                
            </main>
        </div>

    <?php } ?>
    <!-- /LOOP WORDPRESS -->
<?php get_footer(); ?>