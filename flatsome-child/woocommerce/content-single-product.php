<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
?>
<div class="container">
	<div typeof="BreadcrumbList" vocab="https://schema.org/">
		<div class="product__breadcrumb">
			<a href="<?php echo get_site_url(); ?>" alt="<?php echo get_bloginfo(); ?>">
				<img src="<?php echo THEME_URL_CHILD; ?>/assets/images/home.svg" alt="<?php echo get_bloginfo(); ?>">
			</a>
			<img src="<?php echo THEME_URL_CHILD; ?>/assets/images/breadcrumb.svg" alt="<?php echo get_bloginfo(); ?>">
			<a href="<?php echo get_site_url(); ?>/shop">
				<span style="font-weight: 600">Destinations</span>
			</a>
			<img src="<?php echo THEME_URL_CHILD; ?>/assets/images/breadcrumb.svg" alt="<?php echo get_bloginfo(); ?>">
			<span>
				<?php
				echo $product_slug = $product->get_slug(); ?>
			</span>
		</div>

	</div>
	<div class="row max-w-1440">
		<?php
		do_action('woocommerce_before_single_product');

		if (post_password_required()) {
			echo get_the_password_form(); // WPCS: XSS ok.
			return;
		}
		?>

		<div id="product-<?php the_ID(); ?>" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" <?php wc_product_class('', $product); ?>>

			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			// do_action('woocommerce_before_single_product_summary');
			include 'single-product-slider.php';
			?>

		</div>
		<div class="summary entry-summary col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<?php
			include 'woocommerce_single_product_summary.php';
			?>
		</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action('woocommerce_after_single_product_summary');
	?>
</div>
<div class="single-product-block">
	<?php if (function_exists('ot_get_option')) {
		$shortcode = ot_get_option('block_single');
		if ($shortcode) {
			echo do_shortcode($shortcode);
		}
	} ?>
	<div class="container single-content-review-wrap">
		<?php
		// Use do_shortcode to display the review form
		echo do_shortcode('[cusrev_all_reviews add_review="true"  sort="DESC" sort_by="date" per_page="5"]');
		?>
	</div>
	<?php if (function_exists('ot_get_option')) {
		$shortcode = ot_get_option('block_single_product_bottom');
		if ($shortcode) {
			echo do_shortcode($shortcode);
		}
	} ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>

</div>
<div class="sticky-add-to-cart-container product__info">
	<div class="sticky-add-to-cart-product">
		<p class="sticky-add-to-cart-product-title">

		</p>
		<div class="d-flex">
			<p class="sticky-add-to-cart-product-variation"></p> 
			<p class="sticky-add-to-cart-data"></p>
		</div>
	</div>
	<div class="sticky-add-to-cart-form">
		<div class="woocommerce-variation single_variation flicky-wrap-single"
			style="display: block; overflow: hidden; height: 0px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
			<div class="woocommerce-variation-description"></div>
			<div class="woocommerce-variation-price"><span class="price"><span
						class="woocommerce-Price-amount amount"><bdi><span
								class="woocommerce-Price-currencySymbol">$</span></bdi></span></span></div>
			<div class="woocommerce-variation-availability"></div>
		</div>
		<div class="woocommerce-variation-add-to-cart-sticky-add-to-cart-form">
			<div class="flicky-price">

			</div>
			<div class="quantity">
				<label class="screen-reader-text-flicky"></label>
				<button type="button" class="flicky-decrease">-</button>
				<input type="number" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity"
					size="4" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
				<button type="button" class="flicky-increase">+</button>
			</div>

			<button type="submit" class="single_add_to_cart_button button alt flicky-btn">Add to cart</button>
		</div>
	</div>
</div>