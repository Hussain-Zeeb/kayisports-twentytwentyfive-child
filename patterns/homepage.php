<?php
/**
 * Title: Homepage (black & gold, core three)
 * Slug: twentytwentyfive-child/homepage
 * Description: Dark homepage built around the three core products (boxing gloves, focus pads, head guards), from the "Kayi Sports – Organic Homepage" design canvas ("Dark · Core three focus"): hero, boxing-gloves feature with a sliding media stage (hover/tap the three features), focus pads with a zooming hotspot stage, head guards, rest-of-range carousel, why Kayi, FAQs and newsletter. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports, featured
 * Keywords: homepage, concept, hero, boxing gloves, focus pads, head guards, faq, newsletter
 * Viewport Width: 1440
 */

$kayi_upload = function ( $path ) {
	return esc_url( content_url( '/uploads/' . $path ) );
};
$kayi_link = function ( $path ) {
	return esc_url( home_url( $path ) );
};
?>
<!-- wp:group {"metadata":{"name":"Hero"},"tagName":"section","align":"full","className":"kayi-c-hero","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull kayi-c-hero">
	<!-- wp:image {"id":71,"sizeSlug":"full","linkDestination":"none","className":"kayi-c-media"} -->
	<figure class="wp-block-image size-full kayi-c-media"><img src="<?php echo $kayi_upload( '2026/06/boxing-1.jpg' ); ?>" alt="" class="wp-image-71"/></figure>
	<!-- /wp:image -->

	<!-- wp:group {"metadata":{"name":"Hero content"},"className":"kayi-c-hero__content","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-hero__content">
		<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
		<p class="kayi-c-eyebrow">Boxing gloves · Focus pads · Head guards</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"kayi-c-hero__title js-reveal-wall"} -->
		<h1 class="wp-block-heading kayi-c-hero__title js-reveal-wall">Built for<br><span class="kayi-c-gold">fighters.</span></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"kayi-c-hero__lead"} -->
		<p class="kayi-c-hero__lead">Known for performance, durability and excellence, our gear empowers fighters and champions to perform at their best.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"className":"kayi-c-buttons"} -->
		<div class="wp-block-buttons kayi-c-buttons">
			<!-- wp:button {"className":"kayi-c-btn-gold"} -->
			<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/boxing/boxing-gloves/' ); ?>">Shop gloves</a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"kayi-c-btn-outline"} -->
			<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#focus-pads">Shop pads &amp; guards</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"01 Boxing gloves feature"},"tagName":"section","anchor":"gloves","align":"full","className":"kayi-c-section kayi-c-gloves","layout":{"type":"default"}} -->
<section id="gloves" class="wp-block-group alignfull kayi-c-section kayi-c-gloves">
	<!-- wp:group {"metadata":{"name":"Section header"},"className":"kayi-c-head kayi-c-head\u002d\u002drule","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-head kayi-c-head--rule">
		<!-- wp:group {"className":"kayi-c-head__titles","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-head__titles">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">Engineered to hit hard.</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-c-display js-reveal-wall"} -->
			<h2 class="wp-block-heading kayi-c-display js-reveal-wall">Boxing gloves</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"kayi-c-head__intro"} -->
		<p class="kayi-c-head__intro">Explore our exclusive collection of boxing gloves, built around the three things that matter most in the ring.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"Feature explorer"},"className":"kayi-c-explore","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-explore">
		<!-- wp:group {"metadata":{"name":"Media stage (one slide per feature, same order)"},"className":"kayi-c-stage","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-stage">
			<!-- wp:group {"className":"kayi-c-stage__track","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-stage__track">
				<!-- wp:group {"metadata":{"name":"Slide / Comfort"},"className":"kayi-c-stage__slide","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-c-stage__slide">
					<!-- wp:video {"id":538,"controls":false,"playsInline":true,"className":"kayi-c-video"} -->
					<figure class="wp-block-video kayi-c-video"><video src="<?php echo $kayi_upload( '2026/10/kayi-glove-comfort-720.mp4' ); ?>#t=0.5" playsinline></video></figure>
					<!-- /wp:video -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"metadata":{"name":"Slide / Colours"},"className":"kayi-c-stage__slide","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-c-stage__slide">
					<!-- wp:image {"id":517,"sizeSlug":"large","linkDestination":"none","className":"kayi-c-media"} -->
					<figure class="wp-block-image size-large kayi-c-media"><img src="<?php echo $kayi_upload( '2026/09/boxing-3-scaled.jpg' ); ?>" alt="Red and gold Kayi Sports boxing gloves" class="wp-image-517"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"metadata":{"name":"Slide / Structure"},"className":"kayi-c-stage__slide","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-c-stage__slide">
					<!-- wp:html {"metadata":{"name":"Structure animation (multi-layer padding)"}} -->
					<div class="kayi-c-layers" role="img" aria-label="Cut-away of a Kayi boxing glove showing three padding layers over the knuckles: a 14 mm injected sheet, a 9 mm underlay and 9 mm of durable foam — 32 mm combined.">
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
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"metadata":{"name":"Feature copy"},"className":"kayi-c-explore__copy","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-explore__copy">
			<!-- wp:paragraph {"className":"kayi-c-hint"} -->
			<p class="kayi-c-hint">Hover to explore</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"metadata":{"name":"Features (one per slide)"},"className":"kayi-c-opts","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-opts">
				<!-- wp:group {"className":"kayi-c-opt","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-c-opt">
					<!-- wp:paragraph {"className":"kayi-c-opt__num"} -->
					<p class="kayi-c-opt__num">01</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-c-opt__title"} -->
					<h3 class="wp-block-heading kayi-c-opt__title">Comfort.</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":"kayi-c-opt__text"} -->
					<p class="kayi-c-opt__text">Cowhide leather</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"kayi-c-opt","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-c-opt">
					<!-- wp:paragraph {"className":"kayi-c-opt__num"} -->
					<p class="kayi-c-opt__num">02</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-c-opt__title"} -->
					<h3 class="wp-block-heading kayi-c-opt__title">Colours.</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":"kayi-c-opt__text"} -->
					<p class="kayi-c-opt__text">Various colour options</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"kayi-c-opt","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-c-opt">
					<!-- wp:paragraph {"className":"kayi-c-opt__num"} -->
					<p class="kayi-c-opt__num">03</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-c-opt__title"} -->
					<h3 class="wp-block-heading kayi-c-opt__title">Structure.</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"className":"kayi-c-opt__text"} -->
					<p class="kayi-c-opt__text">Multi-layered foam core for superior hand protection</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"className":"kayi-c-buttons"} -->
			<div class="wp-block-buttons kayi-c-buttons">
				<!-- wp:button {"className":"kayi-c-btn-gold"} -->
				<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/boxing/boxing-gloves/' ); ?>">Shop all boxing gloves</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"kayi-c-btn-outline"} -->
				<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/boxing-gloves/' ); ?>">Learn more</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"02 Focus pads"},"tagName":"section","anchor":"focus-pads","align":"full","className":"kayi-c-section kayi-c-split kayi-c-pads","layout":{"type":"default"}} -->
<section id="focus-pads" class="wp-block-group alignfull kayi-c-section kayi-c-split kayi-c-pads">
	<!-- wp:group {"metadata":{"name":"Copy"},"className":"kayi-c-split__copy","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-split__copy">
		<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
		<p class="kayi-c-eyebrow">02 · Precision. Speed. Technique.</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"className":"kayi-c-split__title js-reveal-wall"} -->
		<h2 class="wp-block-heading kayi-c-split__title js-reveal-wall">Focus <br>pads</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"kayi-c-split__text"} -->
		<p class="kayi-c-split__text">Premium-quality focus pads designed to improve speed, accuracy, timing and striking technique during every training session.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"metadata":{"name":"Features (one per hotspot, same order)"},"className":"kayi-c-zoom-opts","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-zoom-opts">
			<!-- wp:group {"className":"kayi-c-zoom-opt","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-zoom-opt">
				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__num"} -->
				<p class="kayi-c-zoom-opt__num">01</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-c-zoom-opt__title"} -->
				<h3 class="wp-block-heading kayi-c-zoom-opt__title">Striking face</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__text"} -->
				<p class="kayi-c-zoom-opt__text">A curved, padded target that gives the fighter a clear mark for every shot.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-c-zoom-opt","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-zoom-opt">
				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__num"} -->
				<p class="kayi-c-zoom-opt__num">02</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-c-zoom-opt__title"} -->
				<h3 class="wp-block-heading kayi-c-zoom-opt__title">Wrist cushioning</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__text"} -->
				<p class="kayi-c-zoom-opt__text">Extra cushioning inside the pad's glove steadies the trainer's wrist, so you can hold for longer.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-c-zoom-opt","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-zoom-opt">
				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__num"} -->
				<p class="kayi-c-zoom-opt__num">03</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-c-zoom-opt__title"} -->
				<h3 class="wp-block-heading kayi-c-zoom-opt__title">Secure strap</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__text"} -->
				<p class="kayi-c-zoom-opt__text">Holds each pad firmly on the hand, so it stays put through fast combinations.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-c-zoom-opt","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-zoom-opt">
				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__num"} -->
				<p class="kayi-c-zoom-opt__num">04</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-c-zoom-opt__title"} -->
				<h3 class="wp-block-heading kayi-c-zoom-opt__title">Built tough</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-c-zoom-opt__text"} -->
				<p class="kayi-c-zoom-opt__text">Premium materials and reinforced construction, made for regular training and fight preparation.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"kayi-c-buttons"} -->
		<div class="wp-block-buttons kayi-c-buttons">
			<!-- wp:button {"className":"kayi-c-btn-dark"} -->
			<div class="wp-block-button kayi-c-btn-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/coaching-accessories/focus-pads/' ); ?>">Shop focus pads</a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"kayi-c-btn-outline-dark"} -->
			<div class="wp-block-button kayi-c-btn-outline-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/focus-pads/' ); ?>">Learn more</a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"kayi-c-btn-outline-dark"} -->
			<div class="wp-block-button kayi-c-btn-outline-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/coaching-accessories/punch-kick-shields/' ); ?>">Thai pads &amp; shields</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:html {"metadata":{"name":"Pad stage (hotspots zoom in; data-step matches the feature order)"}} -->
	<div class="kayi-c-zoom" role="group" aria-label="Focus pad features">
		<div class="kayi-c-zoom__view">
			<div class="kayi-c-zoom__pic" style="--ar:746/816">
				<img src="<?php echo $kayi_upload( '2026/10/kayi-pads-front.webp' ); ?>" alt="Pro Kayi focus pad, striking face with the Kayi stallion logo" width="746" height="816" loading="lazy"/>
				<button type="button" class="kayi-c-zoom__spot" data-step="1" style="--x:40;--y:47;--z:1.25" aria-label="Striking face">1</button>
			</div>
		</div>
		<div class="kayi-c-zoom__view">
			<div class="kayi-c-zoom__pic" style="--ar:814/820">
				<img src="<?php echo $kayi_upload( '2026/10/kayi-pads-inside.webp' ); ?>" alt="Pro Kayi focus pads showing the hand pocket, wrist cushioning and strap" width="814" height="820" loading="lazy"/>
				<button type="button" class="kayi-c-zoom__spot" data-step="2" style="--x:33;--y:48;--z:1.6" aria-label="Wrist cushioning">2</button>
				<button type="button" class="kayi-c-zoom__spot is-left" data-step="3" style="--x:71;--y:52;--z:1.6" aria-label="Secure strap">3</button>
			</div>
		</div>
		<div class="kayi-c-zoom__view is-video" data-step="4">
			<video src="<?php echo $kayi_upload( '2026/10/kayi-pad-work-720.mp4' ); ?>" muted loop playsinline preload="none" aria-label="Pad work with Kayi focus pads"></video>
		</div>
	</div>
	<!-- /wp:html -->
</section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"03 Head guards"},"tagName":"section","anchor":"head-guards","align":"full","className":"kayi-c-section kayi-c-split kayi-c-guards","layout":{"type":"default"}} -->
<section id="head-guards" class="wp-block-group alignfull kayi-c-section kayi-c-split kayi-c-guards">
	<!-- wp:group {"metadata":{"name":"Copy"},"className":"kayi-c-split__copy","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-split__copy">
		<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
		<p class="kayi-c-eyebrow">03 · Spar with confidence</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"className":"kayi-c-split__title js-reveal-wall"} -->
		<h2 class="wp-block-heading kayi-c-split__title js-reveal-wall">Head <br><span class="kayi-c-gold">guards</span></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"kayi-c-split__text"} -->
		<p class="kayi-c-split__text">Designed for comfort, protection and visibility, our premium head guards give you the confidence you need for safe and effective sparring sessions.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"metadata":{"name":"Points"},"className":"kayi-c-points","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-points">
			<!-- wp:group {"className":"kayi-c-point","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-point">
				<!-- wp:paragraph {"className":"kayi-c-point__title"} -->
				<p class="kayi-c-point__title">Protection</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-c-point__text"} -->
				<p class="kayi-c-point__text">Reliable cover for sparring and combat training</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-c-point","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-point">
				<!-- wp:paragraph {"className":"kayi-c-point__title"} -->
				<p class="kayi-c-point__title">Comfort</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-c-point__text"} -->
				<p class="kayi-c-point__text">Ergonomic design for a secure fit</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-c-point","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-c-point">
				<!-- wp:paragraph {"className":"kayi-c-point__title"} -->
				<p class="kayi-c-point__title">Visibility</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-c-point__text"} -->
				<p class="kayi-c-point__text">Full awareness in the ring</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"kayi-c-buttons"} -->
		<div class="wp-block-buttons kayi-c-buttons">
			<!-- wp:button {"className":"kayi-c-btn-gold"} -->
			<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/protective-gears/headguard/' ); ?>">Shop head guards</a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"kayi-c-btn-outline"} -->
			<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/head-guards/' ); ?>">Learn more</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"A closer look (same viewer as the head guards page: kayi.js adds the Front / Side / Back / Inside tabs)"},"className":"kayi-c-look","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-look">
		<!-- wp:group {"className":"kayi-lp-viewer","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-viewer">
			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Front</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":543,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-front.webp' ); ?>" alt="Pro Kayi head guard, front view" class="wp-image-543" width="893" height="1000" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Full-face coverage across the forehead, cheeks and around the nose, with metallic gold accents.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Side</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":545,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-side.webp' ); ?>" alt="Pro Kayi head guard, side view" class="wp-image-545" width="936" height="1000" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Cheek protection wraps around to guard against hooks, while the sculpted opening keeps your peripheral vision clear.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Back</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":547,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-back.webp' ); ?>" alt="Pro Kayi head guard, rear view with the crown lacing" class="wp-image-547" width="1000" height="962" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">The fully adjustable crown lets you dial in a snug fit over the top of the head.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Inside</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":548,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-inside.webp' ); ?>" alt="Inside the Pro Kayi head guard" class="wp-image-548" width="1000" height="920" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Thick internal foam padding absorbs impact, with the crown straps and chin strap inside.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Rest of the range"},"tagName":"section","align":"full","className":"kayi-c-section kayi-c-shelf kayi-c-rest has-arrows","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull kayi-c-section kayi-c-shelf kayi-c-rest has-arrows">
	<!-- wp:group {"metadata":{"name":"Section header"},"className":"kayi-c-head","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-head">
		<!-- wp:group {"className":"kayi-c-head__titles","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-head__titles">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">More from Kayi</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-c-h2"} -->
			<h2 class="wp-block-heading kayi-c-h2">The rest of the range</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-c-head__sub"} -->
			<p class="kayi-c-head__sub">Clothing, protective extras and training accessories.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"kayi-c-buttons kayi-c-head__actions"} -->
		<div class="wp-block-buttons kayi-c-buttons kayi-c-head__actions">
			<!-- wp:button {"className":"kayi-c-btn-dark"} -->
			<div class="wp-block-button kayi-c-btn-dark"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/shop/' ); ?>">View all products</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/product-collection {"queryId":73,"query":{"perPage":12,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"post__in","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":["410","246","249","257","324","280","358","377","288","300"],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/hand-picked","hideControls":["inherit","hand-picked"],"queryContextIncludes":["collection"],"className":"kayi-c-products"} -->
	<div class="wp-block-woocommerce-product-collection kayi-c-products">
		<!-- wp:woocommerce/product-template {"className":"kayi-c-cards is-compact"} -->
			<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"single","isDescendentOfQueryLoop":true,"aspectRatio":"4/5","scale":"cover","className":"kayi-c-card__image"} -->
				<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
			<!-- /wp:woocommerce/product-image -->

			<!-- wp:post-terms {"term":"product_cat","separator":"","className":"kayi-c-card__cat"} /-->

			<!-- wp:post-title {"level":3,"isLink":true,"className":"kayi-c-card__title","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"className":"kayi-c-card__price"} /-->
		<!-- /wp:woocommerce/product-template -->
	</div>
	<!-- /wp:woocommerce/product-collection -->

	<!-- wp:buttons {"metadata":{"name":"Also shop"},"className":"kayi-c-pills"} -->
	<div class="wp-block-buttons kayi-c-pills">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/clothing/' ); ?>">Clothing</a></div>
		<!-- /wp:button -->

		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/protective-gears/' ); ?>">Protective gear</a></div>
		<!-- /wp:button -->

		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/punching-bags/' ); ?>">Punching bags</a></div>
		<!-- /wp:button -->

		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/coaching-accessories/' ); ?>">Coaching accessories</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-sale"} -->
		<div class="wp-block-button is-sale"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_link( '/product-category/sale/' ); ?>">Sale</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Why Kayi Sports"},"tagName":"section","align":"full","className":"kayi-c-section kayi-c-why","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull kayi-c-section kayi-c-why">
	<!-- wp:group {"metadata":{"name":"Section header"},"className":"kayi-c-head","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-head">
		<!-- wp:group {"className":"kayi-c-head__titles","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-head__titles">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">Why choose Kayi Sports</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-c-h2 js-reveal-wall"} -->
			<h2 class="wp-block-heading kayi-c-h2 js-reveal-wall">Built for fighters.<br><span class="kayi-c-gold">Since 2013.</span></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"kayi-c-head__intro"} -->
		<p class="kayi-c-head__intro">From your first bag session to fight night – gear chosen with real training and combat sports in mind.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"USPs"},"className":"kayi-c-usps","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-usps">
		<!-- wp:group {"className":"kayi-c-usp js-fade-in-up","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-usp js-fade-in-up">
			<!-- wp:paragraph {"className":"kayi-c-usp__num"} -->
			<p class="kayi-c-usp__num">01</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"className":"kayi-c-usp__title"} -->
			<h3 class="wp-block-heading kayi-c-usp__title">Premium quality gear</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-c-usp__text"} -->
			<p class="kayi-c-usp__text">Carefully selected boxing and MMA equipment designed for durability, comfort and long-lasting performance.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-c-usp js-fade-in-up","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-usp js-fade-in-up">
			<!-- wp:paragraph {"className":"kayi-c-usp__num"} -->
			<p class="kayi-c-usp__num">02</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"className":"kayi-c-usp__title"} -->
			<h3 class="wp-block-heading kayi-c-usp__title">Built for fighters</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-c-usp__text"} -->
			<p class="kayi-c-usp__text">Chosen with real training and combat sports needs in mind – for beginners, athletes and professional fighters.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-c-usp js-fade-in-up","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-usp js-fade-in-up">
			<!-- wp:paragraph {"className":"kayi-c-usp__num"} -->
			<p class="kayi-c-usp__num">03</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"className":"kayi-c-usp__title"} -->
			<h3 class="wp-block-heading kayi-c-usp__title">Best prices</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-c-usp__text"} -->
			<p class="kayi-c-usp__text">High-quality training gear at fair and competitive prices, without compromising on performance.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-c-usp js-fade-in-up","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-c-usp js-fade-in-up">
			<!-- wp:paragraph {"className":"kayi-c-usp__num"} -->
			<p class="kayi-c-usp__num">04</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"className":"kayi-c-usp__title"} -->
			<h3 class="wp-block-heading kayi-c-usp__title">Fast &amp; reliable shipping</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-c-usp__text"} -->
			<p class="kayi-c-usp__text">Quick, dependable delivery so you can get your gear and get back to training without delay.</p>
			<!-- /wp:paragraph -->
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

		<!-- wp:heading {"className":"kayi-c-h2 js-reveal-wall"} -->
		<h2 class="wp-block-heading kayi-c-h2 js-reveal-wall">Questions?<br>Answered.</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"kayi-c-lead"} -->
		<p class="kayi-c-lead">Can’t find what you’re looking for? Our team is happy to help you choose the right gear.</p>
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
		<details class="wp-block-details" open><summary>What types of boxing gloves do you offer?</summary>
			<!-- wp:paragraph -->
			<p>We offer a wide range of professional boxing gloves suitable for training, sparring and competition. Our gloves are designed for durability, comfort and maximum protection.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary>What protective gear do you provide?</summary>
			<!-- wp:paragraph -->
			<p>We offer a complete range of protective gear including headguards, mouthguards, shin guards and hand wraps to ensure safety during training and fights.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary>Do you sell coaching and training accessories?</summary>
			<!-- wp:paragraph -->
			<p>Yes, we provide essential coaching accessories such as focus pads, kick pads, timers and other training tools for coaches and athletes.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary>Are your punching bags suitable for home and gym use?</summary>
			<!-- wp:paragraph -->
			<p>Yes, our punching bags are built with high-quality materials and are suitable for both home workouts and professional gym environments.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary>What type of clothing do you offer?</summary>
			<!-- wp:paragraph -->
			<p>Our clothing range includes boxing shorts, training wear and athletic apparel designed for comfort, flexibility and performance.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Newsletter"},"tagName":"section","align":"full","className":"kayi-c-news","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull kayi-c-news">
	<!-- wp:group {"className":"kayi-c-news__copy","layout":{"type":"default"}} -->
	<div class="wp-block-group kayi-c-news__copy">
		<!-- wp:heading {"className":"kayi-c-news__title"} -->
		<h2 class="wp-block-heading kayi-c-news__title">Join the Kayi corner</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"kayi-c-news__text"} -->
		<p class="kayi-c-news__text">New drops, restocks and members-only offers – straight to your inbox.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<form class="kayi-c-news__form" action="#" method="post" novalidate>
		<label class="screen-reader-text" for="kayi-c-news-email">Email address</label>
		<input id="kayi-c-news-email" type="email" name="email" placeholder="Your email address" autocomplete="email" required>
		<button type="submit">Subscribe</button>
		<p class="kayi-c-news__msg" role="status" hidden></p>
	</form>
	<!-- /wp:html -->
</section>
<!-- /wp:group -->


