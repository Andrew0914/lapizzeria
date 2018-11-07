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
    <?php } ?>
    <!-- /LOOP WORDPRESS -->
    <div class="principal contenedor">
        <main class="contenedor-grid">
            <h2 class="rojo texto-centrado">Nuestas Especialidades</h2>
            <!-- PREVIEW especialidades-->
            <?php 
                $args = [
                    'posts_per_page'=>3,
                    'orderby'=>'rand',
                    'post_type'=>'especialidades',
                    'category_name'=>'pizzas'
                ];
                $especialidades = new  WP_Query($args);
                while($especialidades->have_posts()){
                    $especialidades->the_post();
            ?>
                    <div class="especialidad columnas1-3">
                        <div class="contenido-especialidad">
                            <?php the_post_thumbnail("especialidades-portrait");?>
                            <div class="informacion-platillo">
                                <?php the_title("<h3>","</h3>"); ?>
                                <p> <?php the_content(); ?></p> 
                                <p class="precio">$<?php the_field('precio'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="boton">Leer más</a>
                            </div>
                        </div>
                    </div>  
            <?php } wp_reset_postdata(); ?>
        </main>
    </div>
    <!-- SECCION CON CUSTOM FIELDS-->
    <section class="ingredientes">
        <div class="contenedor">
            <div class="contenedor-grid">
            <?php
                while(have_posts()){
                    the_post();
            ?>  
                <div class="columnas2-4">
                    <?php the_field('contenido'); ?>
                    <?php $url = get_page_by_title('Sobre Nosotros'); ?>
                    <a href="<?php echo get_permalink($url->ID); ?>" class="boton naranja">Saber más</a>
                </div>
                <div class="columnas2-4 imagen">
                    <img src="<?php the_field('imagen')?>" />
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <!-- SECCION PARA LA GALERIA -->
    <section class="contenedor">
        <h1 class="texto-rojo texto-centrado">
            Galería de Imágenes
        </h1>
        <?php 
            $galeriaPage = get_page_by_title('Galeria'); 
            echo get_post_gallery($galeriaPage->ID);
        ?>
    </section>
    <!-- SECCION DE UBICACION Y CONTACTO -->
    <section class="ubicacion-reservacion">
        <div class="contenedor">
            <div class="contenedor-grid">
                <div class="columnas2-4">
                    <div id="map"></div>
                </div>
                <div class="columnas2-4">
                    <!-- forma de llamar por el template part con un guion -->
                    <?php get_template_part("templates/formulario", "contacto"); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>