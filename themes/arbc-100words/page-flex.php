<?php

/* Template Name: Flexible Layout */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

// Get all content fields
$context['content'] = get_field('content');

Timber::render( 'page-flex.twig', $context );
