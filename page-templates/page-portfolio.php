<?php
/**
 * Template Name: Portfolio
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
	   'order' => 'ASC',
	   'orderby' => 'date',
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
	$i++;
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
       
       
<?php   
	/*-----------------------------------------------
  
  			Run the Repeater for the Gallery
   
  -----------------------------------------------*/
  
$rows = get_field('gallery');
$row_count = count($rows);
 $i = 0;
  if( have_rows('gallery') ):  
  while ( have_rows('gallery') ) :  the_row(); 
  // set to match number of rows
  $i++;
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
  
  // Then run the lightbox group BUT minus 1 to not duplicate from the one loaded on click
  //if( $i != $row_count ) :
  if( $i == 1 ) : // set the first link for the photo group
  ?>   
  			<div class="portfolio-hover">
                <a  href="<?php echo $large; ?>" 
                class="gal-<?php echo $saniTitle; ?>"
                <?php echo 'title="'.$portTitle.'"'; ?>
                  >
                    <h2><?php the_title(); ?></h2>
                    <div class="clear"></div>
                   <h3>
                   <?php echo 'view photos'; ?>
                   </h3>
                 </a>
             </div><!-- portfolio-hover -->
             
			 
			 <?php else:  // else display the rest of the group. ?>
             
             
             <a  href="<?php echo $large; ?>" 
             	class="gal-<?php echo $saniTitle; ?>" 
				 <?php if($desc != '') {
                     		echo 'title="'.$portTitle.' - '.$desc.'"';
                     }else{
                         echo 'title="'.$portTitle.'"';
                    } ?> 
                id="<?php echo $saniTitle ?>" ></a>
             
  <?php endif; // end row count check ?>
  <?php endwhile; endif; // end repeater ?>
					
     <?php if( $row_count > 1 ) { ?>
     <div class="mobile-view-photos"><?php echo 'View Photos ('.$row_count.')'; ?></div>  
     <?php } ?>     
             
</div><!-- item -->
    <?php } ?>

    
    <?php endwhile; ?>
    
    
    
    </div><!-- container -->
    
    
    
    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<script type="text/javascript">
 
jQuery(document).ready(function ($) { 
 
 <?php 
 // Group by term
$customPostType = 'portfolio';
//$customTax = 'room_type';
		$wp_query = new WP_Query();
		$wp_query->query(array(
	   'post_type'=> $customPostType,
	   'posts_per_page' => -1,
	   'paged' => $paged,
));
	if ($wp_query->have_posts()) :
	while ($wp_query->have_posts()) :  $wp_query->the_post(); 

	$portTitle = get_the_title(); 
	$saniTitle = sanitize_title($portTitle);
	$saniTitle = str_replace('-', '_', $saniTitle);
?>   
	$('a.gal-<?php echo $saniTitle; ?>').colorbox({
		rel:'gal-<?php echo $saniTitle; ?>',
		width: '100%', 
		height: '100%',
		current: "{current}/{total}"
	});         
<?php endwhile; endif; ?>
});// END #####################################    END
</script>


<?php get_footer(); ?>