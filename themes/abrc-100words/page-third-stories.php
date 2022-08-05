<?php

/* Template Name: Third Stories */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

Timber::render( 'third-stories.twig', $context );
