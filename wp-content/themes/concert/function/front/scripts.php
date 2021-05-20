<?php 
function wpdocs_esa_scripts() {

    if(get_post_type() != "landing"){
        wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '1.0.0');
        wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.6.3/css/all.css', array(), '1.0.0');
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0.0');
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0');
        wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), '1.0.0');
        wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), '1.0.0');
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.0');
        wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css', array(), '1.0.0');
        wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
        wp_enqueue_style( 'styles', get_template_directory_uri() . '/dist/css/styles.css', array(), '1.0.0');
    }

}
add_action( 'wp_enqueue_scripts', 'wpdocs_esa_scripts' );