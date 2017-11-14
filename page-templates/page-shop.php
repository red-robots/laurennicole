<?php
/**
 * Template Name: Shop
 *
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
				//shop
				$storeChoice = get_field('store_choice');
				$storeText = get_field('at_the_store_text');
				$image = get_field('image');
				$largesize = 'large';
				$thumbstore = $image['sizes'][ $largesize ];
				// Boxes
				$medsize = 'bigmed';
        		$box1image = get_field('box_1_image');
				$thumb1 = $box1image['sizes'][ $medsize ];
				$box1text = get_field('box_1_text');
				$box1link = get_field('box_1_link');
				$box2image = get_field('box_2_image');
				$thumb2 = $box2image['sizes'][ $medsize ];
				$box2text = get_field('box_2_text');
				$box2link = get_field('box_2_link');
				$box3image = get_field('box_3_image');
				$thumb3 = $box3image['sizes'][ $medsize ];
				$box3text = get_field('box_3_text');
				$box3link = get_field('box_3_link');
				$box4image = get_field('box_4_image');
				$thumb4 = $box4image['sizes'][ $medsize ];
				$box4text = get_field('box_4_text');
				$box4link = get_field('box_4_link');
				
				// for later down the page when calling post objects.
				$eventFeaturedImage = get_field('event_featured_image');
				$shopFeaturedImage = get_field('shop_featured_image');
				$thumbEvent = $eventFeaturedImage['sizes'][ $medsize ];
				$thumbShop = $shopFeaturedImage['sizes'][ $medsize ];
			
			
			
			?>
            
            
            <div class="shop-left">
            	<?php if( $storeChoice == 'One Image' ) { ?>
					<img src="<?php echo $thumbstore; ?>" />
				<?php } else { ?>
					<div class="shop-left-left">
					<div class="entry-content"><?php echo $storeText; ?></div>
                    </div>
                    <div class="shop-left-right"><img src="<?php echo $thumb1; ?>" /></div>
				<?php } ?>
            </div><!-- shp left -->
            
            <div class="shoptitle">Shop Online</div>
            
            
            <div class="shop-right">
            
            	<div class="shop-box shop-box-left">
                <a href="<?php echo $box1link; ?>">
                    <img src="<?php echo $thumb1; ?>" />
                    
                    <div class="shop-box-text playfair"><?php echo $box1text; ?></div>
                  </a>
                </div><!-- shop box -->
                
                <div class="shop-box shop-box-right">
                	<a href="<?php echo $box2link; ?>">
                    <img src="<?php echo $thumb2; ?>" />
                    <div class="shop-box-text playfair"><?php echo $box2text; ?></div>
                	</a>
                </div><!-- shop box -->
                
                <div class="shop-box shop-box-left">
                	<a href="<?php echo $box3link; ?>">
                    <img src="<?php echo $thumb3; ?>" />
                    <div class="shop-box-text playfair"><?php echo $box3text; ?></div>
                	</a>
                </div><!-- shop box -->
                
                <div class="shop-box shop-box-right">
                	<a href="<?php echo $box4link; ?>">
                    <img src="<?php echo $thumb4; ?>" />
                    <div class="shop-box-text playfair"><?php echo $box4text; ?></div>
                  </a>
                </div><!-- shop box -->
                
            </div><!-- shp right -->
            
				
			<?php endwhile; wp_reset_postdata(); // end of the loop. ?>
  <div class="clear"></div> 
  <div class="shopspace"></div>         
   
 <div class="home-content">
 
   
   <div class="home-block home-block-1">
       <h2>UPcoming Event</h2>
<?php

$event_post_object = get_field('featured_event');
$shop_post_object = get_field('shop_this_look');

if( $event_post_object ): 

	// override $post
	$post = $event_post_object;
	setup_postdata( $post ); 
	
	$eventDate = DateTime::createFromFormat('Ymd', get_field('event_date'));
	
	
?>  
       <div class="home-block-post">
                	<a href="<?php the_permalink(); ?>">
                    
					<?php if( $eventFeaturedImage != '' ) { ?>
		<img src="<?php echo $thumbEvent; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
							<?php } else {
								 if ( has_post_thumbnail()  ) {
									  the_post_thumbnail('bigmed');
									} else {
									   echo '<img src="';
										echo catch_that_image();
										 echo '" alt="" />';
									}  
							} ?>
                    		
                    	<div class="home-block-post-hover">
                        <div class="home-block-post-hover-date">	
                        	<?php echo $eventDate->format('M d');; ?>
                        </div><!-- home block post hover date -->
                        	<h3><?php the_title(); ?></h3>
                        </div><!-- home block post hover -->
                  </a>
                </div><!-- home block post -->         

    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div><!-- home block -->




   <div class="home-block home-block-2">
       <h2>shop this look</h2>
<?php

if( $shop_post_object ): 

	// override $post
	$post = $shop_post_object;
	setup_postdata( $post ); 
?>  
       <div class="home-block-post">
                	<a href="<?php the_permalink(); ?>">
                    
					<?php if( $shopFeaturedImage != '' ) { ?>
		<img src="<?php echo $thumbShop; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
							<?php } else {
								 if ( has_post_thumbnail()  ) {
									  the_post_thumbnail('bigmed');
									} else {
									   echo '<img src="';
										echo catch_that_image();
										 echo '" alt="" />';
									}  
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


<div class="home-block home-block-3">
    <h2>Stay Informed</h2>
    
    <div class="stay-informed-wrapper">
    	<div class="stay-informed">
        	<div class="stay-informed-pad">
            	<h3>Exclusive Email Signup</h3>
                
                <?php get_template_part('inc/email-signup'); ?>
                
            		<p>Enter your email address to receive emails about special promotions in store, new products, online sales and more!</p>
            </div><!--stay-informed-pad-->
        </div><!--stay-informed-->
    </div><!--stay-informed-wrapper-->
    
</div><!-- home block 3-->
             


            
</div><!-- home content -->            

		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- wrapper -->
<?php get_footer(); ?>