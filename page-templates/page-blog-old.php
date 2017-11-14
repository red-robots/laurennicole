<?php
/**
 * Template Name: Blog Old
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="site-blog">
		<div id="content" role="main">


<?php
$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 4,
	'category__not_in' => array(50), // not in Press
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : 
	$wp_query->the_post(); 
	$i++;
	
	if( $paged > 1 ) {
		$i = 2;
	}
	
	
	if( $i <= 1) : // show first post different 
	?>
		<div class="post-first">
        
        <div class="entry-header">
        	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div><!-- entry header -->
        
          <div class="entry-content">
               
               <div class="thedate"><?php echo get_the_date(); ?></div>
               
               <div class="postterms">
			   		<?php the_terms( $post->ID, 'post_tag', '', ' | ' ); ?>
               </div><!-- post terms -->
               
                  
                <!--   <div class="featuredpost">
                   <?php if ( has_post_thumbnail()  ) {
							  the_post_thumbnail('large');
							} else {
							   echo '<img src="';
								 echo catch_that_image();
								 echo '" alt="" />';
							}   ?>
                   </div> featuredpost -->
						  
                          <div class="clear"></div>
                          
                         <?php the_content(); ?>
                         
                         <?php get_template_part('inc/share'); ?>
                         
                         <div class="post-next-readmore">
                         		<a href="<?php the_permalink(); ?>#respond">leave a comment</a>   
							</div><!-- leaveareply -->
                         <div class="comment-count"><?php comments_number(); ?></div>
                         
           </div><!-- entry content -->
           
       </div><!-- post firsr -->
               
               <?php else: // else show the next after 4 ?>
               
               <div class="post-next">
                   
                   <div class="entry-header">
                   	<h2 class="entry-title"><?php the_title(); ?></h2>
                   </div><!-- entry header -->
                   
                   <div class="entry-content">
                        <div class="thedate"><?php echo get_the_date(); ?></div>
                    </div><!-- entry content -->
                    
               	<div class="post-next-thumb">
                	<?php if ( has_post_thumbnail() ) {
							  the_post_thumbnail('portfolio-three');
							} else {
							    echo '<img src="';
								 echo catch_that_image();
								 echo '" alt="" />';
							}   ?>
                	</div><!-- post next thumb -->
                    
                    <div class="post-next-right">
                    	<div class="entry-content">
                        	<?php the_excerpt(); ?>
                            <div class="post-next-readmore">
                            		<a href="<?php the_permalink(); ?>">View the Post</a>
                            </div><!-- post next readmore -->
                        </div><!-- entry content -->
                    </div><!-- post nxt right -->
                	
               </div><!-- post next -->
               
               <?php endif; ?>
                
                
			<?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
            <?php pagi_posts_nav(); ?>
            <?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    <?php get_sidebar('blog'); ?>
</div><!-- wrapper -->

<div class="wrapper">
<div class="listarchives">
<div class="entry-content">
<h2>Archives</h2>
</div>
<?php wp_get_archives(); ?>
</div><!-- listarchives -->
</div><!-- wrapper -->


<?php get_footer(); ?>