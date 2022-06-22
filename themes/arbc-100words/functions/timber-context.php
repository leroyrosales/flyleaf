<?php

/**
 * Filter Timber Context
 *
 * @param  array $context
 * @return array $context
 */
add_filter( 'timber_context', function ( $context ) {

	// Social Accounts
	$context['social_media_accounts'] = get_field( 'social_media_accounts', 'option' );

	// Is front page of site
	$context['is_front_page'] = is_front_page();

	$context['categories'] = get_categories( array( 'exclude' => 1 ) );

	// Multiple queries
	/******  The First Query *******/
	$first_stories = new WP_Query( array(
		'post_type'     => 'story',
		'post_per_page' => 20,
		'orderby'        => 'rand',
	) );
	
	$context['first_stories'] = new Timber\PostQuery( $first_stories );

	$exclude = wp_list_pluck( $first_stories->posts, 'ID' );
	
	/******  The Second Query *******/
	// $second_stories = array (
	// 	'post_type'     => 'story',
	// 	'post__not_in'  =>  $exclude, // Tell WordPress to Exclude these posts
	// 	'posts_per_page'  =>  20,
	// 	'orderby'        => 'rand',
	// );

	// $context['second_stories'] = new Timber\PostQuery( $second_stories );

	return $context;

} );
