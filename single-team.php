<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
			
			
			$jobtitle = get_field('title');
			$email = get_field('email');
			$funfact = get_field('fun_fact');
			// Get field Name
			$image = get_field('photo'); 
			$title = $image['title'];
			$alt = $image['alt'];
			$size = 'large';
			$thumb = $image['sizes'][ $size ];
			
			?>

			<?php if( $image != ''): ?>
            <div class="single-team-image">
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
                </div>
            <?php endif; ?>
				
                <div class="single-team-right">
                <header class="entry-header">
                	<h1 class="entry-title team-title"><?php the_title(); ?></h1>
                     <?php if( $email != '') { ?>
                    <div class="team-mail">
							<a href="mailto:<?php echo antispambot($email); ?>">
							  <?php echo antispambot($email); ?>
                          </a>
                    </div>
						<?php } ?>
                </header>
                
              <div class="clear"></div>
                
                <div class="entry-content">
                    
                    <?php if( $jobtitle != '') { ?>
                    <div class="team-jobtitle"><?php echo $jobtitle; ?></div>
                    <?php } ?>
                    
                   <?php the_content(); ?>
                    
                    <?php if( $funfact != '') { ?>
                    <div class="funfact"><?php echo $funfact; ?></div>
                    <?php } ?>
                    
                </div><!-- entry content -->
                 </div><!-- single team right -->

				

				

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
    <div class="clear"></div>
    
    <?php get_sidebar('team'); ?>
</div><!-- wrapper -->


<?php get_footer(); ?>