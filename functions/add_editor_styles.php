<?php
// Add editor styles
function hitchcock_add_editor_styles() {
    add_editor_style( 'hitchcock-editor-styles.css' );
    $font_url = '//fonts.googleapis.com/css?family=Montserrat:400,700|Droid+Serif:400,400italic,700,700italic';
    add_editor_style( str_replace( ',', '%2C', $font_url ) );
}
add_action( 'init', 'hitchcock_add_editor_styles' );
