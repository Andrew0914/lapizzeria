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

        <div class="principal contenedor">
            <main class="texto-centrado contenido-paginas">
                <?php the_content(); ?>
            </main>
        </div>

    <?php } ?>
    <!-- /LOOP WORDPRESS -->
    <!-- CAJAS DE INFORMACION-->
    <div class="informacion-cajas contenedor">
        <div class="caja">
            <img src="<?php the_field('imagen_1')?>">
            <div class="contenido-caja">
                <?php the_field('descripcion_1');?>
            </div>
        </div>
    </div>
    <!-- /CAJAS DE INFORMACION-->
<?php get_footer(); ?>