<?php 
// Query the Post type Slides
$queryterms = array(
	'post_type' => 'page',
	'page_id' => '50'
);
// The Query
$the_query = new WP_Query( $queryterms );
?>
<?php 
// The Loop
 if ( $the_query->have_posts()) :  while ( $the_query->have_posts() ) :  $the_query->the_post();
 echo '<div class="entry-content">';
 echo '<h1>'.the_title().'</h1>';
	the_content();
	echo '</div>';
endwhile;  endif;  wp_reset_postdata(); ?>
