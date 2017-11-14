<?php
/**
 * Template Name: Portfolio Projects
 */

get_header(); ?>

	<div id="primary" class="">
		<div id="content" role="main">

<?php 
		
		$customPostType = 'portfolio';
		$customTax = 'project';
	
		$wp_query = new WP_Query();
		$wp_query->query(array(
	   'post_type'=> $customPostType,
	   'posts_per_page' => -1,
	   'order' => 'ASC',
	   'orderby' => 'date',
	   'paged' => $paged,
));
	if ($wp_query->have_posts()) :  ?>
    <div class="wrapper">
    <div id="the-filters">
    <div class="filter">
    	Filter By: 
        <?php if( is_page(16) ) { // portfolio
			$current = 'current';
		} else {
			$current = '';
		} ?>
        <li><a href="<?php bloginfo('url'); ?>/portfolio/">Room</a></li> 
    	 <li><a href="<?php bloginfo('url'); ?>/portfolio/projects/">Project</a></li>
    </div><!-- flilter -->
    
    <div class="clear"></div>
    
    <?php 
	
	// Create Filter buttons from all Categories that have posts 
		
		// create an array
		$filterLinks = array();
		// an empty array to add to our previous array
		$newarray = array();
		// Starter "Show All' Array
		$starter = array('name'=>'All','slug'=>'*', 'class'=> 'is-checked');
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
				$termlink = get_term_link($taxterm->slug,$customTax);
				// create some 
				  $newarray = array(
						'name' => $taxterm->name,
						'slug' => $datafilter,
						'class' => '',
						'link' => $termlink
						
				  );
				  
				  /*echo '<pre>';
				  print_r($taxterm);*/
				 // load it up 
				  $filterLinks[] = $newarray;
				
			 } // endforeach
			
		 } // if not empty 
		 
		/* echo '<pre>';
		 print_r($filterLinks);*/
		 
    // Filter Buttons output
	echo '<div id="filters-tax" class="button-group">' ."\n";
	// Create filter buttons from terms
		foreach ($filterLinks as $links) {
			
			// If there was an error, continue to the next term.
			if ( is_wp_error( $term_link ) ) {
				continue;
			}
			
			echo '<div class="button '.$links['class'].'" ><a href="' . $links['link'] . '">' . $links['name'] . '</a></div>'."\n";
		}
	echo '</div><!-- isotope filters --></div><!-- the filters --></div><!-- wrapper -->';
?> 
<?php //endif; // end loop for terms ?>	

	
<div id="container" class="theportfolio">

<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); 
$termargs = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => true, 
    'fields'            => 'all', 
    'slug'              => '',
); 

$terms = get_terms($customTax, $termargs);
	
	foreach ( $terms as $term ) {
		
	$portTitle = $term->name; 
	$image = get_field('featured_image', $customTax.'_'.$term->term_id);
	$size = 'portfolio-three';
    $thumb = $image['sizes'][ $size ];
	$title = $image['title'];
    $alt = $image['alt'];
	$thelink = get_bloginfo('url') . '/project/'.$term->slug;
	//$portDesc = get_the_content();
	//$saniTitle = sanitize_title($portTitle);
	//$saniTitle = str_replace('-', '_', $saniTitle);
?>
	
<?php
// Get the terms with each post
/*$terms = get_the_terms( $post->ID, $customTax );
						
if ( $terms && ! is_wp_error( $terms ) ) : 

	$cat_links = array();

	foreach ( $terms as $term ) {
		$cat_links[] = $term->slug;
	}
						
	$mycats = join( " ", $cat_links );
 endif;*/ ?>

<?php if ( $image != '' ) { ?>
    <div class="item portfolio <?php //echo $mycats; ?>">
    
       <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
					
            <div class="portfolio-hover">
                <a  href="<?php echo $thelink ?>"  >
                    <h2><?php echo $portTitle; ?></h2>
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
    <?php } // if post thumb ?>

    
    <?php } // foreach ?>
    
    
    <?php endwhile; ?>
    </div><!-- container -->
    <?php endif; ?>
    
    
    <?php  ?>

		</div><!-- #content -->
	</div><!-- #primary -->




<?php get_footer(); ?>