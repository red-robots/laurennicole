<?php
/**
 * Home Page
 *
 * 
 */

get_header(); 


$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'page',
	'page_id' => 6615, // homepage
));
	if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) : $wp_query->the_post();
	$medsize = 'bigmed';
	$size = 'bigmed';
	// get a couple things before running a new query
	$image = get_field('blog_post_image');
	$title = $image['title'];
	$alt = $image['alt'];
	$thumb = $image['sizes'][ $size ];
	$blogimage = get_field('product_featured_image');
	$blogtitle = $blogimage['title'];
	$blogalt = $blogimage['alt'];
	$blogthumb = $blogimage['sizes'][ $medsize ];
	// get the post for the thrid box
	$shop_post_object = get_field('featured_product');
	$titleOne = get_field('box_title_1');
	$titleTwo = get_field('box_title_2');
	$titleThree = get_field('box_title_3');
	/*echo '<pre>';
	print_r($image);*/
	endwhile; endif; // end page query
	?>

	
  <div class="wrapper">  
    <div id="primary" class="">
		<div id="content" role="main">
        
        <div  class="doublebar">
        	<div class="bar-right"></div>
            <div class="bar-left"></div>
        </div><!-- double bar -->
        
        <div class="home-content">
        
        	<div class="home-block home-block-1">
            	<h2><?php echo $titleOne; ?></h2>
                
           <?php 
		   
		   // Run a new query
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 1,
				'category__not_in' => array(46) // 'At the store'
			));
				if ($wp_query->have_posts()) : ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
					
					
				?>	
                <div class="home-block-post">
                	<a href="<?php the_permalink(); ?>">
                    <?php if( $image != ''): ?>
                    		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                    <?php endif; ?>
                    	<div class="home-block-post-hover-up">
                        <div class="home-block-post-hover-date">	
                        	<?php echo get_the_date(); ?>
                        </div><!-- home block post hover date -->
                        	<h3><?php the_title(); ?></h3>
                        </div><!-- home block post hover -->
                  </a>
                </div><!-- home block post -->
                <?php endwhile; endif; wp_reset_postdata(); ?>
                
            </div><!-- home block -->
            
            
            
            
           <div class="home-block home-block-2">
            	<!-- <h2>At The Store</h2> -->
            	<h2><?php echo $titleTwo; ?></h2>
                
           <?php
			// 	$wp_query = new WP_Query();
			// 	$wp_query->query(array(
			// 	'post_type'=>'post',
			// 	'posts_per_page' => 1,
			// 	'category__in' => 46 // 'at the store'
			// ));
				//if ($wp_query->have_posts()) : ?>
				<?php //while ($wp_query->have_posts()) : ?>
					
				<?php $wp_query->the_post(); ?>	
            <!--    <div class="home-block-post">
                	<a href="<?php the_permalink(); ?>">
                    <?php 
						if ( has_post_thumbnail() ) { //
							the_post_thumbnail('bigmed');
						} 
						?>
                    	<div class="home-block-post-hover">
                        <div class="home-block-post-hover-date">	
                        	<?php echo get_the_date(); ?>
                        </div>
                        	<h3><?php the_title(); ?></h3>
                        </div>
                  </a>
                </div>
                <?php //endwhile; endif; wp_reset_postdata(); ?>
                
             -->

            <iframe class='houzztv-player' src='https://www.houzz.com/proVideoWidget/laurennicole' width='490' height='280' frameborder='0'></iframe>
				
				<div class="block-link">
					<a href="http://www.houzz.com/pro/laurennicole/__public">view full screen</a>
				</div>
            
            
             </div><!-- home block 2 -->
            
            
            
            
            <div class="home-block home-block-3">
            	<h2><?php echo $titleThree; ?></h2>
                
 <?php

if( $shop_post_object ): 

	// override $post
	$post = $shop_post_object;
	setup_postdata( $post ); 
	$i=0;
	$portTitle = get_the_title(); 
	$portDesc = get_the_content();
	$saniTitle = sanitize_title($portTitle);
	$saniTitle = str_replace('-', '_', $saniTitle);
	$i++;

	$rows = get_field('gallery');
	$row_count = count($rows);
	 $i = 0;
	  if( have_rows('gallery') ):  
	  while ( have_rows('gallery') ) :  the_row(); 
	  // set to match number of rows
	  $i++;
	  // Get field Name
       		$image = get_sub_field('image'); 
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'portfolio-three';
			$sizeLarge = 'large';
			$thumb = $image['sizes'][ $size ];
			$large = $image['sizes'][ $sizeLarge ];
			$desc = get_sub_field('description');
//echo $large;

// echo '<pre>';
// print_r($rows);
// echo '</pre>';

?> 

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



				<a  href="<?php echo $large; ?>" 
             	class="gal-<?php echo $saniTitle; ?>" 
				 <?php if($desc != '') {
                     		echo 'title="'.$portTitle.' - '.$desc.'"';
                     }else{
                         echo 'title="'.$portTitle.'"';
                    } ?> 
                id="<?php echo $saniTitle ?>" ></a>
  
  <?php endwhile; endif; // end repeater ?>

       <div class="home-block-post thingreyline">
                	<a href="<?php echo $large; ?>" class="gal-<?php echo $saniTitle; ?>" >
                    
					<?php if ( has_post_thumbnail() ) { ?>
					  
					       <?php the_post_thumbnail('portfolio-three'); 
												} ?>
                            
                    	<div class="home-block-post-hover">
                        <div class="home-block-post-hover-date">	
                        	<?php echo get_the_date(); ?>
                        </div><!-- home block post hover date -->
                        	<h3><?php the_title(); ?></h3>
                        </div><!-- home block post hover -->
                  </a>
                </div><!-- home block post -->         




    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
                
            </div><!-- home block -->
            
            
            
        </div><!-- home content -->
	
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- wrapper -->


<?php get_footer(); ?>