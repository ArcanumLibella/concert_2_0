<?php
function tax_init() {

    #Catégorie d'agenda
     register_taxonomy(
        'cat-agenda',
        'date',
        array(
            'label' => 'Catégorie',
            'rewrite' => array('slug' => 'cat-agenda'),
            'hierarchical' => true
        )
    );

    #Axe formation
    register_taxonomy(
        'axe-formation',
        'formation',
        array(
            'label' => 'Axes',
            'rewrite' => array('slug' => 'axe-formation'),
            'hierarchical' => true
        )
    );

}
add_action('init', 'tax_init');