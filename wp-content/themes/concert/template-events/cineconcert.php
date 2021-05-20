<?php
/*
    Template Name: Ciné-concert
    Template Post Type: Event
*/
?>
<?php get_header(); ?>

<main class="main event">
    
    <div class="event__content content-wrapper">
        
        <h1><?php the_title() ?></h1>

        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>

    </div>

</main>

<?php get_footer(); ?>