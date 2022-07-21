<?php

/**
 * Register Post Types
 * - Projects
 * - Videos
 * WordPress documentation: https://developer.wordpress.org/plugins/post-types/
 */

if ( ! function_exists( 'fix_no_editor_on_posts_page' ) ) {
	/**
	 * Add the wp-editor back into WordPress after it was removed in 4.2.2.
	 *
	 * @param $post
	 * @return void
	 */
	function fix_no_editor_on_posts_page( $post ) {
		if ( get_option( 'page_for_posts' ) !== $post->ID )
			return;

		remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
		add_post_type_support( 'page', 'editor' );
	}
	add_action( 'edit_form_after_title', 'fix_no_editor_on_posts_page', 0 );
}


// Projects
function arbc_faiths_cpt() {

	// CUSTOM POST TYPE
	register_post_type(
		'story',
		array(
			'labels' => array(
				'name' => 'Stories',
				'singular_name' => 'Story',
				'add_new_item' => 'Add New Story',
				'all_items' => 'All Stories',
				'edit_item' => 'Edit Story',
				'new_item' => 'New Story',
				'view_item' => 'View Story',
				'search_items' => 'Search Stories',
				'not_found' => 'No Stories found',
				'not_found_in_trash' => 'No Stories found in Trash',
			),
			'rewrite' => true,
			'hierarchical' => false,
			'public' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'menu_position' => 15,
			'menu_icon' => 'dashicons-edit',  // https://developer.wordpress.org/resource/dashicons
			'taxonomies' => array('category'),
			'show_in_nav_menus' => true,
			'supports' => array(
				'title',
				'editor',
				// 'thumbnail'
			)
		)
	);

}
add_action( 'init', 'arbc_faiths_cpt' );


function arbc_story_published_notification( $post_id ) {

	$email   = get_post_meta( $post_id, 'email' );
	$name    = get_post_meta( $post_id, 'display_name' )[0];
	$subject = get_field( 'subject', 'option' ) ?: $name . ', your story has been published!';

	$default_message = '
		Hi ' . $name . ',

		Your 100-Word Story, has just been published.

		See it at: ' . get_site_url() . '

		Thanks!';

	$message = get_field( 'message', 'option' ) ?: $default_message;

	wp_mail( $email, $subject, $message );

};
add_action( 'publish_story', 'arbc_story_published_notification', 10, 2 );


// add_action( 'init', function () {

	// Slides


// add_action( 'init', function () {

// 	// CUSTOM POST TYPE
// 	register_post_type( 'custom-post-type',
// 		array(
// 			'labels' => array(
// 				'name' => 'CUSTOM POST TYPE',
// 				'singular_name' => 'CUSTOM POST TYPE',
// 				'add_new_item' => 'Add New CUSTOM POST TYPE',
// 				'all_items' => 'All CUSTOM POST TYPE',
// 				'edit_item' => 'Edit CUSTOM POST TYPE',
// 				'new_item' => 'New CUSTOM POST TYPE',
// 				'view_item' => 'View CUSTOM POST TYPE',
// 				'search_items' => 'Search CUSTOM POST TYPE',
// 				'not_found' => 'No CUSTOM POST TYPE found',
// 				'not_found_in_trash' => 'No CUSTOM POST TYPE found in Trash',
// 			),
// 			'rewrite' => false,
// 			'hierarchical' => false,
// 			'public' => false,
// 			'publicly_queryable' => true,
// 			'show_ui' => true,
// 			'menu_position' => 5,
// 			'menu_icon' => 'dashicons-format-chat',  // https://developer.wordpress.org/resource/dashicons
// 			'capability_type' => 'custom-post-type',
// 			'taxonomies' => ['post_tag'],
// 			'show_in_nav_menus' => false,
// 			'supports' => array(
// 				'title',
// 				'editor'
// 			)
// 		)
// 	);

// } );

