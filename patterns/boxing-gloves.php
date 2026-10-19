<?php
/**
 * Title: Boxing gloves landing page (black & gold)
 * Slug: twentytwentyfive-child/boxing-gloves
 * Description: Landing page for Kayi boxing gloves, built on the head guards page system (.kayi-lp): sticky section nav, photo hero, highlights, leather (video), multi-layer padding cut-away, hook-and-loop vs lace-up, photo viewer, glove-weight picker, the glove range with live prices, care, buy panel and kit links. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports, featured
 * Keywords: boxing gloves, landing page, sizes, ounces, lace-up, leather
 * Viewport Width: 1440
 */

$kayi_upload = function ( $path ) {
	return esc_url( content_url( '/uploads/' . $path ) );
};
$kayi_link = function ( $path ) {
	return esc_url( home_url( $path ) );
};
$kayi_golden = $kayi_link( '/product/golden-boxing-gloves/' );
?>
<!-- wp:group {"metadata":{"name":"Boxing gloves page"},"align":"full","className":"kayi-lp","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-lp">
	<!-- wp:html -->
	<nav class="kayi-lp-nav" aria-label="Boxing glove sections">
		<div class="kayi-lp-nav__inner">
			<p class="kayi-lp-nav__title">Kayi Boxing Gloves</p>
			<div class="kayi-lp-nav__links">
				<a href="#leather">Leather</a>
				<a href="#padding">Padding</a>
				<a href="#closure">Closure</a>
				<a href="#sizes">Sizes</a>
				<a href="#range">Range</a>
				<a href="#care">Care</a>
			</div>
			<a class="kayi-lp-nav__buy" href="#range">Shop</a>
		</div>
		<span class="kayi-lp-nav__progress" aria-hidden="true"></span>
	</nav>
	<!-- /wp:html -->

	<!-- wp:group {"metadata":{"name":"Hero"},"tagName":"section","className":"kayi-lp-hero","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-hero">
		<!-- wp:group {"className":"kayi-lp-hero__copy","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-hero__copy">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow kayi-lp-in"} -->
			<p class="kayi-c-eyebrow kayi-lp-in">Boxing gloves</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"kayi-lp-hero__title kayi-lp-lines"} -->
			<h1 class="wp-block-heading kayi-lp-hero__title kayi-lp-lines">Engineered<br>to hit <span class="kayi-c-gold">hard.</span></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-hero__lead kayi-lp-in"} -->
			<p class="kayi-lp-hero__lead kayi-lp-in">Leather that moulds to your hand, a multi-layer foam core and a wrist that stays locked in. Find the right pair for the bag, the pads or sparring.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"kayi-c-buttons kayi-lp-in"} -->
			<div class="wp-block-buttons kayi-c-buttons kayi-lp-in">
				<!-- wp:button {"className":"kayi-c-btn-gold"} -->
				<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="#range">Shop the range</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"kayi-c-btn-outline"} -->
				<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#sizes">Find your size</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"id":71,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-hero__media is-photo"} -->
		<figure class="wp-block-image size-full kayi-lp-hero__media is-photo"><img src="<?php echo $kayi_upload( '2026/06/boxing-1.jpg' ); ?>" alt="Kayi Sports gold and black boxing gloves with the red Kayi stallion" class="wp-image-71" width="2000" height="1500" fetchpriority="high"/></figure>
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
				<p class="kayi-lp-stat__value">Cowhide</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Genuine leather on the Golden Boxing Gloves</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">32 mm</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Multi-layer padding over the knuckles</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">8–20oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">From bag work to heavy sparring, plus 6oz for kids</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">2 closures</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Quick hook-and-loop or pro lace-up</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"01 Leather"},"tagName":"section","anchor":"leather","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="leather" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split">
			<!-- wp:group {"className":"kayi-lp-panel is-video kayi-lp-rv","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-panel is-video kayi-lp-rv">
				<!-- wp:video {"id":538,"controls":false,"loop":true,"muted":true,"preload":"metadata","playsInline":true} -->
				<figure class="wp-block-video"><video loop muted preload="metadata" src="<?php echo $kayi_upload( '2026/10/kayi-glove-comfort-720.mp4' ); ?>" playsinline></video></figure>
				<!-- /wp:video -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">01 · Leather</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Leather that moulds to you.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">The Golden Boxing Gloves are crafted from genuine cowhide leather for comfort, breathability and durability. The leather conforms to your hand over time, giving you a personal, secure fit and a longer life than gym rental or synthetic gloves.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Outer</span><strong>Genuine cowhide leather</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Feel</span><strong>Lightweight, built for speed</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Wrist</span><strong>Wide hook-and-loop strap</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Finish</span><strong>Gold with the red Kayi stallion</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"02 Padding"},"tagName":"section","anchor":"padding","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="padding" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-split is-flipped","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split is-flipped">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">02 · Padding</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Layers that take the hit.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">A hand-made, multi-layered foam core sits over your knuckles to absorb the shock of every punch, so your hands stay protected through long sessions on the bag, the pads and in sparring.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Injected sheet</span><strong>14 mm</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Underlay</span><strong>9 mm</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Durable foam</span><strong>9 mm</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Combined</span><strong>32 mm</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-panel is-layers kayi-lp-rv","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-panel is-layers kayi-lp-rv">
				<!-- wp:html {"metadata":{"name":"Padding cut-away (animated)"}} -->
				<div class="kayi-c-layers" role="img" aria-label="Cut-away of a Kayi boxing glove showing three padding layers over the knuckles: a 14 mm injected sheet, a 9 mm underlay and 9 mm of durable foam, 32 mm combined.">
					<p class="kayi-c-layers__eyebrow" aria-hidden="true">Multi-layer hand-made padding</p>
					<p class="kayi-c-layers__total" aria-hidden="true"><b>32 mm</b> combined</p>
					<svg class="kayi-c-layers__svg" viewBox="20 60 900 560" aria-hidden="true" focusable="false">
						<defs>
							<pattern id="kayi-pSheet" width="8" height="8" patternUnits="userSpaceOnUse"><rect width="8" height="8" fill="#B88E45"></rect><circle fill="#9C7536" cx="2" cy="2" r="0.9"></circle><circle fill="#9C7536" cx="6" cy="6" r="0.9"></circle></pattern>
							<pattern id="kayi-pUnder" width="10" height="10" patternUnits="userSpaceOnUse"><rect width="10" height="10" fill="#7A5A2C"></rect><circle fill="#5E4420" cx="5" cy="5" r="1.5"></circle></pattern>
							<pattern id="kayi-pFoam" width="18" height="18" patternUnits="userSpaceOnUse"><rect width="18" height="18" fill="#3A3631"></rect><circle fill="rgba(255,255,255,.10)" cx="4" cy="4" r="2.2"></circle><circle fill="rgba(0,0,0,.35)" cx="13" cy="12" r="3"></circle></pattern>
						</defs>
						<path class="kl-glove" d="M 80 300 A 220 220 0 0 1 520 300 C 520 400 492 462 440 492 L 440 500 L 180 500 C 120 486 80 410 80 300 Z"></path>
						<path class="kl-glove" d="M 92 335 C 46 340 34 420 70 462 C 96 492 150 490 168 462 C 150 430 120 380 92 335 Z"></path>
						<path class="kl-seam" d="M 88 360 C 62 380 58 430 84 456"></path>
						<rect class="kl-cuff" x="182" y="496" width="256" height="116" rx="12"></rect>
						<rect class="kl-strap" x="174" y="518" width="272" height="64" rx="10"></rect>
						<rect x="266" y="544" width="88" height="12" rx="6" fill="currentColor"></rect>
						<path class="kl-shell" d="M 85 300 A 215 215 0 0 1 515 300"></path>
						<path class="kl-core" d="M 202 300 A 98 98 0 0 1 398 300 Z"></path>
						<text class="kl-muted" x="300" y="284">HAND</text>
						<path class="kl-band kl-sheet kl-wrap" pathLength="1" d="M 114.5 300 A 185.5 185.5 0 0 1 485.5 300"></path>
						<path class="kl-band kl-under kl-wrap" pathLength="1" d="M 154.75 300 A 145.25 145.25 0 0 1 445.25 300" style="animation-delay:0.35s"></path>
						<path class="kl-band kl-foam kl-wrap" pathLength="1" d="M 186.25 300 A 113.75 113.75 0 0 1 413.75 300" style="animation-delay:0.7s"></path>
						<line class="kl-cut" x1="80" y1="300" x2="520" y2="300"></line>
						<g class="kl-fade">
							<path class="kl-lead" d="M 392.75 139.35 L 600 110 L 628 110"></path>
							<circle class="kl-dot" cx="392.75" cy="139.35" r="6"></circle>
							<text class="kl-n" x="640" y="120">14 mm</text>
							<text class="kl-t" x="640" y="156">Injected sheet</text>
						</g>
						<g class="kl-fade" style="animation-delay:0.35s">
							<path class="kl-lead" d="M 418.98 216.69 L 600 230 L 628 230"></path>
							<circle class="kl-dot" cx="418.98" cy="216.69" r="6"></circle>
							<text class="kl-n" x="640" y="240">9 mm</text>
							<text class="kl-t" x="640" y="276">Underlay</text>
						</g>
						<g class="kl-fade" style="animation-delay:0.7s">
							<path class="kl-lead" d="M 411.26 276.35 L 600 350 L 628 350"></path>
							<circle class="kl-dot" cx="411.26" cy="276.35" r="6"></circle>
							<text class="kl-n" x="640" y="360">9 mm</text>
							<text class="kl-t" x="640" y="396">Durable foam</text>
						</g>
					</svg>
				</div>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"03 Closure"},"tagName":"section","anchor":"closure","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="closure" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">03 · Closure</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Choose how you lock in.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">Both keep your wrist aligned with the padding. The difference is speed versus a fight-ready, fixed fit.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-cards kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-cards kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":238,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media is-photo"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media is-photo"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.42PM_720x.webp' ); ?>" alt="Golden Boxing Gloves palm side, showing the wide hook-and-loop wrist straps" class="wp-image-238" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Golden Boxing Gloves</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
					<h3 class="wp-block-heading kayi-lp-h3 is-lg">Hook-and-loop</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>A wide, secure wrist strap keeps the gloves firmly in place and gives you the wrist stability you need for fast, repetitive strikes. Quick on, quick off: ideal for fitness boxing, bag work and pads.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":468,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media is-photo"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media is-photo"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.45PM_720x-1.webp' ); ?>" alt="Lace-up golden boxing gloves with gold laces" class="wp-image-468" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Lace-up gloves</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
					<h3 class="wp-block-heading kayi-lp-h3 is-lg">Lace-up</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Laces let you fine-tune the tension across the wrist for a snug, locked-in fit with no movement inside the glove, and there's no Velcro strip to scratch a training partner. The choice for hard sparring and bouts.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"A closer look"},"tagName":"section","className":"kayi-lp-sec kayi-lp-look is-alt","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-sec kayi-lp-look is-alt" aria-label="A closer look">
		<!-- wp:heading {"className":"kayi-lp-h2 is-md kayi-lp-rv"} -->
		<h2 class="wp-block-heading kayi-lp-h2 is-md kayi-lp-rv">Take a closer look.</h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"kayi-lp-viewer is-photos kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-viewer is-photos kayi-lp-rv">
			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">The pair</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":236,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.43PM_1_720x.webp' ); ?>" alt="Pair of Golden Boxing Gloves with the red Kayi stallion" class="wp-image-236" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Gold cowhide with the red Kayi stallion across the backhand: a finish that stands out in any class.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Wrist strap</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":237,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.42PM_1_590x.webp' ); ?>" alt="Golden Boxing Gloves stacked, showing the branded wrist straps" class="wp-image-237" width="590" height="787" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">The wide, branded strap wraps right round the wrist for a secure close that stays put.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Palm</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":238,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.42PM_720x.webp' ); ?>" alt="Golden Boxing Gloves palm side with gold trim" class="wp-image-238" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Black palms with gold trim, shaped to close naturally around your fist.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Lace-up</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":469,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.45PM_1_720x-1.webp' ); ?>" alt="Lace Up Golden Boxing Gloves, cuff and laces" class="wp-image-469" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">The Lace Up Golden Boxing Gloves: a longer cuff and laces for a fixed, fight-ready fit.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"04 Sizes"},"tagName":"section","anchor":"sizes","className":"kayi-lp-sec kayi-lp-look","layout":{"type":"default"}} -->
	<section id="sizes" class="wp-block-group kayi-lp-sec kayi-lp-look">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">04 · Sizes</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Find your weight.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">Gloves are sized in ounces: heavier gloves carry more padding. Pick a weight to see what it's best for.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-viewer is-picker kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-viewer is-picker kayi-lp-rv">
			<!-- wp:html -->
			<div class="kayi-lp-ozart" aria-hidden="true">
				<svg viewBox="20 60 520 600" focusable="false">
					<ellipse class="kayi-lp-ozart__floor" cx="290" cy="640" rx="190" ry="14"/>
					<g class="kayi-lp-ozart__glove">
						<path class="is-fill" d="M 80 300 A 220 220 0 0 1 520 300 C 520 400 492 462 440 492 L 440 500 L 180 500 C 120 486 80 410 80 300 Z"/>
						<path d="M 80 300 A 220 220 0 0 1 520 300 C 520 400 492 462 440 492 L 440 500 L 180 500 C 120 486 80 410 80 300 Z"/>
						<path d="M 92 335 C 46 340 34 420 70 462 C 96 492 150 490 168 462 C 150 430 120 380 92 335 Z"/>
						<path d="M 182 496 h 256 v 128 a 12 12 0 0 1 -12 12 h -232 a 12 12 0 0 1 -12 -12 z"/>
						<path d="M 174 530 h 272 v 56 h -272 z"/>
					</g>
				</svg>
			</div>
			<!-- /wp:html -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">6oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">6<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">Kids</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Light and easy to control for young beginners, roughly 4 to 10 years old depending on hand size. See the Golden Boxing Gloves 6oz.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">8oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">8<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">Speed and fitness</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Light gloves for fast bag work, pad drills and fitness boxing, and a good fit for smaller hands.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">10oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">10<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">Bag and pad work</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>A popular choice for fitness classes and pad work: quick hands, with more cushioning than an 8oz.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">12oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">12<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">All-round training</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>A versatile weight for most adults: bag, pads and general training in one pair.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">14oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">14<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">Heavier training</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>More padding for harder bag sessions, and a sparring option for lighter boxers.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view is-default","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view is-default">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">16oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">16<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">Sparring</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>The go-to weight for sparring: extra padding protects you and your partner. Pair them with a head guard and a mouthguard.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">18–20oz</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-oz"} -->
				<p class="kayi-lp-oz">18–20<small>oz</small></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
				<h3 class="wp-block-heading kayi-lp-h3 is-lg">Maximum padding</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>For heavier boxers and anyone who wants the most protection in sparring. Available in the Golden Boxing Gloves.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"kayi-lp-note"} -->
		<p class="kayi-lp-note">A general guide: hand size, body weight and your gym's rules all play a part. Not sure? <a href="<?php echo $kayi_link( '/contact-us/' ); ?>">Ask us about sizing</a>.</p>
		<!-- /wp:paragraph -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"05 Range"},"tagName":"section","anchor":"range","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="range" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">05 · The range</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Pick your pair.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-range kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-range kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":236,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media is-photo"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media is-photo"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.43PM_1_720x.webp' ); ?>" alt="Golden Boxing Gloves" class="wp-image-236" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Cowhide · 8–20oz</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Golden Boxing Gloves</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Genuine cowhide leather with a hook-and-loop strap, for fitness boxing, bag work and pads.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="235"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_golden; ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":467,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media is-photo"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media is-photo"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.44PM_1_590x.webp' ); ?>" alt="Lace Up Golden Boxing Gloves" class="wp-image-467" width="590" height="787" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Lace-up · 8–14oz</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Lace Up Golden Boxing Gloves</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Multi-layered foam and a lace-up wrist for a precise, pro-level fit in sparring and training.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="466"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/product/lace-up-golden-boxing-gloves/' ); ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":552,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-medium_large kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-gloves-laceup-768x751.webp' ); ?>" alt="Lace-Up Boxing Gloves" class="wp-image-552" width="768" height="751" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Lace-up · Pro</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Lace-Up Boxing Gloves</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Maximum stability and precision, with an extended wrist lock for bouts and hard sparring.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="162"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/product/lace-up-boxing-gloves/' ); ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":237,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media is-photo"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media is-photo"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.42PM_1_590x.webp' ); ?>" alt="Golden Boxing Gloves 6oz for kids" class="wp-image-237" width="590" height="787" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Kids · 6oz</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Golden Boxing Gloves 6oz</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Lightweight, softly padded gloves made for young beginners.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="465"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/product/golden-boxing-gloves-6oz/' ); ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"06 Care"},"tagName":"section","anchor":"care","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="care" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">06 · Care</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
			<h2 class="wp-block-heading kayi-lp-h2 is-md">Keep the shine.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-care kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-care kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M12 3c3 4 6 7 6 11a6 6 0 0 1-12 0c0-4 3-7 6-11z"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Wipe clean</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Wipe them down after every session to keep the leather looking its best.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M4 8h10a3 3 0 1 0-3-3"/><path pathLength="1" d="M4 12h15a3 3 0 1 1-3 3"/><path pathLength="1" d="M4 16h7"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Air-dry fully</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Let the leather dry naturally, away from radiators and direct heat.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M7 11V6a2 2 0 0 1 4 0v4"/><path pathLength="1" d="M11 10V5a2 2 0 0 1 4 0v5"/><path pathLength="1" d="M15 10V7a2 2 0 0 1 4 0v6a7 7 0 0 1-7 7h-1a6 6 0 0 1-6-6v-2a2 2 0 0 1 2-2"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Wear hand wraps</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Wraps keep your hands comfortable and dry, and the inside of your gloves fresher.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M5 8h14l-1 12H6L5 8z"/><path pathLength="1" d="M9 8V6a3 3 0 0 1 6 0v2"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Let them breathe</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Store them open, not sealed in your kit bag, so they dry out between sessions.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"Buy"},"tagName":"section","anchor":"buy","className":"kayi-lp-sec is-alt kayi-lp-buy","layout":{"type":"default"}} -->
	<section id="buy" class="wp-block-group kayi-lp-sec is-alt kayi-lp-buy">
		<!-- wp:group {"className":"kayi-lp-buy__panel kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-buy__panel kayi-lp-rv">
			<!-- wp:image {"id":552,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-buy__media"} -->
			<figure class="wp-block-image size-medium_large kayi-lp-buy__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-gloves-laceup-768x751.webp' ); ?>" alt="Kayi Sports gold and black boxing gloves" class="wp-image-552" width="768" height="751" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">Ready to train?</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-sm"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-sm">Golden Boxing Gloves</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-buy__price"} -->
				<p class="kayi-lp-buy__price">[kayi_product_price id="235"]</p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"kayi-lp-ticks"} -->
				<ul class="wp-block-list kayi-lp-ticks"><!-- wp:list-item -->
				<li>Genuine cowhide leather, 8oz to 20oz</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>Fast UK shipping from Watford</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>Secure checkout</li>
				<!-- /wp:list-item --></ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"className":"kayi-c-buttons"} -->
				<div class="wp-block-buttons kayi-c-buttons">
					<!-- wp:button {"className":"kayi-c-btn-gold"} -->
					<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_golden; ?>">Buy now</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"kayi-c-btn-outline"} -->
					<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#sizes">Find your size</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-kit","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-kit">
			<!-- wp:heading {"className":"kayi-lp-h3 is-xl kayi-lp-rv"} -->
			<h2 class="wp-block-heading kayi-lp-h3 is-xl kayi-lp-rv">Complete your kit</h2>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"kayi-lp-kit__grid kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-kit__grid kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-lp-kit__card"} -->
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/product/hand-wraps/' ); ?>"><strong>Hand wraps</strong><span>Support and comfort under every glove.</span><em>Shop hand wraps</em></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-kit__card"} -->
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/focus-pads/' ); ?>"><strong>Focus pads</strong><span>Sharpen speed, accuracy and timing.</span><em>See the focus pads</em></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-kit__card"} -->
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/head-guards/' ); ?>"><strong>Head guard</strong><span>Full-face protection for sparring.</span><em>See the head guard</em></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
