<div id="secondary" class="widget-blog" role="complementary">
<?php 
	
	// Query blog
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'page',
	'page_id' => 20
));
	if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) :  $wp_query->the_post(); 
	
	$aboutLauren = get_field('about_lauren');
	// photo
	$image = get_field('photo');
	$title = $image['title'];
	$alt = $image['alt'];
	$size = 'medium';
	$thumb = $image['sizes'][ $size ];
	//
	$pageLink = get_field('learn_more'); 
	
	endwhile; endif; ?>	
<div class="widget">
<h2>About Lauren</h2>
    <div class="aboutlauren">
    	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
    </div><!-- aboutlauren -->
    <p><?php echo $aboutLauren; ?></p>
    <div class="post-next-readmore">
    	<a href="<?php echo $pageLink; ?>">Learn More</a>
    </div><!-- about laurent learn -->
</div><!-- widget -->
    
    <?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
        <div class="widget">
        	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
        </div><!-- widget -->
    <?php endif; ?>
    
    
</div><!-- #secondary -->
	