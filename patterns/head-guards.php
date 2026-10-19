<?php
/**
 * Title: Head guards feature page (black & gold)
 * Slug: twentytwentyfive-child/head-guards
 * Description: "Learn more" page for the Pro Kayi head guard, from the "Kayi Head Guards Section" design canvas (artboard "Head guards · full feature page"): sticky section nav, hero, highlights, protection (hotspots), materials, visibility, straps, a closer look (view switcher), fit check, care, buy panel and kit links. Animations live in kayi.js (initLanding) and the .kayi-lp-* rules in kayi.css. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports, featured
 * Keywords: head guard, headgear, feature page, protection, sparring
 * Viewport Width: 1440
 */

$kayi_upload = function ( $path ) {
	return esc_url( content_url( '/uploads/' . $path ) );
};
$kayi_link = function ( $path ) {
	return esc_url( home_url( $path ) );
};
$kayi_product = $kayi_link( '/product/pro-kayi-black-and-metallic-gold-headgear/' );
?>
<!-- wp:group {"metadata":{"name":"Head guards page"},"align":"full","className":"kayi-lp","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-lp">
	<!-- wp:html -->
	<nav class="kayi-lp-nav" aria-label="Head guard sections">
		<div class="kayi-lp-nav__inner">
			<p class="kayi-lp-nav__title">Pro Kayi Head Guard</p>
			<div class="kayi-lp-nav__links">
				<a href="#protection">Protection</a>
				<a href="#materials">Materials</a>
				<a href="#visibility">Visibility</a>
				<a href="#straps">Straps</a>
				<a href="#fit">Fit</a>
				<a href="#care">Care</a>
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
			<p class="kayi-c-eyebrow kayi-lp-in">Head guards</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"kayi-lp-hero__title kayi-lp-lines"} -->
			<h1 class="wp-block-heading kayi-lp-hero__title kayi-lp-lines">Built to take<br>the <span class="kayi-c-gold">hit.</span></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-hero__lead kayi-lp-in"} -->
			<p class="kayi-lp-hero__lead kayi-lp-in">Full-face protection, a wide field of view and a fit that stays locked in. Everything you need to know before your next spar.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"kayi-c-buttons kayi-lp-in"} -->
			<div class="wp-block-buttons kayi-c-buttons kayi-lp-in">
				<!-- wp:button {"className":"kayi-c-btn-gold"} -->
				<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_product; ?>">Buy now</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"kayi-c-btn-outline"} -->
				<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#protection">Explore the guard</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"id":544,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-hero__media"} -->
		<figure class="wp-block-image size-full kayi-lp-hero__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-three-quarter.webp' ); ?>" alt="Pro Kayi head guard, three-quarter view showing the gold cheek pad" class="wp-image-544" width="923" height="1000" fetchpriority="high"/></figure>
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
				<p class="kayi-lp-stat__value">Full-face</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Forehead, cheek and nose-area coverage</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Wide view</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Padding sculpted for peripheral vision</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">2-point</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Adjustable crown and hook-and-loop chin strap</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Tough shell</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Synthetic leather that resists sweat and wear</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"01 Protection"},"tagName":"section","anchor":"protection","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="protection" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">01 · Protection</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Coverage where the shots land.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">The integrated full-face design absorbs impact from heavy punches and helps reduce the risk of cuts and bruising during intense sparring.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-zones kayi-lp-rv","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-zones kayi-lp-rv">
			<!-- wp:group {"className":"kayi-lp-zones__figure","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zones__figure">
				<!-- wp:image {"id":543,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-front.webp' ); ?>" alt="Pro Kayi black and metallic gold head guard, front view" class="wp-image-543" width="893" height="1000" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:html -->
				<div class="kayi-lp-spots">
					<button type="button" class="kayi-lp-spot" style="--x:50%;--y:25%" aria-label="Forehead">1</button>
					<button type="button" class="kayi-lp-spot" style="--x:21%;--y:60%" aria-label="Cheeks">2</button>
					<button type="button" class="kayi-lp-spot" style="--x:50%;--y:84%" aria-label="Around the nose">3</button>
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
				<h3 class="wp-block-heading kayi-lp-h3">Forehead</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>A thick padded brow band takes straight shots and accidental clashes head-on.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-zone","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zone">
				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Cheeks</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Wrap-around cheek protection guards against hooks coming in from either side.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-zone","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-zone">
				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Around the nose</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>The full-face shape adds coverage that open-face guards leave exposed.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"02 Materials"},"tagName":"section","anchor":"materials","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="materials" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split">
			<!-- wp:image {"id":547,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-panel kayi-lp-zoom kayi-lp-rv"} -->
			<figure class="wp-block-image size-full kayi-lp-panel kayi-lp-zoom kayi-lp-rv"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-back.webp' ); ?>" alt="Pro Kayi head guard from behind: leather grain, stitching and gold trim" class="wp-image-547" width="1000" height="962" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">02 · Materials</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Tough outside. Thick inside.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">A durable synthetic leather shell stands up to sweat and wear, while thick internal foam padding does the work of absorbing impact.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Outer shell</span><strong>Synthetic leather</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Padding</span><strong>Thick internal foam</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Closure</span><strong>Hook-and-loop chin strap</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Finish</span><strong>Black, metallic gold accents</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"03 Visibility"},"tagName":"section","anchor":"visibility","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="visibility" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-split is-flipped","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split is-flipped">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">03 · Visibility</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">See every shot coming.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">The padding is sculpted around the eyes to maximise peripheral vision, so you can read incoming punches and counter with speed and confidence, without the visual obstruction common in standard gear.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-panel kayi-lp-iris","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-panel kayi-lp-iris">
				<!-- wp:html -->
				<svg class="kayi-lp-iris__fov" viewBox="0 0 400 320" aria-hidden="true" focusable="false">
					<path class="kayi-lp-iris__arc" pathLength="1" d="M60 236 A150 150 0 0 1 340 236"/>
					<path class="kayi-lp-iris__arc is-2" pathLength="1" d="M100 236 A110 110 0 0 1 300 236"/>
					<path class="kayi-lp-iris__ray" pathLength="1" d="M200 236 L52 150"/>
					<path class="kayi-lp-iris__ray" pathLength="1" d="M200 236 L348 150"/>
				</svg>
				<!-- /wp:html -->

				<!-- wp:image {"id":545,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-iris__img"} -->
				<figure class="wp-block-image size-full kayi-lp-iris__img"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-side.webp' ); ?>" alt="Pro Kayi head guard from the side, showing the wide eye opening" class="wp-image-545" width="936" height="1000" loading="lazy"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"04 Straps"},"tagName":"section","anchor":"straps","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="straps" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">04 · Straps</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Locked in for every round.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
			<p class="kayi-lp-lead">Two adjustment points keep the guard in place, so it doesn't shift and your protection stays where it should be.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-cards kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-cards kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":546,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-medium_large kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-top-768x813.webp' ); ?>" alt="Pro Kayi head guard from above, showing the crown lacing" class="wp-image-546" width="768" height="813" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
					<h3 class="wp-block-heading kayi-lp-h3 is-lg">Adjustable crown</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Fully adjustable over the top of the head, so you can dial in the fit for your head shape.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":548,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-medium_large kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-inside-768x707.webp' ); ?>" alt="Inside the Pro Kayi head guard: crown straps and hook-and-loop chin strap" class="wp-image-548" width="768" height="707" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:heading {"level":3,"className":"kayi-lp-h3 is-lg"} -->
					<h3 class="wp-block-heading kayi-lp-h3 is-lg">Hook-and-loop chin strap</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>A secure Velcro closure: quick on, quick off between rounds. Fasten it firmly, but loose enough to breathe.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"A closer look"},"tagName":"section","className":"kayi-lp-sec kayi-lp-look","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-sec kayi-lp-look" aria-label="A closer look">
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
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"05 Fit"},"tagName":"section","anchor":"fit","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="fit" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-fithead","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-fithead">
			<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">05 · Fit</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2"} -->
				<h2 class="wp-block-heading kayi-lp-h2">Get the fit right.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">A head guard only protects properly when it fits. Set the crown and chin strap, then run these three checks before your first round.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-fitnote kayi-lp-rv","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-fitnote kayi-lp-rv">
				<!-- wp:paragraph {"className":"kayi-lp-fitnote__title"} -->
				<p class="kayi-lp-fitnote__title">Not sure it'll fit?</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p>Send us your head measurement (around the head, just above the eyebrows and ears) and we'll help you before you order.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
				<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/contact-us/' ); ?>">Ask about fit</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-steps kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-steps kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-step","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-step">
				<!-- wp:html -->
				<div class="kayi-lp-step__art is-crown" aria-hidden="true">
					<svg viewBox="0 0 240 180" focusable="false">
						<path class="hg-head" d="M120 30c-38 0-64 28-64 66v40h128V96c0-38-26-66-64-66z"/>
						<path class="hg-guard" d="M120 22c-44 0-72 32-72 74v44h24v-38c0-26 20-46 48-46s48 20 48 46v38h24V96c0-42-28-74-72-74z"/>
						<path class="hg-strap" pathLength="1" d="M70 64 C96 44 144 44 170 64"/>
						<g class="hg-pull"><path d="M190 52 l18 -12"/><path d="M200 38 l8 2 -2 8"/></g>
					</svg>
				</div>
				<!-- /wp:html -->

				<!-- wp:paragraph {"className":"kayi-lp-step__num"} -->
				<p class="kayi-lp-step__num">Step 1</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Set the crown</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Adjust the crown so the guard sits snug over the top of your head, then fasten the chin strap.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-step","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-step">
				<!-- wp:html -->
				<div class="kayi-lp-step__art is-shake" aria-hidden="true">
					<svg viewBox="0 0 240 180" focusable="false">
						<g class="hg-shake">
							<path class="hg-guard" d="M120 26c-42 0-70 32-70 72v50h140V98c0-40-28-72-70-72z"/>
							<path class="hg-face" d="M88 82h64v34c0 18-14 30-32 30s-32-12-32-30z"/>
						</g>
						<path class="hg-motion" d="M30 74c-8 14-8 34 0 48M18 64c-12 20-12 48 0 68"/>
						<path class="hg-motion is-r" d="M210 74c8 14 8 34 0 48M222 64c12 20 12 48 0 68"/>
					</svg>
				</div>
				<!-- /wp:html -->

				<!-- wp:paragraph {"className":"kayi-lp-step__num"} -->
				<p class="kayi-lp-step__num">Step 2</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Shake test</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Strap it up and shake your head. It should move with you, not slide or slip over your eyes.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-step","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-step">
				<!-- wp:html -->
				<div class="kayi-lp-step__art is-sight" aria-hidden="true">
					<svg viewBox="0 0 240 180" focusable="false">
						<rect class="hg-guard" x="50" y="44" width="140" height="92" rx="40"/>
						<g class="hg-eyes"><circle cx="100" cy="90" r="9"/><circle cx="140" cy="90" r="9"/></g>
						<path class="hg-cross" pathLength="1" d="M120 30v20M120 130v20M36 90h20M184 90h20"/>
					</svg>
				</div>
				<!-- /wp:html -->

				<!-- wp:paragraph {"className":"kayi-lp-step__num"} -->
				<p class="kayi-lp-step__num">Step 3</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Line of sight</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Your eyes should sit centred in the opening, with a clear view without tilting your head.</p>
				<!-- /wp:paragraph -->
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
			<h2 class="wp-block-heading kayi-lp-h2 is-md">Look after it. It'll look after you.</h2>
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
				<p>After every session, wipe the inside and outside with a damp cloth.</p>
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
				<p>Let it dry naturally, away from radiators and direct heat.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M5 8h14l-1 12H6L5 8z"/><path pathLength="1" d="M9 8V6a3 3 0 0 1 6 0v2"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Store open</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Don't seal it in your kit bag. Give it room to breathe between sessions.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-tip","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-tip">
				<!-- wp:html -->
				<svg class="kayi-lp-tip__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path pathLength="1" d="M12 3l7 3v6c0 4-3 7-7 9-4-2-7-5-7-9V6l7-3z"/><path pathLength="1" d="M9 12l2 2 4-4"/></svg>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
				<h3 class="wp-block-heading kayi-lp-h3">Spar safe</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Always pair your guard with 16oz sparring gloves and a mouthguard.</p>
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
			<!-- wp:image {"id":544,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-buy__media"} -->
			<figure class="wp-block-image size-medium_large kayi-lp-buy__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-three-quarter-768x832.webp' ); ?>" alt="Pro Kayi black and metallic gold head guard" class="wp-image-544" width="768" height="832" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">Ready to spar?</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-sm"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-sm">Pro Kayi Black &amp; Metallic Gold</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-buy__price"} -->
				<p class="kayi-lp-buy__price">[kayi_product_price id="199"]</p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"kayi-lp-ticks"} -->
				<ul class="wp-block-list kayi-lp-ticks"><!-- wp:list-item -->
				<li>Fast UK shipping from Watford</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>Secure checkout</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>Exchanges on manufacturing defects</li>
				<!-- /wp:list-item --></ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"className":"kayi-c-buttons"} -->
				<div class="wp-block-buttons kayi-c-buttons">
					<!-- wp:button {"className":"kayi-c-btn-gold"} -->
					<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_product; ?>">Buy now</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"kayi-c-btn-outline"} -->
					<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#fit">Check the fit</a></div>
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
			<h2 class="wp-block-heading kayi-lp-h3 is-xl kayi-lp-rv">Complete your sparring kit</h2>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"kayi-lp-kit__grid kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-kit__grid kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-lp-kit__card"} -->
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/product-category/boxing/boxing-gloves/sparing-gloves/' ); ?>"><strong>16oz sparring gloves</strong><span>Protect yourself and your partner.</span><em>Shop gloves</em></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-kit__card"} -->
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/product/black-shin-guards/' ); ?>"><strong>Shin guards</strong><span>For mixed striking drills.</span><em>Shop shin guards</em></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-kit__card"} -->
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/product/hand-wraps/' ); ?>"><strong>Hand wraps</strong><span>Support under every glove.</span><em>Shop hand wraps</em></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
