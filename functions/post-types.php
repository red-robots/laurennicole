<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slides'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slides'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No Slides found'),
    'not_found_in_trash' => __('No Slides found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 11,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('slides',$args); // name used in query
  
  
  	// Register the Portfolio Spaces
  
     $labels = array(
	'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio', 'post type singular name'),
    'add_new' => _x('Add New', 'Portfolio'),
    'add_new_item' => __('Add New Portfolio'),
    'edit_item' => __('Edit Portfolio'),
    'new_item' => __('New Portfolio'),
    'view_item' => __('View Portfolio'),
    'search_items' => __('Search Portfolio'),
    'not_found' =>  __('No Portfolio found'),
    'not_found_in_trash' => __('No Portfolio found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Portfolio'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'project-item'),
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('portfolio',$args); // name used in query
  
  
  
    	// Register the Events
  
     $labels = array(
	'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'Event'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Event'),
    'not_found' =>  __('No Event found'),
    'not_found_in_trash' => __('No Event found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Events'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'event'),
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('events',$args); // name used in query
  
  
    	// Register the Portfolio Spaces
  
     $labels = array(
	'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Team'),
    'add_new_item' => __('Add New Team'),
    'edit_item' => __('Edit Team'),
    'new_item' => __('New Team'),
    'view_item' => __('View Team'),
    'search_items' => __('Search Team'),
    'not_found' =>  __('No Team found'),
    'not_found_in_trash' => __('No Team found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Team'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'team-member'),
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('team',$args); // name used in query
  
  
  /*	// Register the Portfolio Spaces
  
     $labels = array(
	'name' => _x('Spaces', 'post type general name'),
    'singular_name' => _x('Space', 'post type singular name'),
    'add_new' => _x('Add New', 'Space'),
    'add_new_item' => __('Add New Space'),
    'edit_item' => __('Edit Spaces'),
    'new_item' => __('New Spaces'),
    'view_item' => __('View Spaces'),
    'search_items' => __('Search Spaces'),
    'not_found' =>  __('No Spaces found'),
    'not_found_in_trash' => __('No Spaces found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Spaces'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('spaces',$args); // name used in query*/
  
  // Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonial'),
    'not_found' =>  __('No Testimonial found'),
    'not_found_in_trash' => __('No Testimonials found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('testimonials',$args); // name used in query
  
  
  // Add more between here
  
  // and here
  
  } // close custom post type
  
/*##############################################
	Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {


// Room Type
    register_taxonomy( 'room_type', array( 'portfolio'),
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Room Type', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'room-type' ),
	'_builtin' => true
	) );
	
// Family Name
    register_taxonomy( 'project', array( 'portfolio'),
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Project Name', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'project' ),
	'_builtin' => true
	) );






/*// cusotm tax
    register_taxonomy( 'space_type', array( 'spaces','attachment'),
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Space Type', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'space-type' ),
	'_builtin' => true
	) );*/
	
} // End build taxonomies

/* ###############################################

	Couple things about this function that adds a taxonomy to the attachment for reference: 
	
Link: http://code.tutsplus.com/articles/applying-categories-tags-and-custom-taxonomies-to-media-attachments--wp-32319

Query:
$attachments_query = new WP_Query( 
array( 
'post_status' => 'inherit',
'post_type' => 'attachment',
'tag' => 'my_attachment_tag'
) 
);

$attachments = $attachments_query->get_posts();

an attachment will always have a post status of 'inherit' by default. You do not
need to construct a tax_query unless you are using a custom taxonomy and if
you are using categories instead of tags simply replace 'tag' with 'category'
in the above piece of code.

*/