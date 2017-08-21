<?php
// hitchcock theme options
class hitchcock_Customize {

   public static function hitchcock_register ( $wp_customize ) {

      //1. Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_section( 'hitchcock_logo_section' , array(
		    'title'       => __( 'Logo', 'hitchcock' ),
		    'priority'    => 40,
		    'description' => __('Upload a logo to replace the default site title in the sidebar/header', 'hitchcock'),
	  ) );


      //2. Register new settings to the WP database...
      $wp_customize->add_setting( 'accent_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => '#3bc492', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
			'sanitize_callback' => 'sanitize_hex_color'
         )
      );

	  $wp_customize->add_setting( 'hitchcock_logo',
      	array(
      		'sanitize_callback' => 'esc_url_raw'
      	)
      );


      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'hitchcock_accent_color', //Set a unique ID for the control
         array(
            'label' => __( 'Accent Color', 'hitchcock' ), //Admin-visible name of the control
            'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'accent_color', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
         )
      ) );

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hitchcock_logo', array(
		    'label'    => __( 'Logo', 'hitchcock' ),
		    'section'  => 'hitchcock_logo_section',
		    'settings' => 'hitchcock_logo',
	  ) ) );

      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
   }

   public static function hitchcock_header_output() {
      ?>

	      <!-- Customizer CSS -->

	      <style type="text/css">
	           <?php self::hitchcock_generate_css('body a', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('body a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.blog-title a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.social-menu a:hover', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post:hover .archive-post-title', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content a', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content a:hover', 'border-bottom-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content p.pull', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content input[type="submit"]', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content input[type="button"]', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content input[type="reset"]', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content input:focus', 'border-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.post-content textarea:focus', 'border-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.button', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.page-links a:hover', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comments .pingbacks li a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comment-header h4 a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comment-form input:focus', 'border-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comment-form textarea:focus', 'border-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.form-submit #submit', 'background-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comment-title .url:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comment-actions a', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.comment-actions a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.archive-nav a:hover', 'color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('#infinite-handle:hover', 'background', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.credits p:first-child a:hover', 'color', 'accent_color'); ?>

	           <?php self::hitchcock_generate_css('.nav-toggle.active .bar', 'background-color', 'accent_color'); ?>
	           <?php self::hitchcock_generate_css('.mobile-menu a:hover', 'color', 'accent_color'); ?>

	      </style>

	      <!--/Customizer CSS-->

      <?php
   }

   public static function hitchcock_live_preview() {
      wp_enqueue_script(
           'hitchcock-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional)
           true // Specify whether to put in footer (leave this true)
      );
   }

   public static function hitchcock_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'hitchcock_Customize' , 'hitchcock_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'hitchcock_Customize' , 'hitchcock_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'hitchcock_Customize' , 'hitchcock_live_preview' ) );
