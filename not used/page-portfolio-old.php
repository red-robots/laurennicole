<?php
/**
 * Template Name: Portfolio old
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
                <a  href="#" id="<?php echo $saniTitle ?>" >
                    <h2><?php the_title(); ?></h2>
                    <div class="clear"></div>
                   <h3>
                   <?php 
				   			$terms = get_the_terms( $post->ID, 'room_type' );
							$draught_links = array();

							foreach ( $terms as $term ) {
								$draught_links[] = $term->name;
							}
												
							$on_draught = join( ", ", $draught_links );
				  			
							 echo $on_draught; ?>
                   </h3>
                 </a>
             </div><!-- portfolio-hover -->
             
            
<div style='display:none'>   
<?php   
	/*-----------------------------------------------
  
  			Run the Repeater for the Gallery
   
  -----------------------------------------------*/
  if( have_rows('gallery') ): 
  	 while ( have_rows('gallery') ) :  the_row(); 
	 
        // Get field Name
       		$image = get_sub_field('image'); 
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'portsingle';
			$sizeLarge = 'large';
			$thumb = $image['sizes'][ $size ];
			$large = $image['sizes'][ $sizeLarge ];
		 
		 
		 ?>
         
        <div  class="portopen inline_<?php echo $saniTitle ?>">
                
                <div class="portopentitle">
                	<h2><?php echo $portTitle; ?></h2>
                </div><!-- portopentitle -->
                
                 <div class="portopen-img-center">
                     <div class="portopen-img">
                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
                     </div><!-- port open img -->
                 </div><!-- port open img center -->
                 
					 <?php if( $portDesc != '' ) : ?>
                         <div class="galler-description">
                         		<div class="galler-description-pad">
                            		<?php echo $portDesc; ?>
                         		</div><!-- gal desc -->
                         </div><!-- gal desc -->
                     <?php endif; ?>
                </div><!-- anchored div -->
           
        
        <?php endwhile; endif; // repeater ?>
         </div><!-- display none -->
         
         
    </div><!-- item -->
    <?php } ?>
    
<script type="text/javascript">

</script>
    
    <?php endwhile; ?>
    
    
    
    </div><!-- container -->
    
    
    
  <?php //echo do_shortcode('[ajax_load_more post_type="portfolio" pause="true" scroll="false"]'); ?>
    
    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar('portfolio'); ?>
 <script type="text/javascript">

jQuery(document).ready(function ($) { 

 <?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); 

	$portTitle = get_the_title(); 
	$portDesc = get_the_content();
	$saniTitle = sanitize_title($portTitle);
	$saniTitle = str_replace('-', '_', $saniTitle);
?>            
                var $<?php echo $saniTitle; ?>group = $('.inline_<?php echo $saniTitle; ?>').colorbox({
					   inline:true, 
					    width: '100%',
						innerWidth:'100%', 
						innerHeight:'100%'	,				   
						rel:'inline_<?php echo $saniTitle; ?>',
					   href: function(){
						return $(this).children();
				  }});
				   
				   $('#<?php echo $saniTitle; ?>').on('click', function(e){
						e.preventDefault();
						$<?php echo $saniTitle; ?>group.eq(0).click();
				  });
				  
				  <?php endwhile; ?>
});// END #####################################    END
</script>

<?php get_footer(); ?>