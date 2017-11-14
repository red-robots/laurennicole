<?php
/**
 * Template Name: Services
 *
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="service-left">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				
                <header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                
                <div class="entry-content">
                <?php the_content();  ?>
                
                
                <?php 
					$bquote = get_field('blockquote'); 
					if($bquote != '') : ?>
                		<blockquote><?php echo $bquote; ?></blockquote>
                <?php endif; ?>
               
                
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<div class="service-right">
	<div class="process">	
    	<div class="process-top">
        </div><!-- process top -->
        
        <div class="process-mid">
        <div class="process-title-main"><h2>OUR PROCESS</h2></div>
        
        <?php 
		$num = 0;
		if( have_rows('process') ):  while ( have_rows('process') ) :  the_row(); 
				$num++;
				$stepTitle = get_sub_field('process_title');
				$stepDesc = get_sub_field('process_text');
			?>
            
            <div class="process-step">
            <div class="step-pad">
            	<div class="process-step-number">
                	<?php echo $num; ?>
            	</div><!-- process-step-number -->
                <div class="process-title"><?php echo $stepTitle; ?></div>
                <div class="process-desc"><?php echo $stepDesc; ?></div>
            </div><!-- -step pad -->
            </div><!-- process-step -->
            
            <?php endwhile; ?>
            <?php endif; ?>
            
            </div><!-- process mid -->
        
        <div class="process-bottom">
        </div><!-- process top -->
    </div> <!-- process -->
</div><!-- process right -->

<div class="clear"></div>

<?php 
// photo
	$image1 = get_field('left_photo');
	$title1 = $image1['title'];
	$alt1 = $image1['alt'];
	$size = 'services';
	$thumb1 = $image1['sizes'][ $size ];
	
	// photo
	$image2 = get_field('right_photo');
	$title2 = $image2['title'];
	$alt2 = $image2['alt'];
	$size = 'services';
	$thumb2 = $image2['sizes'][ $size ];


?>
<?php if( $image1 != '' ) : ?>
    <div class="service-left">
    	<img src="<?php echo $thumb1; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
    </div>
<?php endif; ?>
<?php if( $image2 != '' ) : ?>
    <div class="service-right">
    	<img src="<?php echo $thumb2; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"  />
    </div>
<?php endif; ?>

<div class="clear"></div>

<?php get_template_part('inc/subpages'); ?>
</div><!-- wrapper -->

<div class="clear"></div>



<?php get_footer(); ?>