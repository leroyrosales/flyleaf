<?php

/* Template Name: First Stories */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

Timber::render( 'first-stories.twig', $context );
