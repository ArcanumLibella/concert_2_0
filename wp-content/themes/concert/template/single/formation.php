<?php get_header(); ?>
<?php
    $formation_content          = get_field('presentation_formation_1');
    $temoignages                = $formation_content['temoignages_formation'];
    $debouches                  = get_field('liste_des_metiers_formation', false, false);
    $soustitre                  = $formation_content['sous-titre_formation'];
    $id_formation_current       = get_the_ID();
    if(get_field('axe_illustration_principale', $page_1)){
        $illu       = wp_get_attachment_image_src(get_field('axe_illustration_principale', $page_1), 'full');
        $illu_url   = $illu[0];
    }
?>
<main class="content main">
    <section class="section section--hero-disp"
        style="background: url(<?php echo $illu_url; ?>) no-repeat center center">
        <div class="container">
            <div class="row">
                <div class="col section__wrapper">
                    <!-- 
                    <nav class="section__nav" aria-label="breadcrumb">
                        <ol class="section__links breadcrumb">
                            <li class="section__link breadcrumb-item">
                                <a href="<?php bloginfo('url'); ?>/">Accueil</a>
                            </li>
                            <li class="section__link breadcrumb-item">
                                <a href="<?php the_permalink($page_2); ?>">Formations</a>
                            </li>
                        </ol>
                    </nav>
                    -->
                    <?php if(get_field('dispositif_formation')): ?>
                    <span class="section__tag">
                        <?php the_field('dispositif_formation'); ?>
                    </span>
                    <?php endif; ?>
                    <h2 class="section__title">
                        <?php the_title(); ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--job">
        <div class="container">
            <div class="row">
                <aside class="sidebar col-12 col-lg-4 order-1 order-lg-0">
                    <?php $same_diplome = new WP_Query(array('post_type' => 'formation', 'post__not_in' => array($id_formation_current), 'orderby' => 'date', 'posts_per_page' => '-1', 'meta_query' => array(
                            array(
                                'key' => 'titre_commun',
                                'value' => get_the_title(),
                                'compare' => '=',
                            ),
                        ))); ?>
                    <?php if($same_diplome->have_posts()): ?>
                    <div class="card-others-disp">
                        <h3>
                            Cette formation existe aussi en...
                        </h3>
                        <?php while ($same_diplome->have_posts()) : $same_diplome->the_post(); ?>
                        <p>
                            <a href="<?php the_permalink(); ?>">
                                <i class="fas fa-arrow-right"></i> <?php the_field('dispositif_formation'); ?>
                            </a>
                        </p>
                        <?php endwhile; $same_diplome->reset_postdata(); wp_reset_query(); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card-inscription">
                        <div class="card-inscription__icon">
                            <svg class="icon icon-files">
                                <use xlink:href="#icon-files"></use>
                            </svg>
                        </div>
                        <h3 class="card-inscription__title">
                            Vous souhaitez vous inscrire à cette formation ?
                        </h3>
                        <a href="<?php the_permalink(12470)?>?axe=<?php echo $axe_name; ?>&id_formation=<?php echo $id_formation_current; ?>"
                            class="btn btn--primary">
                            Demandez le dossier de candidature
                        </a>
                    </div>

                    <?php if(get_field('contact_formation')): ?>
                    <div class="card-contact">
                        <h3 class="card-contact__title">
                            Contact
                        </h3>
                        <?php
                                $posts = get_field('contact_formation');
                                if( $posts ): ?>
                        <?php foreach( $posts as $post): ?>
                        <?php setup_postdata($post); ?>
                        <h4><?php the_title(); ?></h4>
                        <a href="" class="btn btn--primary">
                            Voir les coordonnées
                        </a>
                        <div class="card-contact__wrapper none-contact">
                            <a href="mailto:<?php the_field('mail_contact_perso'); ?>">
                                <i class="fal fa-envelope"></i>
                                <?php the_field('mail_contact_perso'); ?>
                            </a>
                            <a href="tel:<?php the_field('telephone_contact_perso'); ?>">
                                <i class="fal fa-phone"></i>
                                <?php the_field('telephone_contact_perso'); ?>
                            </a>
                        </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if($formation_content['taux_de_reussite_chiffre_formation'] != "-" && $formation_content['taux_de_reussite_chiffre_formation']): ?>
                    <div class="card-rate">
                        <h3>Taux de réussite</h3>
                        <span><?php echo $formation_content['taux_de_reussite_chiffre_formation']; ?></span>
                        <p><?php echo $formation_content['taux_de_reussite_legende_formation']; ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if($formation_content['taux_dembauche_chiffre_formation'] != "-" && $formation_content['taux_dembauche_chiffre_formation']): ?>
                    <div class="card-rate">
                        <h3>Taux d'embauche</h3>
                        <span><?php echo $formation_content['taux_dembauche_chiffre_formation']; ?></span>
                        <p><?php echo $formation_content['taux_dembauche_legende_formation']; ?></p>
                    </div>
                    <?php endif; ?>

                    <?php
                        $posts = $formation_content['ambassadeurs_formation'];
                        if( $posts ): ?>
                    <div class="card-ambassador">
                        <h3>Ambassadeur</h3>
                        <?php foreach( $posts as $post): ?>
                        <?php setup_postdata($post); ?>
                        <?php the_field('video_ambassadeur'); ?>
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_field('presentation_ambassadeur'); ?></p>
                        <a href="mailto:<?php the_field('mail_ambassadeur'); ?>" class="btn btn--primary">
                            Contacter
                        </a>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                    <?php endif; ?>

                    <div class="card-share">
                        <h3>Partager</h3>
                        <?php
                            $id_post        = get_the_ID();
                            $url_post       = get_the_permalink();
                            $title_post     = get_the_title();
                            $ext_post       = get_the_excerpt();
                        ?>
                        <a 
                            data-social="facebook"
                            href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url_post; ?>&quote=<?php echo $title_post; ?>"
                            title="Share on Facebook" 
                            target="_blank">
                                <i class="fab fa-facebook-f"></i>
                        </a>
                        <a 
                            data-social="twitter"
                            href="https://twitter.com/intent/tweet?source=<?php echo $url_post; ?>&text=<?php echo $title_post; ?>:%20<?php echo $url_post; ?>"
                            target="_blank" 
                            title="Tweet">
                                <i class="fab fa-twitter"></i>
                        </a>
                        <a 
                            data-social="linkedin"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url_post; ?>&title=<?php echo $title_post; ?>"
                            target="_blank">
                                <i class="fab fa-linkedin"></i>
                        </a>
                        <a 
                            data-social="mail"
                            href="mailto:?subject=<?php echo $title_post; ?>&body=<?php echo $ext_post; ?>:<?php echo $url_post; ?>"
                            target="_blank">
                                <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </aside>

                <div class="col-12 col-lg-8 order-0 order-lg-1">
                    <div class="card-formation">
                        <div class="card-formation__header">
                            <p class="card-formation__surtitle">
                                <?php echo $soustitre; ?>
                            </p>
                            <h2>Présentation</h2>
                        </div>
                        <section class="card-formation__section" id="presentation">
                            <div class="card-formation__wrapper">
                                <div class="card-formation__paragraph">
                                    <?php if($formation_content['informations_formation']): ?>
                                    <p><?php echo $formation_content['informations_formation']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-formation__icons">
                                    <?php if( have_rows('presentation_formation_1') ):
                                            while( have_rows('presentation_formation_1') ): the_row(); ?>
                                    <?php if( have_rows('pictogrammes_formation') ):
                                                    $j=1; while ( have_rows('pictogrammes_formation') ) : the_row(); ?>
                                    <?php get_template_part('/partials/block-icon'); ?>
                                    <?php $j++; endwhile; ?>
                                    <?php endif; ?>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>

                        <?php if($formation_content['objectifs_formation']): ?>
                        <section class="card-formation__section" id="objectives">
                            <div class="card-formation__wrapper">
                                <h3>Objectifs</h3>
                                <div class="card-formation__content">
                                    <?php echo $formation_content['objectifs_formation']; ?>
                                </div>
                            </div>
                        </section>
                        <?php endif; ?>

                        <?php if($formation_content): ?>
                        <section class="card-formation__section" id="faq">
                            <div class="card-formation__wrapper faq-wrapper">
                                <h3>Détails de la formation</h3>

                                <div class="accordion" id="accordionExample">

                                    <?php while( have_rows('presentation_formation_1') ): the_row(); ?>

                                    <?php if( have_rows('details_de_la_formation_formation') ):
                                                    $j=1; while ( have_rows('details_de_la_formation_formation') ) : the_row(); ?>

                                    <div class="card">
                                        <div class="card-header" id="card_<?php echo $j; ?>">
                                            <h5 class="mb-0">
                                                <a href="#" class="btn-link collapsed" data-toggle="collapse"
                                                    data-target="#accor_<?php echo $j; ?>" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                    <?php the_sub_field('titre_de_longlet_formation'); ?>
                                                </a>
                                            </h5>
                                        </div>

                                        <div id="accor_<?php echo $j; ?>" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php the_sub_field('contenu_de_longlet_formation'); ?>
                                                <?php if( have_rows('bloc_de_competence') ):
                                                                  $j=1; while ( have_rows('bloc_de_competence') ) : the_row(); ?>
                                                <!-- BLOCS DE COMPETENCE FACULTATIFS-->
                                                <ul class="card-certificates">
                                                    <li class="card-certificate">
                                                        <a href="<?php the_sub_field('lien_du_bloc_de_competence'); ?>"
                                                            target="_blank">
                                                            <div class="card-certificate__icon">
                                                                <svg class="icon icon-bloc">
                                                                    <use xlink:href="#icon-bloc"></use>
                                                                </svg>
                                                            </div>
                                                            <h5>Bloc de compétence
                                                                <?php the_sub_field('numero_du_bloc_de_competence'); ?>
                                                            </h5>

                                                            <h6>
                                                                <?php the_sub_field('titre_du_bloc_de_competence'); ?>
                                                            </h6>
                                                            <?php the_sub_field('contenu_du_bloc_de_competence'); ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <?php $j++; endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $j++; endwhile; ?>
                                    <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </section>
                        <?php endif; ?>

                        <?php if($temoignages): ?>
                        <section class="card-formation__section" id="testimonies">
                            <div class="card-formation__wrapper">
                                <h3>Témoignages</h3>
                                <div class="temoignages-wrapper row">
                                    <?php $temoignages_list = new WP_Query(array('post__in' => $temoignages, 'post_type' => 'temoignage', 'posts_per_page' => -1)); ?>
                                    <?php while ($temoignages_list->have_posts()) : $temoignages_list->the_post(); ?>
                                    <div class="col-12">
                                        <div class="temoignage">
                                            <div class="circle">
                                                <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive')); ?>
                                                <?php endif; ?>
                                            </div>
                                            <h4><?php the_title(); ?></h4>
                                            <p class="studies"><?php the_field('promotion_temoignage'); ?></p>
                                            <p class="intro-temoignage"><?php the_field('introduction_temoignage'); ?>
                                            </p>
                                            <?php the_field('temoignage_temoignage'); ?>
                                        </div>
                                    </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                        </section>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>