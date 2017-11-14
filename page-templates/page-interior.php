<?php
/**
 * Template Name: Interior
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				
                <header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
                <div class="entry-content">
                <?php the_content(); ?>
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<div class="clear"></div>

<?php get_template_part('inc/subpages'); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>