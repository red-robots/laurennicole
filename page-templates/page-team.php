<?php
/**
 * Template Name: Meet the Team
 */

get_header(); 

// get background image
$background = get_field('background_image');
?>

<div class="background-image" style="background-image:url(<?php echo $background; ?>);">
<div class="background-cover"></div>

<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
            
            
            <div class="entry-content">
                
<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team',
	'posts_per_page' => -1,
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));
	if ($wp_query->have_posts()) : 
	
	$count = 0;
	
	 while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); 
	
		$name = get_the_title();
		$jobtitle = get_field('title');
		// Get field Name
		$image = get_field('photo'); 
		$title = $image['title'];
		$alt = $image['alt'];
		$size = 'portfolio-three';
		$thumb = $image['sizes'][ $size ];
		
		$count++;
		
		if( $count == 3 ) {
			$class = 'third-team';
			$count =0;	
		} else {
			$class = 'first-team';
		}
	?>
    
    
    <div class="team-member <?php echo $class; ?>">
        <a href="<?php the_permalink(); ?>">
            <?php if( $image != ''): ?>
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
            <?php endif; ?>
            <div class="team-hover">
            	<div class="team-hover-learn">Learn More</div>
            </div><!-- team hover -->
            <div class="team-content">
                <h2><?php echo $name; ?></h2>
                	<div class="green-border"></div>
                <p><?php echo $jobtitle; ?></p>
            </div><!-- team content -->
        </a>
    </div><!-- team cont -->
    
    
    <?php endwhile; ?>
    <?php endif; ?>
                            
           </div><!-- entry content -->
                
                
			

		</div><!-- #content -->
	</div><!-- #primary -->
    
    <div class="clear"></div>


</div><!-- wrapper -->
</div><!-- background-image -->

<div class="wrapper">
	<?php //get_template_part('inc/subpages'); ?>
</div><!-- wrapper -->

<?php get_footer(); ?>