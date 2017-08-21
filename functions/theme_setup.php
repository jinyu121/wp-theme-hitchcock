<?php
// Theme setup
add_action( 'after_setup_theme', 'hitchcock_setup' );

function hitchcock_setup() {

	// Automatic feed
	add_theme_support( 'automatic-feed-links' );

	// Set content-width
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 600;

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-image', 1240, 9999 );
	add_image_size( 'post-thumb', 508, 9999 );

	// Title tag
	add_theme_support( 'title-tag' );

	// Custom header
	$args = array(
		'width'         => 1440,
		'height'        => 900,
		'default-image' => get_template_directory_uri() . '/images/bg.jpg',
		'uploads'       => true,
		'header-text'  	=> false

	);
	add_theme_support( 'custom-header', $args );

	// Post formats
	add_theme_support( 'post-formats', array( 'image' ) );

	// Jetpack infinite scroll
	add_theme_support( 'infinite-scroll', array(
		'type' 				=> 		'click',
	    'container'			=> 		'posts',
	    'wrapper'			=>		false,
		'footer' 			=> 		false,
	) );

	// Add nav menu
	register_nav_menu( 'primary', __('Primary Menu','hitchcock') );
	register_nav_menu( 'social', __('Social Menu','hitchcock') );

	// Make the theme translation ready
	load_theme_textdomain('hitchcock', get_template_directory() . '/languages');

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	  require_once($locale_file);

}
