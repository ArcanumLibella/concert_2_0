<?php

add_action('acf/init', 'my_acf_init');

function my_acf_init() {

    if( function_exists('acf_register_block') ) {

        acf_register_block(array(
            'name'				=> 'listing',
            'title'				=> 'Listing',
            'description'		=> 'Création d\'un bloc liste',
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('listing'),
        ));

        acf_register_block(array(
            'name'				=> 'carte',
            'title'				=> 'Carte',
            'description'		=> 'Création d\'un bloc ombré et centré avec images et texte',
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('carte'),
        ));

        acf_register_block(array(
            'name'				=> 'Ancres',
            'title'				=> 'Ancres',
            'description'		=> 'Création d\'un bloc pour liste d\'ancres',
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array('ancres'),
        ));

        // Texte plus image (option : lien vers contact)
        acf_register_block(array(
            'name'				=> 'texte_image',
            'title'				=> 'Texte & image',
            'description'		=> 'Création d\'un bloc avec images et texte + Lien contact en option',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'image', 'Texte & image'),
            'render_template'   => 'blocks/texte_image.php',
        ));

        // Repeater d'icône
        acf_register_block(array(
            'name'				=> 'repeater_icons',
            'title'				=> 'Blocs icônes',
            'description'		=> 'Création d\'un bloc avec plusieurs icône + titre + paragraphe',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'icône', 'icone', 'Blocs icônes', 'paragraphe'),
            'render_template'   => 'blocks/repeater_icons.php',
        ));

        // Bandeau titre + paragraphe avec image de fond
        acf_register_block(array(
            'name'				=> 'bandeau_imageTexte',
            'title'				=> 'Bandeau texte + image de fond',
            'description'		=> 'Création d\'un bloc avec un titre, du texte et une image de fond',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'image', 'bandeau', 'paragraphe', 'Bandeau texte + image de fond'),
            'render_template'   => 'blocks/bandeau_imageTexte.php',
        ));

        // Galerie photo
        acf_register_block(array(
            'name'				=> 'galerie_photo',
            'title'				=> 'Galerie photo',
            'description'		=> 'Création d\'un bloc avec une galerie photo',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'image', 'bandeau', 'paragraphe', 'Bandeau texte + image de fond'),
            'render_template'   => 'blocks/galerie_photo.php',
        ));

        // Mur de logos
        acf_register_block(array(
            'name'				=> 'mur_logo',
            'title'				=> 'Mur de logos',
            'description'		=> 'Création d\'un mur de logos',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('mur', 'logo'),
            'render_template'   => 'blocks/mur_logos.php',
        ));

        // Texte + Image ronde
        acf_register_block(array(
            'name'				=> 'texte_imageRonde',
            'title'				=> 'Texte + Image Ronde',
            'description'		=> 'Création d\'un bloc avec du texte et une image ronde',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'image', 'bandeau', 'ronde', 'Texte + Image Ronde'),
            'render_template'   => 'blocks/texte_imageRonde.php',
        ));

        // Chaîne icône avec texte
        acf_register_block(array(
            'name'				=> 'chaine_iconTexte',
            'title'				=> 'Chaîne icône & Texte',
            'description'		=> 'Création d\'un bloc avec une chaîne d\'icône et du texte en dessous',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'icône', 'icone' ,  'Chaîne icône & Texte'),
            'render_template'   => 'blocks/chaine_iconTexte.php',
        ));

        // Accordion
        acf_register_block(array(
            'name'				=> 'accordion_block',
            'title'				=> 'Bloc accordion',
            'description'		=> 'Création d\'un bloc avec un titre et un texte en dessous',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('texte', 'titre', 'accordion' ,  'Bloc accordion'),
            'render_template'   => 'blocks/accordion.php',
        ));

        // Line title
        acf_register_block(array(
            'name'				=> 'line_title',
            'title'				=> 'Tiret',
            'description'		=> 'Création d\'un bloc avec un tiret',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('tiret', 'ligne', 'separateur'),
            'render_template'   => 'blocks/lineTitle.php',
        ));

        // Bloc redirection
        acf_register_block(array(
            'name'				=> 'redirection_block',
            'title'				=> 'Bloc redirection',
            'description'		=> 'Création d\'un bloc avec une redirection',
            'category'			=> 'formatting',
            'icon'				=> 'format-aside',
            'keywords'			=> array('redirection', 'lien', 'bloc redirection'),
            'render_template'   => 'blocks/redirection.php',
        ));
    }
}

function my_acf_block_render_callback( $block ) {
    $slug = str_replace('acf/', '', $block['name']);
    if( file_exists( get_theme_file_path("/blocks/{$slug}.php") ) ) {
        include( get_theme_file_path("/blocks/{$slug}.php") );
    }
}




