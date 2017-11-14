<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
				
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

				
                <header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
                <div class="entry-content">
                
                	<?php the_content(); ?>
                
					<?php if( $eventDate != '' ) { ?>
                        <div class="eventlist">DATE:</div>
                        <div class="event-item"><?php echo $eventDate->format('M d'); ?></div><!-- envent date -->
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
                    
                    <?php if( $choice != 'None' ) { ?>
                        <div class="post-next-readmore">
                            <a href="<?php echo $link; ?>">MORE INFORMATION</a>
                        </div><!-- post-next-readmore -->
                    <?php } ?>
                    
                    <div class="clear"></div>
                    
                    <?php if( $contactEmail != '' ) { ?>
                        Email: 
                        <a href="mailto:<?php echo antispambot($contactEmail); ?>">
                                <?php echo antispambot($contactEmail); ?>
                        </a>
                        <?php 
						if($rsvp != '') {
							echo '  to RSVP by ' . $rsvp->format('M d'); 
						} ?> 
                    <?php } ?>
                    
                    <div class="clear"></div>
                    
                    <?php if( $form != '' ) { ?>
                    	<?php echo do_shortcode('[gravityform id="' . $form['id'] . '" title="true" description="true" ajax="true"]'); ?>
                    <?php } ?>
                
               		
                    
                    
                </div><!-- entry content -->
                
                <?php get_template_part('inc/share'); ?>

			

				<?php //comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>