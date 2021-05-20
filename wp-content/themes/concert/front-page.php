<?php get_header(); ?>

    <main class="main">
        <div class="content-wrapper">
            <h1 class=""><?php the_title()?></h1>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </main>

<?php get_footer(); ?>