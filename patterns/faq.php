<?php
/**
 * Title: FAQ
 * Slug: twentytwentyfive-child/faq
 * Description: Two-column FAQ — heading and contact button on the left, expandable questions (Details blocks) on the right.
 * Categories: kayisports, text
 * Keywords: faq, questions, accordion, help
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"name":"FAQ"},"anchor":"faqs","align":"full","className":"kayi-faq","style":{"spacing":{"padding":{"top":"8vw","bottom":"8vw","left":"6vw","right":"6vw"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div id="faqs" class="wp-block-group alignfull kayi-faq" style="margin-top:0;margin-bottom:0;padding-top:8vw;padding-right:6vw;padding-bottom:8vw;padding-left:6vw">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"6vw"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:paragraph {"className":"js-reveal-wall","style":{"typography":{"fontSize":"16px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.08em"}}} -->
			<p class="js-reveal-wall" style="font-size:16px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">FAQs</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"js-reveal-wall","style":{"typography":{"fontSize":"clamp(2.5rem, 5vw, 5rem)","lineHeight":"0.95"}}} -->
			<h2 class="wp-block-heading js-reveal-wall" style="font-size:clamp(2.5rem, 5vw, 5rem);line-height:0.95">Questions? Answered.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"}}} -->
			<p style="font-size:17px">Can't find what you're looking for? Our team is happy to help you choose the right gear.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"contrast","textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background has-link-color wp-element-button" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact us</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:group {"className":"kayi-accordions","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group kayi-accordions">
				<!-- wp:details -->
				<details class="wp-block-details"><summary>What types of boxing gloves do you offer?</summary>
					<!-- wp:paragraph -->
					<p>We offer a wide range of professional boxing gloves suitable for training, sparring, and competition. Our gloves are designed for durability, comfort, and maximum protection.</p>
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
				<details class="wp-block-details"><summary>What protective gear do you provide?</summary>
					<!-- wp:paragraph -->
					<p>We offer a complete range of protective gear including headguards, mouthguards, shin guards, and hand wraps to ensure safety during training and fights.</p>
					<!-- /wp:paragraph -->
				</details>
				<!-- /wp:details -->

				<!-- wp:details -->
				<details class="wp-block-details"><summary>Do you sell coaching and training accessories?</summary>
					<!-- wp:paragraph -->
					<p>Yes, we provide essential coaching accessories such as focus pads, kick pads, timers, and other training tools for coaches and athletes.</p>
					<!-- /wp:paragraph -->
				</details>
				<!-- /wp:details -->

				<!-- wp:details -->
				<details class="wp-block-details"><summary>What type of clothing do you offer?</summary>
					<!-- wp:paragraph -->
					<p>Our clothing range includes boxing shorts, training wear, and athletic apparel designed for comfort, flexibility, and performance.</p>
					<!-- /wp:paragraph -->
				</details>
				<!-- /wp:details -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
