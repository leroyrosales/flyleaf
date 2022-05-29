<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'category.twig' );

$context = Timber::context();

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;

// Stories category context
$args = array(
    'cat' => array(
        $cat_id,
    ),
    'posts_per_page' => -1,
    'post_type' => 'story',
);

$context['stories'] = new Timber\PostQuery( $args );

Timber::render( $templates, $context );
