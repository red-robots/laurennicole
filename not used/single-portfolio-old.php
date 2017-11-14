<?php
/**
 * The Template for displaying all single Spaecs
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
                
                
          <div class="entry-content">   
          
          <?php 
		  		$content = get_the_content();
				
				if( $content != '' ) : 
		  ?>
          <div class="single-port-content">      
				<?php the_content(); ?>
          </div><!-- single port content -->
          <?php endif; ?>
   
<?php if( have_rows('gallery') ): ?>
<div id="container" class="singleportfolio">
	<?php while ( have_rows('gallery') ) : ?>
	<?php the_row(); 
			
			$image = get_sub_field('image'); 
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'portsingle';
			$sizeLarge = 'large';
			$thumb = $image['sizes'][ $size ];
			$large = $image['sizes'][ $sizeLarge ];
	?>
    
    
    	<div class="port-single item">
            <a href="<?php echo $large; ?>" class="gallery">
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
            </a>
        </div><!-- item -->
    
    
    <?php endwhile; ?>
    </div><!-- content -->
    <?php endif; ?>
            
            
            
       <?php endwhile;  // end of the loop. ?> 
        
 <div class="clear"></div>      
 

     
<div class="list-terms">
<h3>Room Type</h3>
<?php echo get_the_term_list( $post->ID, 'room_type', 'Room Type: ', ', ' ); ?>
<?php  
/* List all terms associated with a Custom Taxonomy  */
/*$terms = get_terms('room_type');
 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
     foreach ( $terms as $term ) {
       echo "<li>" . '<a href="' . get_term_link( $term ) . '">'  . $term->name . '</a>' . "</li>";
    }
 }*/ ?>
</div><!-- list terms -->  


<div class="list-terms">
<h3>Project Type</h3>
<?php echo get_the_term_list( $post->ID, 'project', 'Project Type: ', ', ' ); ?>
<?php  
/* List all terms associated with a Custom Taxonomy  */
/*$terms = get_terms('project');
 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
     foreach ( $terms as $term ) {
       echo "<li>" . '<a href="' . get_term_link( $term ) . '">'  . $term->name . '</a>' . "</li>";
    }
 } */?>
</div><!-- list terms -->   


</div><!-- entry content -->

    
    
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

<?php //get_sidebar(); ?>

</div><!-- wrapper -->

<?php get_footer(); ?>