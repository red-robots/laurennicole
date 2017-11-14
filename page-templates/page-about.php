<?php
/**
 * Template Name: About
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
                
                <?php if( is_page(98) ) : // Lauren Nicole Home page
				
				$image = get_field('page_photo');
				$size = 'large';
       			$thumb = $image['sizes'][ $size ]; ?>
                <img src="<?php echo $thumb; ?>"  />
                <?php
				
					$shopText = get_field('shop_now_button');
					$shopLink = get_field('shop_now_link');
					$map = get_field('google_map');
					
					
					if( $shopText != '' ) { 
				?>
                	<p>
                <div class="post-next-readmore">
                	<a href="<?php echo $shopLink; ?>"><?php echo $shopText; ?></a>
                </div>
                </p>
                
                <br><br>
                
                <div class="clear"></div>
                
                <?php }  endif; ?>
                
                
                
                <?php the_content(); ?>
                
                
                <?php if( is_page(98) ) : // Lauren Nicole Home page
				
				 	if( $map != '' ) { echo '<div class="clear"></div><br><br><p>' . $map . '</p>';  }
				
				 endif; // Lauren Nicole Home page ?>
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<div id="secondary" class="widget-area"><?php get_template_part('inc/subpages'); ?></div>
</div><!-- wrapper -->
<?php get_footer(); ?>