<?php get_header(); ?>
<?php
if(get_field('page_image_en_cover')){
    $illu       = wp_get_attachment_image_src(get_field('page_image_en_cover'), 'full');
    $illu_url   = $illu[0];
}
else{
    $illu_url   = get_bloginfo('template_directory')."/assets/images/img-bg-commercial.jpeg";
}
?>
<main class="content main">
    
    <section class="section section--hero-disp cover" style="background: url(<?php echo $illu_url; ?>) no-repeat center center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section__surtitle">
                        <p>Evènements</p>
                    </div>
                    <h2><?php the_title() ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--block-image">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php if( have_rows('bloc_evenement') ):
                        $i=1; while ( have_rows('bloc_evenement') ) : the_row(); ?>
                            <div class="block-text-image-triangle <?php if(get_sub_field('alignement') == "droit"){echo 'block-text-image-triangle--even';} ?>">
                                <div class="col-lg-6">
                                    <div class="block-text-image-triangle__text">
                                        <h4>
                                            <?php the_sub_field('titre'); ?> 
                                        </h4>
                                        <?php the_sub_field('paragraphe'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <?php
                                    if (get_sub_field('image')) {
                                        $illublock       = wp_get_attachment_image_src(get_sub_field('image'), 'full');
                                        $illublock_url   = $illublock[0];
                                    }
                                ?>
                                    <div class="block-text-image-triangle__image cover" style="background-image: url(<?php echo $illublock_url; ?>)">
                                    </div>
                                </div>
                            </div>
                        <?php $i++; endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--block-date">
        <div class="container">
            <div class="row">
                <div class="col">
                <?php 
                    if( have_rows('bloc_date')): $i=1;
                    while ( have_rows('bloc_date') ) : the_row(); ?>
                        <div class="block-date">
                                <div class="block-date__header">
                                    <h4>
                                        <?php the_sub_field('bloc_date_titre'); ?>
                                    </h4>
                                </div>
                                <div class="block-date__content">
                                    <h5>
                                        <?php the_sub_field('bloc_date_date'); ?>
                                    </h5>

                                    <div class="block-date__title">
                                        <div class="block-date__icon">
                                            <svg class="icon icon-informations-pratiques">
                                                <use xlink:href="#icon-informations-pratiques"></use>
                                            </svg>
                                        </div>
                                        <p>Informations Pratiques</p>
                                    </div>

                                    <div class="block-date__cards">
                                        <div class="block-date__card">
                                            <h6>Accès</h6>
                                            <?php the_sub_field('bloc_date_card_1_texte'); ?>
                                        </div>

                                        <div class="block-date__card">
                                            <h6>Itinéraire</h6>
                                            <?php the_sub_field('bloc_date_card_2_texte'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section section--block-candidature">
        <div class="container">
            <div class="row">
                <div class="col">
                <?php 
                    if( have_rows('bloc_cta')): $i=1;
                    while ( have_rows('bloc_cta') ) : the_row(); ?>
                        <h4>
                            <?php the_sub_field('bloc_cta_titre'); ?>
                        </h4>
                        <?php the_sub_field('bloc_cta_paragraphe'); ?>
                        <div class="cards">
                            <div class="card-cta">
                                <h5 class="card-cta__title">
                                    <?php the_sub_field('bloc_cta_card_1_texte'); ?>
                                </h5>
                                <div class="card-cta__wrapper">
                                    <a href="<?php the_sub_field('bloc_cta_card_1_lien'); ?>" class="card-cta__btn btn btn--primary">
                                        <?php the_sub_field('bloc_cta_card_1_bouton'); ?> 
                                    </a>
                                </div>
                            </div>

                            <div class="card-cta">
                                <h5 class="card-cta__title">
                                    <?php the_sub_field('bloc_cta_card_2_texte'); ?>
                                </h5>
                                <div class="card-cta__wrapper">
                                    <a href="<?php the_sub_field('bloc_cta_card_2_lien'); ?>" class="card-cta__btn btn btn--primary">
                                        <?php the_sub_field('bloc_cta_card_2_bouton'); ?> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>