<?php
/**
 * Title: Trade bulk order form page
 * Slug: twentytwentyfive-child/trade-order
 * Description: Bulk order form for approved trade accounts ([kayi_trade_order], inc/trade.php): every product with a quantity box per size, live units, discount tier and subtotal without VAT. Visitors without a trade account see a log in / apply panel. Use with the "Homepage (full width, black & gold sections)" page template.
 * Categories: kayisports
 * Keywords: trade, bulk order, wholesale, order form
 * Viewport Width: 1440
 */
?>
<!-- wp:group {"metadata":{"name":"Trade order form page"},"align":"full","className":"kayi-tr-page","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-tr-page">
	<!-- wp:group {"metadata":{"name":"Header"},"tagName":"section","className":"kayi-tr-page__head","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-tr-page__head">
		<!-- wp:group {"className":"kayi-tr-page__inner","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-tr-page__inner">
			<!-- wp:paragraph {"className":"kayi-c-eyebrow"} -->
			<p class="kayi-c-eyebrow">Kayi Trade</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading">Bulk order form</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Enter how many of each size you need, then add everything to your basket in one go. Every unit counts towards your discount, and prices are shown without VAT.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</section>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"Form"},"tagName":"section","className":"kayi-tr-page__body","layout":{"type":"default"}} -->
	<section class="wp-block-group kayi-tr-page__body">
		<!-- wp:shortcode -->
		[kayi_trade_order]
		<!-- /wp:shortcode -->
	</section>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
