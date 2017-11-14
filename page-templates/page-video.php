<?php
/**
 * Template Name: Videos
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
				$i = 0;
				if (have_rows('videos')) : while (have_rows('videos')) : the_row();
				
						/* Fields */
						$videoTitle = get_sub_field('video_title');
						$which = get_sub_field('youtube_or_vimeo');
						// are we dealing with a url or embed
						if ( $which == 'Yes' ) {
							$videoUrl = get_sub_field('video_url');
							$video = wp_oembed_get( $videoUrl );
						} elseif ($which == 'No' ) {
							$video = get_sub_field('video_embed');
						}
						$videoLink = get_sub_field('link');
						$i++;
						if( $i == 3 ) {
							$vidClass = 'videolast';
							$i = 0;
						} else {
							$vidClass = 'videofirst';
						}
						
				?>
                
                <div class="press-video-page pressbox <?php echo $vidClass; ?> blocks">
                	<?php if( $videoTitle != '') { ?>
                    <div class="ph-pad">
                    <h2><?php echo $videoTitle; ?></h2>
                   <?php if( $videoSubTitle != '') { ?>
                   <div class="press-subtitle"><?php echo $videoSubTitle; ?></div><?php } ?>
                   </div><!-- press header --><?php } ?>
                   <?php if($video != '') { echo $video; } ?>
                   <div class="morevids"><a href="<?php echo $videoLink; ?>">&raquo;</a></div>
                </div><!-- press video -->
                
               
               <?php endwhile; endif; ?> 
              
             
            <div class="pressspace"></div>
                
                
			<?php endwhile; // end of the loop. ?>
            
            
            <div class="clear"></div>
            
   

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>