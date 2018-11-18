<?php 

// Adds CSS to Customizer Page

function my_customizer_styles() { ?>
    <style>
    
       li#accordion-panel-widgets {
       	display: none !important;
       }
            
    </style>
    <?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );

// Removes Static Front Page

add_action('customize_register', 'themename_customize_register');
function themename_customize_register($wp_customize) {
  $wp_customize->remove_section( 'static_front_page' );
}


function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
   
       // Adds Theme Logo to 'Site Identity'
   
       $wp_customize->add_setting( 'themesimages_logo' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_logo', array(
           'label'    => __( 'Logo', 'themesimages' ),
           'section'  => 'title_tagline',
           'settings' => 'themesimages_logo',
       ) ) );
   
   // Adds Theme Images Section
   
   $wp_customize->add_section( 'themesimages_section' , array(
       'title'       => __( 'Theme Images', 'themesimages' ),
       'priority'    => 30,
       'description' => 'Customize your website\'s theme images.',
   ) );
       
       // Adds Background #1
       
       $wp_customize->add_setting( 'themesimages_defaulttitlebg' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesimages_backgroundone', array(
           'label'    => __( 'Default Title Background', 'themesimages' ),
           'section'  => 'themesimages_section',
           'settings' => 'themesimages_defaulttitlebg',
           'description' => 'This background appears in default title marquees.',
       ) ) );
       
   // Footer Section
   
   $wp_customize->add_section( 'footer_section' , array(
       'title'       => __( 'Footer', 'footersection' ),
       'priority'    => 30,
       'description' => 'Customize your website\'s footer.',
   ) );
       
       // Adds Footer Text
       
       $wp_customize->add_setting( 'footer_text' );
       
       $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_text', array(
           'label'    => __( 'Footer Text', 'footersection' ),
           'type'	  => 'textarea',
           'section'  => 'footer_section',
           'settings' => 'footer_text',
           'description' => 'This is the text that appears in the footer.',
       ) ) );
       
       // Adds Organization Logo #1
       
       $wp_customize->add_setting( 'footer_logo_one' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_one', array(
           'label'    => __( 'Footer Logo #1', 'footersection' ),
           'section'  => 'footer_section',
           'settings' => 'footer_logo_one',
       ) ) );
       
       		// Adds Link for Logo #1
       		
       		$wp_customize->add_setting( 'footer_link_one' );
       		
       		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_link_one', array(
       		    'label'    => __( 'Footer Logo #1 Link', 'footersection' ),
       		    'section'  => 'footer_section',
       		    'settings' => 'footer_link_one',
       		) ) );
       		
       // Adds Organization Logo #2
       
       $wp_customize->add_setting( 'footer_logo_two' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_two', array(
           'label'    => __( 'Footer Logo #2', 'footersection' ),
           'section'  => 'footer_section',
           'settings' => 'footer_logo_two',
       ) ) );
       
       		// Adds Link for Logo #1
       		
       		$wp_customize->add_setting( 'footer_link_two' );
       		
       		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_link_two', array(
       		    'label'    => __( 'Footer Logo #2 Link', 'footersection' ),
       		    'section'  => 'footer_section',
       		    'settings' => 'footer_link_two',
       		) ) );
       		
       // Adds Organization Logo #3
       
       $wp_customize->add_setting( 'footer_logo_three' );
       
       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_three', array(
           'label'    => __( 'Footer Logo #3', 'footersection' ),
           'section'  => 'footer_section',
           'settings' => 'footer_logo_three',
       ) ) );
       
       		// Adds Link for Logo #3
       		
       		$wp_customize->add_setting( 'footer_link_three' );
       		
       		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_link_three', array(
       		    'label'    => __( 'Footer Logo #3 Link', 'footersection' ),
       		    'section'  => 'footer_section',
       		    'settings' => 'footer_link_three',
       		) ) );
       		
      // Adds Organization Logo #4
      
      $wp_customize->add_setting( 'footer_logo_four' );
      
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_four', array(
          'label'    => __( 'Footer Logo #4', 'footersection' ),
          'section'  => 'footer_section',
          'settings' => 'footer_logo_four',
      ) ) );
      
      		// Adds Link for Logo #4
      		
      		$wp_customize->add_setting( 'footer_link_four' );
      		
      		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_link_four', array(
      		    'label'    => __( 'Footer Logo #4 Link', 'footersection' ),
      		    'section'  => 'footer_section',
      		    'settings' => 'footer_link_four',
      		) ) );
      		
     // House Ad
     
     $wp_customize->add_section( 'ad_section' , array(
         'title'       => __( 'House Ad', 'adsection' ),
         'priority'    => 30,
     ) );
         
         // Adds House Ad
                  
         $wp_customize->add_setting( 'ad_banner' );
         
         $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ad_banner', array(
             'label'    => __( 'Banner Ad', 'adsection' ),
             'section'  => 'ad_section',
             'settings' => 'ad_banner',
             'description' => 'Upload a 300 x 250 banner ad',
         ) ) );
         
         // Adds House Ad URL
                  
         $wp_customize->add_setting( 'ad_banner_url' );
         
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ad_banner_url', array(
             'label'    => __( 'Banner Ad URL', 'adsection' ),
             'section'  => 'ad_section',
             'settings' => 'ad_banner_url',
             'description' => 'Enter a URL the house ad should link to',
         ) ) );
      		
     // Error Page
     
     $wp_customize->add_section( 'error_section' , array(
         'title'       => __( 'Error Page', 'errorsection' ),
         'priority'    => 30,
         'description' => 'Customize your website\'s 404 page.',
     ) );
         
         // Adds Error Text
         
         $wp_customize->add_setting( 'error_text' );
         
         $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'error_section', array(
             'label'    => __( 'Error Page Text', 'errorsection' ),
             'type'	  => 'textarea',
             'section'  => 'error_section',
             'settings' => 'error_text',
             'description' => 'This is the text that appears on the 404 page.',
         ) ) );
       
   
   
   
}
add_action( 'customize_register', 'mytheme_customize_register' );