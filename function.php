<?php
add_filter( 'wp_kses_allowed_html', 'allow_custom_tag', 10, 2 );
function allow_custom_tag( $allowed_tags, $context ) {
    if ( $context === 'post' ) {
        $allowed_tags['new-tag'] = array();
    }
    return $allowed_tags;
}

function enable_custom_tags_in_editor( $init_array ) {
    $init_array['extended_valid_elements'] = 'new-tag[*]'; // Replace 'new-page' with your custom tag name

    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'enable_custom_tags_in_editor' );
