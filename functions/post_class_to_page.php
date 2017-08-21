<?php
// Add body classes to single pages
add_filter('body_class','hitchcock_post_class_to_page');

function hitchcock_post_class_to_page( $classes ){

    if ( is_page() || is_404() || ( is_search() && !have_posts() ) ) {
        $classes[] = 'post single';
    }

    return $classes;
}
