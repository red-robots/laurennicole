<?php 
$id = get_the_ID();
//echo $id;
if(is_tree(2)) {
	$parent = 2;
	$ptitle = 'About Us';
} elseif(is_tree(14)) {
	$parent = 14;
	$ptitle = 'Interior Design Services';
}
?>

<?php if( !in_array( $id, array(2,14) )) : ?>
	<h3 class="theteam"><?php echo $ptitle; ?></h3>
<?php endif; ?>

<?php if(!is_tree(2)) : ?>
<div  class="doublebar">
        <div class="bar-right"></div>
        <div class="bar-left"></div>
</div><!-- double bar -->
<?php endif; ?>

<?php
/*
*		Get the Child pages if you have any.
*
*
*/
//$children = get_pages('child_of='.$post->ID);

?>

<div class="list-sub-pages">
<?php 	
	$mypages = get_pages( array( 
	'child_of' => $parent,//$post->ID, 
	'sort_column' => 'menu_order', 
	'sort_order' => 'asc' ,
	//'exclude' => '96',
	));
	
	foreach( $mypages as $page ) { ?>	
    
    <?php
	//echo $page->ID;
		$name = get_the_title();
		/*$jobtitle = get_field('title');
		// Get field Name
		$image = get_field('photo'); 
		$title = $image['title'];
		$alt = $image['alt'];
		$size = 'portfolio-three';
		$thumb = $image['sizes'][ $size ];*/
		$intro = get_field('intro_text',$page->ID);
		
		// counter
			$i++;
			if( $i == 3 ) {
				$sideClass = 'sidelast';	
				$i = 0;
			} else {
				$sideClass = 'sideother';	
			}
			
			// if about page
			if(is_tree(2)) {
				$width = 'side-team-full';
				$sideteamright = 'side-team-right-full';
			}else{
				$width = 'side-team';
				$sideteamright = 'side-team-right';
			}
	?>
    
    
    
	<div class="<?php echo $width; ?> <?php echo $sideClass; ?>">
    <a href="<?php echo get_page_link( $page->ID ); ?>">
    <?php 
	$thumb = get_the_post_thumbnail( $page->ID ); 
		if ( $thumb != '' ) { ?>
       <div class="side-team-member">
			<?php echo $thumb ?>
            </div>
		<?php } 
		?>
           <div class="<?php echo $sideteamright; ?>">
            <h2><?php echo $page->post_title; ?></h2>
            <div class="jobtitle"><?php echo $intro ?></div>
            </div><!-- side team hover -->
        </a>
    </div><!-- team cont -->
    
    
    
    
    
	<?php } // end for each ?>
    
    
    
    
    
    
    </div><!-- list sub pages -->
<?php //endif; ?> 
	
