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

	// Stories category context
	$args = array(
		'cat' => array(
			2,
			3,
			4,
			5,
			6,
			7,
			8,
			9
		),
		'posts_per_page' => -1,
		'post_type' => 'story',
	);

	$context['stories'] = new Timber\PostQuery( $args );

	return $context;


} );
