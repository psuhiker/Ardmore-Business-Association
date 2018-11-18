<?php 

// Adds Custom Post Types

add_action( 'init', 'create_post_type' );
    function create_post_type() {
    
    // Adds for Businesses
    	
    register_post_type( 'businesses',
        array(
            'labels' => array(
                'name' => __( 'Businesses' ),
                'singular_name' => __( 'Business' ),
                'add_new' => __( '+ Add New Business' ),
                'add_new_item' => __( 'Add New Business' ),
                'edit_item' => __( 'Edit Business' ),
                'new_item' => __( 'New Business' ),
                'view_item' => __( 'View Business' ),
                'search_items' => __( 'Search Businesses' ),
                'not_found' => __( 'No Businesses Found' ),
                'not_found_in_trash' => __( 'No Businesses Found' ),
                'all_items' => __( 'All Businesses' ),
                ),
            'public' => true,
    		'comments' => true,
            'has_archive' => true,
    		'rewrite' => array('slug' => 'businesses', 'with_front' => false),
    		'supports' => array('title', 'thumbnail'),
    		'menu_icon' => 'dashicons-store',
    		'menu_position' => 20,
    		'taxonomies' => array('post_tag'),
    		'capability_type'     => array('business_manager','business_managers'),
    		'map_meta_cap'        => true,
            )
        );
    
    // Adds for News
    	
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' ),
                'add_new' => __( '+ Add New News Item' ),
                'add_new_item' => __( 'Add New News Item' ),
                'edit_item' => __( 'Edit News Item' ),
                'new_item' => __( 'New News Item' ),
                'view_item' => __( 'View News Item' ),
                'search_items' => __( 'Search News' ),
                'not_found' => __( 'No News Items Found' ),
                'not_found_in_trash' => __( 'No News Items Found' ),
                'all_items' => __( 'All News Items' ),
                ),
            'public' => true,
    		'comments' => true,
            'has_archive' => true,
    		'rewrite' => array('slug' => 'news', 'with_front' => false),
    		'supports' => array('title', 'editor', 'thumbnail'),
    		'menu_icon' => 'dashicons-testimonial',
    		'menu_position' => 20,
    		'taxonomies' => array('post_tag'),
            )
        );
        
    // Adds for Events
    	
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Events' ),
                'add_new' => __( '+ Add New Event' ),
                'add_new_item' => __( 'Add New Event' ),
                'edit_item' => __( 'Edit Event' ),
                'new_item' => __( 'New Event' ),
                'view_item' => __( 'View Event' ),
                'search_items' => __( 'Search Events' ),
                'not_found' => __( 'No Events Found' ),
                'not_found_in_trash' => __( 'No Events Found' ),
                'all_items' => __( 'All Events' ),
                ),
            'public' => true,
    		'comments' => true,
            'has_archive' => true,
    		'rewrite' => array('slug' => 'events', 'with_front' => false),
    		'supports' => array('title', 'editor', 'thumbnail'),
    		'menu_icon' => 'dashicons-calendar-alt',
    		'menu_position' => 20,
    		'taxonomies' => array('post_tag'),
            )
        );
        
	// Adds for Business Profile Series
		
	register_post_type( 'profiles',
	    array(
	        'labels' => array(
	            'name' => __( 'Member Profile Series' ),
	            'singular_name' => __( 'Member Profile Series Post' ),
	            'add_new' => __( '+ Add Member Profile Series Post' ),
	            'add_new_item' => __( 'Add Member Profile Series Post' ),
	            'edit_item' => __( 'Edit Member Profile Series Post' ),
	            'new_item' => __( 'New Member Profile Series Post' ),
	            'view_item' => __( 'View Member Profile Series Post' ),
	            'search_items' => __( 'Search Member Profile Series Posts' ),
	            'not_found' => __( 'No Member Profile Series Posts Found' ),
	            'not_found_in_trash' => __( 'No Member Profile Series Posts Found' ),
	            'all_items' => __( 'All Member Profile Series Posts' ),
	            ),
	        'public' => true,
			'comments' => false,
	        'has_archive' => true,
			'rewrite' => array('slug' => 'profiles', 'with_front' => false),
			'supports' => array('title', 'editor'),
			'menu_icon' => 'dashicons-pressthis',
			'menu_position' => 20,
	        )
	    );
        
    // Adds for Landing Pages
    	
    register_post_type( 'landing-page',
        array(
            'labels' => array(
                'name' => __( 'Landing Pages' ),
                'singular_name' => __( 'Landing Page' ),
                'add_new' => __( '+ Add Landing Page' ),
                'add_new_item' => __( 'Add Landing Page' ),
                'edit_item' => __( 'Edit Landing Page' ),
                'new_item' => __( 'New Landing Page' ),
                'view_item' => __( 'View Landing Page' ),
                'search_items' => __( 'Search Landing Pages' ),
                'not_found' => __( 'No Landing Pages Found' ),
                'not_found_in_trash' => __( 'No Landing Pages Found' ),
                'all_items' => __( 'All Landing Pages' ),
                ),
            'public' => true,
    		'comments' => true,
            'has_archive' => true,
    		'rewrite' => array('slug' => 'campaign', 'with_front' => false),
    		'supports' => array('title', 'editor'),
    		'menu_icon' => 'dashicons-welcome-widgets-menus',
    		'menu_position' => 20,
            )
        );
        
    // Adds for Member Alerts
    	
    register_post_type( 'member_alerts',
        array(
            'labels' => array(
                'name' => __( 'Member Alert' ),
                'singular_name' => __( 'Member Alert' ),
                'add_new' => __( '+ Add Member Alert' ),
                'add_new_item' => __( 'Add Member Alert' ),
                'edit_item' => __( 'Edit Member Alert' ),
                'new_item' => __( 'New Member Alert' ),
                'view_item' => __( 'View Member Alert' ),
                'search_items' => __( 'Search Member Alerts' ),
                'not_found' => __( 'No Member Alerts Found' ),
                'not_found_in_trash' => __( 'No Member Alerts Found' ),
                'all_items' => __( 'All Member Alerts' ),
                ),
            'public' => true,
    		'comments' => true,
            'has_archive' => true,
    		'rewrite' => array('slug' => 'alert', 'with_front' => false),
    		'supports' => array('title', 'editor'),
    		'menu_icon' => 'dashicons-warning',
    		'menu_position' => 20,
            )
        );
        
    register_post_type( 'pending',
        array(
            'labels' => array(
                'name' => __( 'Pending Members' ),
                'edit_item' => __( 'Pending Member' ),
                ),
            'public' => true,
    		'comments' => false,
            'has_archive' => false,
    		'rewrite' => array('slug' => 'pending', 'with_front' => false),
    		'menu_icon' => 'dashicons-money',
    		'menu_position' => 40,
            )
        );
    
}
    

// Adds Custom Taxonomies

function add_custom_taxonomies() {
	
	// Add Business Categories
	
	register_taxonomy('businesses_categories', 'businesses', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Categories', 'taxonomy general name' )
		),
		'rewrite' => array(
			'slug' => 'type', 
			'with_front' => false, 
			'hierarchical' => true 
		),
	));
	
}
add_action( 'init', 'add_custom_taxonomies', 0 );



// Adds Custom Field to Columns

add_filter( 'manage_edit-businesses_columns', 'my_edit_businesses_columns' ) ;

function my_edit_businesses_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'membership' => __( 'Membership Status' ),
		'taxonomies' => __( 'Categories' ),
		'tags' => __( 'Tags' )
	);

	return $columns;
}

add_action( 'manage_businesses_posts_custom_column', 'my_manage_businesses_columns', 10, 2 );


function my_manage_businesses_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
	
	    case 'taxonomies' :
	
    	    $taxonomies[] = 'businesses_categories';
    	    return $taxonomies;
	    
	    default :
	    	break;

		/* If displaying the 'duration' column. */
		case 'membership' :

			/* Get the post meta. */
			$membership = get_field( 'aba_membership', $post_id );

			/* If no duration is found, output a default message. */
			if ( empty( $membership ) )
				//echo __( '' );
				echo "Non-Member";

			/* If there is a duration, append 'minutes' to the text string. */
			else
				//printf( $description );
				echo "Member";

			break;

		/* Just break out of the switch statement for everything else. */
//		default :
			break;
	}
}