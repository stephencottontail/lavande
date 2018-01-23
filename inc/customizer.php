<?php
/**
 * Lavande Theme Customizer
 *
 * @package Lavande
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lavande_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'lavande_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'lavande_customize_partial_blogdescription',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'footer_text', array(
			'selector'        => '.site-info',
			'render_callback' => 'lavande_customize_partial_footer_text'
		) );
	}
	
	$wp_customize->add_section( 'footer_text', array(
		'title'       => __( 'Footer Text', 'lavande' ),
		'description' => __( 'Text entered in this section will appear in place of the default footer text. A limited amount of HTML may be used.', 'lavande' ),
		'priority'    => 35
	) );
	
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'lavande_sanitize_footer_text'
	) );
	
	$wp_customize->add_control( 'footer_text', array(
		'label'    => __( 'Footer Text', 'lavande' ),
		'section'  => 'footer_text',
		'settings' => 'footer_text',
		'type'     => 'text'
	) );
}
add_action( 'customize_register', 'lavande_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lavande_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lavande_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render footer text for the selective refresh partial.
 *
 * @return string
 */
function lavande_customize_partial_footer_text() {
	$footer_text = get_theme_mod( 'footer_text' );
	
	return wp_kses( $footer_text, array(
		'a'      => array(
			'href' => array()
		),
		'span' => array(
			'class' => array()
		),
		'em'     => array(),
		'i'      => array(),
		'strong' => array(),
		'b'      => array()
	) );
}

/**
 * Sanitize footer text
 */
function lavande_sanitize_footer_text( $value ) {
	if ( $value ) {
		return wp_kses( $value, array(
			'a'      => array(
				'href' => array()
			),
			'span' => array(
				'class' => array()
			),
			'em'     => array(),
			'i'      => array(),
			'strong' => array(),
			'b'      => array()
		) );
	} else {
		return false;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lavande_customize_preview_js() {
	wp_enqueue_script( 'lavande-customizer', get_theme_file_uri( 'js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lavande_customize_preview_js' );
