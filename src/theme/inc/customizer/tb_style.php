<?php
/**
 * Add customize CSS from options customizer
 * Hook to wp_head() function to render style
 *
 * @package Wordpress
 * @since 1.0
 */
/* Customize CSS */
function tb_customizer_css() {
    ?>
    <style type="text/css">
		<?php

		if( get_theme_mod( 'travel_better_post_preview_font_size' ) ) {
      $font_size = get_theme_mod( 'travel_better_post_preview_font_size' );
    }

    ?>

    .penci-grid li .item p, .penci-masonry .item-masonry p, .item .item-content p {
      font-size: <?php echo $font_size; ?>px !important;
    }

		</style>
    <?php
}
add_action( 'wp_head', 'tb_customizer_css', 100 );
?>
