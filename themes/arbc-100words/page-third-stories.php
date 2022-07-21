<?php

/* Template Name: Second Stories */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

Timber::render( 'stories.twig', $context );
