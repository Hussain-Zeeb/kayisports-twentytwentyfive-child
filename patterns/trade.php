<?php
/**
 * Title: Gyms & Clubs (trade) page
 * Slug: twentytwentyfive-child/trade
 * Description: Trade page for gyms, clubs, schools and coaches: hero, highlights, tier pricing ([kayi_trade_tiers]), how it works, bulk order form preview, custom kit, trade application ([kayi_trade_apply]), custom kit quote ([kayi_trade_quote]) and FAQs. Built on the .kayi-lp landing page styles; trade logic lives in inc/trade.php. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports, featured
 * Keywords: trade, wholesale, bulk, gym, club, school, quote
 * Viewport Width: 1440
 */

$kayi_upload = function ( $path ) {
	return esc_url( content_url( '/uploads/' . $path ) );
};
$kayi_link = function ( $path ) {
	return esc_url( home_url( $path ) );
};
?>
<!-- wp:group {"metadata":{"name":"Gyms & Clubs page"},"align":"full","className":"kayi-lp kayi-tr","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-lp kayi-tr">
	<!-- wp:html -->
	<nav class="kayi-lp-nav" aria-label="Trade sections">
		<div class="kayi-lp-nav__inner">
			<p class="kayi-lp-nav__title">Kayi Trade</p>
			<div class="kayi-lp-nav__links">
				<a href="#pricing">Pricing</a>
				<a href="#how">How it works</a>
				<a href="#order-form">Order form</a>
				<a href="#custom">Custom kit</a>
				<a href="#faqs">FAQs</a>
			</div>
			<a class="kayi-lp-nav__buy" href="#apply">Apply</a>
		</div>
		<span class="kayi-lp-nav__progress" aria-hidden="true"></span>
	</nav>
	<!-- /wp:html -->

	<!-- wp:group {"metadata":{"name":"Hero"},"tagName":"section","className":"kayi-lp-hero","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-hero">
		<!-- wp:group {"className":"kayi-lp-hero__copy","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-hero__copy">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow kayi-lp-in"} -->
			<p class="kayi-c-eyebrow kayi-lp-in">Gyms, clubs &amp; schools</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"kayi-lp-hero__title kayi-lp-lines"} -->
			<h1 class="wp-block-heading kayi-lp-hero__title kayi-lp-lines">Kit out your<br>whole <span class="kayi-c-gold">gym.</span></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-hero__lead kayi-lp-in"} -->
			<p class="kayi-lp-hero__lead kayi-lp-in">Trade prices on gloves, pads, guards and clothing for gyms, boxing clubs, schools and coaches. Mix products and sizes, pay by card and reorder whenever you need to.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"kayi-c-buttons kayi-lp-in"} -->
			<div class="wp-block-buttons kayi-c-buttons kayi-lp-in">
				<!-- wp:button {"className":"kayi-c-btn-gold"} -->
				<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="#apply">Apply for a trade account</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"kayi-c-btn-outline"} -->
				<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#quote">Get a custom kit quote</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"id":552,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-hero__media"} -->
		<figure class="wp-block-image size-full kayi-lp-hero__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-gloves-laceup.webp' ); ?>" alt="Kayi black and gold lace-up boxing gloves" class="wp-image-552" width="1100" height="1076" fetchpriority="high"/></figure>
		<!-- /wp:image -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"Highlights"},"tagName":"section","className":"kayi-lp-sec kayi-lp-stats-wrap","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-sec kayi-lp-stats-wrap" aria-label="Highlights">
		<!-- wp:group {"className":"kayi-lp-stats kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-stats kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Up to [kayi_trade_value key="max_off"]</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Off RRP, depending on how many units you order</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Mix &amp; match</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Every product and size counts towards your discount</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Ex VAT</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Trade prices shown without VAT once you’re logged in</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Your logo</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Custom-branded gloves, pads and clothing on request</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"01 Pricing"},"tagName":"section","anchor":"pricing","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="pricing" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">01 · Trade pricing</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">The more you order, the less you pay.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">Your discount is based on the total number of units in your basket, so 10 pairs of gloves and 15 pairs of pads count as 25.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:shortcode -->
		[kayi_trade_tiers example="235"]
		<!-- /wp:shortcode -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"02 How it works"},"tagName":"section","anchor":"how","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="how" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">02 · How it works</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
			<h2 class="wp-block-heading kayi-lp-h2 is-md">Open an account in minutes.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-care kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-care kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M6 3h9l4 4v14H6z"/><path pathLength="1" d="M9 12h7M9 16h5"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">1. Apply</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Tell us about your gym, club or school. It takes about two minutes.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M12 3a9 9 0 1 1 0 18 9 9 0 0 1 0-18z"/><path pathLength="1" d="M8 12.5l2.7 2.7L16.5 9"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">2. Get approved</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>We check your details and email you a login when your trade account is ready.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">3. Order in one go</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Use the bulk order form to add every product and size you need at once.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M3 6h18v12H3z"/><path pathLength="1" d="M3 10h18M7 15h4"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">4. Pay by card</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Check out securely by card, with VAT shown separately on your order.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"03 Order form"},"tagName":"section","anchor":"order-form","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="order-form" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">03 · Bulk order form</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Every size. One form.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">No more adding one item at a time. The trade order form lists every product with a box for each size, and keeps a running total as you go.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Running total</span><strong>Units, discount and subtotal as you type</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Your basket</span><strong>Items already in it count too</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Reorder</span><strong>Repeat a past order from your account</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"className":"kayi-c-buttons"} -->
				<div class="wp-block-buttons kayi-c-buttons">
					<!-- wp:button {"className":"kayi-c-btn-outline"} -->
					<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/trade/order/' ); ?>">Open the order form</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->

			<!-- wp:html -->
			<div class="kayi-lp-panel kayi-lp-rv">
				<div class="kayi-tr-mock" aria-hidden="true">
					<div class="kayi-tr-mock__row">
						<span class="kayi-tr-mock__name">Golden Boxing Gloves</span>
						<span class="kayi-tr-mock__sizes"><b>10oz<i>0</i></b><b class="is-set">12oz<i>6</i></b><b class="is-set">14oz<i>8</i></b><b class="is-set">16oz<i>6</i></b></span>
					</div>
					<div class="kayi-tr-mock__row">
						<span class="kayi-tr-mock__name">Pro Kayi Black Focus Pads</span>
						<span class="kayi-tr-mock__sizes"><b class="is-set">Pair<i>6</i></b></span>
					</div>
					<div class="kayi-tr-mock__row">
						<span class="kayi-tr-mock__name">Pro Kayi Head Guard</span>
						<span class="kayi-tr-mock__sizes"><b class="is-set">Qty<i>10</i></b></span>
					</div>
					<div class="kayi-tr-mock__sum"><span>36 units</span><span>25% off</span><strong>Add to basket →</strong></div>
				</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"04 Custom kit"},"tagName":"section","anchor":"custom","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="custom" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-split is-flipped","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split is-flipped">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">04 · Custom kit</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Your name on the kit.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">Put your gym’s logo on gloves, pads, guards, tracksuits and T-shirts. Tell us what you need and we’ll come back with pricing, minimum quantities and a mock-up before anything is made.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Branding</span><strong>Logo print, embroidery or custom colours</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Artwork</span><strong>A proof to approve before production</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Quantities</span><strong>Minimums depend on the product</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Lead time</span><strong>Given with every quote</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"className":"kayi-c-buttons"} -->
				<div class="wp-block-buttons kayi-c-buttons">
					<!-- wp:button {"className":"kayi-c-btn-gold"} -->
					<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="#quote">Request a quote</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->

			<!-- wp:image {"id":555,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-panel kayi-lp-zoom kayi-lp-rv"} -->
			<figure class="wp-block-image size-full kayi-lp-panel kayi-lp-zoom kayi-lp-rv"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-pair.webp' ); ?>" alt="A pair of Pro Kayi black focus pads with gold logos" class="wp-image-555" width="903" height="752" loading="lazy"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"05 Apply"},"tagName":"section","anchor":"apply","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="apply" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-tr-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-tr-split">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">05 · Apply</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Open a trade account.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">For gyms, boxing and martial arts clubs, schools, coaches and retailers. We review every application and email you when your account is ready.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>We’ll ask for</span><strong>Business details and a contact</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>VAT number</span><strong>Optional, if you’re registered</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Already shop with us?</span><strong>Use the same email address</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Already approved?</span><strong><a href="<?php echo $kayi_link( '/my-account/?redirect_to=' . rawurlencode( home_url( '/trade/order/' ) ) ); ?>">Log in</a></strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-tr-formwrap kayi-lp-rv","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-tr-formwrap kayi-lp-rv">
				<!-- wp:shortcode -->
				[kayi_trade_apply]
				<!-- /wp:shortcode -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"06 Quote"},"tagName":"section","anchor":"quote","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="quote" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-tr-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-tr-split">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">06 · Custom kit quote</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Tell us what you need.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">Send a few details and your logo. We’ll reply with a price, minimum quantities and a mock-up of your kit. You don’t need a trade account to ask.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-tr-formwrap kayi-lp-rv","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-tr-formwrap kayi-lp-rv">
				<!-- wp:shortcode -->
				[kayi_trade_quote]
				<!-- /wp:shortcode -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"FAQs"},"tagName":"section","anchor":"faqs","align":"full","className":"kayi-c-section kayi-c-faq","layout":{"type":"default"}} -->
	<section id="faqs" class="wp-block-group alignfull kayi-c-section kayi-c-faq">
		<!-- wp:group {"className":"kayi-c-faq__intro","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-faq__intro">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">FAQs</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-c-h2"} -->
			<h2 class="wp-block-heading kayi-c-h2">Trade<br>questions.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-c-lead"} -->
			<p class="kayi-c-lead">Something we haven’t covered? Get in touch and we’ll help you put the right order together.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"kayi-c-buttons"} -->
			<div class="wp-block-buttons kayi-c-buttons">
				<!-- wp:button {"className":"kayi-c-btn-dark"} -->
				<div class="wp-block-button kayi-c-btn-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/contact-us/' ); ?>">Contact us</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-accordions kayi-c-faq__list","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-accordions kayi-c-faq__list">
			<!-- wp:details {"showContent":true} -->
			<details class="wp-block-details" open><summary>Who can open a trade account?</summary>
				<!-- wp:paragraph -->
				<p>Gyms, boxing and martial arts clubs, schools, colleges and universities, coaches and personal trainers, and sports retailers. If you buy kit for other people to train in, apply and tell us about it.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary>Is there a minimum order?</summary>
				<!-- wp:paragraph -->
				<p>Trade orders start at [kayi_trade_value key="min_units"] units. You can mix any products and sizes to get there.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary>How does trade pricing work?</summary>
				<!-- wp:paragraph -->
				<p>Your discount comes off our normal retail price and depends on the total number of units in your basket. When you reach the next tier, every item in the basket moves to the bigger discount.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary>Are trade prices shown with VAT?</summary>
				<!-- wp:paragraph -->
				<p>No. Once you’re logged in, prices across the shop are shown without VAT. VAT is added at checkout and shown separately on your order.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary>How do I pay?</summary>
				<!-- wp:paragraph -->
				<p>By card at checkout, just like any other order. Your order is sent out once payment has gone through.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary>Can you put our logo on the kit?</summary>
				<!-- wp:paragraph -->
				<p>Yes. Send us a quote request with your logo and we’ll come back with pricing, minimum quantities and a mock-up to approve.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details -->
			<details class="wp-block-details"><summary>How long does delivery take?</summary>
				<!-- wp:paragraph -->
				<p>In-stock items go out as quickly as any other order. Custom-branded kit takes longer, and we’ll give you a lead time with your quote.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
