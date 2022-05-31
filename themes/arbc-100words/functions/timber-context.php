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

	$context['categories'] = get_categories( '"exclude" => 1' );

	return $context;


} );
