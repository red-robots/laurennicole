<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="site-full">
		<div id="content" role="main">


<?php
$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 12,
	'category__not_in' => array(50), // not in Press
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
  <section class="blog">
    <?php while ($wp_query->have_posts()) : 
	$wp_query->the_post(); 
	$i++;
	
	// if( $paged > 1 ) {
	// 	$i = 2;
	// }
	
	
	//if( $i <= 1) : // show first post different 
	?>


  <div class="blogpost">
      <div class="image">
        <?php 
          if ( has_post_thumbnail()  ) {
            the_post_thumbnail('bigmedhard');
          } else {
             echo '<img src="';
             echo catch_that_image();
             echo '" alt="" />';
          }   
          ?>
      </div>
      <div class="content">
        <div class="entry-header">
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div><!-- entry header -->
        <div class="entry-content">
          <?php echo excerpt(20); ?>
        </div>
        <div class="read-more">
          <a href="<?php the_permalink(); ?>">READ MORE</a>
        </div>
      </div>
  </div>
  <!-- blogpost -->


                
                
			<?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
            <?php pagi_posts_nav(); ?>
            </section>
            <?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    <?php //get_sidebar('blog'); ?>
</div><!-- wrapper -->

<div class="wrapper">
<div class="listarchives">
<div class="entry-content">
<h2>Archives</h2>
</div>
<?php wp_get_archives(); ?>
</div><!-- listarchives -->
</div><!-- wrapper -->


<?php get_footer(); ?>