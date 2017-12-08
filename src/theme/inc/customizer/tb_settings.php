<?php
/**
 * Add extra settings
 *
 * @package Wordpress
 * @param object $wp_customize
 * @since   1.0
 */
function travel_better_register_theme_customizer( $wp_customize ) {

	// Add Sections
	$wp_customize->add_section( 'travel_better_new_section_extra_settings', array(
		'title'       => 'Travel Better',
		'description' => 'Custom settings for your Travel Better child theme',
    'priority'    => 1,
	) );

	$wp_customize->add_section( 'travel_better_new_section_signup', array(
		'title'       => 'Travel Better Signup Form',
		'description' => 'Custom settings for the footer signup form',
    'priority'    => 1,
	) );


	/**
	 * Add settings
	 *
	 * @package Wordpress
	 */

	// Travel Better
	$wp_customize->add_setting( 'travel_better_upload_header_logo', array(
 		'default'           => '',
 	) );

	$wp_customize->add_setting( 'travel_better_remove_soledad_header_home', array(
		'default'           => 'yes',
	) );

	$wp_customize->add_setting( 'travel_better_remove_soledad_header', array(
		'default'           => 'yes',
	) );

	$wp_customize->add_setting( 'travel_better_featured_boxes_number', array(
		'default'           => 3,
	) );

	$wp_customize->add_setting( 'travel_better_post_preview_font_size', array(
		'default'           => '',
	) );

	$wp_customize->add_setting( 'travel_better_upload_footer_background', array(
		'default'           => '',
	) );

	// Translations
	$wp_customize->add_setting( 'penci_trans_you_may_also_like', array(
		'default'           => 'You May Also Like',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'penci_trans_photographer', array(
		'default'           => 'Photographer',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Signup
	$wp_customize->add_setting( 'travel_better_signup_form_mailchimp_cf7', array(
		'default'           => '',
	) );

	$wp_customize->add_setting( 'travel_better_signup_form_shortcode', array(
		'default'           => '',
	) );

	$wp_customize->add_setting( 'travel_better_signup_form_title', array(
		'default'           => '',
	) );


  /**
	 * Add Controls
	 *
	 * @package Wordpress
	 */

	// Travel Better
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_better_upload_header_logo', array(
		'label'    => 'Upload Logo For Header',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_upload_header_logo',
		'priority' => 1
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_remove_soledad_header_home', array(
		'label'    => 'Remove Soledad Header Elements on Home Page',
    'description'  => 'Check yes to remove any header elements put between the nav bar and content by soledad on the homepage - allows for full screen home featured image',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_remove_soledad_header_home',
		'type'     => 'radio',
		'choices'  => array(
        'yes'   => __( 'Yes' ),
        'no'  => __( 'No' )
    ),
		'priority' => 2
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_remove_soledad_header', array(
		'label'    => 'Remove Soledad Header Elements on Other Page',
    'description'  => 'Check yes to remove any header elements put between the nav bar and content by soledad on all other pages',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_remove_soledad_header',
		'type'     => 'radio',
		'choices'  => array(
        'yes'   => __( 'Yes' ),
        'no'  => __( 'No' )
    ),
		'priority' => 3
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_featured_boxes_number', array(
		'label'    => 'Number of Featured Boxes',
    'description'  => 'Choose 3 or 4 - Requires Home Featured Boxes Style 3 to be selected',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_featured_boxes_number',
		'type'     => 'number',
		'priority' => 10
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_post_preview_font_size', array(
		'label'    => 'Post Preview Font Size (px)',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_post_preview_font_size',
		'type'     => 'number',
		'priority' => 20
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_better_upload_footer_background', array(
		'label'    => 'Upload Image For Footer Background',
		'description'  => 'Leave blank to revert to soledad default',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_upload_footer_background',
		'priority' => 101
	) ) );


	// Translations
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_you_may_also_like', array(
		'label'    => 'Text: "You May Also Like"',
		'section'  => 'pencidesign_new_section_transition_lang',
		'settings' => 'penci_trans_you_may_also_like',
		'type'     => 'text',
		'priority' => 1
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_photographer', array(
		'label'    => 'Text: "Photographer"',
		'section'  => 'pencidesign_new_section_transition_lang',
		'settings' => 'penci_trans_photographer',
		'type'     => 'text',
		'priority' => 1
	) ) );

	// Signup Form
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_signup_form_mailchimp_cf7', array(
		'label'    => 'Use Mailchimp Form or Contact Form 7 In Footer?',
		'section'  => 'travel_better_new_section_signup',
		'settings' => 'travel_better_signup_form_mailchimp_cf7',
		'type'     => 'radio',
		'choices'  => array(
        'mailchimp'   => __( 'Mailchimp' ),
        'cf7'  => __( 'Contact Form 7' )
    ),
		'priority' => 1
	)));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_signup_form_shortcode', array(
		'label'    => 'Contact Form 7 Shortcode',
		'section'  => 'travel_better_new_section_signup',
		'settings' => 'travel_better_signup_form_shortcode',
		'type'     => 'text',
		'priority' => 2
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_signup_form_title', array(
		'label'    => 'Contact Form 7 Signup Title',
		'section'  => 'travel_better_new_section_signup',
		'settings' => 'travel_better_signup_form_title',
		'type'     => 'text',
		'priority' => 3
	) ) );
}

/**
 * Callback function for sanitizing radio settings.
 * Use for travel_better
 *
 * @param $input , $setting
 *
 * @return $input
 */
if ( ! function_exists( 'penci_sanitize_choices_field' ) ) {
	function penci_sanitize_choices_field( $input ) {
		return $input;
	}
}

/**
 * Callback function for sanitizing textarea settings
 * Use for travel_better
 *
 * @param $input , $setting
 *
 * @return $input
 */
if ( ! function_exists( 'penci_sanitize_textarea_field' ) ) {
	function penci_sanitize_textarea_field( $input ) {
		return $input;
	}
}
/**
 * Callback function for sanitizing checkbox settings.
 * Use for travel_better
 *
 * @param $input
 *
 * @return string default value if type is not exists
 */
if ( ! function_exists( 'penci_sanitize_checkbox_field' ) ) {
	function penci_sanitize_checkbox_field( $input ) {
		if ( $input == 1 ) {
			return true;
		}
		else {
			return false;
		}
	}
}

/**
 * Callback function for sanitizing checkbox settings.
 * Use for travel_better
 *
 * @param $input
 *
 * @return a number
 */
if ( ! function_exists( 'penci_sanitize_number_field' ) ) {
	function penci_sanitize_number_field( $input ) {
		return absint( $input );
	}
}

add_action( 'customize_register', 'travel_better_register_theme_customizer' );
?>
