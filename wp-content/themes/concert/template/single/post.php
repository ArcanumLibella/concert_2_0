<?php get_header(); ?>
<?php
    $current_post_ID = get_the_ID();
?>
<main class="content main">
    <?php
        if (has_post_thumbnail()){
            $illu = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
    ?>
    <section class="section section--hero-disp cover" style="background: url(<?php echo $illu; ?>) no-repeat center center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <article class="section section--single">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="section__content">
                            <?php the_content(); ?>

                            <div class="section__footer">
                                <p class="section__infos">
                                    Publié le <span class="section__author"><?php the_time('d F Y'); ?></span>
                                </p>
                                <div class="section__share">
                                    <span>PARTAGER L'ARTICLE :</span>
                                    <div class="section__socials">
                                        <?php get_template_part('partials/share'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </article>

    <section class="section section--others">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section__surtitle">
                        <p datetime="<?php the_time('Y-m-d'); ?>">
                            Articles récents
                        </p>
                    </div>
                    <h3>D'autres articles susceptibles de vous intéresser</h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row section__articles">
                <?php $actus = new WP_Query(array('post_type' => 'POST', 'orderby' => 'date', 'post__not_in' => array($current_post_ID) ,'posts_per_page' => '4')); ?>
                <?php $i = 1;
                while ($actus->have_posts()) : $actus->the_post(); ?>
                    
                    <div class="col-lg-6">
                        <?php get_template_part('/partials/card-blog'); ?>
                    </div>

                <?php $i++; endwhile; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>