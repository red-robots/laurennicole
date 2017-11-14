<?php
/**
 * The template for displaying Category pages
 *
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php 
// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
?>
<h1>Posts with the term: <?php echo get_queried_object()->name; ?></h1>
 
<?php //Get the correct taxonomy ID by id
$term = get_term_by( 'id', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
 
<?php // use the term to echo the description of the term 
echo term_description( $term, $taxonomy ); 
 
 


?> 
 
<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'attachment',
	'post_status' => 'inherit',
	'posts_per_page' => 10,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
 
    <?php $wp_query->the_post(); ?>	
 
<div class="post">
<h2><?php the_title(); ?></h2>

<?php 
//echo '<pre>';
//print_r($wp_query); 

$id = get_the_ID(); 
//echo $id;
?>
<a href="<?php the_permalink(); ?>">
<img src="<?php echo wp_get_attachment_url($id); ?>" />
</a>




 
<div class="meta">
<?php 
/* The post may be associated with other taxonomy terms
	echo the others ... 
 */
$custom_tax = get_the_term_list( $post->ID, 'space_type', '<li>', '', '</li>'); ?>  
<?php echo $custom_tax ?>
</div><!-- meta -->
 
</div><!-- post -->
 
 
<?php endwhile;  ?>
<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>