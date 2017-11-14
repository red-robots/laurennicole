<?php
/**
 * The Template for displaying all single Spaecs
 *
 */

//wp_head(); ?>

 
<?php   
	/*-----------------------------------------------
  
  			Run the Repeater for the Gallery
   
  -----------------------------------------------*/
  if( have_rows('gallery') ):  while ( have_rows('gallery') ) :  the_row(); 
	 
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
		 
		 
		 ?>


    <div class="item portfolio <?php echo $mycats; ?>">

       <img src="<?php echo $thumb; ?>"  />
					
            <div class="portfolio-hover">
<a  href="<?php echo $large; ?>" class="gallery" <?php if($desc != '') {echo 'title="'.$desc.'"';} ?> id="<?php echo $saniTitle ?>" >
                    <h2><?php the_title(); ?></h2>
                    <div class="clear"></div>
                   <h3 class="plus">
                   <?php 
				   			/*$terms = get_the_terms( $post->ID, 'room_type' );
							$draught_links = array();

							foreach ( $terms as $term ) {
								$draught_links[] = $term->name;
							}
												
							$on_draught = join( ", ", $draught_links );
				  			
							 echo $on_draught;*/ 
							 /// change July 20, 2015 - change to "View Photos"
							 echo '+';
						?>
                   </h3>
                 </a>
             </div><!-- portfolio-hover -->
      </div><!-- item -->
      <?php endwhile; endif; // repeater ?>
    

<?php //wp_footer(); ?>

