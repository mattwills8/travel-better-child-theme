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


	/**
	 * Add settings
	 *
	 * @package Wordpress
	 */

	$wp_customize->add_setting( 'travel_better_logo_in_header', array(
 		'default'           => 'yes',
 	) );

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

	$wp_customize->add_setting( 'travel_better_footer_background', array(
		'default'           => 'yes',
	) );

	$wp_customize->add_setting( 'travel_better_upload_footer_background', array(
		'default'           => '',
	) );


  /**
	 * Add Controls
	 *
	 * @package Wordpress
	 */

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'travel_better_logo_in_header', array(
 		'label'    => 'Display Logo In Header?',
 		'section'  => 'travel_better_new_section_extra_settings',
 		'settings' => 'travel_better_logo_in_header',
 		'type'     => 'radio',
 		'choices'  => array(
         'yes'   => __( 'Yes' ),
         'no'  => __( 'No' )
     ),
 		'priority' => 1
 	)));

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

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_better_upload_footer_background', array(
		'label'    => 'Upload Image For Footer Background',
		'description'  => 'Leave blank to revert to soledad default',
		'section'  => 'travel_better_new_section_extra_settings',
		'settings' => 'travel_better_upload_footer_background',
		'priority' => 101
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
