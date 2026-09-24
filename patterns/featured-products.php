<?php
/**
 * Title: Featured Products
 * Slug: twentytwentyfive-child/featured-products
 * Description: Big reveal heading with a hand-picked product grid (choose the products in the block settings) and a "Shop all" button.
 * Categories: kayisports, woo-commerce
 * Keywords: products, featured, shop, grid
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"name":"Featured Products"},"align":"full","className":"kayi-featured","style":{"spacing":{"padding":{"top":"6vw","bottom":"6vw","left":"6vw","right":"6vw"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull kayi-featured" style="margin-top:0;margin-bottom:0;padding-top:6vw;padding-right:6vw;padding-bottom:6vw;padding-left:6vw">
	<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"js-reveal-wall","style":{"typography":{"fontSize":"16px","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.08em"}}} -->
			<p class="js-reveal-wall" style="font-size:16px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Featured products</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"js-reveal-wall","style":{"typography":{"fontSize":"clamp(2.75rem, 6vw, 7rem)","lineHeight":"0.95"}}} -->
			<h2 class="wp-block-heading js-reveal-wall" style="font-size:clamp(2.75rem, 6vw, 7rem);line-height:0.95">Fighter favourites</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"contrast","textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background has-link-color wp-element-button" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">Shop all</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"3vw"} -->
	<div style="height:3vw" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:woocommerce/product-collection {"queryId":11,"query":{"perPage":6,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"post__in","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":["183","189","194","199","235","358"],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/hand-picked","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"className":"kayi-featured__grid"} -->
	<div class="wp-block-woocommerce-product-collection kayi-featured__grid">
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
