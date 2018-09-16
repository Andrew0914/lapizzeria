<?php get_header(); ?>

    <?php
        $pagina_blog = get_option('page_for_posts');
        $image_id = get_post_thumbnail_id($pagina_blog);
        $image = wp_get_attachment_image_src($image_id,'full');
    ?>
    <div class="hero" style="background-image: url(<?php echo $image[0]; ?>);">
        <div class="contenido-hero">
            <div class="texto-hero">
                <h1><?php echo get_the_title($pagina_blog); ?></h1>
            </div>
        </div>
    </div>

    <div class="principal contenedor">
        <main class="texto-centrado contenido-paginas">
            <!-- LOOP DE WORDPRESS BLOG -->
            <?php
                while(have_posts()){
                    the_post();
                    the_title();
            ?>     

            <?php } ?>
            <!-- /LOOP WORDPRESS BLOG -->
        </main>
    </div>

    
<?php get_footer(); ?>