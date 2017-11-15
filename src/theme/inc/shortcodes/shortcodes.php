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
	 * Register [post_images]
	 */
   public function post_images_shortcode( $args ) {

      $attributes = shortcode_atts( array(
          'img_urls'    => '',
          'alt'         =>  '',
          'fullwidth'   => 'true',
          'columns'     => '1',
          'row_height'  => 'auto'
      ), $args );

      $no_whitespaces_urls = preg_replace( '/\s*,\s*/', ',', filter_var( $attributes['img_urls'], FILTER_SANITIZE_STRING ) );
      $url_array = explode( ',', $no_whitespaces_urls );

      $no_whitespaces_alt = preg_replace( '/\s*,\s*/', ',', filter_var( $attributes['alt'], FILTER_SANITIZE_STRING ) );
      $alt_array = explode( ',', $no_whitespaces_alt );

      $row_height = $attributes['row_height'] === 'auto' ?
        'auto'  :
        $attributes['row_height'].'vh';

      $return = '';
      // start element markup
      ob_start();
      ?>


      <div class="tb-post-images-wrapper <?php if( $attributes['fullwidth'] === 'true' ) { echo 'tb-fullwidth '; } ?>">

        <div class="tb-post-images-grid" style="<?php echo 'grid-template-columns: repeat('.$attributes['columns'].', 1fr);'?>">

          <?php foreach($url_array as $key=>$url) { ?>

            <?php

            $alt = array_key_exists($key, $alt_array) ? $alt_array[$key] : '';

            ?>

            <div class="tb-post-images-image" style="<?php echo 'height:'.$row_height.' '; ?>">
                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
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


    /**
  	 * Register [caption][/caption]
  	 */
     public function caption_shortcode( $args, $content = null ) {

        $attributes = shortcode_atts( array(
            'credits' => '',
        ), $args );

        $return = '';
        // start element markup
        ob_start();
        ?>

        <div class="tb-caption">
          <p class="tb-caption-text"><?php echo $content; ?></p>
          <p class="tb-caption-credits">Foto: <?php echo $attributes['credits']; ?></p>
        </div>

        <?php

    		?>

    		<?php
        $return = ob_get_clean();

        return $return;
      }
}
