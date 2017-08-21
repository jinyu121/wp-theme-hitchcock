<?php
// Register and enqueue Javascript files
function hitchcock_load_javascript_files() {

	if ( !is_admin() ) {
		wp_enqueue_script( 'hitchcock_flexslider', get_template_directory_uri().'/js/flexslider.js', array('jquery'), '', true );
		wp_enqueue_script( 'hitchcock_doubletaptogo', get_template_directory_uri().'/js/doubletaptogo.js', array('jquery'), '', true );
		wp_enqueue_script( 'hitchcock_global', get_template_directory_uri().'/js/global.js', array('jquery'), '', true );

		if ( is_singular() ) {
			wp_enqueue_script( "comment-reply" );
		}

	}
}

add_action( 'wp_enqueue_scripts', 'hitchcock_load_javascript_files' );
