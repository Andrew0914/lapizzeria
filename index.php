<?php get_header(); ?>

    <?php
        // obtiene la pagina para entradas
        $pagina_blog = get_option('page_for_posts');
        // obtiene el id de la imagen destacada
        $image_id = get_post_thumbnail_id($pagina_blog);
        // obtiene un arreglo de la imagen del id, el index 0 es el url
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
        <div class="contenedor-grid">
            <main class="contenido-paginas columnas2-3">
                <!-- LOOP DE WORDPRESS BLOG -->
                <?php
                    while(have_posts()){ the_post();
                ?>     
                <article class="entrada-blog">
                <!-- IMAGEN DESTACADA -->
                <?php
                    the_post_thumbnail("especialidades");
                ?>
                    <header class="informacion-entrada clear">
                        <!-- FECHA DEL POST-->
                        <div class="fecha">
                            <time>
                                <?php the_time('d'); ?>
                                <span><?php the_time('M'); ?></span>
                            </time>
                        </div>
                        <!--TITULO Y AUTOR DEL POST-->
                        <div class="titulo-entrada">
                            <h2> <?php the_title(); ?> </h2>
                            <p class="autor">
                                <i class="fa fa-user" arias-hidden="true"></i>
                                <?php the_author(); ?>
                            </p>
                        </div>
                    </header>
                    <!-- CONTENIDO DE LA ENTRADA -->
                    <div class="contenido-entrada">
                        <!-- PREVIEW DEL CONTENIDO-->
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="boton rojo"">Leer más</a>
                    </div>
                </article>
                <?php } ?>
                <!-- /LOOP WORDPRESS BLOG -->
            </main>
        </div>
    </div>
<?php get_footer(); ?>