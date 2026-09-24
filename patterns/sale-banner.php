<?php
/**
 * Title: Sale Banner
 * Slug: twentytwentyfive-child/sale-banner
 * Description: Black full-width promo with a big headline, "Shop the sale" button and four on-sale products underneath.
 * Categories: kayisports, call-to-action, woo-commerce
 * Keywords: sale, offer, discount, promo, banner
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"name":"Sale Banner"},"align":"full","className":"kayi-sale","style":{"spacing":{"padding":{"top":"7vw","bottom":"7vw","left":"6vw","right":"6vw"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-sale has-base-color has-contrast-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:7vw;padding-right:6vw;padding-bottom:7vw;padding-left:6vw">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"js-reveal-wall","style":{"typography":{"fontSize":"16px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.08em"}},"textColor":"accent-1"} -->
			<p class="js-reveal-wall has-accent-1-color has-text-color" style="font-size:16px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Sale</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"js-reveal-wall","style":{"typography":{"fontSize":"clamp(3rem, 8vw, 9rem)","lineHeight":"0.9","fontWeight":"700","letterSpacing":"-0.02em"}},"textColor":"base"} -->
			<h2 class="wp-block-heading js-reveal-wall has-base-color has-text-color" style="font-size:clamp(3rem, 8vw, 9rem);font-weight:700;letter-spacing:-0.02em;line-height:0.9">Up to 50% off.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"20px"}}} -->
			<p style="font-size:20px">Gloves, protective gear, tracksuits and training kit — while stocks last.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"accent-1","textColor":"contrast","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-accent-1-background-color has-text-color has-background has-link-color wp-element-button" href="<?php echo esc_url( home_url( '/product-category/sale/' ) ); ?>">Shop the sale</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"4vw"} -->
	<div style="height:4vw" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:woocommerce/product-collection {"queryId":12,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":true,"woocommerceStockStatus":["instock"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/on-sale","hideControls":["inherit","on-sale"],"queryContextIncludes":["collection"],"className":"kayi-sale__grid"} -->
	<div class="wp-block-woocommerce-product-collection kayi-sale__grid">
		<!-- wp:woocommerce/product-template {"className":"kayi-product-cards"} -->
			<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"single","isDescendentOfQueryLoop":true,"aspectRatio":"1","scale":"cover","className":"js-fade-in-up"} -->
				<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
			<!-- /wp:woocommerce/product-image -->
			<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"0.75rem","bottom":"0.25rem"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
		<!-- /wp:woocommerce/product-template -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
