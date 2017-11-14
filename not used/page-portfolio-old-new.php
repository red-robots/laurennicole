<?php
/**
 * Template Name: Portfolio Old
 */

get_header(); ?>

	<div id="primary" class="">
		<div id="content" role="main">

<?php 
		
		$customPostType = 'portfolio';
		if( is_page(16) ) { // portfolio
       		$customTax = 'room_type';
		} else {
			$customTax = 'project';
		}
		$wp_query = new WP_Query();
		$wp_query->query(array(
	   'post_type'=> $customPostType,
	   'posts_per_page' => -1,
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
		
		 $taxterms = get_terms( $customTax );
		 // loop through terms if not empty
		 if ( ! empty( $taxterms ) && ! is_wp_error( $taxterms ) ){
		
			 foreach ( $taxterms as $taxterm ) {
			  	// show all is a little different, so we add a "." to the others
				$datafilter = '.' . $taxterm->slug;
				// create some 
				  $newarray = array(
						'name' => $taxterm->name,
						'slug' => $datafilter,
						'class' => ''
				  );
				 // load it up 
				  $filterLinks[] = $newarray;
				
			 } // endforeach
			
		 } // if not empty 
		 
    // Filter Buttons output
	echo '<div id="filters" class="button-group">' ."\n";
	// Create filter buttons from terms
		foreach ($filterLinks as $links) {
			echo '<button class="button '.$links['class'].'" data-filter="' . $links['slug'] . '">' . $links['name'] . '</button>'."\n";
		}
	echo '</div><!-- isotope filters --></div><!-- the filters --></div><!-- wrapper -->';
?> 
		
<div id="container" class="theportfolio">

<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); 

	$portTitle = get_the_title(); 
	$portDesc = get_the_content();
	$saniTitle = sanitize_title($portTitle);
	$saniTitle = str_replace('-', '_', $saniTitle);
?>
	
<?php
// Get the terms with each post
$terms = get_the_terms( $post->ID, $customTax );
						
if ( $terms && ! is_wp_error( $terms ) ) : 

	$cat_links = array();

	foreach ( $terms as $term ) {
		$cat_links[] = $term->slug;
	}
						
	$mycats = join( " ", $cat_links );
?>


<?php endif; ?>

<?php if ( has_post_thumbnail() ) { ?>
    <div class="item portfolio <?php echo $mycats; ?>">
       <?php the_post_thumbnail('portfolio-three'); ?>
					
            <div class="portfolio-hover">
                <a  href="<?php the_permalink(); ?>" class="ajax" id="<?php echo $saniTitle ?>" >
                    <h2><?php the_title(); ?></h2>
                    <div class="clear"></div>
                   <h3>
                   <?php 
				   			/*$terms = get_the_terms( $post->ID, 'room_type' );
							$draught_links = array();

							foreach ( $terms as $term ) {
								$draught_links[] = $term->name;
							}
												
							$on_draught = join( ", ", $draught_links );
				  			
							 echo $on_draught;*/ 
							 /// change July 20, 2015 - change to "View Photos"
							 /*$args = array( 'posts_per_page' => -1 );

							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
								<li>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>
							<?php endforeach; 
							wp_reset_postdata();*/
							 echo 'view photos';
						?>
                   </h3>
                 </a>
             </div><!-- portfolio-hover -->
             
            

         
         
    </div><!-- item -->
    <?php } ?>

    
    <?php endwhile; ?>
    
    
    
    </div><!-- container -->
    
    
    
    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->




<?php get_footer(); ?>