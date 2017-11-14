<?php
/**
 * The Template for displaying all single Spaecs
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				
                
                
          <div class="entry-content">      
          <h1><?php the_title(); ?></h1>      
				<?php the_content(); ?>
            
            
       <?php endwhile;  // end of the loop. ?>      

    <h2>Photos Related to this Space</h2>
    </div><!-- entry content -->
    
    <?php
	
	$photos = get_posts(array(
		'post_type'=>'attachment',
		'post_status' => 'inherit',
		'meta_query' => array(
			array(
				'key' => 'space_relationship', // name of custom field
				'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	));
	//echo get_the_ID();
//echo '<pre>';
//print_r($photos);
	?>
	<?php if( $photos ): ?>
		<ul>
		<?php foreach( $photos as $photo ): ?>
			<?php 
			//$id = get_the_ID(); 
			//echo '<pre>';
			//print_r($photo);
			//$thephoto = get_field('photo', $photo->ID);

			?>
			<li>
				<a href="<?php echo get_permalink( $photo->ID ); ?>">
					<img src="<?php echo wp_get_attachment_url($photo->ID); ?>" alt="<?php //echo $thephoto['alt']; ?>"  />
					<?php //echo get_the_title( $photo->ID ); ?>
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
        <?php else: ?>
        no photos related
	<?php endif;  ?>
    
    
     <?php
	
	$testimonials = get_posts(array(
		'post_type'=>'testimonials',
		'post_status' => 'published',
		'meta_query' => array(
			array(
				'key' => 'related_projects', // name of custom field
				'value' => '"' . get_the_ID() . '"', 
				'compare' => 'LIKE'
			)
		)
	));
	?>
	<?php if( $testimonials ): 
			
	?>
		<div class="testimonials">
        <h3>Testimonials</h3>
		<?php foreach( $testimonials as $testimonial ): 
			
			// Test for fields
			/*echo '<pre>';
			print_r($testimonial);*/
			
			$signed = get_field('signed', $testimonial->ID);
			$theTitle = get_the_title( $testimonial->ID );
			$theContent = $testimonial->post_content; 
		?>
			<div class="testimonial">
            <div class="testimonial-pad">
            <?php echo $theContent; ?>
            <?php if ( $signed != '' ) : ?>
            	<div class="signed"><?php echo '- '.$signed ?></div><!-- signed -->
            <?php endif; ?>
        </div><!-- testimonial pad -->
        </div><!-- testimonial -->
		<?php endforeach; ?>
		</div><!-- testimonials -->
        <?php else: ?>
        no testimonials
	<?php endif; ?>   

    
    
   
  
            
            

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>