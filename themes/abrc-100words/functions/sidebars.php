<?php

/**
 * Register Sidebars
 * - CUSTOM ROLE
 * WordPress documentation: https://codex.wordpress.org/Widgetizing_Themes
 */


add_action( 'widgets_init', function() {

  register_sidebar(
      array(
      'name' => __( 'Sidebar','harrington-theme' ),
      'id' => 'sidebar',
      'description' => 'Sidebar widget area',
      'before_widget' => '<aside class="sidebar">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name' => __( 'Secondary Sidebar','harrington-theme' ),
      'id' => 'secondary_sidebar',
      'description' => 'Secondary Sidebar widget area',
      'before_widget' => '<aside class="sidebar">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );

});
