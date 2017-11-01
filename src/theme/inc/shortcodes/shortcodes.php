<?php

/**
 *
 * This class defines all shortcodes
 *
 * @package    Travel Better
 * @author     Matt Wills <matt_wills8@hotmail.co.uk>
 */
class Travel_Better_Shortcodes {

	/**
	 * Register Shortcode taking list id as argument
	 */
   public function post_images_shortcode( $args ) {

      $attributes = shortcode_atts( array(
          'img_urls'  => 'url1, url2',
          'fullwidth' => 'true',
          'columns'   => '1',
      ), $args );

      $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $attributes['img_urls'], FILTER_SANITIZE_STRING ) );
      $url_array = explode( ',', $no_whitespaces );

      $return = '';
      // start element markup
      ob_start();

      foreach($url_array as $url) {
        echo '<img src="'.$url.'">';
      }
  		?>

  		<?php
      $return = ob_get_clean();

      return $return;
    }
}
