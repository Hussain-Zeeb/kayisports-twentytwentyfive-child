<?php
/**
 * Title: Bulwark range landing page (black & gold)
 * Slug: twentytwentyfive-child/bulwark
 * Description: Landing page for the Kayi Bulwark range (red boxing gloves, head guard and groin guard), built on the boxing gloves page system (.kayi-lp): sticky section nav, cut-out hero, highlights, the gloves, a closer look, head guard, groin guard, glove-weight picker, the kit with live prices, care, buy panel and kit links. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports, featured
 * Keywords: bulwark, boxing gloves, head guard, groin guard, landing page, sparring kit
 * Viewport Width: 1440
 */

$kayi_upload = function ( $path ) {
	return esc_url( content_url( '/uploads/' . $path ) );
};
$kayi_link = function ( $path ) {
	return esc_url( home_url( $path ) );
};
$kayi_gloves = esc_url( get_permalink( 521 ) );
$kayi_head   = esc_url( get_permalink( 199 ) );
$kayi_groin  = esc_url( get_permalink( 249 ) );
?>
<!-- wp:group {"metadata":{"name":"Bulwark range page"},"align":"full","className":"kayi-lp","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-lp">
	<!-- wp:html -->
	<nav class="kayi-lp-nav" aria-label="Bulwark range sections">
		<div class="kayi-lp-nav__inner">
			<p class="kayi-lp-nav__title">Kayi Bulwark</p>
			<div class="kayi-lp-nav__links">
				<a href="#gloves">Gloves</a>
				<a href="#head-guard">Head guard</a>
				<a href="#groin-guard">Groin guard</a>
				<a href="#sizes">Sizes</a>
				<a href="#kit">Kit</a>
				<a href="#care">Care</a>
			</div>
			<a class="kayi-lp-nav__buy" href="#kit">Shop</a>
		</div>
		<span class="kayi-lp-nav__progress" aria-hidden="true"></span>
	</nav>
	<!-- /wp:html -->

	<!-- wp:group {"metadata":{"name":"Hero"},"tagName":"section","className":"kayi-lp-hero","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-lp-hero">
		<!-- wp:group {"className":"kayi-lp-hero__copy","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-hero__copy">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow kayi-lp-in"} -->
			<p class="kayi-c-eyebrow kayi-lp-in">The Bulwark range</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"kayi-lp-wordmark kayi-lp-in"} -->
			<h1 class="wp-block-heading kayi-lp-wordmark kayi-lp-in"><span class="kayi-lp-wordmark__name">Bulwark</span> <span class="kayi-lp-wordmark__num">100</span></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"kayi-lp-wordmark__by kayi-lp-in"} -->
			<p class="kayi-lp-wordmark__by kayi-lp-in">Kayi Sports</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"kayi-c-buttons kayi-lp-in"} -->
			<div class="wp-block-buttons kayi-c-buttons kayi-lp-in">
				<!-- wp:button {"className":"kayi-c-btn-gold"} -->
				<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="#kit">Shop the range</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"kayi-c-btn-outline"} -->
				<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#gloves">Meet the gloves</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"id":578,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-hero__media"} -->
		<figure class="wp-block-image size-full kayi-lp-hero__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-bulwark-gloves-side.webp' ); ?>" alt="Kayi Bulwark red boxing gloves with the gold Kayi stallion" class="wp-image-578" width="1100" height="817" fetchpriority="high"/></figure>
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
				<p class="kayi-lp-stat__value">3 pieces</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Gloves, head guard and groin guard</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Red &amp; gold</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Deep red gloves with gold lining and trim</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Kit bag</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">A Kayi mesh drawstring bag for the gloves</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-stat","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-stat">
				<!-- wp:paragraph {"className":"kayi-lp-stat__value"} -->
				<p class="kayi-lp-stat__value">Head to hip</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"kayi-lp-stat__label"} -->
				<p class="kayi-lp-stat__label">Protection for sparring, top to bottom</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"01 Gloves"},"tagName":"section","anchor":"gloves","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="gloves" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split">
			<!-- wp:image {"id":579,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-panel kayi-lp-zoom kayi-lp-rv"} -->
			<figure class="wp-block-image size-full kayi-lp-panel kayi-lp-zoom kayi-lp-rv"><img src="<?php echo $kayi_upload( '2026/10/kayi-bulwark-gloves-strap.webp' ); ?>" alt="Kayi Bulwark red boxing gloves showing the gold KAYI SPORTS wrist strap and gold lining" class="wp-image-579" width="1100" height="1064" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">01 · The gloves</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Bulwark boxing gloves.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">Deep red with gold lining, the Kayi stallion across the backhand and a wide KAYI SPORTS strap that locks your wrist in place. A hard-wearing pair for bag work, pads and sparring.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Wrist</span><strong>Wide hook-and-loop strap</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Palm</span><strong>Gold lining and thumb</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Finish</span><strong>Deep red, gold Kayi stallion</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Comes with</span><strong>Mesh drawstring kit bag</strong></p>
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

				<!-- wp:image {"id":576,"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="<?php echo $kayi_upload( '2026/09/red-boxing-gloves-1-1024x1024.webp' ); ?>" alt="Kayi red boxing gloves with the gold horse logo, side view" class="wp-image-576" width="1024" height="1024" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Deep red with the gold Kayi stallion across the backhand: a pair that stands out in any class.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Wrist strap</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":577,"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="<?php echo $kayi_upload( '2026/09/red-boxing-gloves-2-1024x1024.webp' ); ?>" alt="Kayi red boxing gloves with the gold KAYI SPORTS strap and gold lining" class="wp-image-577" width="1024" height="1024" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">The wide, gold-trimmed strap wraps right round the wrist for a secure close that stays put.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Kit bag</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":522,"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="<?php echo $kayi_upload( '2026/09/boxing-3423422-1024x976.jpg' ); ?>" alt="Kayi red boxing gloves resting on the maroon Kayi mesh kit bag" class="wp-image-522" width="1024" height="976" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">A breathable mesh bag in matching maroon, so your gloves dry out between sessions.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
				<!-- wp:paragraph {"className":"kayi-lp-view__label"} -->
				<p class="kayi-lp-view__label">Packed</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":524,"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="<?php echo $kayi_upload( '2026/09/boxing-34f62342422-1024x976.jpg' ); ?>" alt="The Kayi maroon mesh drawstring kit bag, closed" class="wp-image-524" width="1024" height="976" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"kayi-lp-view__caption"} -->
				<p class="kayi-lp-view__caption">Drawstring closed and ready for your kit bag or locker.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"02 Head guard"},"tagName":"section","anchor":"head-guard","className":"kayi-lp-sec","layout":{"type":"default"}} -->
	<section id="head-guard" class="wp-block-group kayi-lp-sec">
		<!-- wp:group {"className":"kayi-lp-split is-flipped","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split is-flipped">
			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">02 · Head guard</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Cover your head.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">The Pro Kayi head guard gives full-face protection with padding sculpted to keep your view wide open, and a fit that stays locked in round after round.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Coverage</span><strong>Full face</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Shell</span><strong>Synthetic leather, thick foam</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Fit</span><strong>Adjustable crown, chin strap</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Sizes</span><strong>S, M, L</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
				<p class="kayi-c-textlink"><a href="<?php echo $kayi_link( '/head-guards/' ); ?>">More about the head guard</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:image {"id":544,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-panel kayi-lp-zoom kayi-lp-rv"} -->
			<figure class="wp-block-image size-full kayi-lp-panel kayi-lp-zoom kayi-lp-rv"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-three-quarter.webp' ); ?>" alt="Pro Kayi head guard, three-quarter view showing the gold cheek pad" class="wp-image-544" width="923" height="1000" loading="lazy"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"03 Groin guard"},"tagName":"section","anchor":"groin-guard","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="groin-guard" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-split","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-split">
			<!-- wp:image {"id":173,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-panel kayi-lp-zoom kayi-lp-rv"} -->
			<figure class="wp-block-image size-full kayi-lp-panel kayi-lp-zoom kayi-lp-rv"><img src="<?php echo $kayi_upload( '2026/09/IMG-20201007-WA0018_590x.webp' ); ?>" alt="Black Kayi groin guard with the white Kayi stallion" class="wp-image-173" width="590" height="612" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">03 · Groin guard</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-md"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-md">Protect what matters.</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-lead"} -->
				<p class="kayi-lp-lead">A high-impact cup and a flexible supporter give pro-level protection without slowing your footwork. Made for boxing, MMA, kickboxing and any contact sport.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"kayi-lp-specs kayi-lp-stagger","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-specs kayi-lp-stagger">
					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Cup</span><strong>High-impact polypropylene</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Supporter</span><strong>Breathable elastic blend</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Fit</span><strong>Moves with you, no shifting</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-spec"} -->
					<p class="kayi-lp-spec"><span>Care</span><strong>Removable cup for washing</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
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

			<!-- wp:group {"className":"kayi-lp-view is-default","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view is-default">
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

			<!-- wp:group {"className":"kayi-lp-view","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-view">
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
				<p>The go-to weight for sparring: extra padding protects you and your partner. Pair them with the head guard and groin guard.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"kayi-lp-note"} -->
		<p class="kayi-lp-note">A general guide: hand size, body weight and your gym's rules all play a part. The head guard comes in S, M and L. Not sure? <a href="<?php echo $kayi_link( '/contact-us/' ); ?>">Ask us about sizing</a>.</p>
		<!-- /wp:paragraph -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"05 Kit"},"tagName":"section","anchor":"kit","className":"kayi-lp-sec is-alt","layout":{"type":"default"}} -->
	<section id="kit" class="wp-block-group kayi-lp-sec is-alt">
		<!-- wp:group {"className":"kayi-lp-head kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-head kayi-lp-stagger">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">05 · The kit</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"kayi-lp-h2"} -->
			<h2 class="wp-block-heading kayi-lp-h2">Build your wall.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-lp-range is-3 kayi-lp-stagger","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-lp-range is-3 kayi-lp-stagger">
			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":578,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-bulwark-gloves-side.webp' ); ?>" alt="Kayi Bulwark red boxing gloves" class="wp-image-578" width="1100" height="817" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Gloves · Hook-and-loop</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Bulwark Boxing Gloves</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Red and gold, with a wide wrist strap and a mesh kit bag.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="521"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_gloves; ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":543,"sizeSlug":"medium_large","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-medium_large kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-headguard-front-768x860.webp' ); ?>" alt="Pro Kayi black and metallic gold head guard, front view" class="wp-image-543" width="768" height="860" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Head guard · S, M, L</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Pro Kayi Head Guard</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>Full-face sparring protection with a wide, clear view.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="199"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_head; ?>">Shop now</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"kayi-lp-card","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-card">
				<!-- wp:image {"id":173,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-card__media"} -->
				<figure class="wp-block-image size-full kayi-lp-card__media"><img src="<?php echo $kayi_upload( '2026/09/IMG-20201007-WA0018_590x.webp' ); ?>" alt="Black Kayi groin guard" class="wp-image-173" width="590" height="612" loading="lazy"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"kayi-lp-card__body","layout":{"type":"default"}} -->
				<div class="wp-block-group kayi-lp-card__body">
					<!-- wp:paragraph {"className":"kayi-lp-tag"} -->
					<p class="kayi-lp-tag">Groin guard · Pro</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"className":"kayi-lp-h3"} -->
					<h3 class="wp-block-heading kayi-lp-h3">Black Groin Guard</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>High-impact cup and a flexible supporter that moves with you.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-lp-range__price"} -->
					<p class="kayi-lp-range__price">[kayi_product_price id="249"]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"kayi-c-textlink"} -->
					<p class="kayi-c-textlink"><a href="<?php echo $kayi_groin; ?>">Shop now</a></p>
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
			<h2 class="wp-block-heading kayi-lp-h2 is-md">Keep the wall standing.</h2>
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
				<p>Wipe your gloves and guards down after every session to keep them looking their best.</p>
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
				<p>Let everything dry naturally, away from radiators and direct heat.</p>
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
				<h3 class="wp-block-heading kayi-lp-h3">Use the mesh bag</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Carry your gloves in the breathable mesh bag, not sealed in a holdall, so they dry out between sessions.</p>
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
			<!-- wp:image {"id":579,"sizeSlug":"full","linkDestination":"none","className":"kayi-lp-buy__media"} -->
			<figure class="wp-block-image size-full kayi-lp-buy__media"><img src="<?php echo $kayi_upload( '2026/10/kayi-bulwark-gloves-strap.webp' ); ?>" alt="Kayi Bulwark red and gold boxing gloves" class="wp-image-579" width="1100" height="1064" loading="lazy"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"className":"kayi-lp-copy kayi-lp-stagger","layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-lp-copy kayi-lp-stagger">
				<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
				<p class="kayi-c-eyebrow">Ready to train?</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"kayi-lp-h2 is-sm"} -->
				<h2 class="wp-block-heading kayi-lp-h2 is-sm">Bulwark Boxing Gloves</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"kayi-lp-buy__price"} -->
				<p class="kayi-lp-buy__price">[kayi_product_price id="521"]</p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"kayi-lp-ticks"} -->
				<ul class="wp-block-list kayi-lp-ticks"><!-- wp:list-item -->
				<li>Red and gold, with a wide hook-and-loop strap</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>Mesh drawstring kit bag</li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li>Fast UK shipping from Watford</li>
				<!-- /wp:list-item --></ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"className":"kayi-c-buttons"} -->
				<div class="wp-block-buttons kayi-c-buttons">
					<!-- wp:button {"className":"kayi-c-btn-gold"} -->
					<div class="wp-block-button kayi-c-btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $kayi_gloves; ?>">Buy now</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"kayi-c-btn-outline"} -->
					<div class="wp-block-button kayi-c-btn-outline"><a class="wp-block-button__link wp-element-button" href="#kit">See the full kit</a></div>
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
				<p class="kayi-lp-kit__card"><a href="<?php echo $kayi_link( '/boxing-gloves/' ); ?>"><strong>All boxing gloves</strong><span>Golden, lace-up and kids' gloves.</span><em>See every glove</em></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
