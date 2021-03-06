<?php
/*
* Template Name: Especialidades
*/
    get_header(); 
?>
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
    <!--GRID  ESPECIALIDADES PIZZAS-->
    <div class="nuestras-especialidades contenedor">
        <h3 class="texto-rojo">Pizzas</h3>
        <div class="contenedor-grid">
            <?php
                $args = [
                    'post_type'=> 'especialidades',
                    'post_per_page'=> -1,
                    'orderby'=> 'title',
                    'order'=> 'ASC',
                    'category_name'=>'pizzas'
                ];

                $pizzas = new WP_Query($args);
                while($pizzas->have_posts()){
                    $pizzas->the_post();
            ?>
                <div class="columnas2-4">
                    <?php the_post_thumbnail('especialidades'); ?>
                    <div class="texto-especialidad">
                        <h4> <?php the_title(); ?> <span>$ <?php the_field('precio'); ?> </span> </h4>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
    <!--/GRID ESPECIALIDADES PIZZAS-->
    <!-- GRID ESPECIALIDADES OTROS-->
    <div class="nuestras-especialidades contenedor">
        <h3 class="texto-rojo">Otros</h3>
        <div class="contenedor-grid">
            <?php
                $args = [
                    'post_type'=> 'especialidades',
                    'post_per_page'=> -1,
                    'orderby'=> 'title',
                    'order'=> 'ASC',
                    'category_name'=>'otros'
                ];

                $otros = new WP_Query($args);
                while($otros->have_posts()){
                    $otros->the_post();
            ?>
                <div class="columnas2-4">
                    <?php the_post_thumbnail('especialidades'); ?>
                    <div class="texto-especialidad">
                        <h4> <?php the_title(); ?> <span>$ <?php the_field('precio'); ?> </span> </h4>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
    <!-- /GRID ESPECIALIDADES OTROS-->
<?php get_footer(); ?>