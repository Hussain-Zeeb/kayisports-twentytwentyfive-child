<?php
// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twentytwentyfive-child-style', get_stylesheet_uri(), array('twentytwentyfive-style') );

    // Enqueue Tailwind CSS output
    $tailwind_css_path = get_stylesheet_directory() . '/dist/tailwind-output.css';
    $tailwind_css_uri  = get_stylesheet_directory_uri() . '/dist/tailwind-output.css';
    if ( file_exists( $tailwind_css_path ) ) {
        wp_enqueue_style( 'twentytwentyfive-child-tailwind', $tailwind_css_uri, array('twentytwentyfive-child-style'), filemtime( $tailwind_css_path ) );
    }

    $animations_path = get_stylesheet_directory() . '/dist/animations.js';
    $animations_uri  = get_stylesheet_directory_uri() . '/dist/animations.js';
    if ( file_exists( $animations_path ) ) {
        wp_enqueue_script( 'twentytwentyfive-child-animations', $animations_uri, array(), filemtime( $animations_path ), true );
    }
});

// this is to test git deployment to cloudways, you can remove it later
add_action( 'wp_footer', function() {
    echo '<!-- This is a test comment to verify git deployment to Cloudways -->';
});