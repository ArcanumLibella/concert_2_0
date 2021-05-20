<?php
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Add a menu
register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );

// Add a excerpt function
function excerpt_c($limit) {
  $excerpt = get_the_excerpt();
  if($excerpt != ""){
      $excerpt = preg_replace(" ([.*?])",'',$excerpt);
      $excerpt = strip_shortcodes($excerpt);
      $excerpt = strip_tags($excerpt);
      $excerpt = substr($excerpt, 0, $limit);
      $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
      $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
      $excerpt = $excerpt.'...';
      return $excerpt;
  }
}
function excerpt_cc($excerpt, $limit) {
  if($excerpt != ""){
      $excerpt = preg_replace(" ([.*?])",'',$excerpt);
      $excerpt = strip_shortcodes($excerpt);
      $excerpt = strip_tags($excerpt);
      $excerpt = substr($excerpt, 0, $limit);
      $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
      $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
      $excerpt = $excerpt.'...';
      return $excerpt;
  }
}

// Déclarer un CPT
function frx_register_post_types() {
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
    'menu_name'             => 'Event',
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
      'supports'              => array( 'editor', 'title', 'author', 'revisions', 'thumbnail')
  );

  register_post_type( 'Event', $args );

  // Artist
  $labels = array(
    'name'                  => 'Artist',
    'singular_name'         => 'Artist',
    'add_new'               => 'Ajouter un artiste',
    'add_new_item'          => 'Ajouter un nouvel artiste',
    'edit_item'             => 'Editer un artiste',
    'new_item'              => 'Nouvel artiste',
    'all_items'             => 'Tous les artistes',
    'view_item'             => 'Voir artiste',
    'search_items'          => 'Chercher artiste',
    'not_found'             => 'Aucun artiste trouvé',
    'not_found_in_trash'    => 'Aucun artiste trouvé dans la corbeille',
    'parent_item_colon'     => '',
    'menu_name'             => 'Artist',
  );
  $args = array(
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'query_var'             => true,
      'rewrite'               => array('slug' => 'artist'),
      'capability_type'       => 'post',
      'has_archive'           => true,
      'hierarchical'          => false,
      'menu_position'         => null,
      'show_in_rest'          => true,
      'menu_icon'             => 'dashicons-groups',
      'supports'              => array( 'editor', 'title', 'author', 'revisions', 'thumbnail')
  );

  register_post_type( 'Artist', $args );
}

add_action( 'init', 'frx_register_post_types' ); // Le hook init lance la fonction
