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
          'img_urls'  => '',
          'fullwidth' => 'false',
          'columns'   => '1',
          'row_height' => '90'
      ), $args );

      $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $attributes['img_urls'], FILTER_SANITIZE_STRING ) );
      $url_array = explode( ',', $no_whitespaces );

      $row_height = $attributes['row_height'].'vh';

      $return = '';
      // start element markup
      ob_start();
      ?>


      <div class="tb-post-images-wrapper <?php if( $attributes['fullwidth'] === 'true' ) { echo 'tb-fullwidth '; } ?>">

        <div class="tb-post-images-grid" style="<?php echo 'grid-template-columns: repeat('.$attributes['columns'].', 1fr);'?>">

          <?php foreach($url_array as $url) { ?>


            <div class="tb-post-images-image" style="<?php echo 'height:'.$row_height.' '; ?>">
                <img src="<?php echo $url; ?>">
            </div>

          <?php } ?>

        </div>
      </div>

      <?php

  		?>

  		<?php
      $return = ob_get_clean();

      return $return;
    }
}
