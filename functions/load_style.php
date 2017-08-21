<?php
// Register and enqueue styles
function hitchcock_load_style() {
	if ( !is_admin() ) {
	    wp_enqueue_style( 'hitchcock_googleFonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Droid+Serif:400,400italic,700,700italic' );
	    wp_enqueue_style( 'hitchcock_fontawesome', get_stylesheet_directory_uri() . '/fa/css/font-awesome.css' );
	    wp_enqueue_style( 'hitchcock_style', get_stylesheet_uri() );
	}
}

add_action('wp_print_styles', 'hitchcock_load_style');
