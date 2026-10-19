<?php
/**
 * Title: Category Carousel
 * Slug: twentytwentyfive-child/category-carousel
 * Description: "Our Range Of Products" heading over shop-by-category cards (photo, title and "Shop now" underneath) in a carousel that runs off the right edge of the page (3.2 cards on desktop), with previous/next arrows underneath. Add, remove or reorder the cover cards inside "Carousel track".
 * Categories: kayisports, woo-commerce, featured
 * Keywords: carousel, slider, categories, shop, cards
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"name":"Category Carousel"},"align":"full","className":"kayi-carousel","style":{"spacing":{"padding":{"top":"calc( 0.75 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal)))","bottom":"calc( 0.75 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal)))","left":"var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-left, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal))","right":"var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal))"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull kayi-carousel has-contrast-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:calc( 0.75 * var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal)));padding-right:var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal));padding-bottom:calc( 0.75 * var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal)));padding-left:var(--wp--style--root--padding-left, var(--wp--custom--gap--horizontal))">
	<!-- wp:heading {"align":"wide","className":"js-reveal-wall is-style-default","style":{"color":{"text":"#000000"},"typography":{"fontSize":"6vw"},"spacing":{"padding":{"bottom":"0.12em"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
	<h2 class="wp-block-heading alignwide js-reveal-wall is-style-default has-text-color" style="color:#000000;margin-bottom:var(--wp--preset--spacing--30);padding-bottom:0.12em;font-size:6vw">Our Range Of Products</h2>
	<!-- /wp:heading -->

	<!-- wp:group {"metadata":{"name":"Carousel track"},"align":"full","className":"kayi-carousel__track","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group alignfull kayi-carousel__track">
		<!-- wp:group {"className":"kayi-carousel__card","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-carousel__card"><!-- wp:image {"id":73,"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"custom","className":"js-fade-in-right"} -->
		<figure class="wp-block-image size-large js-fade-in-right"><a href="<?php echo esc_url( home_url( '/product-category/boxing/boxing-gloves/' ) ); ?>"><img src="<?php echo esc_url( content_url( '/uploads/2026/06/boxing-2.jpg' ) ); ?>" alt="Kayi Sports boxing gloves" class="wp-image-73" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":3,"className":"kayi-carousel__title"} -->
		<h3 class="wp-block-heading kayi-carousel__title">Boxing Gloves</h3>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/product-category/boxing/boxing-gloves/' ) ); ?>">Shop now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-carousel__card","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-carousel__card"><!-- wp:image {"id":173,"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"custom","className":"js-fade-in-right"} -->
		<figure class="wp-block-image size-large js-fade-in-right"><a href="<?php echo esc_url( home_url( '/product-category/protective-gears/' ) ); ?>"><img src="<?php echo esc_url( content_url( '/uploads/2026/09/IMG-20201007-WA0018_590x.webp' ) ); ?>" alt="Kayi Sports protective gear" class="wp-image-173" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":3,"className":"kayi-carousel__title"} -->
		<h3 class="wp-block-heading kayi-carousel__title">Protective Gear</h3>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/product-category/protective-gears/' ) ); ?>">Shop now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-carousel__card","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-carousel__card"><!-- wp:image {"id":411,"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"custom","className":"js-fade-in-right"} -->
		<figure class="wp-block-image size-large js-fade-in-right"><a href="<?php echo esc_url( home_url( '/product-category/clothing/' ) ); ?>"><img src="<?php echo esc_url( content_url( '/uploads/2026/09/1000073444.png' ) ); ?>" alt="Kayi Sports black and gold tracksuit" class="wp-image-411" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":3,"className":"kayi-carousel__title"} -->
		<h3 class="wp-block-heading kayi-carousel__title">Clothing</h3>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/product-category/clothing/' ) ); ?>">Shop now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-carousel__card","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-carousel__card"><!-- wp:image {"id":184,"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"custom","className":"js-fade-in-right"} -->
		<figure class="wp-block-image size-large js-fade-in-right"><a href="<?php echo esc_url( home_url( '/product-category/punching-bags/' ) ); ?>"><img src="<?php echo esc_url( content_url( '/uploads/2026/09/WhatsApp-Image-2025-10-30-at-11.04.09-AM-1.webp' ) ); ?>" alt="White Kayi Sports punching bag hanging in a gym" class="wp-image-184" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":3,"className":"kayi-carousel__title"} -->
		<h3 class="wp-block-heading kayi-carousel__title">Punching Bags</h3>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/product-category/punching-bags/' ) ); ?>">Shop now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-carousel__card","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-carousel__card"><!-- wp:image {"id":440,"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"custom","className":"js-fade-in-right"} -->
		<figure class="wp-block-image size-large js-fade-in-right"><a href="<?php echo esc_url( home_url( '/product-category/gloves/mma-gloves/' ) ); ?>"><img src="<?php echo esc_url( content_url( '/uploads/2026/09/IMG-20211217-WA0037_590x-1.webp' ) ); ?>" alt="Black Kayi Sports MMA gloves" class="wp-image-440" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":3,"className":"kayi-carousel__title"} -->
		<h3 class="wp-block-heading kayi-carousel__title">MMA Gloves</h3>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/product-category/gloves/mma-gloves/' ) ); ?>">Shop now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"kayi-carousel__card","layout":{"type":"default"}} -->
		<div class="wp-block-group kayi-carousel__card"><!-- wp:image {"id":190,"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"custom","className":"js-fade-in-right"} -->
		<figure class="wp-block-image size-large js-fade-in-right"><a href="<?php echo esc_url( home_url( '/product-category/coaching-accessories/' ) ); ?>"><img src="<?php echo esc_url( content_url( '/uploads/2026/09/Photoroom-20241224_204346.png' ) ); ?>" alt="Kayi Sports black focus pads" class="wp-image-190" style="aspect-ratio:4/5;object-fit:cover"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":3,"className":"kayi-carousel__title"} -->
		<h3 class="wp-block-heading kayi-carousel__title">Coaching Accessories</h3>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/product-category/coaching-accessories/' ) ); ?>">Shop now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
