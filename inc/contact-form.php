<?php
/**
 * Lightweight contact form: [kayi_contact_form]
 *
 * No plugin needed. Each submission is emailed and also saved under
 * "Enquiries" in wp-admin, so nothing is lost if email delivery fails.
 *
 * Recipient defaults to the site's admin email (Settings → General). Override:
 *   add_filter( 'kayi_contact_recipient', fn() => 'info@kayisports.uk' );
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Private post type that stores enquiries (visible in wp-admin only).
add_action( 'init', function () {
	register_post_type( 'kayi_enquiry', array(
		'labels'          => array(
			'name'          => __( 'Enquiries', 'twentytwentyfive-child' ),
			'singular_name' => __( 'Enquiry', 'twentytwentyfive-child' ),
		),
		'public'          => false,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'menu_position'   => 26,
		'menu_icon'       => 'dashicons-email-alt',
		'supports'        => array( 'title', 'editor' ),
		'capability_type' => 'post',
		'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
		'map_meta_cap'    => true,
	) );
} );

add_shortcode( 'kayi_contact_form', function () {
	$status = isset( $_GET['kayi_contact'] ) ? sanitize_key( wp_unslash( $_GET['kayi_contact'] ) ) : '';
	$notice = '';

	if ( 'sent' === $status ) {
		$notice = '<p class="kayi-form__notice is-success" role="status">' . esc_html__( 'Thanks — your message has been sent. We’ll get back to you shortly.', 'twentytwentyfive-child' ) . '</p>';
	} elseif ( 'invalid' === $status ) {
		$notice = '<p class="kayi-form__notice is-error" role="alert">' . esc_html__( 'Please fill in all fields with a valid email address.', 'twentytwentyfive-child' ) . '</p>';
	} elseif ( 'error' === $status ) {
		$notice = '<p class="kayi-form__notice is-error" role="alert">' . esc_html__( 'Sorry, something went wrong. Please try again or email us directly.', 'twentytwentyfive-child' ) . '</p>';
	}

	ob_start();
	?>
	<form id="kayi-contact-form" class="kayi-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<?php echo $notice; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped above. ?>
		<input type="hidden" name="action" value="kayi_contact">
		<input type="hidden" name="kayi_return" value="<?php echo esc_url( get_permalink() ); ?>">

		<div class="kayi-form__row">
			<p class="kayi-form__field">
				<label for="kayi-name"><?php esc_html_e( 'Name', 'twentytwentyfive-child' ); ?></label>
				<input id="kayi-name" name="kayi_name" type="text" autocomplete="name" required maxlength="100">
			</p>
			<p class="kayi-form__field">
				<label for="kayi-email"><?php esc_html_e( 'Email', 'twentytwentyfive-child' ); ?></label>
				<input id="kayi-email" name="kayi_email" type="email" autocomplete="email" required maxlength="150">
			</p>
		</div>

		<p class="kayi-form__field">
			<label for="kayi-subject"><?php esc_html_e( 'Subject', 'twentytwentyfive-child' ); ?></label>
			<input id="kayi-subject" name="kayi_subject" type="text" required maxlength="150">
		</p>

		<p class="kayi-form__field">
			<label for="kayi-message"><?php esc_html_e( 'Message', 'twentytwentyfive-child' ); ?></label>
			<textarea id="kayi-message" name="kayi_message" rows="6" required maxlength="5000"></textarea>
		</p>

		<?php // Honeypot — hidden from people, bots tend to fill it in. ?>
		<p class="kayi-form__hp" aria-hidden="true">
			<label for="kayi-website">Website</label>
			<input id="kayi-website" name="kayi_website" type="text" tabindex="-1" autocomplete="off">
		</p>

		<p class="kayi-form__consent">
			<?php
			printf(
				/* translators: %s: privacy policy link */
				esc_html__( 'We’ll only use your details to reply to your enquiry. See our %s.', 'twentytwentyfive-child' ),
				'<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'twentytwentyfive-child' ) . '</a>'
			);
			?>
		</p>

		<p><button type="submit" class="wp-element-button kayi-form__submit"><?php esc_html_e( 'Send message', 'twentytwentyfive-child' ); ?></button></p>
	</form>
	<?php
	return ob_get_clean();
} );

function kayi_contact_handle() {
	$return = isset( $_POST['kayi_return'] ) ? esc_url_raw( wp_unslash( $_POST['kayi_return'] ) ) : home_url( '/' );
	$return = wp_validate_redirect( $return, home_url( '/' ) );
	$go     = function ( $status ) use ( $return ) {
		wp_safe_redirect( add_query_arg( 'kayi_contact', $status, $return ) . '#kayi-contact-form' );
		exit;
	};

	// No nonce: the form is shown to logged-out visitors on a page-cached site, where
	// a cached nonce would expire and block every submission. Spam is handled by the
	// honeypot and per-IP throttle below.

	// Bots: pretend success so they don't retry.
	if ( ! empty( $_POST['kayi_website'] ) ) {
		$go( 'sent' );
	}

	// Simple throttle: one message per IP every 30 seconds.
	$ip_key = 'kayi_contact_' . md5( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
	if ( get_transient( $ip_key ) ) {
		$go( 'error' );
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['kayi_name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['kayi_email'] ?? '' ) );
	$subject = sanitize_text_field( wp_unslash( $_POST['kayi_subject'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['kayi_message'] ?? '' ) );

	if ( '' === $name || ! is_email( $email ) || '' === $subject || '' === $message ) {
		$go( 'invalid' );
	}

	set_transient( $ip_key, 1, 30 );

	wp_insert_post( array(
		'post_type'    => 'kayi_enquiry',
		'post_status'  => 'private',
		'post_title'   => sprintf( '%s — %s', $name, $subject ),
		'post_content' => sprintf( "From: %s <%s>\n\n%s", $name, $email, $message ),
	) );

	$recipient = apply_filters( 'kayi_contact_recipient', get_option( 'admin_email' ) );
	wp_mail(
		$recipient,
		sprintf( '[%s] %s', wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ), $subject ),
		sprintf( "Name: %s\nEmail: %s\n\n%s", $name, $email, $message ),
		array( sprintf( 'Reply-To: %s <%s>', $name, $email ) )
	);

	$go( 'sent' );
}
add_action( 'admin_post_nopriv_kayi_contact', 'kayi_contact_handle' );
add_action( 'admin_post_kayi_contact', 'kayi_contact_handle' );
