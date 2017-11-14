<?php
 // Enqueueing all the java script in a no conflict mode
 function ineedmyjava() {
	if ( !is_admin() ) {
 
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1');
		wp_enqueue_script('jquery');
		
		
		
		
		// Isotpope...
		wp_register_script(
			'vendors',
			get_bloginfo('template_directory') . '/assets/js/vendors.js',
			array('jquery') );
		wp_enqueue_script('vendors');

		// Homepage slider 'flexslider' scripts...
		wp_register_script(
			'custom',
			get_bloginfo('template_directory') . '/assets/js/custom.js',
			array('jquery') , '1.0'  );
		wp_enqueue_script('custom');
		
		
		
		
		// // Images loaded...
		// wp_register_script(
		// 	'imagesloaded',
		// 	get_bloginfo('template_directory') . '/js/images-loaded.js',
		// 	array('jquery') );
		// wp_enqueue_script('imagesloaded');
		
		// // Images loaded...
		// wp_register_script(
		// 	'swipebox',
		// 	get_bloginfo('template_directory') . '/js/swipebox.js',
		// 	array('jquery') );
		// wp_enqueue_script('swipebox');
		
		// // Equal heights div...
		// wp_register_script(
		// 	'blocks',
		// 	get_bloginfo('template_directory') . '/js/blocks.js',
		// 	array('jquery') );
		// wp_enqueue_script('blocks');
		
		// // Colorbox...
		// wp_register_script(
		// 	'colorbox',
		// 	get_bloginfo('template_directory') . '/js/colorbox.js',
		// 	array('jquery'), '1.0' , true  );
		// wp_enqueue_script('colorbox');
		
		// // Custom Theme scripts...
		// wp_register_script(
		// 	'custom',
		// 	get_bloginfo('template_directory') . '/js/custom.js',
		// 	array('jquery') );
		// wp_enqueue_script('custom');
		
	}
}
add_action('wp_enqueue_scripts', 'ineedmyjava');