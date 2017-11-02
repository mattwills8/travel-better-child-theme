<?php

function travelBetter_theme_style() {

  wp_enqueue_style( 'travel-better-soledad-parent-style', get_template_directory_uri(). '/style.css' );
  wp_enqueue_style( 'travel-better-style-css', get_stylesheet_directory_uri(). '/style.css' );
  wp_enqueue_style( 'travel-better-fonts', get_stylesheet_directory_uri(). '/assets/fonts/fonts.css' );
  wp_enqueue_style( 'travel-better-main-css', get_stylesheet_directory_uri(). '/assets/css/main.css' );

}
add_action( 'wp_enqueue_scripts', 'travelBetter_theme_style' , 100);

function travelBetter_theme_scripts() {

  wp_enqueue_script( 'travel-better-main-js' , get_stylesheet_directory_uri() . '/assets/js/child-scripts.js' );
}
add_action( 'wp_enqueue_scripts', 'travelBetter_theme_scripts' , 100);


?>
