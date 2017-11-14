<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="wrapper">
	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<div class="post-next">
                   
                   <div class="entry-content">
                        <h2><?php the_title(); ?></h2>
                        <div class="thedate"><?php echo get_the_date(); ?></div>
                    </div><!-- entry content -->
                    
               	<div class="post-next-thumb">
                	<?php if ( has_post_thumbnail() ) { //
						 		the_post_thumbnail('thumbnail'); 
						  } ?>
                	</div><!-- post next thumb -->
                    
                    <div class="post-next-right">
                    	<div class="entry-content">
                        	<?php the_excerpt(); ?>
                            <div class="post-next-readmore">
                            		<a href="<?php the_permalink(); ?>">View the Post</a>
                            </div><!-- post next readmore -->
                        </div><!-- entry content -->
                    </div><!-- post nxt right -->
                	
               </div><!-- post next -->

			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>