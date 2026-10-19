<?php
/**
 * Trade accounts for gyms, clubs, schools and coaches.
 *
 * - [kayi_trade_apply]  application form → a customer account marked "pending".
 *   Approve or decline under WooCommerce › Trade (or the Trade column in Users).
 * - Approved accounts get the "Trade customer" role: a discount off RRP that
 *   grows with the number of units in the basket, prices shown without VAT,
 *   a minimum order, card payment only and the bulk order form [kayi_trade_order].
 * - [kayi_trade_quote]  custom-branding quote request (logo upload), saved under
 *   WooCommerce › Quote requests and emailed.
 * - [kayi_trade_tiers] / [kayi_trade_value] print the current pricing on the
 *   Gyms & Clubs page (patterns/trade.php).
 *
 * Tiers, minimum order and the notification address: WooCommerce › Trade
 * (option kayi_trade_settings). Prices are entered including VAT as usual;
 * trade customers see them without it (WooCommerce taxes must be enabled).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ── Settings ───────────────────────────────────────────────────────────── */

function kayi_trade_settings() {
	$s = wp_parse_args( (array) get_option( 'kayi_trade_settings', array() ), array(
		// Example values until the client confirms their trade terms.
		'tiers'     => array(
			array( 'min' => 10, 'off' => 20 ),
			array( 'min' => 25, 'off' => 25 ),
			array( 'min' => 50, 'off' => 30 ),
		),
		'min_units' => 10,
		'recipient' => '',
	) );

	$tiers = array();
	foreach ( (array) $s['tiers'] as $tier ) {
		$min = absint( $tier['min'] ?? 0 );
		$off = min( 90, max( 0, (float) ( $tier['off'] ?? 0 ) ) );
		if ( $min && $off ) {
			$tiers[ $min ] = array( 'min' => $min, 'off' => $off );
		}
	}
	ksort( $tiers );
	$s['tiers']     = array_values( $tiers );
	$s['min_units'] = absint( $s['min_units'] );
	return $s;
}

function kayi_trade_recipient() {
	$to = kayi_trade_settings()['recipient'];
	return is_email( $to ) ? $to : apply_filters( 'kayi_contact_recipient', get_option( 'admin_email' ) );
}

// % off RRP for a basket of $units. Below the first tier the first tier still
// applies, so trade customers always see trade prices (the minimum order
// stops checkout until they reach it).
function kayi_trade_discount( $units ) {
	$tiers = kayi_trade_settings()['tiers'];
	$off   = $tiers ? $tiers[0]['off'] : 0;
	foreach ( $tiers as $tier ) {
		if ( $units >= $tier['min'] ) {
			$off = $tier['off'];
		}
	}
	return (float) $off;
}

function kayi_trade_units() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return 0;
	}
	return (int) array_sum( wp_list_pluck( WC()->cart->get_cart_contents(), 'quantity' ) );
}

function kayi_trade_current_discount() {
	return kayi_trade_discount( kayi_trade_units() );
}

function kayi_is_trade_user( $user = null ) {
	if ( null === $user ) {
		// Admins previewing the order form see it priced as trade.
		if ( ! empty( $GLOBALS['kayi_trade_preview'] ) ) {
			return true;
		}
		$user = did_action( 'init' ) ? wp_get_current_user() : null;
	}
	return $user instanceof WP_User && in_array( 'kayi_trade', (array) $user->roles, true );
}

function kayi_trade_status( $user_id ) {
	return (string) get_user_meta( $user_id, 'kayi_trade_status', true );
}

function kayi_trade_url( $path = '' ) {
	return home_url( '/trade/' . ltrim( $path, '/' ) );
}

function kayi_trade_order_url() {
	return kayi_trade_url( 'order/' );
}

function kayi_trade_button( $label, $url, $style = 'gold' ) {
	return sprintf(
		'<div class="wp-block-button kayi-c-btn-%1$s"><a class="wp-block-button__link wp-element-button" href="%2$s">%3$s</a></div>',
		esc_attr( $style ),
		esc_url( $url ),
		esc_html( $label )
	);
}

function kayi_trade_mail( $to, $subject, $body, $reply_to = '' ) {
	$headers = $reply_to ? array( 'Reply-To: ' . $reply_to ) : array();
	return wp_mail(
		$to,
		sprintf( '[%s] %s', wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ), $subject ),
		$body,
		$headers
	);
}

add_action( 'init', function () {
	if ( ! get_role( 'kayi_trade' ) ) {
		add_role( 'kayi_trade', __( 'Trade customer', 'twentytwentyfive-child' ), array( 'read' => true ) );
	}

	register_post_type( 'kayi_quote', array(
		'labels'          => array(
			'name'          => __( 'Quote requests', 'twentytwentyfive-child' ),
			'singular_name' => __( 'Quote request', 'twentytwentyfive-child' ),
		),
		'public'          => false,
		'show_ui'         => true,
		'show_in_menu'    => 'woocommerce',
		'supports'        => array( 'title', 'editor' ),
		'capability_type' => 'post',
		'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
		'map_meta_cap'    => true,
	) );
} );

/* ── Pricing ────────────────────────────────────────────────────────────── */

// Trade price = RRP less the current tier, unless the product's sale price is
// already lower. Worked out from the regular price every time, so it never
// stacks on itself.
function kayi_trade_price( $price, $product ) {
	if ( ! kayi_is_trade_user() ) {
		return $price;
	}
	$regular = (float) $product->get_regular_price( 'edit' );
	if ( $regular <= 0 ) {
		return $price;
	}
	$trade = round( $regular * ( 100 - kayi_trade_current_discount() ) / 100, wc_get_price_decimals() );
	return ( is_numeric( $price ) && $price > 0 && $price < $trade ) ? $price : (string) $trade;
}
add_filter( 'woocommerce_product_get_price', 'kayi_trade_price', 20, 2 );
add_filter( 'woocommerce_product_variation_get_price', 'kayi_trade_price', 20, 2 );
add_filter( 'woocommerce_variation_prices_price', function ( $price, $variation ) {
	return kayi_trade_price( $price, $variation );
}, 20, 2 );

// Variable product price ranges are cached; keep trade and retail apart.
add_filter( 'woocommerce_get_variation_prices_hash', function ( $hash ) {
	if ( kayi_is_trade_user() ) {
		$hash[] = 'kayi-trade-' . kayi_trade_current_discount();
	}
	return $hash;
} );

// Trade customers see prices without VAT; VAT is added at checkout.
foreach ( array( 'woocommerce_tax_display_shop', 'woocommerce_tax_display_cart' ) as $kayi_trade_option ) {
	add_filter( 'option_' . $kayi_trade_option, function ( $value ) {
		return kayi_is_trade_user() ? 'excl' : $value;
	} );
}
unset( $kayi_trade_option );

// RRP (including VAT) of a product, for the "RRP £x" reference line.
function kayi_trade_rrp( $product ) {
	if ( $product->is_type( 'variable' ) ) {
		return (float) $product->get_variation_regular_price( 'min' );
	}
	return (float) $product->get_regular_price( 'edit' );
}

add_filter( 'woocommerce_get_price_html', function ( $html, $product ) {
	if ( ! kayi_is_trade_user() || '' === $product->get_price() ) {
		return $html;
	}
	if ( $product->is_type( 'variable' ) ) {
		$min = $product->get_variation_price( 'min', true );
		$max = $product->get_variation_price( 'max', true );
		$now = $min === $max ? wc_price( $min ) : wc_format_price_range( $min, $max );
	} else {
		$now = wc_price( wc_get_price_to_display( $product ) );
	}
	$rrp = kayi_trade_rrp( $product );

	return sprintf(
		'<span class="kayi-trade-price"><span class="kayi-trade-price__now">%1$s</span> <small class="kayi-trade-price__tax">%2$s</small>%3$s</span>',
		$now,
		esc_html__( 'ex VAT', 'twentytwentyfive-child' ),
		$rrp > 0 ? '<span class="kayi-trade-price__rrp">' . esc_html__( 'RRP', 'twentytwentyfive-child' ) . ' ' . wc_price( $rrp ) . '</span>' : ''
	);
}, 20, 2 );

// Product pages: a line under the price about the tiers and the order form.
add_filter( 'render_block_woocommerce/product-price', function ( $content, $block, $instance ) {
	// Only under the main product, not the related products below it.
	if ( ! kayi_is_trade_user() || ! is_product() || (int) ( $instance->context['postId'] ?? 0 ) !== get_queried_object_id() ) {
		return $content;
	}

	$tiers = array_map( function ( $t ) {
		/* translators: 1: units, 2: discount */
		return sprintf( __( '%1$d+ units %2$s%% off', 'twentytwentyfive-child' ), $t['min'], wc_format_localized_decimal( $t['off'] ) );
	}, kayi_trade_settings()['tiers'] );

	return $content . sprintf(
		'<p class="kayi-trade-note"><strong>%1$s</strong> %2$s. %3$s <a href="%4$s">%5$s</a></p>',
		esc_html__( 'Trade pricing:', 'twentytwentyfive-child' ),
		esc_html( implode( ' · ', $tiers ) ),
		esc_html__( 'Every item in your basket counts.', 'twentytwentyfive-child' ),
		esc_url( kayi_trade_order_url() ),
		esc_html__( 'Bulk order form', 'twentytwentyfive-child' )
	);
}, 10, 3 );

/* ── Basket, checkout and orders ────────────────────────────────────────── */

add_action( 'woocommerce_check_cart_items', function () {
	if ( ! kayi_is_trade_user() ) {
		return;
	}
	$min   = kayi_trade_settings()['min_units'];
	$units = kayi_trade_units();
	if ( $min && $units < $min ) {
		wc_add_notice(
			/* translators: 1: minimum units, 2: units in basket, 3: units still needed */
			sprintf( __( 'Trade orders start at %1$d units. You have %2$d in your basket, so add %3$d more to check out.', 'twentytwentyfive-child' ), $min, $units, $min - $units ),
			'error'
		);
	}
} );

// Card payment only: no bank transfer, cheque or cash on delivery for trade.
add_filter( 'woocommerce_available_payment_gateways', function ( $gateways ) {
	if ( kayi_is_trade_user() ) {
		foreach ( apply_filters( 'kayi_trade_blocked_gateways', array( 'bacs', 'cheque', 'cod' ) ) as $id ) {
			unset( $gateways[ $id ] );
		}
	}
	return $gateways;
} );

function kayi_trade_tag_order( $order ) {
	if ( ! kayi_is_trade_user() ) {
		return;
	}
	$order->update_meta_data( '_kayi_trade_order', 'yes' );
	$order->update_meta_data( '_kayi_trade_discount', kayi_trade_current_discount() );
	$vat = get_user_meta( get_current_user_id(), 'kayi_trade_vat', true );
	if ( $vat ) {
		$order->update_meta_data( '_kayi_trade_vat', $vat );
	}
}
add_action( 'woocommerce_checkout_create_order', 'kayi_trade_tag_order' );
add_action( 'woocommerce_store_api_checkout_update_order_meta', 'kayi_trade_tag_order' );

add_action( 'woocommerce_admin_order_data_after_billing_address', function ( $order ) {
	if ( 'yes' !== $order->get_meta( '_kayi_trade_order' ) ) {
		return;
	}
	$vat = $order->get_meta( '_kayi_trade_vat' );
	printf(
		'<p><strong>%1$s</strong><br>%2$s%3$s</p>',
		esc_html__( 'Trade order', 'twentytwentyfive-child' ),
		/* translators: %s: discount */
		esc_html( sprintf( __( '%s%% off RRP', 'twentytwentyfive-child' ), wc_format_localized_decimal( $order->get_meta( '_kayi_trade_discount' ) ) ) ),
		$vat ? '<br>' . esc_html__( 'VAT number:', 'twentytwentyfive-child' ) . ' ' . esc_html( $vat ) : ''
	);
} );

add_filter( 'woocommerce_email_order_meta_fields', function ( $fields, $sent_to_admin, $order ) {
	$vat = $order->get_meta( '_kayi_trade_vat' );
	if ( $vat ) {
		$fields['kayi_trade_vat'] = array( 'label' => __( 'VAT number', 'twentytwentyfive-child' ), 'value' => $vat );
	}
	return $fields;
}, 10, 3 );

/* ── Site-wide bits for trade customers ─────────────────────────────────── */

add_action( 'wp_body_open', function () {
	if ( ! kayi_is_trade_user() ) {
		return;
	}
	printf(
		'<div class="kayi-tradebar"><p>%1$s <span>%2$s</span></p><a href="%3$s">%4$s</a></div>',
		esc_html__( 'Trade account', 'twentytwentyfive-child' ),
		esc_html__( 'Prices shown without VAT', 'twentytwentyfive-child' ),
		esc_url( kayi_trade_order_url() ),
		esc_html__( 'Bulk order form →', 'twentytwentyfive-child' )
	);
} );

add_filter( 'woocommerce_account_menu_items', function ( $items ) {
	if ( ! kayi_is_trade_user() ) {
		return $items;
	}
	$out = array();
	foreach ( $items as $key => $label ) {
		$out[ $key ] = $label;
		if ( 'dashboard' === $key ) {
			$out['kayi-trade-order'] = __( 'Trade order form', 'twentytwentyfive-child' );
		}
	}
	return $out;
} );

add_filter( 'woocommerce_get_endpoint_url', function ( $url, $endpoint ) {
	return 'kayi-trade-order' === $endpoint ? kayi_trade_order_url() : $url;
}, 10, 2 );

add_action( 'woocommerce_account_dashboard', function () {
	$user_id = get_current_user_id();
	if ( kayi_is_trade_user() ) {
		echo '<div class="kayi-trade-box"><p><strong>' . esc_html__( 'Your trade account is active.', 'twentytwentyfive-child' ) . '</strong> ';
		echo esc_html__( 'Trade prices are shown without VAT across the shop. Use the bulk order form to order several products and sizes in one go.', 'twentytwentyfive-child' ) . '</p>';
		echo '<p><a class="button" href="' . esc_url( kayi_trade_order_url() ) . '">' . esc_html__( 'Bulk order form', 'twentytwentyfive-child' ) . '</a></p></div>';
	} elseif ( 'pending' === kayi_trade_status( $user_id ) ) {
		echo '<div class="kayi-trade-box"><p><strong>' . esc_html__( 'Trade application received.', 'twentytwentyfive-child' ) . '</strong> ';
		echo esc_html__( 'We’re reviewing your details and will email you once your trade account is ready.', 'twentytwentyfive-child' ) . '</p></div>';
	}
} );

/* ── Application form ───────────────────────────────────────────────────── */

function kayi_trade_fields() {
	return array(
		'company'  => array( 'label' => __( 'Business name', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'organization' ),
		'type'     => array(
			'label'    => __( 'Type of business', 'twentytwentyfive-child' ),
			'required' => true,
			'options'  => array( 'Gym', 'Boxing or martial arts club', 'School, college or university', 'Coach or personal trainer', 'Retailer', 'Other' ),
		),
		'name'     => array( 'label' => __( 'Your name', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'name' ),
		'email'    => array( 'label' => __( 'Email', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'email', 'type' => 'email' ),
		'phone'    => array( 'label' => __( 'Phone', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'tel', 'type' => 'tel' ),
		'site'     => array( 'label' => __( 'Website or social page', 'twentytwentyfive-child' ), 'auto' => 'url' ),
		'address'  => array( 'label' => __( 'Address', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'address-line1', 'wide' => true ),
		'city'     => array( 'label' => __( 'Town or city', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'address-level2' ),
		'postcode' => array( 'label' => __( 'Postcode', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'postal-code' ),
		'vat'      => array( 'label' => __( 'VAT number', 'twentytwentyfive-child' ) ),
		'volume'   => array(
			'label'    => __( 'Typical order size', 'twentytwentyfive-child' ),
			'required' => true,
			'options'  => array( '10–24 units', '25–49 units', '50–99 units', '100+ units' ),
		),
		'message'  => array( 'label' => __( 'Anything else we should know?', 'twentytwentyfive-child' ), 'textarea' => true, 'wide' => true ),
	);
}

// One form field (shared by the application and quote forms).
function kayi_trade_field_html( $prefix, $key, $field, $value = '' ) {
	$id    = $prefix . '-' . $key;
	$name  = $prefix . '_' . $key;
	$req   = ! empty( $field['required'] );
	$label = esc_html( $field['label'] ) . ( $req ? '' : ' <span class="kayi-form__opt">' . esc_html__( 'optional', 'twentytwentyfive-child' ) . '</span>' );
	$attrs = sprintf( 'id="%s" name="%s"%s', esc_attr( $id ), esc_attr( $name ), $req ? ' required' : '' );

	if ( ! empty( $field['options'] ) ) {
		$input = '<select ' . $attrs . '><option value="">' . esc_html__( 'Choose…', 'twentytwentyfive-child' ) . '</option>';
		foreach ( $field['options'] as $option ) {
			$input .= sprintf( '<option%s>%s</option>', selected( $value, $option, false ), esc_html( $option ) );
		}
		$input .= '</select>';
	} elseif ( ! empty( $field['textarea'] ) ) {
		$input = '<textarea ' . $attrs . ' rows="4" maxlength="3000">' . esc_textarea( $value ) . '</textarea>';
	} else {
		$input = sprintf(
			'<input %1$s type="%2$s" value="%3$s" maxlength="150"%4$s>',
			$attrs,
			esc_attr( $field['type'] ?? 'text' ),
			esc_attr( $value ),
			empty( $field['auto'] ) ? '' : ' autocomplete="' . esc_attr( $field['auto'] ) . '"'
		);
	}

	return sprintf(
		'<p class="kayi-form__field%1$s"><label for="%2$s">%3$s</label>%4$s</p>',
		empty( $field['wide'] ) ? '' : ' is-wide',
		esc_attr( $id ),
		$label,
		$input
	);
}

function kayi_trade_notice( $type, $text ) {
	return sprintf(
		'<p class="kayi-form__notice is-%1$s" role="%2$s">%3$s</p>',
		esc_attr( $type ),
		'error' === $type ? 'alert' : 'status',
		esc_html( $text )
	);
}

add_shortcode( 'kayi_trade_apply', function () {
	$user = wp_get_current_user();

	if ( kayi_is_trade_user( $user ) ) {
		return '<div class="kayi-tr-panel"><h3 class="kayi-lp-h3">' . esc_html__( 'Your trade account is active.', 'twentytwentyfive-child' ) . '</h3>'
			. '<p>' . esc_html__( 'Trade prices are already showing across the shop, without VAT.', 'twentytwentyfive-child' ) . '</p>'
			. '<div class="wp-block-buttons kayi-c-buttons">'
			. kayi_trade_button( __( 'Open the order form', 'twentytwentyfive-child' ), kayi_trade_order_url() )
			. kayi_trade_button( __( 'Shop', 'twentytwentyfive-child' ), wc_get_page_permalink( 'shop' ), 'outline' )
			. '</div></div>';
	}

	$status = isset( $_GET['kayi_trade'] ) ? sanitize_key( wp_unslash( $_GET['kayi_trade'] ) ) : '';

	if ( 'applied' === $status || ( $user->ID && 'pending' === kayi_trade_status( $user->ID ) ) ) {
		return '<div class="kayi-tr-panel" id="kayi-trade-apply"><h3 class="kayi-lp-h3">' . esc_html__( 'Thanks, your application is in.', 'twentytwentyfive-child' ) . '</h3>'
			. '<p>' . esc_html__( 'We’ll check your details and email you as soon as your trade account is ready. Need a hand in the meantime? Just reply to the confirmation email.', 'twentytwentyfive-child' ) . '</p></div>';
	}

	$notice = '';
	if ( 'invalid' === $status ) {
		$notice = kayi_trade_notice( 'error', __( 'Please fill in the required fields with a valid email address.', 'twentytwentyfive-child' ) );
	} elseif ( 'error' === $status ) {
		$notice = kayi_trade_notice( 'error', __( 'Sorry, something went wrong. Please try again in a minute or contact us.', 'twentytwentyfive-child' ) );
	}

	// Logged-in customers: start from what we already know about them.
	$values = array();
	if ( $user->ID ) {
		$values = array(
			'company'  => get_user_meta( $user->ID, 'billing_company', true ),
			'name'     => trim( $user->first_name . ' ' . $user->last_name ),
			'email'    => $user->user_email,
			'phone'    => get_user_meta( $user->ID, 'billing_phone', true ),
			'address'  => get_user_meta( $user->ID, 'billing_address_1', true ),
			'city'     => get_user_meta( $user->ID, 'billing_city', true ),
			'postcode' => get_user_meta( $user->ID, 'billing_postcode', true ),
		);
	}

	ob_start();
	?>
	<form id="kayi-trade-apply" class="kayi-form kayi-tr-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<?php echo $notice; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in kayi_trade_notice(). ?>
		<input type="hidden" name="action" value="kayi_trade_apply">
		<input type="hidden" name="kayi_return" value="<?php echo esc_url( get_permalink() ); ?>">
		<div class="kayi-tr-form__grid">
			<?php
			foreach ( kayi_trade_fields() as $key => $field ) {
				echo kayi_trade_field_html( 'kayi-trade', $key, $field, $values[ $key ] ?? '' ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped inside.
			}
			?>
		</div>
		<p class="kayi-form__hp" aria-hidden="true">
			<label for="kayi-trade-hp">Leave blank</label>
			<input id="kayi-trade-hp" name="kayi_hp" type="text" tabindex="-1" autocomplete="off">
		</p>
		<p class="kayi-form__consent">
			<?php
			printf(
				/* translators: %s: privacy policy link */
				esc_html__( 'We’ll use these details to set up and run your trade account. See our %s.', 'twentytwentyfive-child' ),
				'<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'twentytwentyfive-child' ) . '</a>'
			);
			?>
		</p>
		<p><button type="submit" class="kayi-tr-submit"><?php esc_html_e( 'Apply for a trade account', 'twentytwentyfive-child' ); ?></button></p>
	</form>
	<?php
	return ob_get_clean();
} );

// Spam guard shared by both public forms: honeypot + one post per IP a minute.
// No nonce, as with the contact form: the page is cached for visitors.
function kayi_trade_guard( $form, $go, $ok ) {
	if ( ! empty( $_POST['kayi_hp'] ) ) {
		$go( $ok ); // Bots: pretend it worked so they don't retry.
	}
	$ip_key = 'kayi_' . $form . '_' . md5( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
	if ( get_transient( $ip_key ) ) {
		$go( 'error' );
	}
	set_transient( $ip_key, 1, MINUTE_IN_SECONDS );
}

function kayi_trade_redirector( $param, $anchor ) {
	$return = isset( $_POST['kayi_return'] ) ? esc_url_raw( wp_unslash( $_POST['kayi_return'] ) ) : kayi_trade_url();
	$return = wp_validate_redirect( $return, kayi_trade_url() );
	return function ( $status ) use ( $return, $param, $anchor ) {
		wp_safe_redirect( add_query_arg( $param, $status, $return ) . '#' . $anchor );
		exit;
	};
}

function kayi_trade_apply_handle() {
	$go = kayi_trade_redirector( 'kayi_trade', 'kayi-trade-apply' );

	$data = array();
	foreach ( kayi_trade_fields() as $key => $field ) {
		$raw          = wp_unslash( $_POST[ 'kayi-trade_' . $key ] ?? '' );
		$data[ $key ] = ! empty( $field['textarea'] ) ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
		if ( ! empty( $field['options'] ) && '' !== $data[ $key ] && ! in_array( $data[ $key ], $field['options'], true ) ) {
			$data[ $key ] = '';
		}
		if ( ! empty( $field['required'] ) && '' === $data[ $key ] ) {
			$go( 'invalid' );
		}
	}
	$data['email'] = sanitize_email( $data['email'] );
	if ( ! is_email( $data['email'] ) ) {
		$go( 'invalid' );
	}

	kayi_trade_guard( 'trade_apply', $go, 'applied' );

	// The account: the logged-in customer, an existing account with this
	// email, or a new customer account (no password until approved).
	$user_id = get_current_user_id();
	if ( ! $user_id ) {
		$existing = get_user_by( 'email', $data['email'] );
		$user_id  = $existing ? $existing->ID : 0;
	}
	$names = explode( ' ', $data['name'], 2 );
	if ( ! $user_id ) {
		$user_id = wp_insert_user( array(
			'user_login' => wc_create_new_customer_username( $data['email'], array( 'first_name' => $names[0], 'last_name' => $names[1] ?? '' ) ),
			'user_email' => $data['email'],
			'user_pass'  => wp_generate_password( 24 ),
			'first_name' => $names[0],
			'last_name'  => $names[1] ?? '',
			'role'       => 'customer',
		) );
		if ( is_wp_error( $user_id ) ) {
			$go( 'error' );
		}
		update_user_meta( $user_id, 'kayi_trade_needs_password', 1 );
	}

	if ( kayi_is_trade_user( get_userdata( $user_id ) ) ) {
		$go( 'applied' );
	}

	foreach ( $data as $key => $value ) {
		update_user_meta( $user_id, 'kayi_trade_' . $key, $value );
	}
	update_user_meta( $user_id, 'kayi_trade_status', 'pending' );
	update_user_meta( $user_id, 'kayi_trade_applied', current_time( 'mysql' ) );

	// Fill the checkout details from the application (where still empty).
	$billing = array(
		'billing_company'    => $data['company'],
		'billing_first_name' => $names[0],
		'billing_last_name'  => $names[1] ?? '',
		'billing_email'      => $data['email'],
		'billing_phone'      => $data['phone'],
		'billing_address_1'  => $data['address'],
		'billing_city'       => $data['city'],
		'billing_postcode'   => $data['postcode'],
		'billing_country'    => 'GB',
	);
	foreach ( $billing as $key => $value ) {
		if ( '' === (string) get_user_meta( $user_id, $key, true ) ) {
			update_user_meta( $user_id, $key, $value );
		}
	}

	$lines = array();
	foreach ( kayi_trade_fields() as $key => $field ) {
		$lines[] = $field['label'] . ': ' . ( '' === $data[ $key ] ? '–' : $data[ $key ] );
	}
	kayi_trade_mail(
		kayi_trade_recipient(),
		/* translators: %s: business name */
		sprintf( __( 'New trade application: %s', 'twentytwentyfive-child' ), $data['company'] ),
		implode( "\n", $lines ) . "\n\n" . __( 'Approve or decline:', 'twentytwentyfive-child' ) . ' ' . admin_url( 'admin.php?page=kayi-trade' ),
		sprintf( '%s <%s>', $data['name'], $data['email'] )
	);
	kayi_trade_mail(
		$data['email'],
		__( 'We’ve received your trade application', 'twentytwentyfive-child' ),
		/* translators: 1: first name, 2: business name */
		sprintf( __( "Hi %1\$s,\n\nThanks for applying for a trade account for %2\$s. We’ll check your details and email you as soon as your account is ready.\n\nThe Kayi Sports team", 'twentytwentyfive-child' ), $names[0], $data['company'] )
	);

	$go( 'applied' );
}
add_action( 'admin_post_nopriv_kayi_trade_apply', 'kayi_trade_apply_handle' );
add_action( 'admin_post_kayi_trade_apply', 'kayi_trade_apply_handle' );

/* ── Approving applications ─────────────────────────────────────────────── */

function kayi_trade_set_status( $user_id, $status ) {
	$user = get_userdata( $user_id );
	if ( ! $user || ! in_array( $status, array( 'pending', 'approved', 'declined' ), true ) || kayi_trade_status( $user_id ) === $status ) {
		return;
	}
	update_user_meta( $user_id, 'kayi_trade_status', $status );
	$first = $user->first_name ? $user->first_name : $user->display_name;

	if ( 'approved' === $status ) {
		$user->add_role( 'kayi_trade' );
		$login = wc_get_page_permalink( 'myaccount' );
		if ( get_user_meta( $user_id, 'kayi_trade_needs_password', true ) ) {
			$key   = get_password_reset_key( $user );
			$login = is_wp_error( $key ) ? wp_lostpassword_url() : add_query_arg( array( 'key' => $key, 'id' => $user_id ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) );
			delete_user_meta( $user_id, 'kayi_trade_needs_password' );
		}
		kayi_trade_mail(
			$user->user_email,
			__( 'Your trade account is ready', 'twentytwentyfive-child' ),
			/* translators: 1: first name, 2: login link, 3: order form link */
			sprintf( __( "Hi %1\$s,\n\nGood news: your Kayi Sports trade account is approved.\n\nLog in here: %2\$s\n\nOnce you’re logged in you’ll see trade prices (without VAT) across the shop, and you can order several products and sizes at once on the bulk order form: %3\$s\n\nThe Kayi Sports team", 'twentytwentyfive-child' ), $first, $login, kayi_trade_order_url() )
		);
	} else {
		$user->remove_role( 'kayi_trade' );
		if ( 'declined' === $status ) {
			kayi_trade_mail(
				$user->user_email,
				__( 'Your trade application', 'twentytwentyfive-child' ),
				/* translators: %s: first name */
				sprintf( __( "Hi %s,\n\nThanks for your interest in a Kayi Sports trade account. We’re not able to open one for you at the moment. You can still shop with us as a regular customer, and if you have any questions just reply to this email.\n\nThe Kayi Sports team", 'twentytwentyfive-child' ), $first )
			);
		}
	}
	do_action( 'kayi_trade_status_changed', $user_id, $status );
}

add_action( 'admin_post_kayi_trade_status', function () {
	$user_id = absint( $_GET['user'] ?? 0 );
	$status  = sanitize_key( wp_unslash( $_GET['status'] ?? '' ) );
	check_admin_referer( 'kayi_trade_status_' . $user_id );
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		wp_die( esc_html__( 'Sorry, you can’t do that.', 'twentytwentyfive-child' ) );
	}
	kayi_trade_set_status( $user_id, $status );
	wp_safe_redirect( wp_get_referer() ? wp_get_referer() : admin_url( 'admin.php?page=kayi-trade' ) );
	exit;
} );

function kayi_trade_status_link( $user_id, $status, $label ) {
	$url = wp_nonce_url( admin_url( 'admin-post.php?action=kayi_trade_status&user=' . $user_id . '&status=' . $status ), 'kayi_trade_status_' . $user_id );
	return '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
}

function kayi_trade_status_label( $status ) {
	$labels = array(
		'pending'  => __( 'Pending', 'twentytwentyfive-child' ),
		'approved' => __( 'Approved', 'twentytwentyfive-child' ),
		'declined' => __( 'Declined', 'twentytwentyfive-child' ),
	);
	return $labels[ $status ] ?? '';
}

// Users list: a Trade column with approve/decline links, and a filter.
add_filter( 'manage_users_columns', function ( $columns ) {
	$columns['kayi_trade'] = __( 'Trade', 'twentytwentyfive-child' );
	return $columns;
} );

add_filter( 'manage_users_custom_column', function ( $output, $column, $user_id ) {
	if ( 'kayi_trade' !== $column ) {
		return $output;
	}
	$status = kayi_trade_status( $user_id );
	if ( ! $status ) {
		return '–';
	}
	$links = array();
	if ( 'approved' !== $status ) {
		$links[] = kayi_trade_status_link( $user_id, 'approved', __( 'Approve', 'twentytwentyfive-child' ) );
	}
	if ( 'declined' !== $status ) {
		$links[] = kayi_trade_status_link( $user_id, 'declined', 'approved' === $status ? __( 'Remove', 'twentytwentyfive-child' ) : __( 'Decline', 'twentytwentyfive-child' ) );
	}
	return '<strong>' . esc_html( kayi_trade_status_label( $status ) ) . '</strong><br>'
		. esc_html( get_user_meta( $user_id, 'kayi_trade_company', true ) ) . '<br>' . implode( ' | ', $links );
}, 10, 3 );

add_action( 'pre_get_users', function ( $query ) {
	if ( ! is_admin() || empty( $_GET['kayi_trade_status'] ) ) {
		return;
	}
	$query->set( 'meta_key', 'kayi_trade_status' );
	$query->set( 'meta_value', sanitize_key( wp_unslash( $_GET['kayi_trade_status'] ) ) );
} );

// Profile screen: the application, read-only, with the status.
function kayi_trade_profile_section( $user ) {
	$status = kayi_trade_status( $user->ID );
	if ( ! current_user_can( 'edit_users' ) && ! $status ) {
		return;
	}
	?>
	<h2><?php esc_html_e( 'Trade account', 'twentytwentyfive-child' ); ?></h2>
	<table class="form-table" role="presentation">
		<tr>
			<th><label for="kayi-trade-status"><?php esc_html_e( 'Status', 'twentytwentyfive-child' ); ?></label></th>
			<td>
				<?php if ( current_user_can( 'edit_users' ) ) : ?>
					<select id="kayi-trade-status" name="kayi_trade_status">
						<option value=""><?php esc_html_e( 'Not a trade customer', 'twentytwentyfive-child' ); ?></option>
						<?php foreach ( array( 'pending', 'approved', 'declined' ) as $option ) : ?>
							<option value="<?php echo esc_attr( $option ); ?>" <?php selected( $status, $option ); ?>><?php echo esc_html( kayi_trade_status_label( $option ) ); ?></option>
						<?php endforeach; ?>
					</select>
					<p class="description"><?php esc_html_e( 'Approving emails the customer a link to log in. Declining emails them too.', 'twentytwentyfive-child' ); ?></p>
				<?php else : ?>
					<?php echo esc_html( kayi_trade_status_label( $status ) ); ?>
				<?php endif; ?>
			</td>
		</tr>
		<?php foreach ( kayi_trade_fields() as $key => $field ) : ?>
			<?php $value = get_user_meta( $user->ID, 'kayi_trade_' . $key, true ); ?>
			<?php if ( '' !== (string) $value ) : ?>
				<tr><th><?php echo esc_html( $field['label'] ); ?></th><td><?php echo nl2br( esc_html( $value ) ); ?></td></tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
	<?php
}
add_action( 'show_user_profile', 'kayi_trade_profile_section' );
add_action( 'edit_user_profile', 'kayi_trade_profile_section' );

function kayi_trade_profile_save( $user_id ) {
	if ( ! current_user_can( 'edit_users' ) || ! isset( $_POST['kayi_trade_status'] ) ) {
		return;
	}
	$status = sanitize_key( wp_unslash( $_POST['kayi_trade_status'] ) );
	if ( '' === $status ) {
		delete_user_meta( $user_id, 'kayi_trade_status' );
		$user = get_userdata( $user_id );
		if ( $user ) {
			$user->remove_role( 'kayi_trade' );
		}
		return;
	}
	kayi_trade_set_status( $user_id, $status );
}
add_action( 'personal_options_update', 'kayi_trade_profile_save' );
add_action( 'edit_user_profile_update', 'kayi_trade_profile_save' );

/* ── WooCommerce › Trade (settings + applications) ──────────────────────── */

function kayi_trade_pending_count() {
	return count( get_users( array( 'meta_key' => 'kayi_trade_status', 'meta_value' => 'pending', 'fields' => 'ID' ) ) );
}

add_action( 'admin_menu', function () {
	$pending = kayi_trade_pending_count();
	add_submenu_page(
		'woocommerce',
		__( 'Trade accounts', 'twentytwentyfive-child' ),
		__( 'Trade', 'twentytwentyfive-child' ) . ( $pending ? ' <span class="awaiting-mod">' . (int) $pending . '</span>' : '' ),
		'manage_woocommerce',
		'kayi-trade',
		'kayi_trade_admin_page'
	);
}, 60 );

function kayi_trade_admin_page() {
	$s       = kayi_trade_settings();
	$pending = get_users( array( 'meta_key' => 'kayi_trade_status', 'meta_value' => 'pending', 'orderby' => 'registered', 'order' => 'DESC' ) );
	$tiers   = array_pad( $s['tiers'], 5, array( 'min' => '', 'off' => '' ) );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Trade accounts', 'twentytwentyfive-child' ); ?></h1>
		<?php if ( isset( $_GET['saved'] ) ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'Trade settings saved.', 'twentytwentyfive-child' ); ?></p></div>
		<?php endif; ?>

		<h2><?php esc_html_e( 'Applications waiting', 'twentytwentyfive-child' ); ?></h2>
		<?php if ( $pending ) : ?>
			<table class="widefat striped">
				<thead><tr>
					<th><?php esc_html_e( 'Business', 'twentytwentyfive-child' ); ?></th>
					<th><?php esc_html_e( 'Contact', 'twentytwentyfive-child' ); ?></th>
					<th><?php esc_html_e( 'Type / size', 'twentytwentyfive-child' ); ?></th>
					<th><?php esc_html_e( 'Applied', 'twentytwentyfive-child' ); ?></th>
					<th></th>
				</tr></thead>
				<tbody>
				<?php foreach ( $pending as $user ) : ?>
					<?php $m = fn( $k ) => get_user_meta( $user->ID, 'kayi_trade_' . $k, true ); ?>
					<tr>
						<td><strong><a href="<?php echo esc_url( get_edit_user_link( $user->ID ) ); ?>"><?php echo esc_html( $m( 'company' ) ); ?></a></strong><br><?php echo esc_html( trim( $m( 'city' ) . ' ' . $m( 'postcode' ) ) ); ?><?php echo $m( 'vat' ) ? '<br>VAT ' . esc_html( $m( 'vat' ) ) : ''; ?></td>
						<td><?php echo esc_html( $m( 'name' ) ); ?><br><a href="mailto:<?php echo esc_attr( $user->user_email ); ?>"><?php echo esc_html( $user->user_email ); ?></a><br><?php echo esc_html( $m( 'phone' ) ); ?></td>
						<td><?php echo esc_html( $m( 'type' ) ); ?><br><?php echo esc_html( $m( 'volume' ) ); ?></td>
						<td><?php echo esc_html( mysql2date( get_option( 'date_format' ), $m( 'applied' ) ) ); ?></td>
						<td>
							<?php echo kayi_trade_status_link( $user->ID, 'approved', __( 'Approve', 'twentytwentyfive-child' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> |
							<?php echo kayi_trade_status_link( $user->ID, 'declined', __( 'Decline', 'twentytwentyfive-child' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else : ?>
			<p><?php esc_html_e( 'No applications waiting.', 'twentytwentyfive-child' ); ?></p>
		<?php endif; ?>
		<p>
			<a href="<?php echo esc_url( admin_url( 'users.php?role=kayi_trade' ) ); ?>"><?php esc_html_e( 'All trade customers', 'twentytwentyfive-child' ); ?></a> ·
			<a href="<?php echo esc_url( admin_url( 'users.php?kayi_trade_status=declined' ) ); ?>"><?php esc_html_e( 'Declined', 'twentytwentyfive-child' ); ?></a> ·
			<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=kayi_quote' ) ); ?>"><?php esc_html_e( 'Quote requests', 'twentytwentyfive-child' ); ?></a> ·
			<a href="<?php echo esc_url( kayi_trade_url() ); ?>"><?php esc_html_e( 'View the Gyms & Clubs page', 'twentytwentyfive-child' ); ?></a>
		</p>

		<h2><?php esc_html_e( 'Trade pricing', 'twentytwentyfive-child' ); ?></h2>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="kayi_trade_settings">
			<?php wp_nonce_field( 'kayi_trade_settings' ); ?>
			<p><?php esc_html_e( 'Discount off the RRP, by the total number of units in the basket (every product and size counts). Leave a row empty to remove it.', 'twentytwentyfive-child' ); ?></p>
			<table class="widefat" style="max-width:420px">
				<thead><tr><th><?php esc_html_e( 'From (units)', 'twentytwentyfive-child' ); ?></th><th><?php esc_html_e( '% off RRP', 'twentytwentyfive-child' ); ?></th></tr></thead>
				<tbody>
				<?php foreach ( $tiers as $i => $tier ) : ?>
					<tr>
						<td><input type="number" min="1" step="1" name="tiers[<?php echo (int) $i; ?>][min]" value="<?php echo esc_attr( $tier['min'] ); ?>" class="small-text"></td>
						<td><input type="number" min="0" max="90" step="0.5" name="tiers[<?php echo (int) $i; ?>][off]" value="<?php echo esc_attr( $tier['off'] ); ?>" class="small-text"> %</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<table class="form-table" role="presentation">
				<tr>
					<th><label for="kayi-min"><?php esc_html_e( 'Minimum order (units)', 'twentytwentyfive-child' ); ?></label></th>
					<td><input id="kayi-min" type="number" min="0" step="1" name="min_units" value="<?php echo esc_attr( $s['min_units'] ); ?>" class="small-text">
					<p class="description"><?php esc_html_e( 'Trade customers can’t check out below this. 0 = no minimum.', 'twentytwentyfive-child' ); ?></p></td>
				</tr>
				<tr>
					<th><label for="kayi-recipient"><?php esc_html_e( 'Send applications and quote requests to', 'twentytwentyfive-child' ); ?></label></th>
					<td><input id="kayi-recipient" type="email" name="recipient" value="<?php echo esc_attr( $s['recipient'] ); ?>" class="regular-text" placeholder="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>"></td>
				</tr>
			</table>
			<?php submit_button( __( 'Save trade settings', 'twentytwentyfive-child' ) ); ?>
		</form>
	</div>
	<?php
}

add_action( 'admin_post_kayi_trade_settings', function () {
	check_admin_referer( 'kayi_trade_settings' );
	if ( ! current_user_can( 'manage_woocommerce' ) ) {
		wp_die( esc_html__( 'Sorry, you can’t do that.', 'twentytwentyfive-child' ) );
	}
	$tiers = array();
	foreach ( (array) wp_unslash( $_POST['tiers'] ?? array() ) as $tier ) {
		$tiers[] = array( 'min' => absint( $tier['min'] ?? 0 ), 'off' => (float) ( $tier['off'] ?? 0 ) );
	}
	update_option( 'kayi_trade_settings', array(
		'tiers'     => $tiers,
		'min_units' => absint( $_POST['min_units'] ?? 0 ),
		'recipient' => sanitize_email( wp_unslash( $_POST['recipient'] ?? '' ) ),
	) );
	// The Gyms & Clubs page prints the tiers; clear the page cache.
	do_action( 'breeze_clear_all_cache' );
	wp_safe_redirect( admin_url( 'admin.php?page=kayi-trade&saved=1' ) );
	exit;
} );

/* ── Pricing on the Gyms & Clubs page ───────────────────────────────────── */

// [kayi_trade_value key="max_off|min_off|min_units"]
add_shortcode( 'kayi_trade_value', function ( $atts ) {
	$atts  = shortcode_atts( array( 'key' => 'max_off' ), $atts );
	$s     = kayi_trade_settings();
	$offs  = wp_list_pluck( $s['tiers'], 'off' );
	$value = array(
		'max_off'   => $offs ? max( $offs ) . '%' : '',
		'min_off'   => $offs ? min( $offs ) . '%' : '',
		'min_units' => $s['min_units'],
	);
	return esc_html( $value[ $atts['key'] ] ?? '' );
} );

// [kayi_trade_tiers example="235"]: one card per tier, with the example
// product's trade price (without VAT) at that tier.
add_shortcode( 'kayi_trade_tiers', function ( $atts ) {
	$atts    = shortcode_atts( array( 'example' => 0 ), $atts );
	$s       = kayi_trade_settings();
	$tiers   = $s['tiers'];
	$product = $atts['example'] ? wc_get_product( absint( $atts['example'] ) ) : null;
	$rrp     = $product ? kayi_trade_rrp( $product ) : 0;

	$out = '<div class="kayi-tr-tiers kayi-lp-stagger">';
	foreach ( $tiers as $i => $tier ) {
		$next  = $tiers[ $i + 1 ]['min'] ?? 0;
		$units = $next ? sprintf( '%d–%d', $tier['min'], $next - 1 ) : sprintf( '%d+', $tier['min'] );
		$out  .= '<div class="kayi-tr-tier">';
		$out  .= '<p class="kayi-tr-tier__units">' . esc_html( $units ) . ' ' . esc_html__( 'units', 'twentytwentyfive-child' ) . '</p>';
		$out  .= '<p class="kayi-tr-tier__off">' . esc_html( wc_format_localized_decimal( $tier['off'] ) ) . '%<span>' . esc_html__( 'off RRP', 'twentytwentyfive-child' ) . '</span></p>';
		if ( $rrp > 0 ) {
			$trade = round( $rrp * ( 100 - $tier['off'] ) / 100, wc_get_price_decimals() );
			$out  .= sprintf(
				'<p class="kayi-tr-tier__eg">%1$s<br><del>%2$s</del> <strong>%3$s</strong> %4$s</p>',
				esc_html( $product->get_name() ),
				wc_price( $rrp ),
				wc_price( wc_get_price_excluding_tax( $product, array( 'price' => $trade ) ) ),
				esc_html__( 'ex VAT', 'twentytwentyfive-child' )
			);
		}
		$out .= '</div>';
	}
	$out .= '</div>';

	if ( $s['min_units'] ) {
		$out .= '<p class="kayi-tr-note">' . esc_html( sprintf(
			/* translators: %d: minimum units */
			__( 'Minimum trade order: %d units. Mix any products and sizes, and everything counts towards your tier. Prices exclude VAT, which is added at checkout.', 'twentytwentyfive-child' ),
			$s['min_units']
		) ) . '</p>';
	}
	return $out;
} );

/* ── Bulk order form ────────────────────────────────────────────────────── */

// Size / colour label for a variation, e.g. "16oz" or "M / Black".
function kayi_trade_variation_label( $variation ) {
	$parts = array();
	foreach ( $variation->get_variation_attributes( false ) as $taxonomy => $value ) {
		if ( '' === $value ) {
			return null; // "Any size" variations can't be ordered from the grid.
		}
		$term    = taxonomy_exists( $taxonomy ) ? get_term_by( 'slug', $value, $taxonomy ) : null;
		$parts[] = $term ? $term->name : $value;
	}
	return implode( ' / ', $parts );
}

// Products for the form, grouped by top-level category (Sale skipped, as
// sale items also sit in their own category).
function kayi_trade_order_groups() {
	$products = wc_get_products( array(
		'status'  => 'publish',
		'type'    => array( 'simple', 'variable' ),
		'limit'   => -1,
		'orderby' => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
	) );

	$groups = array();
	foreach ( $products as $product ) {
		if ( ! $product->is_purchasable() || 'hidden' === $product->get_catalog_visibility() ) {
			continue;
		}
		$top = null;
		foreach ( $product->get_category_ids() as $term_id ) {
			$ancestors = get_ancestors( $term_id, 'product_cat' );
			$root      = get_term( $ancestors ? end( $ancestors ) : $term_id, 'product_cat' );
			if ( $root && ! is_wp_error( $root ) && ! in_array( $root->slug, array( 'sale', 'uncategorized' ), true ) ) {
				$top = $root;
				break;
			}
		}
		$key = $top ? $top->term_id : 0;
		if ( ! isset( $groups[ $key ] ) ) {
			$groups[ $key ] = array(
				'name'  => $top ? $top->name : __( 'More', 'twentytwentyfive-child' ),
				'order' => $top ? (int) get_term_meta( $top->term_id, 'order', true ) : PHP_INT_MAX,
				'items' => array(),
			);
		}
		$groups[ $key ]['items'][] = $product;
	}
	uasort( $groups, fn( $a, $b ) => $a['order'] <=> $b['order'] ?: strcmp( $a['name'], $b['name'] ) );
	return $groups;
}

// Quantity box for one orderable product or variation.
function kayi_trade_qty_input( $product, $label ) {
	$max      = $product->managing_stock() && ! $product->backorders_allowed() ? max( 0, (int) $product->get_stock_quantity() ) : '';
	$in_stock = $product->is_in_stock() && '' !== $product->get_price();
	$tax      = wc_tax_enabled() && $product->is_taxable() ? WC_Tax::get_base_tax_rates( $product->get_tax_class() ) : array();
	$vat      = $tax ? array_sum( wp_list_pluck( $tax, 'rate' ) ) / 100 : 0;
	$sale     = $product->get_sale_price( 'edit' );

	return sprintf(
		'<label class="kayi-tr-qty%1$s"><span>%2$s</span><input type="number" name="kayi_qty[%3$d]" min="0"%4$s step="1" inputmode="numeric" placeholder="0" data-rrp="%5$s" data-sale="%6$s" data-vat="%7$s"%8$s aria-label="%9$s"></label>',
		$in_stock ? '' : ' is-out',
		esc_html( $in_stock ? $label : $label . ' · ' . __( 'out', 'twentytwentyfive-child' ) ),
		$product->get_id(),
		'' === $max ? '' : ' max="' . (int) $max . '"',
		esc_attr( (float) $product->get_regular_price( 'edit' ) ),
		esc_attr( '' === $sale ? '' : (float) $sale ),
		esc_attr( $vat ),
		$in_stock ? '' : ' disabled',
		/* translators: 1: product, 2: size */
		esc_attr( sprintf( __( 'Quantity: %1$s, %2$s', 'twentytwentyfive-child' ), $product->get_name(), $label ) )
	);
}

add_shortcode( 'kayi_trade_order', function () {
	$preview = ! kayi_is_trade_user() && current_user_can( 'manage_woocommerce' );
	if ( ! kayi_is_trade_user() && ! $preview ) {
		$pending = is_user_logged_in() && 'pending' === kayi_trade_status( get_current_user_id() );
		$out     = '<div class="kayi-tr-gate"><h2 class="kayi-lp-h3 is-xl">' . esc_html__( 'For trade accounts', 'twentytwentyfive-child' ) . '</h2>';
		if ( $pending ) {
			$out .= '<p>' . esc_html__( 'Your application is being reviewed. We’ll email you as soon as your trade account is ready, and this form will open for you.', 'twentytwentyfive-child' ) . '</p>';
		} else {
			$out .= '<p>' . esc_html__( 'The bulk order form shows trade prices for gyms, clubs, schools and coaches. Log in to your trade account, or apply for one. It only takes a couple of minutes.', 'twentytwentyfive-child' ) . '</p>';
			$out .= '<div class="wp-block-buttons kayi-c-buttons">';
			if ( ! is_user_logged_in() ) {
				$out .= kayi_trade_button( __( 'Log in', 'twentytwentyfive-child' ), add_query_arg( 'redirect_to', rawurlencode( kayi_trade_order_url() ), wc_get_page_permalink( 'myaccount' ) ), 'dark' );
			}
			$out .= kayi_trade_button( __( 'Apply for a trade account', 'twentytwentyfive-child' ), kayi_trade_url( '#apply' ) ) . '</div>';
		}
		return $out . '</div>';
	}

	$GLOBALS['kayi_trade_preview'] = $preview;
	$s      = kayi_trade_settings();
	$in_bag = kayi_trade_units();
	$groups = kayi_trade_order_groups();

	ob_start();
	?>
	<?php if ( $preview ) : ?>
		<p class="kayi-trade-note kayi-tr-preview"><strong><?php esc_html_e( 'Admin preview:', 'twentytwentyfive-child' ); ?></strong> <?php esc_html_e( 'this is the form trade customers see, with trade prices. Adding to the basket is switched off for admin accounts. To try a full order, log in as a trade customer.', 'twentytwentyfive-child' ); ?></p>
	<?php endif; ?>
	<form class="kayi-tr-order" method="post" action="<?php echo esc_url( kayi_trade_order_url() ); ?>"<?php echo $preview ? ' data-preview' : ''; ?>
		data-tiers="<?php echo esc_attr( wp_json_encode( $s['tiers'] ) ); ?>"
		data-min="<?php echo (int) $s['min_units']; ?>"
		data-basket="<?php echo (int) $in_bag; ?>"
		data-currency="<?php echo esc_attr( html_entity_decode( get_woocommerce_currency_symbol(), ENT_QUOTES ) ); ?>">
		<?php wp_nonce_field( 'kayi_trade_order', 'kayi_trade_order' ); ?>

		<nav class="kayi-tr-order__cats" aria-label="<?php esc_attr_e( 'Categories', 'twentytwentyfive-child' ); ?>">
			<?php foreach ( $groups as $key => $group ) : ?>
				<a href="#kayi-tr-cat-<?php echo (int) $key; ?>"><?php echo esc_html( $group['name'] ); ?></a>
			<?php endforeach; ?>
		</nav>

		<?php foreach ( $groups as $key => $group ) : ?>
			<section class="kayi-tr-cat" id="kayi-tr-cat-<?php echo (int) $key; ?>">
				<h2 class="kayi-tr-cat__title"><?php echo esc_html( $group['name'] ); ?></h2>
				<?php foreach ( $group['items'] as $product ) : ?>
					<?php
					$inputs = array();
					if ( $product->is_type( 'variable' ) ) {
						foreach ( $product->get_available_variations( 'objects' ) as $variation ) {
							$label = kayi_trade_variation_label( $variation );
							if ( null !== $label && $variation->is_purchasable() ) {
								$inputs[] = kayi_trade_qty_input( $variation, $label );
							}
						}
					} else {
						$inputs[] = kayi_trade_qty_input( $product, __( 'Qty', 'twentytwentyfive-child' ) );
					}
					if ( ! $inputs ) {
						continue;
					}
					?>
					<div class="kayi-tr-item">
						<a class="kayi-tr-item__img" href="<?php echo esc_url( $product->get_permalink() ); ?>" tabindex="-1" aria-hidden="true"><?php echo $product->get_image( 'woocommerce_gallery_thumbnail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
						<div class="kayi-tr-item__info">
							<h3 class="kayi-tr-item__name"><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
							<p class="kayi-tr-item__price" data-kayi-price><?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?></p>
						</div>
						<div class="kayi-tr-item__qty"><?php echo implode( '', $inputs ); // phpcs:ignore WordPress.Security.EscapeOutput -- built above. ?></div>
					</div>
				<?php endforeach; ?>
			</section>
		<?php endforeach; ?>

		<div class="kayi-tr-sum" aria-live="polite">
			<div class="kayi-tr-sum__inner">
				<p class="kayi-tr-sum__stat"><span><?php esc_html_e( 'Units', 'twentytwentyfive-child' ); ?></span><strong data-kayi-units>0</strong></p>
				<p class="kayi-tr-sum__stat"><span><?php esc_html_e( 'Your tier', 'twentytwentyfive-child' ); ?></span><strong data-kayi-tier><?php echo esc_html( wc_format_localized_decimal( kayi_trade_current_discount() ) ); ?>% off</strong></p>
				<p class="kayi-tr-sum__stat"><span><?php esc_html_e( 'Subtotal ex VAT', 'twentytwentyfive-child' ); ?></span><strong data-kayi-total><?php echo wp_kses_post( wc_price( 0 ) ); ?></strong></p>
				<p class="kayi-tr-sum__msg" data-kayi-msg>
					<?php
					echo esc_html( $in_bag
						/* translators: %d: units already in the basket */
						? sprintf( _n( '%d unit already in your basket counts too.', '%d units already in your basket count too.', $in_bag, 'twentytwentyfive-child' ), $in_bag )
						: __( 'Enter quantities for each size you need.', 'twentytwentyfive-child' ) );
					?>
				</p>
				<button type="submit" class="kayi-tr-submit" disabled><?php esc_html_e( 'Add to basket', 'twentytwentyfive-child' ); ?></button>
			</div>
		</div>
	</form>
	<?php
	$GLOBALS['kayi_trade_preview'] = false;
	return ob_get_clean();
} );

// The order form page differs per account: keep it out of the page cache.
add_action( 'template_redirect', function () {
	if ( is_page() && 'trade/order' === get_page_uri( get_queried_object_id() ) ) {
		if ( ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
		nocache_headers();
	}
} );

// Adds the whole form to the basket, then goes to the basket.
add_action( 'wp_loaded', function () {
	if ( empty( $_POST['kayi_trade_order'] ) || ! function_exists( 'WC' ) ) {
		return;
	}
	if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['kayi_trade_order'] ) ), 'kayi_trade_order' ) || ! kayi_is_trade_user() || ! WC()->cart ) {
		return;
	}
	wc_nocache_headers();

	$added = 0;
	foreach ( (array) wp_unslash( $_POST['kayi_qty'] ?? array() ) as $id => $qty ) {
		$id      = absint( $id );
		$qty     = absint( $qty );
		$product = $id && $qty ? wc_get_product( $id ) : null;
		if ( ! $product || ! $product->is_purchasable() ) {
			continue;
		}
		if ( $product->is_type( 'variation' ) ) {
			$key = WC()->cart->add_to_cart( $product->get_parent_id(), $qty, $id, $product->get_variation_attributes() );
		} elseif ( $product->is_type( 'simple' ) ) {
			$key = WC()->cart->add_to_cart( $id, $qty );
		} else {
			$key = false;
		}
		if ( $key ) {
			$added += $qty;
		}
	}

	if ( $added ) {
		/* translators: %d: units added */
		wc_add_notice( sprintf( _n( '%d item added to your basket.', '%d items added to your basket.', $added, 'twentytwentyfive-child' ), $added ) );
		wp_safe_redirect( wc_get_cart_url() );
	} else {
		wp_safe_redirect( kayi_trade_order_url() );
	}
	exit;
}, 25 );

// "Log in" on the order form comes back to the form afterwards.
add_filter( 'woocommerce_login_redirect', function ( $redirect ) {
	$to = isset( $_GET['redirect_to'] ) ? esc_url_raw( wp_unslash( $_GET['redirect_to'] ) ) : '';
	return $to ? wp_validate_redirect( $to, $redirect ) : $redirect;
} );

/* ── Custom branding quote request ──────────────────────────────────────── */

function kayi_quote_fields() {
	return array(
		'name'     => array( 'label' => __( 'Your name', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'name' ),
		'company'  => array( 'label' => __( 'Gym, club or business', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'organization' ),
		'email'    => array( 'label' => __( 'Email', 'twentytwentyfive-child' ), 'required' => true, 'auto' => 'email', 'type' => 'email' ),
		'phone'    => array( 'label' => __( 'Phone', 'twentytwentyfive-child' ), 'auto' => 'tel', 'type' => 'tel' ),
		'product'  => array(
			'label'    => __( 'What would you like branded?', 'twentytwentyfive-child' ),
			'required' => true,
			'options'  => array( 'Boxing gloves', 'Focus pads', 'Head guards', 'Shin guards', 'Hand wraps', 'Tracksuits', 'T-shirts', 'Shorts', 'Punch bags', 'A mix of products' ),
		),
		'quantity' => array( 'label' => __( 'Roughly how many units?', 'twentytwentyfive-child' ), 'required' => true, 'type' => 'number' ),
		'branding' => array(
			'label'   => __( 'Branding', 'twentytwentyfive-child' ),
			'options' => array( 'Logo print', 'Embroidery', 'Custom colours', 'Not sure yet' ),
		),
		'date'     => array( 'label' => __( 'Needed by', 'twentytwentyfive-child' ), 'type' => 'date' ),
		'details'  => array( 'label' => __( 'Tell us about the order', 'twentytwentyfive-child' ), 'textarea' => true, 'wide' => true, 'required' => true ),
	);
}

add_shortcode( 'kayi_trade_quote', function () {
	$status = isset( $_GET['kayi_quote'] ) ? sanitize_key( wp_unslash( $_GET['kayi_quote'] ) ) : '';
	if ( 'sent' === $status ) {
		return '<div class="kayi-tr-panel" id="kayi-trade-quote"><h3 class="kayi-lp-h3">' . esc_html__( 'Thanks, we’ve got your request.', 'twentytwentyfive-child' ) . '</h3>'
			. '<p>' . esc_html__( 'We’ll come back to you with pricing, minimum quantities and a mock-up of your logo on the kit.', 'twentytwentyfive-child' ) . '</p></div>';
	}

	$messages = array(
		'invalid' => __( 'Please fill in the required fields with a valid email address.', 'twentytwentyfive-child' ),
		'file'    => __( 'Your logo needs to be a PNG, JPG or PDF under 8 MB.', 'twentytwentyfive-child' ),
		'error'   => __( 'Sorry, something went wrong. Please try again in a minute or contact us.', 'twentytwentyfive-child' ),
	);
	$user   = wp_get_current_user();
	$values = $user->ID ? array(
		'name'    => trim( $user->first_name . ' ' . $user->last_name ),
		'company' => get_user_meta( $user->ID, 'billing_company', true ),
		'email'   => $user->user_email,
		'phone'   => get_user_meta( $user->ID, 'billing_phone', true ),
	) : array();

	ob_start();
	?>
	<form id="kayi-trade-quote" class="kayi-form kayi-tr-form" method="post" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<?php echo isset( $messages[ $status ] ) ? kayi_trade_notice( 'error', $messages[ $status ] ) : ''; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<input type="hidden" name="action" value="kayi_trade_quote">
		<input type="hidden" name="kayi_return" value="<?php echo esc_url( get_permalink() ); ?>">
		<div class="kayi-tr-form__grid">
			<?php
			foreach ( kayi_quote_fields() as $key => $field ) {
				echo kayi_trade_field_html( 'kayi-quote', $key, $field, $values[ $key ] ?? '' ); // phpcs:ignore WordPress.Security.EscapeOutput
			}
			?>
			<p class="kayi-form__field is-wide kayi-tr-file">
				<label for="kayi-quote-logo"><?php esc_html_e( 'Your logo', 'twentytwentyfive-child' ); ?> <span class="kayi-form__opt"><?php esc_html_e( 'optional', 'twentytwentyfive-child' ); ?></span></label>
				<input id="kayi-quote-logo" name="kayi_logo" type="file" accept=".png,.jpg,.jpeg,.pdf,image/png,image/jpeg,application/pdf">
				<small><?php esc_html_e( 'PNG, JPG or PDF up to 8 MB. Got vector artwork (AI, EPS, SVG)? Send it when we reply.', 'twentytwentyfive-child' ); ?></small>
			</p>
		</div>
		<p class="kayi-form__hp" aria-hidden="true">
			<label for="kayi-quote-hp">Leave blank</label>
			<input id="kayi-quote-hp" name="kayi_hp" type="text" tabindex="-1" autocomplete="off">
		</p>
		<p><button type="submit" class="kayi-tr-submit"><?php esc_html_e( 'Request a quote', 'twentytwentyfive-child' ); ?></button></p>
	</form>
	<?php
	return ob_get_clean();
} );

function kayi_trade_quote_handle() {
	$go = kayi_trade_redirector( 'kayi_quote', 'kayi-trade-quote' );

	$data = array();
	foreach ( kayi_quote_fields() as $key => $field ) {
		$raw          = wp_unslash( $_POST[ 'kayi-quote_' . $key ] ?? '' );
		$data[ $key ] = ! empty( $field['textarea'] ) ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
		if ( ! empty( $field['options'] ) && '' !== $data[ $key ] && ! in_array( $data[ $key ], $field['options'], true ) ) {
			$data[ $key ] = '';
		}
		if ( ! empty( $field['required'] ) && '' === $data[ $key ] ) {
			$go( 'invalid' );
		}
	}
	$data['email'] = sanitize_email( $data['email'] );
	if ( ! is_email( $data['email'] ) ) {
		$go( 'invalid' );
	}

	kayi_trade_guard( 'trade_quote', $go, 'sent' );

	// Logo: PNG / JPG / PDF only, stored under uploads with a random prefix.
	$logo = '';
	if ( ! empty( $_FILES['kayi_logo']['name'] ) ) {
		$file = $_FILES['kayi_logo']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- checked by wp_handle_upload.
		if ( UPLOAD_ERR_OK !== (int) $file['error'] || (int) $file['size'] > 8 * MB_IN_BYTES ) {
			$go( 'file' );
		}
		require_once ABSPATH . 'wp-admin/includes/file.php';
		$file['name'] = 'quote-' . wp_generate_password( 10, false ) . '-' . sanitize_file_name( $file['name'] );
		$upload       = wp_handle_upload( $file, array(
			'test_form' => false,
			'mimes'     => array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'png'          => 'image/png',
				'pdf'          => 'application/pdf',
			),
		) );
		if ( isset( $upload['error'] ) ) {
			$go( 'file' );
		}
		$logo = $upload['url'];
	}

	$lines = array();
	foreach ( kayi_quote_fields() as $key => $field ) {
		$lines[] = $field['label'] . ': ' . ( '' === $data[ $key ] ? '–' : $data[ $key ] );
	}
	$lines[] = __( 'Logo', 'twentytwentyfive-child' ) . ': ' . ( $logo ? $logo : '–' );
	if ( is_user_logged_in() ) {
		$lines[] = __( 'Account', 'twentytwentyfive-child' ) . ': ' . get_edit_user_link( get_current_user_id() ) . ( kayi_is_trade_user() ? ' (trade)' : '' );
	}
	$body = implode( "\n", $lines );

	wp_insert_post( array(
		'post_type'    => 'kayi_quote',
		'post_status'  => 'private',
		'post_title'   => sprintf( '%s · %s · %s units', $data['company'], $data['product'], $data['quantity'] ),
		'post_content' => $body,
		'meta_input'   => array( '_kayi_quote_email' => $data['email'], '_kayi_quote_logo' => $logo ),
	) );

	kayi_trade_mail(
		kayi_trade_recipient(),
		/* translators: %s: business name */
		sprintf( __( 'Custom kit quote request: %s', 'twentytwentyfive-child' ), $data['company'] ),
		$body,
		sprintf( '%s <%s>', $data['name'], $data['email'] )
	);

	$go( 'sent' );
}
add_action( 'admin_post_nopriv_kayi_trade_quote', 'kayi_trade_quote_handle' );
add_action( 'admin_post_kayi_trade_quote', 'kayi_trade_quote_handle' );

// Quote requests list: show the logo link in a column.
add_filter( 'manage_kayi_quote_posts_columns', function ( $columns ) {
	$columns['kayi_logo'] = __( 'Logo', 'twentytwentyfive-child' );
	return $columns;
} );
add_action( 'manage_kayi_quote_posts_custom_column', function ( $column, $post_id ) {
	if ( 'kayi_logo' === $column ) {
		$logo = get_post_meta( $post_id, '_kayi_quote_logo', true );
		echo $logo ? '<a href="' . esc_url( $logo ) . '" target="_blank" rel="noopener">' . esc_html__( 'View', 'twentytwentyfive-child' ) . '</a>' : '–';
	}
}, 10, 2 );
