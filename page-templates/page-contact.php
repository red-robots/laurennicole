<?php
/**
 * Template Name: Contact
 *
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				
                <header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
                <div class="entry-content">
                <?php if(is_page('sitemap')) {
								the_content(); 
								wp_nav_menu( array( 'theme_location' => 'sitemap' ) );
							} else {
                    		 	the_content();
							} ?>
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php $map = get_field('google_map'); 

	if($map != '') :
	
		echo '<div class="widget-area"><div class="widget">';
		echo $map;
		echo '</div><!-- widget -->';
	
	endif; 

		echo '<div class="widget">';
		echo '<h3>Subscribe to Our Blog</h3>';
		echo do_shortcode('[subscribe2 hide="unsubscribe"]');
		echo '</div><!-- widget -->';
		
		echo '<div class="widget">';
		echo '<h3>Join Our Mailing List</h3>';
		get_template_part('inc/email-signup');
		echo '</div><!-- widget -->';
		
		
		
		echo '</div><!-- widget-area -->';
?>
</div><!-- wrapper -->
<?php get_footer(); ?>