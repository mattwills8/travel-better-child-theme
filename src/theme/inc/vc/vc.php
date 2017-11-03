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
    $this->iconPath = get_stylesheet_directory_uri() . '/assets/img/tb-vc-icon.png';
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
 					'heading'     => __( 'Heading Text', 'soledad' ),
 					'param_name'  => 'heading',
 					'description' => '',
 				),
 			)
 		) );


		// Full Screen Featured Image
		vc_map( array(
			'name'        => __( 'Full Screen Featured Image', 'soledad' ),
			'description' => __( 'Full screen featured image with space for image and text', 'soledad' ),
			'base'        => 'travel_better_full_screen_featured_image',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => $this->iconPath,
			'category'    => 'Travel Better',
			'params' => array(
					array(
							'type' => 'textfield',
							'heading' => __( 'Logo and Blurb Distance From Top (%)', 'soledad' ),
							'param_name' => 'content_top',
							'value' => '10'
					),
					array(
							"type" => "attach_image",
							"heading" => __('Upload a logo', 'soledad' ),
							"param_name" => "logo"
					),
					array(
							'type' => 'textfield',
							'heading' => __( 'Blurb Text', 'soledad' ),
							'param_name' => 'blurb_text',
							'value' => 'We are'
					),
					array(
							'type' => 'dropdown',
							'heading' => __( 'Blurb Font', 'soledad' ),
							'param_name' => 'blurb_font',
							'value' => penci_all_fonts()
					),
					array(
							"type" => "attach_image",
							"heading" => __('Upload a background image', 'soledad' ),
							"param_name" => "full_screen_featured_image"
					)
			)
		) );

		// Featured Boxes
    vc_map( array(
			'name'        => __( 'Featured Boxes', 'soledad' ),
			'description' => __( 'The Featured Boxes as a VC element - details still controlled in customizer', 'soledad' ),
			'base'        => 'travel_better_featured_boxes',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => $this->iconPath,
			'category'    => 'Travel Better',
			'params'      => array(
			)
		) );

		// Latest Posts
		vc_map( array(
			'name'        => __( 'N Latest Posts - Starting From X', 'soledad' ),
			'description' => 'Display your latest posts starting from a certain number back',
			'base'        => 'latest_posts_start_from_x',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => $this->iconPath,
			'category'    => 'Travel Better',
			'params'      => array(
				array(
					'type'        => 'textfield',
					'heading'     => 'Heading Title for Latest Posts',
					'param_name'  => 'heading',
					'description' => '',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Latest Posts Layout', 'soledad' ),
					'value'       => array(
						'Standard Posts'                   => 'standard',
						'Classic Posts'                    => 'classic',
						'Overlay Posts'                    => 'overlay',
						'Grid Posts'                       => 'grid',
						'Grid 2 Columns Posts'             => 'grid-2',
						'Grid Masonry Posts'               => 'masonry',
						'Grid Masonry 2 Columns Posts'     => 'masonry-2',
						'List Posts'                       => 'list',
						'Boxed Posts Style 1'              => 'boxed-1',
						'Boxed Posts Style 2'              => 'boxed-2',
						'Mixed Posts'                      => 'mixed',
						'Mixed Posts Style 2'              => 'mixed-2',
						'Photography Posts'                => 'photography',
						'1st Standard Then Grid'           => 'standard-grid',
						'1st Standard Then Grid 2 Columns' => 'standard-grid-2',
						'1st Standard Then List'           => 'standard-list',
						'1st Standard Then Boxed'          => 'standard-boxed-1',
						'1st Classic Then Grid'            => 'classic-grid',
						'1st Classic Then Grid 2 Columns'  => 'classic-grid-2',
						'1st Classic Then List'            => 'classic-list',
						'1st Classic Then Boxed'           => 'classic-boxed-1',
						'1st Overlay Then Grid'            => 'overlay-grid',
						'1st Overlay Then List'            => 'overlay-list'
					),
					'param_name'  => 'style',
					'description' => 'Select Latest Posts Style',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Total Number To Load',
					'param_name'  => 'total_number',
					'description' => 'The total number of posts across all pages - leave blank to get all posts',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Of Posts To Skip',
					'param_name'  => 'start_from',
					'description' => 'Eg, if 4, skips the 4 most recent posts and starts from the 5th',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Posts Per Page',
					'param_name'  => 'number',
					'description' => 'Fill the number posts per page you want here',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __('Page Navigation Style', 'soledad'),
					'value'       => array(
						'Page Navigation Numbers' => 'numbers',
						'Load More Posts'         => 'loadmore',
						'Infinite Scroll'         => 'scroll'
					),
					'param_name'  => 'paging',
					'description' => 'Select Page Navigation Style',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Custom Number Posts for Each Time Load More Posts',
					'param_name'  => 'morenum',
					'description' => 'Fill the number posts for each time load more posts here - this option use for load more posts navigation',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Exclude Categories',
					'param_name'  => 'exclude',
					'description' => 'If you want to exclude any categories, fill the categories slug here. See <a href="http://pencidesign.com/soledad/soledad-document/assets/images/magazine-2.png" target="_blank">here</a> to know what is category slug. Example: travel, life-style',
				)
			)
		) );


		// Category Mixed Layout Posts
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
					'heading'     => __( 'Number Posts', 'soledad' ),
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


class Travel_Better_VC_Shortcodes {
	/**
	 * Add shortcodes
	 */
	public static function init() {
		$shortcodes = array(
			'latest_posts_categories_mixed_layout',
			'travel_better_full_screen_featured_image',
			'travel_better_featured_boxes',
			'latest_posts_start_from_x',
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
	 * Retrieve HTML markup of travel_better_full_screen_featured_image shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
   */
	public static function travel_better_full_screen_featured_image( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'content_top'								 => '10',
			'logo' 											 => '',
			'blurb_text'								 => '',
			'blurb_font'								 => 'inherit',
			'full_screen_featured_image' => '',
		), $atts ) );

		$full_screen_featured_image_src = wp_get_attachment_image_src($full_screen_featured_image, "full")[0];
		$logo_src = wp_get_attachment_image_src($logo, "full")[0];

		$content_top_percent = $content_top.'%';

		$blurb_font_stripped = str_replace("``", '', $blurb_font);

		$return = '';

    // start element markup
    ob_start();
		?>

		<div class="full-screen-featured-image-wrapper">

			<img src="<?php echo $full_screen_featured_image_src; ?>">

			<div class="full-screen-featured-image-content-wrapper" style="top:<?php echo $content_top_percent; ?>">
				<div class="full-screen-featured-image-logo-wrapper">
					<img src="<?php echo $logo_src; ?>">
				</div>

				<div class="full-screen-featured-image-blurb-wrapper">
					<div class="line-before-blurb"></div>
					<span style="font-family:<?php echo $blurb_font_stripped; ?>">
						<?php echo $blurb_text; ?>
					</span>
					<div class="line-after-blurb"></div>
				</div>
			</div>

		</div>

		<?php
		// end element markup
		$return = ob_get_clean();

		return $return;
	}



	/**
	 * Retrieve HTML markup of travel_better_featured_boxes shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
   */
	public static function travel_better_featured_boxes( $atts, $content = null ) {


		$return = '';

    // start element markup
    ob_start();
		?>

		<div class="tb-vc-featured-boxes">

		<?php
		/* Display Featured Boxes */
		if ( ( get_theme_mod( 'penci_home_box_img1' ) || get_theme_mod( 'penci_home_box_img2' ) || get_theme_mod( 'penci_home_box_img3' ) || get_theme_mod( 'penci_home_box_img4' ) ) ):
			get_template_part( 'inc/modules/home_boxes' );
		endif;
		?>

		</div>

		<?php
		// end element markup
		$return = ob_get_clean();

		return $return;
	}



	/**
	 * Retrieve HTML markup of latest_posts_start_from_x shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	public static function latest_posts_start_from_x( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'standard',
			'heading' => '',
			'total_number' => false,
			'start_from'	=> 0,
			'number'  => '4',
			'paging'  => 'numbers',
			'morenum' => '6',
			'exclude' => ''
		), $atts));

		$return = '';

		if ( ! isset( $total_number ) || ! is_numeric( $total_number) ): $total_number = false; endif;
		if ( ! isset( $start_from ) || ! is_numeric( $start_from ) ): $start_from = 0; endif;
		if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '10'; endif;
		if ( ! isset( $morenum ) || ! is_numeric( $morenum ) ): $morenum = '6'; endif;
		$paged = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );

		$args  = array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $number );

		if ( ! empty( $exclude ) ):
			$exclude_cats      = str_replace( ' ', '', $exclude );
			$exclude_array     = explode( ',', $exclude_cats );
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $exclude_array,
					'operator' => 'NOT IN'
				)
			);
		endif;

		$query_initial = new WP_Query( $args );
		if ( $query_initial->have_posts() ) :

			// get post ids to exclude
			$exclude_ids = [];
			$include_ids = [];
			$i = 0;

			while ($i < $start_from) {
				$exclude_ids[] = $query_initial->posts[$i]->ID;
				$i++;
			}

			while ($total_number && $i < ($start_from + $total_number)) {
				$include_ids[] = $query_initial->posts[$i]->ID;
				$i++;
			}

			// make new query with excluded ids and fixed number of posts
			$args['post__not_in'] = $exclude_ids;

			if( $total_number ) {
				$args['post__in'] = $include_ids;
			}


			$query_custom = new WP_Query( $args );

			if ( $query_custom->have_posts() ) :

				ob_start();

				?>

				<?php if ( $heading ) : ?>
				<?php
				$heading_title = get_theme_mod( 'penci_featured_cat_style' ) ? get_theme_mod( 'penci_featured_cat_style' ) : 'style-1';
				$heading_align = get_theme_mod( 'penci_heading_latest_align' ) ? get_theme_mod( 'penci_heading_latest_align' ) : 'pcalign-center';
				?>
					<div class="penci-border-arrow penci-homepage-title penci-home-latest-posts <?php echo sanitize_text_field( $heading_title . ' ' . $heading_align ); ?>">
						<h3 class="inner-arrow"><?php echo do_shortcode( $heading ); ?></h3>
					</div>
				<?php endif; ?>

				<div class="penci-wrapper-posts-content">

					<?php if( in_array( $style, array( 'standard', 'classic', 'overlay' ) ) ): ?><div class="penci-wrapper-data"><?php endif; ?>
					<?php if ( in_array( $style, array( 'mixed', 'mixed-2', 'overlay-grid', 'overlay-list', 'photography', 'grid', 'grid-2', 'list', 'boxed-1', 'boxed-2', 'boxed-3', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1', 'magazine-1', 'magazine-2' ) ) ) : ?><ul class="penci-wrapper-data penci-grid penci-shortcode-render"><?php endif; ?>
					<?php if ( in_array( $style, array( 'masonry', 'masonry-2' ) ) ) : ?><div class="penci-wrap-masonry"><div class="penci-wrapper-data masonry penci-masonry"><?php endif; ?>

					<?php /* The loop */
					while ( $query_custom->have_posts() ) : $query_custom->the_post();
						include( locate_template( 'content-' . $style . '.php' ) );
					endwhile;
					?>

					<?php if( in_array( $style, array( 'standard', 'classic', 'overlay' ) ) ): ?></div><?php endif; ?>
					<?php if ( in_array( $style, array( 'masonry', 'masonry-2' ) ) ) : ?></div></div><?php endif; ?>
					<?php if ( in_array( $style, array( 'mixed', 'mixed-2', 'overlay-grid', 'overlay-list', 'photography', 'grid', 'grid-2', 'list', 'boxed-1', 'boxed-2', 'boxed-3', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1', 'magazine-1', 'magazine-2' ) ) ) : ?></ul><?php endif; ?>


					<?php
					if( $paging == 'loadmore' || $paging == 'scroll' ) {
						$button_class = 'penci-ajax-more penci-ajax-home penci-ajax-more-click';
						if( $paging == 'loadmore' ):
							wp_enqueue_script( 'penci_ajax_more_posts' );
							wp_localize_script( 'penci_ajax_more_posts', 'ajax_var_more', array(
									'url'     => admin_url( 'admin-ajax.php' ),
									'nonce'   => wp_create_nonce( 'ajax-nonce' )
								)
							);
						endif;
						if( $paging == 'scroll' ):
							$button_class = 'penci-ajax-more penci-ajax-home penci-ajax-more-scroll';
							wp_enqueue_script( 'penci_ajax_more_scroll' );
							wp_localize_script( 'penci_ajax_more_scroll', 'ajax_var_more', array(
									'url'     => admin_url( 'admin-ajax.php' ),
									'nonce'   => wp_create_nonce( 'ajax-nonce' )
								)
							);
						endif;
						/* Get data template */
						$data_layout = $style;
						$data_template = 'sidebar';
						if ( in_array( $style, array( 'standard-grid', 'classic-grid', 'overlay-grid' ) ) ) {
							$data_layout = 'grid';
						} elseif ( in_array( $style, array( 'standard-grid-2', 'classic-grid-2' ) ) ) {
							$data_layout = 'grid-2';
						} elseif ( in_array( $style, array( 'standard-list', 'classic-list', 'overlay-list' ) ) ) {
							$data_layout = 'list';
						} elseif ( in_array( $style, array( 'standard-boxed-1', 'classic-boxed-1' ) ) ) {
							$data_layout = 'boxed-1';
						}

						if( is_page_template( 'page-vc.php' ) ) {
							$data_template = 'no-sidebar';
						}
						?>

						<div class="penci-pagination <?php echo $button_class; ?>">
							<a class="penci-ajax-more-button" data-mes="<?php echo penci_get_setting('penci_trans_no_more_posts'); ?>" data-layout="<?php echo esc_attr( $data_layout ); ?>" data-number="<?php echo absint($morenum); ?>" data-offset="<?php echo (absint($number)+absint($start_from)); ?>" data-exclude="<?php
							echo $exclude; ?>" data-from="vc" data-template="<?php echo $data_template; ?>">
								<span class="ajax-more-text"><?php echo penci_get_setting('penci_trans_load_more_posts'); ?></span><span class="ajaxdot"></span><i class="fa fa-refresh"></i>
							</a>
						</div>
					<?php } else { ?>
					<?php echo penci_pagination_numbers( $query_custom ); ?>
					<?php } ?>

				</div>

			<?php
			endif;
		endif; wp_reset_postdata();

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
	Travel_Better_VC_Shortcodes::init();
}
