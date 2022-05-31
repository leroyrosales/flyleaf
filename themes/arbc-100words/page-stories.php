<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/templates/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

// Get terms, exclude uncategorized
$story_terms = Timber::get_terms( 'category', array( 'exclude' => array( 1 ) ) );

// Get latest cpt in each category
foreach ( $story_terms as &$story_term ) {
	$args = array(
		'post_type'     => 'story',
		'post_per_page' => 1,
		'tax_query'     => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $story_term->slug,
			),
		),
	);

	$story_term->products = Timber::get_posts( $args );
}

$context['story_category'] = $story_terms;


Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
