<?php
/**
 * Template Name: Events
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="site-blog">
		<div id="content" role="main">


<?php
	$today = date("Ymd");
	
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'events',
	'posts_per_page' => 10,
	'paged' => $paged,
	//'meta_key' => 'event_date', // Date picker Custom Field "start_date"
    //'meta_value' => 'event_date', // set a value to compare your date with
    //'meta_compare' => '>', // Greater than
    'orderby' => 'event_date', // order by date
    'order' => 'ASC' // Order Ascending 
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : 
	$wp_query->the_post(); 
	
				$eventDate = DateTime::createFromFormat('Ymd', get_field('event_date'));
				$rsvp = DateTime::createFromFormat('Ymd', get_field('rsvp_date'));
				$locationName = get_field('location_name');
				$location = get_field('event_location');
				$address = explode( ',' , $location['address']);
				$eventTime = get_field('event_time');
				$contactEmail = get_field('contact_email');
				$pdf = get_field('pdf');
				$externalLink = get_field('external_link');
				$form = get_field('pick_a_form');
				$choice = get_field('choice');
				if ( $choice == 'PDF' ) {
					$link = $pdf;	
				} elseif ( $choice == 'External Link' ) {
					$link = $externalLink;	
				}
	
	?>
          <div class="post-next">
                   
                   <div class="entry-header">
                   	<h2 class="entry-title"><?php the_title(); ?></h2>
                   </div><!-- entry header -->
                   
                  
                    
               	<div class="post-next-thumb">
                	<?php 
						if ( has_post_thumbnail() ) {
							  the_post_thumbnail('portfolio-three');
							} else  {
							    echo '<img src="';
								 echo catch_that_image();
								 echo '" alt="" />';
							} ?>
                	</div><!-- post next thumb -->
                    
                    <div class="post-next-right">
                    	<div class="entry-content">
                        	<?php the_excerpt(); ?>
                            
                            
                            <?php if( $eventDate != '' ) { ?>
                        <div class="eventlist">DATE:</div>
                        <div class="event-item"><?php echo $eventDate->format('M d');; ?></div><!-- envent date -->
                    <?php } ?>
                    
                    <?php if( $eventTime != '' ) { ?>
                    	<div class="eventlist">TIME:</div>
                        <div class="event-item"><?php echo $eventTime; ?></div><!-- envent date -->
                    <?php } ?>
                    
                    <?php if( $location != '' ) { ?>
                    <div class="eventlist">LOCATION:</div>
                        <div class="event-item">
								<?php echo $address[0] . '<br>';
										echo $address[1] . ', ' . $address[2] . '<br>'; ?>
                                <?php if( $location != '' ) { ?>
                                    <a class="directions" href="https://maps.google.com?daddr=<?php echo $location['address']; ?>" target="_blank">
                                            get directions</a>
                                <?php } ?>
                         </div><!-- envent date -->
                    <?php } ?>
                            
                            <div class="clear pressspace"></div>
                            
                            <div class="post-next-readmore">
                            		<a href="<?php the_permalink(); ?>">View the Event</a>
                            </div><!-- post next readmore -->
                        </div><!-- entry content -->
                    </div><!-- post nxt right -->
                	
               </div><!-- post next -->
               
       
                
                
			<?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
            <?php pagi_posts_nav(); ?>
            <?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    <?php get_sidebar('blog'); ?>
</div><!-- wrapper -->




<?php get_footer(); ?>