<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '866447246780820',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
    
		
		<div class="wrapper">
        <?php if(is_woocommerce() || is_page(24)) {
				$logoClass = 'logo-ln';
			} else {
				$logoClass = 'logo';
			} ?>
		<?php if(is_home()) { ?>
            <h1 class="<?php echo $logoClass; ?>">
            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </h1>
        <?php } else { ?>
            <div class="<?php echo $logoClass; ?>">
            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </div>
        <?php } ?>
        
        
        <div class="header-content">
        
        	<?php acc_social_links(); ?>
        
           <div class="header-bestof">
               <?php if( have_rows('awards', 'option') ): ?>
                    <?php while ( have_rows('awards', 'option') ) : ?>
                        <?php the_row(); 
                            // get current date
                            $currDate = date('Y');
                            // Get Fields
                            $year = get_sub_field('year','option');
                            $design = get_sub_field('design','option');
                            $style = get_sub_field('service','option');
                            // size of images
                            $size = 'thumbnail';
                            $designthumb = $design['sizes'][ $size ];
                            $stylethumb = $style['sizes'][ $size ];
                
             // check to see if we have any awards in the current year.
                    if ( $currDate == $year ) :
            ?>
            <?php if( $design != '') : ?>
            <div class="award-desgin">
                
                    <img src="<?php echo $designthumb; ?>" />
                
            </div><!-- award-desgin -->
            <?php endif; ?>
            <?php if( $style != '') : ?>
            <div class="award-style">
                
                    <img src="<?php echo $stylethumb; ?>" />
                
            </div><!-- award-style -->
            <?php endif; ?>
            
            <?php endif; // end if current year matches?>
            
            <?php endwhile; ?>
            <?php endif; // end repeater ?>
            </div><!-- header best of -->
            
            
            <div class="tagline">
				<?php 
				if(is_woocommerce() || is_page(24)) {
					the_field('address','option');
				} else {
					bloginfo('description'); } ?>
            </div>
            
            <div class="header-phone"><?php the_field('phone_number','option'); ?></div>
        </div><!-- header conent -->
        
		<nav id="site-navigation" class="main-navigation <?php if(is_woocommerce() || is_page(24)) {echo 'dim';} ?>" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
        
        </div><!-- wrapper -->

	</header><!-- #masthead -->
    
    <?php if( is_front_page() ) { get_template_part('inc/slider'); } ?>
    
    <?php if(is_woocommerce() || is_page(24)) : ?>
        <nav id="shop-navigation" class="shop-navigation">
        	<div class="wrapper">
            <h3 class="menu-toggle-shop"><?php _e( 'Shop Menu', 'twentytwelve' ); ?></h3>
        	<?php wp_nav_menu( array( 'theme_location' => 'shop', 'menu_class' => 'shop-menu' ) ); ?> 
        </div>
        </nav>
	<?php endif; ?>

	<div id="main">