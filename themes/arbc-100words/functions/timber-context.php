<?php

/**
 * Filter Timber Context
 *
 * @param  array $context
 * @return array $context
 */
add_filter( 'timber_context', function ( $context ) {

	// Alert Banner fields
	$context['enable_alert_banner'] = get_field( 'enable_alert_banner', 'option' );
	$context['banner_icon'] = get_field( 'alert_icon', 'option' );
	$context['banner_message'] = get_field( 'alert_message', 'option' );
	$context['banner_buttons'] = get_field( 'alert_message_buttons', 'option' );

	// Alert Banner fields
	$context['enable_announcement_button'] = get_field( 'enable_announcement_button', 'option' );
	$context['announcement_button'] = get_field( 'announcement_button', 'option' );

	// Enable Breadcrumbs field
	$context['enable_breadcrumbs'] = get_field( 'enable_breadcrumbs', 'option' );

	// Acclaim content
	$context['acclaim_background_color'] = get_field( 'acclaim_background_color', 'option' );
	$context['acclaim_text'] = get_field( 'acclaim_text', 'option' );
	$context['acclaim_link'] = get_field( 'acclaim_link', 'option' );

	// Social Accounts
	$context['social_media_accounts'] = get_field( 'social_media_accounts', 'option' );

	// Is search query
	$context['is_search'] = is_search();

	// Is front page of site
	$context['is_front_page'] = is_front_page();

	// Is blog post
	$context['is_blog_post'] = is_single() && 'post' == get_post_type();

	// Is project post
	$context['is_project_post'] = is_single() && 'projects' == get_post_type();

	// Sidebar
	$context['sidebar'] = Timber::get_widgets('sidebar');

	$context['secondary_sidebar'] = Timber::get_widgets('secondary_sidebar');

	// Is default template
	$context['default_template'] = is_page_template('default');

	// Is location template
	$context['location_template'] = is_page_template('page-location.php');

	// Is flex template
	$context['flex_template'] = is_page_template('page-flex.php');

	// Post page link
	$context['page_for_posts_link'] = get_permalink( get_option('page_for_posts', true) );

	// Projects page link
	$context['page_for_projects_link'] = get_permalink( get_option('projects_post_page', true) );

	// Footer contact info
	$context['contact_email'] = get_field( 'contact_email', 'option' );
	$context['contact_phone'] = get_field( 'contact_phone', 'option' );
	$context['address'] = get_field( 'address', 'option' );

	// Mailchimp embed
	$context['mailchimp_embed'] = get_field( 'mailchimp_embed', 'option' );

	return $context;


} );
