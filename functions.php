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

    // Load WooCommerce's own single-product gallery assets (flexslider, zoom,
    // photoswipe) on shop/category archives too, since we reuse that gallery
    // markup inside the product loop via woocommerce_show_product_images().
    if ( function_exists( 'is_shop' ) && ( is_shop() || is_product_taxonomy() ) ) {
        if ( wp_style_is( 'woocommerce-general', 'registered' ) ) {
            wp_enqueue_style( 'woocommerce-general' );
        }

        foreach ( array( 'flexslider', 'photoswipe-ui-default', 'photoswipe', 'zoom-vendor', 'wc-single-product' ) as $handle ) {
            if ( wp_script_is( $handle, 'registered' ) ) {
                wp_enqueue_script( $handle );
            }
        }

        foreach ( array( 'photoswipe', 'photoswipe-default-skin' ) as $handle ) {
            if ( wp_style_is( $handle, 'registered' ) ) {
                wp_enqueue_style( $handle );
            }
        }
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

// Render WooCommerce's own single-product image gallery (large image + flexslider
// thumbnails + zoom/photoswipe) for use inside the product loop (archive / category
// grids), so the archive grid gallery matches the single product page exactly.
add_shortcode( 'kayi_product_gallery', function() {
    if ( ! class_exists( 'WooCommerce' ) || ! function_exists( 'woocommerce_show_product_images' ) ) {
        return '';
    }

    $current_product = $GLOBALS['product'] instanceof WC_Product ? $GLOBALS['product'] : wc_get_product( get_the_ID() );

    if ( ! $current_product instanceof WC_Product ) {
        return '';
    }

    // Temporarily set the global $product so WooCommerce's template functions
    // (wc_get_gallery_image_ids(), get_post_thumbnail_id(), etc.) resolve to the
    // product currently being rendered in the loop.
    $previous_product   = isset( $GLOBALS['product'] ) ? $GLOBALS['product'] : null;
    $GLOBALS['product'] = $current_product;

    ob_start();
    woocommerce_show_product_images();
    $output = ob_get_clean();

    $GLOBALS['product'] = $previous_product;

    return $output;
} );

// Render a full-width banner for WooCommerce product category archives, using
// the category's thumbnail image (set under Products > Categories) as a cover
// background with the category name and description overlaid on top.
add_shortcode( 'kayi_category_banner', function() {
    if ( ! function_exists( 'is_product_taxonomy' ) || ! is_product_taxonomy() ) {
        return '';
    }

    $term = get_queried_object();

    if ( ! $term instanceof WP_Term ) {
        return '';
    }

    $thumbnail_id    = get_term_meta( $term->term_id, 'thumbnail_id', true );
    $background_url  = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'full' ) : '';
    $description     = term_description( $term->term_id, $term->taxonomy );

    $section_classes = 'kayi-category-banner relative flex min-h-[40vh] md:min-h-[55vh] w-full items-center justify-center overflow-hidden bg-cover bg-center bg-no-repeat text-center';
    $section_classes .= $background_url ? '' : ' bg-neutral-900';

    ob_start();
    ?>
    <section
        class="<?php echo esc_attr( $section_classes ); ?>"
        <?php if ( $background_url ) : ?>
            style="background-image:url('<?php echo esc_url( $background_url ); ?>');"
        <?php endif; ?>
    >
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 mx-auto max-w-3xl px-6 py-16 text-white">
            <h1 class="mb-4 text-4xl font-bold md:text-5xl"><?php echo esc_html( $term->name ); ?></h1>
            <?php if ( $description ) : ?>
                <div class="text-lg md:text-xl [&_p]:mb-0"><?php echo wp_kses_post( $description ); ?></div>
            <?php endif; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
} );