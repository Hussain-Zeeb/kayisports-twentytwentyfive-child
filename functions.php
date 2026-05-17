<?php
// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twentytwentyfive-child-style', get_stylesheet_uri(), array('twentytwentyfive-style') );

    // Enqueue Tailwind CSS output
    $tailwind_css = get_stylesheet_directory_uri() . '/dist/tailwind-output.css';
    wp_enqueue_style( 'twentytwentyfive-child-tailwind', $tailwind_css, array('twentytwentyfive-child-style'), filemtime( get_stylesheet_directory() . '/dist/tailwind-output.css' ) );
});

