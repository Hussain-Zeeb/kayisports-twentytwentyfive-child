<?php
/**
 * Kayi Sports black & gold brand styles, site-wide.
 *
 * Fonts (self-hosted Anton / Barlow / Barlow Condensed), colours and base
 * element styles come from theme.json. This loads src/kayi.css (header,
 * footer, homepage sections and WooCommerce/page overrides) and dist/kayi.js
 * (marquee, product shelves, boxing-gloves explorer, video tiles).
 */

add_action( 'wp_enqueue_scripts', function () {
	$dir = get_stylesheet_directory();
	$uri = get_stylesheet_directory_uri();

	wp_enqueue_style( 'kayi-brand', $uri . '/src/kayi.css', array( 'twentytwentyfive-child-tailwind' ), filemtime( $dir . '/src/kayi.css' ) );

	if ( file_exists( $dir . '/dist/kayi.js' ) ) {
		wp_enqueue_script( 'kayi-brand', $uri . '/dist/kayi.js', array(), filemtime( $dir . '/dist/kayi.js' ), true );
	}
}, 20 );

// Same styles in the block editor, so pages look right while editing.
add_action( 'after_setup_theme', function () {
	add_editor_style( 'src/kayi.css' );
} );
