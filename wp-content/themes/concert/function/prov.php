<?php
/*
    Template Name: Set titre
*/
?>
<?php $formation = new WP_Query(array('post_type' => 'event', 'orderby' => 'date', 'posts_per_page' => '-1')); ?>
<?php while ($formation->have_posts()) : $formation->the_post(); ?>
    <?php
        $titre = get_the_title();
        update_field('titre_commun', $titre);
    ?>
<?php endwhile; ?>
