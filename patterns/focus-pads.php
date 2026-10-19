<?php
/**
 * Title: Focus pads landing page (black & gold)
 * Slug: twentytwentyfive-child/focus-pads
 * Description: Landing page for the Pro Kayi Black Focus Pads, built on the head guards page system (.kayi-lp, cream product panels): sticky section nav, hero, highlights, trainer hotspots, build (video), an animated combo drill, a closer look, care, pair-with products with live prices, buy panel and kit links. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports, featured
 * Keywords: focus pads, pads, landing page, drills, trainer, wrist support
 * Viewport Width: 1440
 */

$kayi_upload = function ( $path ) {
	return esc_url( content_url( '/uploads/' . $path ) );
};
$kayi_link = function ( $path ) {
	return esc_url( home_url( $path ) );
};
$kayi_product = $kayi_link( '/product/pro-kayi-black-focus-pads/' );
?>
<!-- wp:group {"metadata":{"name":"Focus pads page"},"align":"full","className":"kayi-lp is-cream","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-lp is-cream">
	<!-- wp:html -->
	<nav class="kayi-lp-nav" aria-label="Focus pad sections">
		<div class="kayi-lp-nav__inner">
			<p class="kayi-lp-nav__title">Pro Kayi Focus Pads</p>
			<div class="kayi-lp-nav__links">
				<a href="#trainer">Trainer</a>
				<a href="#build">Build</a>
				<a href="#drills">Drills</a>
				<a href="#care">Care</a>
				<a href="#pair">Pair with</a>
			</div>
			<a class="kayi-lp-nav__buy" href="<?php echo $kayi_product; ?>">Buy</a>
		</div>
		<span class="kayi-lp-nav__progress" aria-hidden="true"></span>
	</nav>
	<!-- /wp:html -->

	<!-- wp:group {"metadata":{"name":"Hero"},"tagName":"section","className":"kayi-lp-hero","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-hero">
		<!-- wp:group {"className":"kayi-lp-hero__copy","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-hero__copy">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow kayi-lp-in"} -->
			<p class="kayi-c-eyebrow kayi-lp-in">Focus pads</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"kayi-lp-hero__title kayi-lp-lines"} -->
			<h1 class="wp-block-heading kayi-lp-hero__title kayi-lp-lines">Sharpen<br>every <span class="kayi-c-gold">shot.</span></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-hero__lead kayi-lp-in"} -->
			<p class="kayi-lp-hero__lead kayi-lp-in">Pads built to protect the trainer and push the fighter: extra wrist cushioning, a tough synthetic leather shell and a target made for speed, accuracy and timing.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"kayi-c-buttons kayi-lp-in"} -->
			<div class="wp-block-buttons kayi-c-buttons kayi-lp-in">
				<!-- wp:button {"className":"kayi-c-btn-gold"} -->
				<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_product; ?>">Buy now</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"kayi-c-btn-outline"} -->
				<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#trainer">Explore the pads</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"id":555,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-hero__media"} -->
		<figure class="wp-block-image size-full kayi-lp-hero__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-pair.webp' ); ?>" alt="Pair of Pro Kayi black focus pads" class="wp-image-555" width="903" height="752" fetchpriority="high"/></figure>
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
				<p class="kayi-lp-stat__value">Wrist support</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Extra cushioning so trainers can hold for longer</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Tough shell</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Synthetic leather that resists cracks and tears</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Wipe clean</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Quick to wipe down and keep hygienic</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Versatile</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Boxing drills, or striking mixed with grappling</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"01 Trainer"},"tagName":"section","anchor":"trainer","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="trainer" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">01 · Trainer comfort</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Built for the one holding them.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">Thick cushioning sits inside each pad's glove to stabilise the trainer's wrist, reducing strain from repeated high-impact strikes, so you can hold pads longer and safer, session after session.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-zones kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-zones kayi-lp-rv">
			<!-- wp:group {"className":"kayi-lp-zones__figure is-pads","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zones__figure is-pads">
				<!-- wp:image {"id":554,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-inside.webp' ); ?>" alt="Pro Kayi focus pads showing the hand pocket, strap and wrist cushioning" class="wp-image-554" width="814" height="820" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:html -->
				<div class="kayi-lp-spots">
					<button type="button" class="kayi-lp-spot" style="--x:28%;--y:74%" aria-label="Striking face">1</button>
					<button type="button" class="kayi-lp-spot" style="--x:40%;--y:62%" aria-label="Wrist cushioning">2</button>
					<button type="button" class="kayi-lp-spot" style="--x:66%;--y:42%" aria-label="Secure strap">3</button>
				</div>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-zonelist kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-zonelist kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-zone","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zone">
				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Striking face</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>A curved, padded target that gives the fighter a clear mark for every shot.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-zone","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zone">
				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Wrist cushioning</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Extra cushioning placed inside the pad's glove steadies the trainer's wrist on heavy shots.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-zone","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zone">
				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Secure strap</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>A secure strap holds each pad on the hand, so it stays put through fast combinations.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"02 Build"},"tagName":"section","anchor":"build","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="build" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split">
			<!-- wp:group {"className":"kayi-lp-panel is-video kayi-lp-rv","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-panel is-video kayi-lp-rv">
				<!-- wp:video {"id":539,"controls":false,"loop":true,"muted":true,"preload":"metadata","playsInline":true} -->
				<figure class="wp-block-video"><video loop muted preload="metadata" src="<?php echo $kayi_upload( '2026/10/kayi-pad-work-720.mp4' ); ?>" playsinline></video></figure>
				<!-- /wp:video -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">02 · Build</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Built tough. Built right.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">Premium materials and reinforced construction mean these pads stand up to the demands of regular training and fight preparation. The synthetic leather shell resists cracks and tears, and wipes clean in seconds.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Outer</span><strong>Synthetic leather</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Wrist</span><strong>Extra support cushioning</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Fit</span><strong>Secure hand strap</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Finish</span><strong>Black, Kayi stallion logo</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"03 Drills"},"tagName":"section","anchor":"drills","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="drills" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">03 · Drills</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Speed. Accuracy. Timing.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">Pad work turns punches into combinations. The trainer calls it, the fighter lands it, and every round sharpens your speed, accuracy, timing and technique.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-drill","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-drill">
			<!-- wp:image {"id":553,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-drill__pad"} -->
			<figure class="wp-block-image size-full kayi-lp-drill__pad"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-front.webp' ); ?>" alt="Pro Kayi focus pad, striking face" class="wp-image-553" width="746" height="816" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:html -->
			<div class="kayi-lp-combo">
				<p class="kayi-lp-combo__title">Try this: <span>1 – 2 – 3 – 2</span></p>
				<ol aria-label="Combination: jab, cross, lead hook, cross">
					<li><b>1</b><span>Jab</span></li>
					<li><b>2</b><span>Cross</span></li>
					<li><b>3</b><span>Lead hook</span></li>
					<li><b>2</b><span>Cross</span></li>
				</ol>
				<p>Start slow and land each shot clean, then build speed. The trainer moves the pads between combinations so you learn to find the target.</p>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"A closer look"},"tagName":"section","className":"kayi-lp-sec kayi-lp-look is-alt","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-sec kayi-lp-look is-alt" aria-label="A closer look">
		<!-- wp:heading {"className":"kayi-lp-h2 is-md kayi-lp-rv"} -->
		<h2 class="wp-block-heading kayi-lp-h2 is-md kayi-lp-rv">Take a closer look.</h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"kayi-lp-viewer kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-viewer kayi-lp-rv">
			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Front</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":553,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-front.webp' ); ?>" alt="Pro Kayi focus pad, striking face with the Kayi stallion" class="wp-image-553" width="746" height="816" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">The striking face: a curved, padded target marked with the Kayi stallion.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Hand side</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":554,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-inside.webp' ); ?>" alt="Pro Kayi focus pads, hand side with the strap" class="wp-image-554" width="814" height="820" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">The hand side: a secure strap and the extra wrist cushioning that makes long rounds easier on the trainer.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Pair</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":555,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-pair.webp' ); ?>" alt="Pair of Pro Kayi focus pads" class="wp-image-555" width="903" height="752" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Black synthetic leather with Kayi branding on the strap.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Angle</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":556,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-angle.webp' ); ?>" alt="Pro Kayi focus pads from an angle" class="wp-image-556" width="848" height="804" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Shaped to sit naturally on the trainer's hands, ready to catch from any angle.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"04 Care"},"tagName":"section","anchor":"care","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="care" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">04 · Care</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
			<h2 class="wp-block-heading kayi-lp-h2 is-md">Ready for the next round.</h2>
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
				<h3 class="wp-block-heading kayi-lp-h3">Wipe down</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>The synthetic leather wipes clean after every session, so the pads stay hygienic.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M4 8h10a3 3 0 1 0-3-3"/><path pathLength="1" d="M4 12h15a3 3 0 1 1-3 3"/><path pathLength="1" d="M4 16h7"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Air-dry</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Let them dry naturally after sweaty rounds, away from radiators and direct heat.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M12 3l7 3v6c0 4-3 7-7 9-4-2-7-5-7-9V6l7-3z"/><path pathLength="1" d="M9 12l2 2 4-4"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Support your wrists</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>For long, heavy sessions, trainers can add wrist supports for extra stability.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M7 11V6a2 2 0 0 1 4 0v4"/><path pathLength="1" d="M11 10V5a2 2 0 0 1 4 0v5"/><path pathLength="1" d="M15 10V7a2 2 0 0 1 4 0v6a7 7 0 0 1-7 7h-1a6 6 0 0 1-6-6v-2a2 2 0 0 1 2-2"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Wrap up</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Fighters should wear hand wraps under their gloves for every pad round.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"05 Pair with"},"tagName":"section","anchor":"pair","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="pair" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">05 · Pair with</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Build the full session.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-range is-3 kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-range is-3 kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":552,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-medium_large kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-gloves-laceup-768x751.webp' ); ?>" alt="Lace-Up Boxing Gloves" class="wp-image-552" width="768" height="751" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">The training combo</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Lace-Up Boxing Gloves</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>A locked-in, pro fit for the fighter's side of the pads.</p>
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
				<!-- wp:image {"id":557,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-medium_large kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-shield-front-768x753.webp' ); ?>" alt="Pro Kayi Black Round Shield" class="wp-image-557" width="768" height="753" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Power rounds</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Pro Kayi Black Round Shield</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Multi-layer padding that safely absorbs full-power punches, kicks and knees.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="194"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/product/pro-kayi-black-round-shield/' ); ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":236,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media is-photo"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media is-photo"><img src="<?php echo $kayi_upload( '2026/09/WhatsAppImage2024-03-08at10.19.43PM_1_720x.webp' ); ?>" alt="Golden Boxing Gloves" class="wp-image-236" width="720" height="960" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Fast pad work</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Golden Boxing Gloves</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Lightweight cowhide gloves made for high-rep pad drills and cardio boxing.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="235"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/boxing-gloves/' ); ?>">See the gloves</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"Buy"},"tagName":"section","anchor":"buy","className":"kayi-lp-sec kayi-lp-buy","layout":{"type":"default"}} -->
	<section id="buy" class="wp-block-group kayi-lp-sec kayi-lp-buy">
		<!-- wp:group {"className":"kayi-lp-buy__panel kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-buy__panel kayi-lp-rv">
			<!-- wp:image {"id":555,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-buy__media"} -->
			<figure class="wp-block-image size-medium_large kayi-lp-buy__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-pads-pair-768x640.webp' ); ?>" alt="Pair of Pro Kayi black focus pads" class="wp-image-555" width="768" height="640" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">Ready to train?</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-sm"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-sm">Pro Kayi Black Focus Pads</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-buy__price"} -->
				<p class="kayi-lp-buy__price">[kayi_product_price id="189"]</p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"kayi-lp-ticks"} -->
				<ul class="wp-block-list kayi-lp-ticks"><!-- wp:list-item -->
				<li>Extra wrist cushioning for the trainer</li>
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
					<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_product; ?>">Buy now</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"kayi-c-btn-outline"} -->
					<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#drills">See the drill</a></div>
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
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/product-category/protective-gears/wrist-supports/' ); ?>"><strong>Wrist supports</strong><span>Extra stability for heavy sessions.</span><em>Shop wrist supports</em></a></p>
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
