<?php
/**
 * teller Theme Customizer.
 *
 * @package teller
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function teller_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Icons', 'teller'),
			'priority' => 1,
            'description' => __('Add URL to display social icons in footer.', 'teller')
	) );

    $wp_customize->add_setting( 'Facebook', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Facebook', array(
			'label'    => __( "Facebook url:", 'teller' ),
			'section'  => 'my_social_settings',
			'type'     => 'text',
			'priority' => 1,
	) );
    $wp_customize->add_setting( 'Google_plus', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Google_plus', array(
			'label'    => __( "Google plus url:", 'teller' ),
			'section'  => 'my_social_settings',
			'type'     => 'text',
			'priority' => 2,
	) );
     $wp_customize->add_setting( 'Linkedin', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control('Linkedin', array(
			'label'    => __( "Linkedin url:", 'teller' ),
			'section'  => 'my_social_settings',
			'type'     => 'text',
			'priority' => 3,
	) );
     $wp_customize->add_setting( 'Twitter', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Twitter', array(
			'label'    => __( "Twitter url:", 'teller' ),
			'section'  => 'my_social_settings',
			'type'     => 'text',
			'priority' => 4,
	) );

	$wp_customize->add_section( 'header_logo', array(
			'title'    => __('Header Logo', 'teller'),
			'priority' => 40,
	) );

	$wp_customize->add_setting('site_header_logo', array(
		'default' => get_template_directory_uri() . '/images/teller-logo.png',
		'sanitize_callback' => 'teller_sanitize_text',
		'height'        => 40,
        'width'        => 120,
    ));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_header_logo', array(
        'label' => __('Upload Logo', 'teller'),
        'section' => 'header_logo',
        'settings' => 'site_header_logo',
    )));

}
add_action( 'customize_register', 'teller_customize_register' );


/*
 *
 * sanitize Text field
 *
 * @since WP Emporium 1.0
 *
 */

function teller_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
