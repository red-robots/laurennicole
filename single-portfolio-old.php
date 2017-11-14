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
  if( have_rows('gallery') ):  ?>
  <div  class="portopen inline_<?php //echo $saniTitle ?>">
                
                <div class="portopentitle">
                	<h2><?php the_title() ?></h2>
                </div><!-- portopentitle -->
                
                <div class="flexsliderport">
                <ul class="slides">
                
  	<?php while ( have_rows('gallery') ) :  the_row(); 
	 
        // Get field Name
       		$image = get_sub_field('image'); 
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'large';
			//$sizeLarge = 'large';
			$thumb = $image['sizes'][ $size ];
			//$large = $image['sizes'][ $sizeLarge ];
		 
		 
		 ?>
         
        <li>
        <div class="portslider">
           <img src="<?php echo $thumb; ?>"  />
           </div>
        </li>
        
        <?php endwhile; ?>
        </ul></div><!-- flexslider -->
		</div><!-- anchored div -->
		<?php endif; // repeater ?>
    

<?php //wp_footer(); ?>

<script>
$(document).ready(function() {
    fixFlexsliderHeight();
});

$(window).load(function() {
    fixFlexsliderHeight();
});

$(window).resize(function() {
    fixFlexsliderHeight();
});

function fixFlexsliderHeight() {
    // Set fixed height based on the tallest slide
    $('.flexsliderport').each(function(){
        var sliderHeight = 0;
        $(this).find('.slides > li').each(function(){
            slideHeight = $(this).height();
            if (sliderHeight < slideHeight) {
                sliderHeight = slideHeight;
            }
        });
        $(this).find('.flexsliderport .flex-viewport').css({'height' : sliderHeight});
    });
}
</script>