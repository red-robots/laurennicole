<h3 class="theteam">The Team</h3>

<div  class="doublebar">
        <div class="bar-right"></div>
        <div class="bar-left"></div>
</div><!-- double bar -->

<div id="secondary" class="teammembers" role="complementary">
<?php
	$i = 0;
	// Reset before new query
	wp_reset_query();

	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team',
	'posts_per_page' => -1,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
	
	// Get field Name
			$image = get_field('photo'); 
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'large';
			$thumb = $image['sizes'][ $size ];
			$jobtitle = get_field('title');
			// counter
			$i++;
			if( $i == 3 ) {
				$sideClass = 'sidelast';	
				$i = 0;
			} else {
				$sideClass = 'sideother';	
			}
	?>	
    
    <div class="side-team <?php echo $sideClass; ?>">
        <a href="<?php the_permalink(); ?>">
        <div class="side-team-member">
        	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
        </div><!-- side team member -->
        	<div class="side-team-right">
            <h2><?php the_title(); ?></h2>
            <div class="jobtitle"><?php echo $jobtitle ?></div>
            </div><!-- side team hover -->
        </a>
    </div><!-- side team -->
    
    
<?php endwhile; ?>
<?php endif; ?>
</div><!-- #secondary -->
