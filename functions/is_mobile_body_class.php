<?php
// Add body class if is mobile
add_filter('body_class','hitchcock_is_mobile_body_class');

function hitchcock_is_mobile_body_class( $classes ){

    if ( wp_is_mobile() ) {
        $classes[] = 'wp-is-mobile';
    }

    return $classes;
}
