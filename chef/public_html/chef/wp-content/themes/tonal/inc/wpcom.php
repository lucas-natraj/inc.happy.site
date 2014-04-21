<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Tonal
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 * @return void
 */
function tonal_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => 'ffffff',
			'border' => 'eeeeee',
			'text'   => '333333',
			'link'   => '666666',
			'url'    => '666666',
		);
	}

	// Enable support for WP.com global print style.
	add_theme_support( 'print-style' );

	// Add responsive video support
	add_theme_support( 'wpcom-responsive-videos' );

	require_lib( 'class.color' );
}
add_action( 'after_setup_theme', 'tonal_wpcom_setup' );

function tonal_dequeue_fonts() {
  if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {
    $customfonts = TypekitData::get( 'families' );

    if ( $customfonts && ( $customfonts['site-title']['id'] || $customfonts['headings']['id'] ) )
      wp_dequeue_style( 'tonal-fonts' );
  }
}
add_action( 'wp_enqueue_scripts', 'tonal_dequeue_fonts' );

/**
 * Enqueue wp.com-specific scripts
 */
function tonal_wpcom_scripts() {
	wp_enqueue_script( 'tonal-wpcom-js', get_template_directory_uri() . '/js/wpcom.js', array( 'jquery' ), '20140305' );
	wp_enqueue_style( 'tonal-wpcom-style', get_template_directory_uri() . '/css/wpcom.css', '20140305' );
}
add_action( 'wp_enqueue_scripts', 'tonal_wpcom_scripts' );