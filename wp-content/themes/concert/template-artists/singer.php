<?php
/*
    Template Name: Chanteur/Chanteuse
    Template Post Type: Artist
*/
?>
<?php get_header(); ?>

<main class="main artist">

    <div class="artist__content content-wrapper">
        
        <h1><?php the_title() ?></h1>

        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>

    </div>

</main>

<?php get_footer(); ?>