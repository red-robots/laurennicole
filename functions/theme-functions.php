<?php
/*function plus_to_dash($saniport) {
    return str_replace('_', '-', $saniport);
}
add_filter('sanitize_title', 'plus_to_dash');*/
// This theme uses wp_nav_menu() in one location.

register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );
register_nav_menu( 'shop', __( 'Shop Menu', 'twentytwelve' ) );
register_nav_menu( 'sitemap', __( 'Sitemap Menu', 'twentytwelve' ) );
register_nav_menu( 'footer', __( 'Footer Menu', 'twentytwelve' ) );
	
// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
add_image_size('slider', 1200, 430,true);
//add_image_size('portfolio', 500, 500,array('center','center'));
add_image_size('portfolio-three', 300, 300,array('center','center'));
add_image_size('bigmed', 400, 400,array('center','center'));
add_image_size('bigmedhard', 500, 500,array('center','center', true));
add_image_size('portsingle', 600, 9999);
add_image_size('services', 520, 400,array('center','center'));

if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  
}
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

 /*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 280px 160px;
  	width: 280px;
  	height: 160px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

// Add a last and first menu class option
function ac_first_and_last_menu_class($items) {
	foreach($items as $k => $v){
		$parent[$v->menu_item_parent][] = $v;
	}
	foreach($parent as $k => $v){
		$v[0]->classes[] = 'list';
		$v[count($v)-1]->classes[] = 'last';
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');


/*-------------------------------------
	Taxonomies for Images
---------------------------------------*/
function wptp_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'space_type', 'attachment' );
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );

// Chnage posts to blog
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog post';
    //$submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}
 add_action( 'admin_menu', 'change_post_menu_label' );

/*-------------------------------------
	Is Tree Function
---------------------------------------*/
function is_tree($pid)
{
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};

/*-------------------------------------
	Fallback for no featured image. 
	Will grab first image in post.
---------------------------------------*/
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];
  
  if(empty($first_img)) {
    $first_img = get_template_directory_uri() . '/images/default.png';
  }
  return $first_img;
}
/*-------------------------------------
	Woocommerce Functions
---------------------------------------*/
// Remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
// Breadcrumbs
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    $link = get_bloginfo('url') . '/shop';
	return $link;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
	$defaults['home'] = 'Shop';
	return $defaults;
}
// remove sorting
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_filter( 'woocommerce_subcategory_count_html', 'prima_hide_subcategory_count' );
function prima_hide_subcategory_count() {
	/* empty - no count */
}

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 32;' ), 20 );