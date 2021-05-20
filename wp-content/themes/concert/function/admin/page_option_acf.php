<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
    register_options_page('Global');
    register_options_page('Partenaires');
    register_options_page('Chiffres clés');
    register_options_page('Contact');
    register_options_page('Pied de page');
    register_options_page('Modal');
    register_options_page('Footer Landing');
}