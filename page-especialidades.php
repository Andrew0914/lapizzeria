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
    <!--LOOP PARA LA SECCION DE ESPECIALIDADES -->
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
        <ul>
            <li>
                <?php the_title();?>
            </li>
        </ul>
    <?php } wp_reset_postdata(); ?>
    <!--/LOOP PARA LA SECCION DE ESPECIALIDADES -->
<?php get_footer(); ?>