 <?php 
	
	// Post Url
	$permalink = get_permalink();
	// Short Link for Twitter
	$shortlink = wp_get_shortlink();
	// Post title
	$title = get_the_title();
	// Description
	$excerpt = get_the_excerpt();
	// Featured Image
	$thumb_id = get_post_thumbnail_id();
	// Large Image
	$image_large_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
	$image_large_url = $image_large_url_array[0];
	// Thumb Image
	//$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
	//$thumb_url = $thumb_url_array[0];
	
	/* 
		Facebook
	______________________ */
	// Url of app created on Facebook
	$Furl = 'https://www.facebook.com/dialog/feed?app_id=866447246780820';
	// Picture
	$picture = '&picture=' . $image_large_url;
	// title
	$name = '&name=' . $title;
	// Description
	$desc = '&description=' . $excerpt;
	// Redirect uri
	$redirect = '&redirect_uri=' . $permalink;
	// All together now...
	$facebook = $Furl . $picture . $name . $desc . $redirect;
	/* 
		Twitter
	______________________ */
	// Tweet Url
	$Turl = 'https://twitter.com/intent/tweet?';
	// Text
	$text = 'text=' . get_the_title();
	$postLink = '&url=' . $shortlink;
	$referer = '&original_referer=' . $permalink;
	// All together now...
	$twitter = $Turl . $text . $postLink . $referer;
	/* 
		Pintrest
	______________________ */
	$Purl = 'http://pinterest.com/pin/create/button/?url=' . $permalink;
	// Picture
	$Ptitle = '&description=' . $title;
	$media = '&media=' . $image_large_url;
	// All together now...
	$pintrest = $Purl . $media . $Ptitle . ' - Lauren Nicole Inc';
	
	
	?>
<div id="share-cont">
    <h3>Share</h3>
    <div id="share">
        <ul>
            <li class="facebook"><a href="<?php echo $facebook; ?>">Share on Facebook</a></li>
            <li class="twitter"><a href="<?php echo $twitter; ?>" target="_blank" data-related="LNI">Tweet on Twitter</a></li>
            <li class="pintrest"><a href="<?php echo $pintrest; ?>" target="_blank">Pin on Pintrest</a></li>
        </ul>
    </div><!-- share -->
</div><!-- share cont -->