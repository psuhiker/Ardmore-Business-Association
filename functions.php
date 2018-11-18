<?php

require_once('inc/wp-modifications.php');
require_once('inc/post-types.php');
require_once('inc/theme-options.php');
require_once('inc/user-roles.php');


// Adds Sidebars

function magazino_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'sidebar' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

}
add_action( 'widgets_init', 'magazino_widgets_init' );


// Adds Support for Menus

add_theme_support( 'menus' );

register_nav_menus( array(  
    'primary' => __( 'Primary Navigation' ), 
    'footer' => __( 'Footer Navigation' ),    
    //'main' => __( 'Main Menu' ), 
) );


// Overrides Photo's "Link to" Option 

update_option('image_default_link_type','file');

	
// Adds Style to Admin

add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
echo '
<link href="'.get_bloginfo('template_directory').'/css/fonts.css" type="text/css" rel="stylesheet">
<link href="'.get_bloginfo('template_directory').'/css/admin.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=1100, initial-scale=0.5">
';
$user = wp_get_current_user();
if ( in_array( 'member', (array) $user->roles ) ) {
	echo '
	<link href="'.get_bloginfo('template_directory').'/css/front-end-editor.css" type="text/css" rel="stylesheet">
	';
};

}



// Changes Login Logo

// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/login-logo.png) !important; width: 300px !important; height: 83px !important; background-size: 100% !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


// Adds WYSIWYG Custom Styles

    // Callback function to insert 'styleselect' into the $buttons array
    function my_mce_buttons_2( $buttons ) {
    	array_unshift( $buttons, 'styleselect' );
    	return $buttons;
    }
    // Register our callback to the appropriate filter
    add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
    
    
    // Callback function to filter the MCE settings
    function my_mce_before_init_insert_formats( $init_array ) {  
    	// Define the style_formats array
    	$style_formats = array(  
    		// Each array child is a format with it's own settings
    		array(  
    			'title' => '10pt',  
    			'block' => 'span',  
    			'classes' => 'text-10pt',
    			'wrapper' => true,
    		),  
    		array(  
    			'title' => '12pt',  
    			'block' => 'span',  
    			'classes' => 'text-12pt',
    			'wrapper' => true,
    		), 
    		array(  
    			'title' => '14pt (Default Size)',  
    			'block' => 'span',  
    			'classes' => 'text-default',
    			'wrapper' => true,
    		), 
    		array(  
    			'title' => '16pt',  
    			'block' => 'span',  
    			'classes' => 'text-16pt',
    			'wrapper' => true,
    		), 
    		array(  
    			'title' => '18pt',  
    			'block' => 'span',  
    			'classes' => 'text-18pt',
    			'wrapper' => true,
    		), 
    	);  
    	// Insert the array, JSON ENCODED, into 'style_formats'
    	$init_array['style_formats'] = json_encode( $style_formats );  
    	
    	return $init_array;  
      
    } 
    // Attach callback to 'tiny_mce_before_init' 
    add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

function my_theme_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );


// Add CSS to Hide Blog Page

function custom_admin_styles() {
    if ($_GET['post'] == 11 && is_admin() ){
		echo '<style type="text/css">#acf-content { display: none; }</style>';
	}
}
add_action('admin_head', 'custom_admin_styles');


// Search Template for Businesses

 function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'businesses' )   
  {
    return locate_template('businesses-search.php');
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');  


// Register Custom Navigation Walker
// require_once('inc/wp_bootstrap_pagination.php');



// Loops Content Notifications Plugin into businesses post type

function rkv_add_cun_type( $types ) {

	// Check for the post type, then add it.
	if ( ! in_array( 'businesses', $types ) ) {
		$types[] = 'businesses';
	}

	// Return the post type array.
	return $types;
}

add_filter( 'cun_content_types', 'rkv_add_cun_type' );




?>