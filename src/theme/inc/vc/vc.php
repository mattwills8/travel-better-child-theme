<?php
/**
 * Add on for Visual Composer
 * If VC installed, this file will load
 * This add-on only use for Soledad theme
 *
 * @since 2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Travel_Better_Admin {

  private $iconPath;

	function __construct() {
		// We safely integrate with VC with this hook
		add_action( 'init', array( $this, 'integrate' ) );

    //set class vars
    $this->iconPath = get_template_directory_uri() . '/images/vc-icon.png';
	}

	/**
	 * Integrate elements (shortcodes) into VC interface
	 */
	public function integrate() {
		// Check if Visual Composer is installed
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			// Display notice that Visual Compser is required
			add_action( 'admin_notices', array( __CLASS__, 'notice' ) );

			return;
		}

		/*
		 * Register custom shortcodes within Visual Composer interface
		 *
		 * @see http://kb.wpbakery.com/index.php?title=Vc_map
		 */

		 // Header
     vc_map( array(
 			'name'        => __( 'Travel Better Header', 'soledad' ),
 			'description' => __( 'VC Header styled for Travel Better', 'soledad' ),
 			'base'        => 'travel_better_header',
 			'class'       => '',
 			'controls'    => 'full',
 			'icon'        => $this->iconPath,
 			'category'    => 'Travel Better',
 			'params'      => array(
 				array(
 					'type'        => 'textfield',
 					'heading'     => 'Heading Text',
 					'param_name'  => 'heading',
 					'description' => '',
 				),
 			)
 		) );

		// Latest Posts
		vc_map( array(
			'name'        => __( 'Category - "Mixed" Layout', 'soledad' ),
			'description' => __( 'Latest posts from chosen category with "mixed" layout', 'soledad' ),
			'base'        => 'latest_posts_categories_mixed_layout',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => $this->iconPath,
			'category'    => 'Travel Better',
			'params'      => array(
        array(
					'type'        => 'dropdown',
					'heading'     => __( 'Select Category', 'soledad' ),
					'value'       => self::get_terms( 'category' ),
					'param_name'  => 'category',
					'description' => 'Select Featured Category',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Posts',
					'param_name'  => 'number',
					'description' => 'Fill the number posts you want here',
				),
			)
		) );

    // Penci Slider
    vc_map( array(
			'name'        => __( 'Penci Slider', 'soledad' ),
			'description' => __( 'The Penci Slider as a VC element', 'soledad' ),
			'base'        => 'travel_better_penci_slider',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => $this->iconPath,
			'category'    => 'Travel Better',
			'params'      => array(
				array(
					'type'        => 'textfield',
					'heading'     => 'Heading Title',
					'param_name'  => 'heading',
					'description' => '',
				),
        array(
					'type'        => 'dropdown',
					'heading'     => __( 'Select Category', 'soledad' ),
					'value'       => self::get_terms( 'category' ),
					'param_name'  => 'category',
					'description' => 'Select Featured Category',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Posts',
					'param_name'  => 'number',
					'description' => 'Fill the number posts you want here',
				),
			)
		) );
	}

	/**
	 * Show notice if your plugin is activated but Visual Composer is not
	 */
	public static function notice() {
		?>

		<div class="updated">
			<p><?php _e( '<strong>Soledad VC Addon</strong> requires <strong>Visual Composer</strong> plugin to be installed and activated on your site.', 'soledad' ) ?></p>
		</div>

	<?php
	}

	/**
	 * Get category for auto complete field
	 *
	 * @param string $taxonomy Taxnomy to get terms
	 *
	 * @return array
	 */
	private static function get_terms( $taxonomy = 'category' ) {
		$cats = get_terms( $taxonomy );
		if ( ! $cats || is_wp_error( $cats ) ) {
			return array();
		}

		$categories = array();
		foreach ( $cats as $cat ) {
			$categories[] = array(
				'label' => $cat->name,
				'value' => $cat->slug,
				'group' => 'category',
			);
		}

		return $categories;
	}
}

new Travel_Better_Admin();


class Travel_Better_Shortcodes {
	/**
	 * Add shortcodes
	 */
	public static function init() {
		$shortcodes = array(
			'latest_posts_categories_mixed_layout',
      'travel_better_penci_slider',
			'travel_better_header'
		);

		foreach ( $shortcodes as $shortcode ) {
			add_shortcode( $shortcode, array( __CLASS__, $shortcode ) );
		}
	}


	/**
	 * Retrieve HTML markup of travel_better_header shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
   */
	public static function travel_better_header( $atts, $content = null ) {


		extract( shortcode_atts( array(
			'heading' => '',
		), $atts ) );

		$underline_src = get_stylesheet_directory_uri() . '/assets/img/underline-title.png';

		$return = '';

    // start element markup
    ob_start();
		?>

		<div class="tb-vc-header">

			<h1><?php echo $heading;?></h1>

			<div class="tb-vc-header-underline-wrapper">
				<div>
					<img src="<?php echo $underline_src; ?>">
				</div>
			</div>

		</div>

		<?php
    $return = ob_get_clean();

    return $return;
  }


	/**
	 * Retrieve HTML markup of latest_posts_categories_mixed_layout shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
   */

	public static function latest_posts_categories_mixed_layout( $atts, $content = null ) {


		extract( shortcode_atts( array(
			'category' => '',
			'number'   => '5',
		), $atts ) );

		$return = '';

    // set defaults and get category
		if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '5'; endif;
		$fea_oj = get_category_by_slug( $category );

    // set vars for category meta
		if( ! empty ( $fea_oj ) ) {

			$fea_cat_id = $fea_oj->term_id;
			$fea_cat_name = $fea_oj->name;
			$cat_meta   = get_option( "category_$fea_cat_id" );
			$cat_ads_code = isset( $cat_meta['mag_ads'] ) ? $cat_meta['mag_ads'] : '';

      // get posts from category
			$attr       = array(
				'post_type' => 'post',
				'showposts' => $number,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $category
					)
				)
			);
			$fea_query = new WP_Query( $attr );
			$numers_results = $fea_query->post_count;

			if ( $fea_query->have_posts() ) :

			$heading_title = get_theme_mod( 'penci_featured_cat_style' ) ? get_theme_mod( 'penci_featured_cat_style' ) : 'style-1';
			$heading_align = get_theme_mod( 'penci_featured_cat_align' ) ? get_theme_mod( 'penci_featured_cat_align' ) : 'pcalign-left';

      // start element markup
			ob_start();
			?>

      <div class="penci-wrapper-posts-content">

				<ul class="penci-wrapper-data penci-grid penci-shortcode-render">

				<?php  /* The loop */
				while ( $fea_query->have_posts() ) : $fea_query->the_post();
					include( locate_template( 'content-mixed.php' ) );
				endwhile;
				?>

        </ul>

      </div>

			<?php
			endif; wp_reset_postdata();
		}

		$return = ob_get_clean();

		return $return;


	}

  /**
	 * Retrieve HTML markup of travel_better_penci_slider shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
   */

  public static function travel_better_penci_slider( $atts, $content = null ) {

		$return = '';

    // start element markup
    ob_start();


  	if( get_theme_mod( 'penci_enable_featured_video_bg' ) && get_theme_mod( 'penci_featured_video_url' ) ) {
  		get_template_part( 'inc/featured_slider/featured_video' );
  	} else {
  		if ( get_theme_mod( 'penci_featured_slider' ) == true ) :
  			$slider_style = get_theme_mod( 'penci_featured_slider_style' ) ? get_theme_mod( 'penci_featured_slider_style' ) : 'style-1';
  			if( ( $slider_style == 'style-33' || $slider_style == 'style-34' ) && get_theme_mod( 'penci_feature_rev_sc' ) ) {
  				$rev_shortcode = get_theme_mod( 'penci_feature_rev_sc' );
  				echo '<div class="tb-penci-slider-vc featured-area featured-' . $slider_style . '">';
  				if( $slider_style == 'style-34' ): echo '<div class="container">'; endif;
  				echo do_shortcode( $rev_shortcode );
  				if( $slider_style == 'style-34' ): echo '</div>'; endif;
  				echo '</div>';
  			} else {
  				if ( get_theme_mod( 'penci_body_boxed_layout' ) ) {
  					if( $slider_style == 'style-3' ) {
  						$slider_style == 'style-1';
  					} elseif( $slider_style == 'style-5' ) {
  						$slider_style == 'style-4';
  					} elseif( $slider_style == 'style-7' ) {
  						$slider_style == 'style-8';
  					} elseif( $slider_style == 'style-9' ) {
  						$slider_style == 'style-10';
  					} elseif( $slider_style == 'style-11' ) {
  						$slider_style == 'style-12';
  					} elseif( $slider_style == 'style-13' ) {
  						$slider_style == 'style-14';
  					} elseif( $slider_style == 'style-15' ) {
  						$slider_style == 'style-16';
  					} elseif( $slider_style == 'style-17' ) {
  						$slider_style == 'style-18';
  					} elseif( $slider_style == 'style-29' ) {
  						$slider_style == 'style-30';
  					}
  				}
  				$slider_class = $slider_style;
  				if( $slider_style == 'style-5' ) {
  					$slider_class = 'style-4 style-5';
  				} elseif ( $slider_style == 'style-30' ) {
  					$slider_class = 'style-29 style-30';
  				}
  				$data_auto = 'false';
  				$data_loop = 'true';
  				$data_res = '';

  				if( $slider_style == 'style-7' || $slider_style == 'style-8' ){
  					$data_res = ' data-item="4" data-desktop="4" data-tablet="2" data-tabsmall="1"';
  				} elseif( $slider_style == 'style-9' || $slider_style == 'style-10' ){
  					$data_res = ' data-item="3" data-desktop="3" data-tablet="2" data-tabsmall="1"';
  				} elseif( $slider_style == 'style-11' || $slider_style == 'style-12' ){
  					$data_res = ' data-item="2" data-desktop="2" data-tablet="2" data-tabsmall="1"';
  				} elseif( $slider_style == 'style-31' || $slider_style == 'style-32' ) {
  					$data_res = ' data-dots="true" data-nav="false"';
  					if( get_theme_mod( 'penci_enable_next_prev_penci_slider' ) ):
  						$data_res = ' data-dots="true" data-nav="true"';
  					endif;
  				}

  				if( get_theme_mod( 'penci_featured_autoplay' ) ): $data_auto = 'true'; endif;
  				if( get_theme_mod( 'penci_featured_loop' ) ): $data_loop = 'false'; endif;
  				$auto_time = get_theme_mod( 'penci_featured_slider_auto_time' );
  				if( !is_numeric( $auto_time ) ): $auto_time = '4000'; endif;
  				$auto_speed = get_theme_mod( 'penci_featured_slider_auto_speed' );
  				if( !is_numeric( $auto_speed ) ): $auto_speed = '600'; endif;
  				$open_container = '';
  				$close_container = '';
  				if( in_array( $slider_style, array( 'style-1', 'style-4', 'style-6', 'style-8', 'style-10', 'style-12', 'style-14', 'style-16', 'style-18', 'style-19', 'style-20', 'style-21', 'style-22', 'style-23', 'style-24', 'style-25', 'style-26', 'style-27', 'style-30', 'style-32' ) ) ):
  					$open_container = '<div class="container">';
  					$close_container = '</div>';
  				endif;

  				echo '<div class="tb-penci-slider-vc featured-area featured-' . $slider_class . '">' . $open_container;
  				echo '<div class="penci-owl-carousel penci-owl-featured-area"'. $data_res .'data-style="'. $slider_style .'" data-auto="'. $data_auto .'" data-autotime="'. $auto_time .'" data-speed="'. $auto_speed .'" data-loop="'. $data_loop .'">';
  				get_template_part( 'inc/featured_slider/' . $slider_style );
  				echo '</div>';
  				echo $close_container. '</div>';
  			}
  		endif;
  	}

    $return = ob_get_clean();

    return $return;
  }
}

if ( ! is_admin() ) {
	Travel_Better_Shortcodes::init();
}
