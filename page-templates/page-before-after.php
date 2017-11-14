<?php
/**
 * Template Name: Before/After
 *
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
			
			
			
			
			?>
				
				
                <header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
               
 
<?php if( have_rows('before_and_after') ): ?>

	<?php while ( have_rows('before_and_after') ) : ?>
	<?php the_row(); 
	
		$image1 = get_sub_field('before_pic');
		$image2 = get_sub_field('after_pic'); 
       $url1 = $image1['url'];
       $title1 = $image1['title'];
	   $url2 = $image2['url'];
       $title2 = $image2['title'];
		$size = 'services';
       $thumb1 = $image1['sizes'][ $size ];
	   $thumb2 = $image2['sizes'][ $size ];
	   $projTitle = get_sub_field('project_title');
	   $desc = get_sub_field('description');
	   $portfolio_item = get_sub_field('portfolio_item');
	   //$id = $portfolio_item[0];
	   //$link = get_permalink( $id );
	   
	   /*echo '<pre>';
	   print_r($portfolio_item);*/
	
	?>
    <div class="beforeandafter">
    
        <div class="before-pic">
        <img src="<?php echo $thumb1; ?>" alt="<?php echo $alt1; ?>" title="<?php echo $title1; ?>" />
        </div>
        
        <div class="after-pic">
        <img src="<?php echo $thumb2; ?>" alt="<?php echo $alt2; ?>" title="<?php echo $title2; ?>" />
        </div>
        
        <div class="ba-bot">
        <div class="entry-content">
            <h2><?php 
				if( $portfolio_item != '' ) {
					echo $portfolio_item->post_title;
				} else {
					echo $projTitle;
				}
			 ?></h2>
        </div>
            
            <div class="ba-desc"><?php echo $desc; ?></div>
            

             
<?php
if( $portfolio_item ) :
$post_object = $portfolio_item;
/* echo '<pre>';
	   print_r($post_object);*/
if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	
	// Sanitize for light gallery 
	$portTitle = get_the_title(); 
	$saniTitle = sanitize_title($portTitle);
	$saniTitle = str_replace('-', '_', $saniTitle);

	?>
    <?php 
	$i = 0;
	if( have_rows('gallery') ):  while ( have_rows('gallery') ) :  the_row(); 
	
	$i++;
		$image = get_sub_field('image'); 
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'portfolio-three';
			$sizeLarge = 'large';
			$thumb = $image['sizes'][ $size ];
			$large = $image['sizes'][ $sizeLarge ];
			$desc = get_sub_field('description');
	   
	   if( $i == 1 ) :
	   
	   echo '<div class="ba-port">';
	   echo '<a class="gal-'.$saniTitle.'" href="'.$large.'" title="'.$portTitle.'">See more photos and read more about this project</a>';
	   echo '</div><!-- ba-port -->';
	   
	   else: 
	   
	   echo '<a class="gal-'.$saniTitle.'" href="'.$large.'" title="'.$portTitle.'"></a>';
	   
	   endif; // end 1 count
	   
	   /*echo '<pre>';
	   print_r($portfolio_item);*/
	endwhile; // endwhile repeater ?>
	
	
<script type="text/javascript">
 
jQuery(document).ready(function ($) { 
  
	$('a.gal-<?php echo $saniTitle; ?>').colorbox({
		rel:'gal-<?php echo $saniTitle; ?>',
		width: '100%', 
		height: '100%',
		current: "{current}/{total}"
	});         
});// END #####################################    END
</script>
	
	
	
	<?php endif; // endif repeater
	?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php 
endif; // enfif post object
endif; // endif portfolio item
?>
                
                
     
            
        </div><!-- ba-bot -->
        
        <div  class="doublebar">
                <div class="bar-right"></div>
                <div class="bar-left"></div>
            </div><!-- double bar -->
        
     </div><!-- beforeandafter --> 
    
<?php endwhile; ?>

<?php endif; ?>
               
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- wrapper -->
<?php get_footer(); ?>