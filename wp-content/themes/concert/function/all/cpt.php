<?php
function codex_custom_init() {

    // Event
    $labels = array(
        'name'                  => 'Event',
        'singular_name'         => 'Event',
        'add_new'               => 'Ajouter un event',
        'add_new_item'          => 'Ajouter un nouvel event',
        'edit_item'             => 'Editer un event',
        'new_item'              => 'Nouvel event',
        'all_items'             => 'Tous les events',
        'view_item'             => 'Voir event',
        'search_items'          => 'Chercher event',
        'not_found'             => 'Aucun event trouvé',
        'not_found_in_trash'    => 'Aucun event trouvé dans la corbeille',
        'parent_item_colon'     => '',
        'menu_name'             => 'Events',
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'event'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-video-alt3',
        'supports'              => array( 'title', 'author', 'revisions', 'thumbnail')
    );
    register_post_type( 'Event', $args );
}
add_action('init', 'codex_custom_init');
?>