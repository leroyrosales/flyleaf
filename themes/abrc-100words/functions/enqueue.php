<?php

// Theme enqueues and dequeues

// Dequeue core jquery
// add_action( 'wp_enqueue_scripts', function(){
//   if (is_admin()) return; // don't dequeue on the backend
//   wp_dequeue_script( 'jquery' );
//   wp_deregister_script( 'jquery' );
// });

// Add theme styles to section buttons
add_action('admin_head', function() {

	$bg_primary = get_theme_mod('site_brand_colors_primary','#68584D');
	$bg_secondary = get_theme_mod('site_brand_colors_secondary','#A57835');
	$bg_tertiary = get_theme_mod('site_brand_colors_tertiary','#E2C6BA');
	$bg_light = get_theme_mod('site_brand_content_wrap_color','#eff3f5');

	echo '<style>
		input[value="bg-light"] {
			background-color: ' . $bg_light . '
		}
		input[value="bg-primary"] {
			background-color: ' . $bg_primary . '
		}
		input[value="bg-secondary"] {
			background-color: ' . $bg_secondary . '
		}
		input[value="bg-tertiary"] {
			background-color: ' . $bg_tertiary . '
		}
	</style>';
});

// Swiper Enqueues

function abrc_js_script() {

	wp_enqueue_script( 'swiper-bundle', '//unpkg.com/swiper/swiper-bundle.min.js', array(), false, true );
	wp_enqueue_script( 'arbc-scripts', get_template_directory_uri() . '/assets/dist/main.bundle.js', array(), false, true );

}
add_action( 'wp_enqueue_scripts', 'abrc_js_script' );

function misha_my_load_more_scripts() {

	global $wp_query; 

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/assets/dist/myloadmore.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

	wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );
