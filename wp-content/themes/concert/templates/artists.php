<?php
/*
    Template Name: Artists
*/
?>
<?php get_header(); ?>

  <main class="main"> 
      <div class="content-wrapper">
          <h1 class=""><?php the_title() ?></h1>

          <div class="cards">
            <?php $artists = new WP_Query(array('post_type' => 'artist', 'orderby' => 'date', 'posts_per_page' => '-1', 'ignore_sticky_posts' => true)); ?>
            <?php while ($artists->have_posts()) : $artists->the_post(); ?>
              <?php get_template_part('/components/card-artist'); ?>
            <?php endwhile; ?>
          </div>

      </div>
  </main>