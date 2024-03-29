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

	// Slider timer
	$context['slider_duration'] = get_field( 'slider_duration', 'option' );

	// Is front page of site
	$context['is_front_page'] = is_front_page();

	$context['categories'] = get_categories( array( 'exclude' => 1 ) );

	// Multiple queries
	/******  The First Query *******/
	$first_stories_arr = array(
		'post_type'     => 'story',
		'post_per_page' => 10,
		'orderby'       => 'rand',
	);

	$first_stories = new Timber\PostQuery( $first_stories_arr );

	$context['first_stories'] = $first_stories;

	$exclude = wp_list_pluck( $first_stories, 'ID' );

	/******  The Second Query *******/
	$second_stories_arr = array(
		'post_type'      => 'story',
		'post__not_in'   => $exclude, // Tell WordPress to Exclude these posts
		'posts_per_page' => 10,
		'orderby'        => 'rand',
	);

	$second_stories = new Timber\PostQuery( $second_stories_arr );

	$context['second_stories'] = $second_stories;


	$combined_stories = new WP_Query();
	$combined_stories->posts = array_merge(
		json_decode( json_encode( $first_stories ), true ),
		json_decode( json_encode( $second_stories ), true )
	);

	$exclude_more = wp_list_pluck( $combined_stories->posts, 'ID' );

	// /******  The Third Query *******/
	$third_stories_arr = array(
		'post_type'      => 'story',
		'post__not_in'   =>  $exclude_more, // Tell WordPress to Exclude these posts
		'posts_per_page' => 10,
		'orderby'        => 'rand',
	);

	$third_stories = new Timber\PostQuery( $third_stories_arr );

	$context['third_stories'] = $third_stories;

	$context['first_stories_page']  = is_page_template( 'page-first-stories.php' );
	$context['second_stories_page'] = is_page_template( 'page-second-stories.php' );
	$context['third_stories_page']  = is_page_template( 'page-third-stories.php' );

	return $context;

} );
