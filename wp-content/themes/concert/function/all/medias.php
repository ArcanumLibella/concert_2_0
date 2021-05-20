<?php
function be_attachment_field_url( $form_fields, $post ) {
    $form_fields['lien-vers'] = array(
        'label' => 'Lien vers',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'lien_vers_media_img', true ),
        'helps' => 'Ajouter un lien',
    );

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_url', 10, 2 );

function be_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['lien-vers'] ) )
        update_post_meta( $post['ID'], 'lien_vers_media_img', $attachment['lien-vers'] );
    return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );