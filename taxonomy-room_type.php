<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="primary" class="">
		<div id="content" role="main">

<?php 
		// Set CPT and Tax
		$customPostType = 'portfolio';
		$customTax = 'room_type';
		// Which term is being called
		$queried_object = get_queried_object();
		$currentTerm = $queried_object->term_id;
		

		
	
		/*$wp_query = new WP_Query();
		$wp_query->query(array(
	   'post_type'=> $customPostType,
	   'posts_per_page' => -1,
	   'paged' => $paged,
	 
));*/
	if (have_posts()) :  ?>
    <div class="wrapper">
    <div id="the-filters">
    <div class="filter">
    	Filter By: 
        <?php if( is_page(16) ) { // portfolio
			$current = 'current';
		} else {
			$current = '';
		} ?>
        <li><a href="<?php bloginfo('url'); ?>/portfolio/" class="active" >Room</a></li> 
    	 <li><a href="<?php bloginfo('url'); ?>/portfolio/projects/" >Project</a></li>
    </div><!-- flilter -->
    
    <div class="clear"></div>
    
    <?php 
	
	// Create Filter buttons from all Categories that have posts 
		// get current term first
		$queried_object = get_queried_object();
		$currentTerm = $queried_object->term_id; 
		// back to projects
		$projectsLink = get_bloginfo('url') . '/portfolio/projects/';
		// create an array
		$filterLinks = array();
		// an empty array to add to our previous array
		$newarray = array();
		// Starter "Show All' Array
		$starter = array('name'=>'All','slug'=>'*', 'class'=> '', 'link'=> $projectsLink);
		// put it into our array
		$filterLinks[] = $starter;
		//
		
		 $taxterms = get_terms( $customTax );
		 // loop through terms if not empty
		 if ( ! empty( $taxterms ) && ! is_wp_error( $taxterms ) ){
		
			 foreach ( $taxterms as $taxterm ) {
			  	// show all is a little different, so we add a "." to the others
				$datafilter = '.' . $taxterm->slug;
				// Term Link
				$termlink = get_term_link($taxterm->name,$customTax);
				// get class for is checked
				if( $taxterm->term_id == $currentTerm ) {
					$isChecked = 'is-checked';
				}
				
				  $newarray = array(
						'name' => $taxterm->name,
						'slug' => $datafilter,
						'class' => $isChecked,
						'link' => $termlink
						
				  );
				  
				  /*echo '<pre>';
				  print_r($taxterm);*/
				 // load it up 
				  $filterLinks[] = $newarray;
				
			 } // endforeach
			
		 } // if not empty 
		 
    // Filter Buttons output
	echo '<div id="filters-tax" class="button-group">' ."\n";
	// Create filter buttons from terms
		foreach ($filterLinks as $links) {
			echo '<div class="button '.$links['class'].'" ><a href="' . $links['link'] . '">' . $links['name'] . '</a></div>'."\n";
		}
	echo '</div><!-- isotope filters --></div><!-- the filters --></div><!-- wrapper -->';
?> 
		
<div id="container" class="theportfolio">

<?php while (have_posts()) : ?>
<?php the_post(); 

	$portTitle = get_the_title(); 
	$portDesc = get_the_content();
	$saniTitle = sanitize_title($portTitle);
	$saniTitle = str_replace('-', '_', $saniTitle);
?>
	
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
   

    
    <?php endwhile; ?>
    
    
    
    </div><!-- container -->
    
    
    
    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>