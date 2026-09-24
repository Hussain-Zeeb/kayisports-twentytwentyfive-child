<?php
// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );
    // Version by file time so browsers pick up changes (the server caches CSS for a year).
    wp_enqueue_style( 'twentytwentyfive-child-style', get_stylesheet_uri(), array('twentytwentyfive-style'), filemtime( get_stylesheet_directory() . '/style.css' ) );

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
    // Category archives only — the shop page (archive-product.html) uses plain product cards.
    if ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) {
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
// thumbnails + zoom/photoswipe) for a given product, so archive / category grid
// cards match the single product page exactly.
function kayi_render_product_gallery( $product_id ) {
    if ( ! function_exists( 'woocommerce_show_product_images' ) ) {
        return '';
    }

    $current_product = wc_get_product( $product_id );
    if ( ! $current_product instanceof WC_Product ) {
        return '';
    }

    // Temporarily set the global $product so WooCommerce's template functions
    // (wc_get_gallery_image_ids(), get_post_thumbnail_id(), etc.) resolve to the
    // product being rendered.
    $previous_product   = isset( $GLOBALS['product'] ) ? $GLOBALS['product'] : null;
    $GLOBALS['product'] = $current_product;

    ob_start();
    woocommerce_show_product_images();
    $output = ob_get_clean();

    $GLOBALS['product'] = $previous_product;

    return $output;
}

// In product grids, a Product Image block with the "kayi-card-gallery" class renders
// the full gallery instead. The block receives each card's postId via block context;
// a shortcode block does not (and its output gets reused for every card).
add_filter( 'render_block_woocommerce/product-image', function( $block_content, $block, $instance ) {
    $class = $block['attrs']['className'] ?? '';
    if ( false === strpos( $class, 'kayi-card-gallery' ) || ! $instance instanceof WP_Block || empty( $instance->context['postId'] ) ) {
        return $block_content;
    }

    return kayi_render_product_gallery( (int) $instance->context['postId'] );
}, 10, 3 );

// Kept for pages outside product loops (uses the current post).
add_shortcode( 'kayi_product_gallery', function() {
    return kayi_render_product_gallery( get_the_ID() );
} );

// Render a full-width banner for WooCommerce product category archives, using
// the category's thumbnail image (set under Products > Categories) as a cover
// background with the category name and description overlaid on top.
// [kayi_category_banner show_description="no"] hides the description (e.g. when a
// long SEO description is rendered further down the template instead).
add_shortcode( 'kayi_category_banner', function( $atts ) {
    $atts = shortcode_atts( array( 'show_description' => 'yes' ), $atts, 'kayi_category_banner' );

    if ( ! function_exists( 'is_product_taxonomy' ) || ! is_product_taxonomy() ) {
        return '';
    }

    $term = get_queried_object();

    if ( ! $term instanceof WP_Term ) {
        return '';
    }

    $thumbnail_id    = get_term_meta( $term->term_id, 'thumbnail_id', true );
    $background_url  = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'full' ) : '';
    $description     = 'no' === $atts['show_description'] ? '' : term_description( $term->term_id, $term->taxonomy );

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
// ── Mega menu content ─────────────────────────────────────────────────────────
// Each top-level Navigation submenu that links to a product category gets a
// "Shop all …" heading and up to three image tiles (its sub-categories), so the
// panel reads like Adidas's. Links themselves stay editable in the Navigation block.
function kayi_mega_tile_image_id( $term_id ) {
    $thumbnail_id = (int) get_term_meta( $term_id, 'thumbnail_id', true );
    if ( $thumbnail_id ) {
        return $thumbnail_id;
    }

    // No category image — fall back to the newest product's image in that category.
    $products = wc_get_products( array(
        'status'   => 'publish',
        'limit'    => 1,
        'orderby'  => 'date',
        'order'    => 'DESC',
        'return'   => 'ids',
        'tax_query' => array( array( 'taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $term_id ) ),
    ) );

    return $products ? (int) get_post_thumbnail_id( $products[0] ) : 0;
}

add_filter( 'render_block_core/navigation-submenu', function( $block_content, $block ) {
    if ( ! function_exists( 'wc_get_products' ) || 'taxonomy' !== ( $block['attrs']['kind'] ?? '' ) || empty( $block['attrs']['id'] ) ) {
        return $block_content;
    }

    $parent = get_term( (int) $block['attrs']['id'], 'product_cat' );
    if ( ! $parent instanceof WP_Term ) {
        return $block_content;
    }

    $tiles = '';
    $count = 0;
    foreach ( $block['innerBlocks'] as $child ) {
        if ( $count >= 3 || 'taxonomy' !== ( $child['attrs']['kind'] ?? '' ) || empty( $child['attrs']['id'] ) ) {
            continue;
        }
        $image_id = kayi_mega_tile_image_id( (int) $child['attrs']['id'] );
        if ( ! $image_id ) {
            continue;
        }
        $label  = $child['attrs']['label'] ?? '';
        $tiles .= sprintf(
            '<a class="dz-mega__tile" href="%1$s" tabindex="-1"><span class="dz-mega__tile-img">%2$s</span><span class="dz-mega__tile-label">%3$s</span></a>',
            esc_url( $child['attrs']['url'] ?? get_term_link( (int) $child['attrs']['id'], 'product_cat' ) ),
            wp_get_attachment_image( $image_id, 'medium_large', false, array( 'loading' => 'lazy', 'alt' => '' ) ),
            wp_kses_post( $label )
        );
        $count++;
    }

    $heading = sprintf(
        '<li class="dz-mega__all wp-block-navigation-item"><a class="wp-block-navigation-item__content" href="%1$s">%2$s</a></li>',
        esc_url( get_term_link( $parent ) ),
        /* translators: %s: category name */
        esc_html( sprintf( __( 'Shop all %s', 'twentytwentyfive-child' ), wp_strip_all_tags( $block['attrs']['label'] ?? $parent->name ) ) )
    );
    $promo = $tiles ? '<li class="dz-mega__promo" aria-hidden="true">' . $tiles . '</li>' : '';

    // Heading goes first inside the submenu <ul>, tiles last. Tiles duplicate the text
    // links, so they are hidden from assistive tech and skipped by the Tab key.
    $block_content = preg_replace( '/(<ul[^>]*wp-block-navigation__submenu-container[^>]*>)/', '$1' . $heading, $block_content, 1 );
    $pos = strrpos( $block_content, '</ul>' );
    if ( false !== $pos ) {
        $block_content = substr_replace( $block_content, $promo . '</ul>', $pos, 5 );
    }

    return $block_content;
}, 10, 2 );

// Contact form shortcode [kayi_contact_form] + "Enquiries" admin screen.
require_once get_stylesheet_directory() . '/inc/contact-form.php';
