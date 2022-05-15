<?php

// Theme enqueues and dequeues

// Dequeue core jquery
add_action( 'wp_enqueue_scripts', function(){
  if (is_admin()) return; // don't dequeue on the backend
  wp_dequeue_script( 'jquery' );
  wp_deregister_script( 'jquery' );
});

// Add theme styles to section buttons
add_action('admin_head', function() {

  $bg_primary = get_theme_mod('site_brand_colors_primary','#68584D');
  $bg_secondary = get_theme_mod('site_brand_colors_secondary','#A57835');
  $bg_tertiary = get_theme_mod('site_brand_colors_tertiary','#E2C6BA');
  $bg_light = get_theme_mod('site_brand_content_wrap_color','#eff3f5');

  echo '<style>
    input[value="bg-light"] {
      background-color: ' . $bg_light . '
    }
    input[value="bg-primary"] {
      background-color: ' . $bg_primary . '
    }
    input[value="bg-secondary"] {
      background-color: ' . $bg_secondary . '
    }
    input[value="bg-tertiary"] {
      background-color: ' . $bg_tertiary . '
    }
  </style>';
});

// Swiper Enqueues

function abrc_js_script() {

  wp_enqueue_script( 'arbc-scripts', get_template_directory_uri() . '/assets/dist/main.bundle.js', array(), false, true );

}
add_action( 'wp_enqueue_scripts', 'abrc_js_script' );
