<?php wp_reset_query(); ?>

<div id="secondary" class="widget-area" role="complementary">

<div class="widget">
<h3 class="widget-title">Spaces</h3>
<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'spaces',
	'posts_per_page' => 10,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <ul>
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>
    
    	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        
    <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</div><!-- widget -->
    
</div><!-- #secondary -->