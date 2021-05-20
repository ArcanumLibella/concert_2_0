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
                            <?php if(get_field('inscription_agenda')): ?>
                                <?php echo do_shortcode('[gravityform field_values="title_form='.get_field('titre_du_formulaire_agenda').'" id="26" title="false" description="false" ajax="true"]'); ?>
                            <?php endif; ?>
                            <div class="section__footer">
                                <p class="section__infos">
                                    Publié le <span class="section__author"><?php the_time('d F Y'); ?></span>
                                </p>
                                <div class="section__share">
                                    <span>PARTAGER :</span>
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
    <?php $actus = new WP_Query(array('post_type' => 'DATE', 'orderby' => 'date', 'post__not_in' => array($current_post_ID) ,'posts_per_page' => '3')); ?>
    <?php if($actus->have_posts()): ?>
        <section class="section section--others">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section__surtitle">
                            <p>
                                Agenda
                            </p>
                        </div>
                        <h3>D'autres dates susceptibles de vous intéresser</h3>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row section__articles">
                    <?php while ($actus->have_posts()) : $actus->the_post(); ?>
                        <div class="col-lg-4">
                            <?php get_template_part('/partials/card-agenda'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>