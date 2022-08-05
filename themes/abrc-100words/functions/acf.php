<?php

// Prevent frontend errors if ACF inactive
if ( !is_admin() && !function_exists('get_field') ) {

	function get_field($key) {
			return get_post_meta(get_the_ID(), $key, true);
	}

}

if ( current_user_can('activate_plugins') ) {

	// Adds Site Configuration options menu
	if ( function_exists( 'acf_set_options_page_menu' ) ) {
		acf_add_options_page(
			array(
				'page_title' => __( 'Site Configuration' ), 
				'menu_title' => __( 'Configuration' ), 
				'menu_slug' => 'configuration', 
				'capability' => 'edit_others_posts', 
				'redirect' => false
			)
		);
	}

}


function hide_custom_class_field( $field ) {

  // Hide the ACF field is user is not admin
  if ( ! current_user_can( 'activate_plugins' ) ) {
    return false;
  }

	return $field;
	
}
// Details Box classes field
add_filter( 'acf/prepare_field/key=field_5ef608e2e4156', 'hide_custom_class_field' );

// Media Showcase classes field
add_filter( 'acf/prepare_field/key=field_5ef60a0fe4157', 'hide_custom_class_field' );

// Promo Repeater classes field
add_filter( 'acf/prepare_field/key=field_5ef60a34e4158', 'hide_custom_class_field' );

// Tab Box classes field
add_filter( 'acf/prepare_field/key=field_5ef60a40e4159', 'hide_custom_class_field' );

// WYSIWYG Custom classes field
add_filter( 'acf/prepare_field/key=field_5ef60a47e415a', 'hide_custom_class_field' );
