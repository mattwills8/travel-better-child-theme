<?php
/**
* Includes
*/
include( get_stylesheet_directory() . '/inc/enqueue.php');

include( get_stylesheet_directory() . '/inc/customizer/tb_settings.php');

include( get_stylesheet_directory() . '/inc/vc/vc.php');

include( get_stylesheet_directory() . '/inc/shortcodes/shortcodes.php');

/*
* Shortcodes
*/
$tb_shortcodes = new Travel_Better_Shortcodes();

add_shortcode( 'post_images', array( $tb_shortcodes ,'post_images_shortcode') );


?>
