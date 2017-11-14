<?php
/**
 * Template Name: Press
 *
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				
                <header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
                
                <?php 
				
						/* Fields */
						$videoTitle = get_field('video_title');
						$videoSubTitle = get_field('video_sub_title');
						$videoUrl = get_field('video_url');
						$videoLink = get_field('video_link');
						$designTitle = get_field('design_title');
						$designSubTitle = get_field('design_sub_title');
						$designlink = get_field('design_network_link');
						$awardsTitle = get_field('awards_title');
						$awardsSubTitle = get_field('awards_sub_title');
						$houzTitle = get_field('houz_title');
						$houzSubTitle = get_field('houz_sub_title');
						$houzzlink = get_field('houzz_box_link');
						$image = get_field('design_101_image');
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$size = 'large';
        				$thumb = $image['sizes'][ $size ];
						// houzz
						$imageH = get_field('houzz_image');
						$thumbH = $imageH['sizes'][ $size ];
				?>
                
                <div class="press-video pressbox blocks">
                	<?php if( $videoTitle != '') { ?>
                    <div class="ph-pad">
                    <h2><?php echo $videoTitle; ?></h2>
                   <?php if( $videoSubTitle != '') { ?>
                   <div class="press-subtitle"><?php echo $videoSubTitle; ?></div><?php } ?>
                   </div><!-- press header --><?php } ?>
                   <?php if($videoUrl != '') { 
				   //echo $videoUrl; 
				   echo wp_oembed_get($videoUrl);
				   } ?>
                   <div class="morevids"><a href="<?php echo $videoLink; ?>">more videos</a></div>
                </div><!-- press video -->
                
                <div class="press-design pressbox blocks">
                	<?php if( $designTitle != '') { ?>
                    <div class="ph-pad">
                    <h2><?php echo $designTitle; ?></h2>
                    <?php if( $designSubTitle != '') { ?>
                    <div class="press-subtitle"><?php echo $designSubTitle; ?></div><?php } ?>
                    </div><!-- press header --><?php } ?>
                    <a href="<?php echo $designlink; ?>" target="_blank">
                    	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                    </a>
                </div><!-- press video -->
                
                <div class="press-awards pressbox blocks">
                	<?php if( $awardsTitle != '') { ?>
                    <div class="ph-pad">
                    <h2><?php echo $awardsTitle; ?></h2>
                    <?php if( $awardsSubTitle != '') { ?>
                    <div class="press-subtitle"><?php echo $awardsSubTitle; ?></div><?php } ?>
                    </div><!-- press header --><?php } ?>
 						<?php if( have_rows('awards') ): ?>
                        <div class="press-award-box">
                        <?php
						 while ( have_rows('awards') ) :  the_row(); 
						 		$award = get_sub_field('award');
						 ?>
                         		<div class="press-award">
                                	<?php echo $award; ?>
                             </div><!-- press-award -->
                             
                          <?php endwhile; ?>
                          </div><!-- press award box -->
                         <?php endif; ?>
                </div><!-- press award -->
                
                <div class="press-houz pressbox blocks">
               
                	<?php if( $houzTitle != '') { ?>
                    <div class="ph-pad">
                    <h2><?php echo $houzTitle; ?></h2>
                    <?php if( $houzSubTitle != '') { ?>
                    <div class="press-subtitle"><?php echo $houzSubTitle; ?></div><?php } ?>
                    </div><!-- press header --><?php } ?>
                     <a href="<?php echo $houzzlink; ?>" target="_blank">
                     	<div class="press-houz-img"><img src="<?php echo $thumbH; ?>" /></div>
                    </a>
                </div><!-- press video -->
             
            <div class="pressspace"></div>
                
                
			<?php endwhile; // end of the loop. ?>
            
            
            <div class="clear"></div>
            
            <div class="wrapper">
            
            
            <div  class="doublebar">
                        <div class="bar-right"></div>
                        <div class="bar-left"></div>
                    </div><!-- double bar -->
                    
             <div class="press-latest-title">
             	<h2>As Seen In</h2>
                <div class="press-title-bar"></div>
             </div><!-- press-latest-title -->
             
              <div class="clear"></div>
             
             <?php 
			 $i=0;
          
				
				if ( have_rows('publications') ) : ?>
				<?php while ( have_rows('publications') ) : ?>
				<?php the_row(); 
					$pubimage = get_sub_field('publication');
                    $pubLink = get_sub_field('publication_link');
						$url = $pubimage['url'];
						$title = $pubimage['title'];
						$alt = $pubimage['alt'];
						$size = 'large';
        				$publication = $pubimage['sizes'][ $size ];
				$i++;
				if($i == 4) {
					$seenClass = 'seein-last';
					$i=0;	
				} else {
					$seenClass = 'seein-first';	
				}
				?>
				<div class="seenin <?php echo $seenClass; ?>">
                    <a href="<?php echo $pubLink; ?>"><img src="<?php echo $publication; ?>" /></a>
                </div><!-- seenin -->
                
                
                <?php endwhile; endif; ?>
            
            
             <div class="clear"></div>
            
                    <div  class="doublebar">
                        <div class="bar-right"></div>
                        <div class="bar-left"></div>
                    </div><!-- double bar -->
                    
             <div class="press-latest-title">
             	<h2>The Latest</h2>
                <div class="press-title-bar"></div>
                	
             </div><!-- press-latest-title -->
                    
              <?php
			  
			  $i = 0;
			  
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 3,
				'category__in' => array(871), // press
				//'category__not_in' => 46 // 'At the store'
			));
				if ($wp_query->have_posts()) : ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
					
					$i++;
					if( $i == 1 ) {
						$block = 'home-block-1';
					} elseif( $i == 2 ) {
						$block = 'home-block-2';
					} elseif( $i == 3 ) {
						$block = 'home-block-3';
					}
				
				?>
                
                <div class="home-block <?php echo $block; ?> shadow">
                	<a href="<?php the_permalink(); ?>">
                	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('portfolio-three');
						} ?>
                    	<h2 class="press"><?php the_title(); ?></h2>
                   </a>
                </div><!-- home block -->
                
                <?php endwhile; ?>
                <?php endif; ?>
                    
            </div><!-- wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>