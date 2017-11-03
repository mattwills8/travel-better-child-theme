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
add_shortcode( 'tb_caption', array( $tb_shortcodes ,'caption_shortcode') );


/*
* Fonts
*/

function travel_better_fonts() {
  $penci_font_browser_arr = array();
  $penci_font_browser     = array(
    '"Heritage", "regular", sans-serif',
    '"Stylistic Alt", "regular", sans-serif',
    '"Stylistic Set 01", "regular", sans-serif',
    '"Stylistic Set 02", "regular", sans-serif',
    '"Stylistic Set 03", "regular", sans-serif',
    '"Stylistic Set 04", "regular", sans-serif',
    '"Stylistic Set 05", "regular", sans-serif',
    '"Swash", "regular", sans-serif',
    '"Voster", "regular", sans-serif',
    '"Voster Alt", "regular", sans-serif',
  );
  foreach ( $penci_font_browser as $font ) {
    $penci_font_browser_arr[$font] = $font;
  }

  return $penci_font_browser_arr;
}

if ( ! function_exists( 'penci_all_fonts' ) ) {
	function penci_all_fonts() {
		return array_merge( penci_font_browser(), penci_list_google_fonts_array(), travel_better_fonts() );
	}
}


/*
* Theme Support
*/

function travel_better_add_support_for_posts() {
	add_post_type_support( 'post', 'excerpt' );
}
add_action( 'init', 'travel_better_add_support_for_posts' , 100);

?>
