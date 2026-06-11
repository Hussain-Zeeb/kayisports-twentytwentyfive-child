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

    $mega_menu_path = get_stylesheet_directory() . '/dist/mega-menu.js';
    $mega_menu_uri  = get_stylesheet_directory_uri() . '/dist/mega-menu.js';
    if ( file_exists( $mega_menu_path ) ) {
        wp_enqueue_script( 'twentytwentyfive-child-mega-menu', $mega_menu_uri, array(), filemtime( $mega_menu_path ), true );
    }

    $smooth_scroll_path = get_stylesheet_directory() . '/dist/smooth-scroll.js';
    $smooth_scroll_uri  = get_stylesheet_directory_uri() . '/dist/smooth-scroll.js';
    if ( file_exists( $smooth_scroll_path ) ) {
        wp_enqueue_script( 'twentytwentyfive-child-smooth-scroll', $smooth_scroll_uri, array(), filemtime( $smooth_scroll_path ), true );
    }
});

/* Loader disabled — uncomment to re-enable
add_action( 'wp_head', function() {
        if ( ! is_front_page() && ! is_home() ) {
            return;
        }

        ?>
        <script>
            (function () {
                try {
                    var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

                    if (!reduceMotion) {
                        document.documentElement.classList.add("dz-loader-pending");
                    }
                } catch (error) {
                    document.documentElement.classList.add("dz-loader-pending");
                }
            })();
        </script>
        <?php
}, 1 );
*/

/* Loader disabled — uncomment to re-enable
add_action( 'wp_body_open', function() {
    if ( ! is_front_page() && ! is_home() ) {
        return;
    }

        $loader_logo_uri = get_stylesheet_directory_uri() . '/src/assets/loader-logo.svg';
        ?>
        <div id="dz-loader" class="dz-loader" aria-hidden="true">
            <div class="dz-loader__content">
                <div class="dz-loader__logo-wrap">
                    <span class="dz-loader__orbit" aria-hidden="true">
                        <span class="dz-loader__atom"></span>
                    </span>
                    <img class="dz-loader__logo" src="<?php echo esc_url( $loader_logo_uri ); ?>" alt="Loading" />
                </div>
                <p class="dz-loader__words" aria-live="polite" aria-atomic="true">
                    <span class="dz-loader__word">KayiSports</span>
                </p>
            </div>
        </div>
        <?php
} );
*/

// this is to test git deployment to cloudways, you can remove it later
add_action( 'wp_footer', function() {
    echo '<!-- This is a test comment to verify git deployment to Cloudways -->';
});

// Allow SVG uploads
add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});

add_filter( 'wp_check_filetype_and_ext', function( $data, $file, $filename, $mimes ) {
    if ( ! $data['type'] ) {
        $ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
        if ( $ext === 'svg' || $ext === 'svgz' ) {
            $data['type'] = 'image/svg+xml';
            $data['ext']  = $ext;
        }
    }
    return $data;
}, 10, 4 );

// Register child-theme block patterns explicitly (child themes are not auto-scanned).
add_action( 'init', function() {
    // Register a custom pattern category for this theme.
    register_block_pattern_category(
        'kayisports',
        array( 'label' => __( 'KayiSports', 'twentytwentyfive-child' ) )
    );

    // Scan every .php file inside the child theme's patterns/ directory.
    $patterns_dir = get_stylesheet_directory() . '/patterns';
    if ( ! is_dir( $patterns_dir ) ) {
        return;
    }

    $pattern_files = glob( $patterns_dir . '/*.php' );
    if ( empty( $pattern_files ) ) {
        return;
    }

    foreach ( $pattern_files as $file ) {
        $pattern_data = get_file_data( $file, array(
            'title'         => 'Title',
            'slug'          => 'Slug',
            'description'   => 'Description',
            'categories'    => 'Categories',
            'keywords'      => 'Keywords',
            'viewport_width' => 'Viewport Width',
            'inserter'      => 'Inserter',
        ) );

        if ( empty( $pattern_data['title'] ) || empty( $pattern_data['slug'] ) ) {
            continue;
        }

        // Skip patterns explicitly marked as non-inserter.
        if ( isset( $pattern_data['inserter'] ) && 'false' === strtolower( trim( $pattern_data['inserter'] ) ) ) {
            continue;
        }

        $categories = ! empty( $pattern_data['categories'] )
            ? array_map( 'trim', explode( ',', $pattern_data['categories'] ) )
            : array( 'kayisports' );

        $keywords = ! empty( $pattern_data['keywords'] )
            ? array_map( 'trim', explode( ',', $pattern_data['keywords'] ) )
            : array();

        ob_start();
        include $file;
        $content = ob_get_clean();

        $args = array(
            'title'      => $pattern_data['title'],
            'content'    => $content,
            'categories' => $categories,
            'keywords'   => $keywords,
        );

        if ( ! empty( $pattern_data['description'] ) ) {
            $args['description'] = $pattern_data['description'];
        }

        if ( ! empty( $pattern_data['viewport_width'] ) ) {
            $args['viewportWidth'] = (int) $pattern_data['viewport_width'];
        }

        register_block_pattern( $pattern_data['slug'], $args );
    }
} );