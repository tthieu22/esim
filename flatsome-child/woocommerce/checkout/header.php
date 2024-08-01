<?php
/**
 * Checkout header.
 *
 * @package          Flatsome/WooCommerce/Templates
 * @flatsome-version 3.16.0
 */

/**
 * Checkout breadcrumb class.
 *
 * @param string $endpoint Endpoint to check for.
 *
 * @return string
 */
function flatsome_checkout_breadcrumb_class($endpoint)
{
	$classes = array();
	if (
		$endpoint == 'cart' && is_cart() ||
		$endpoint == 'checkout' && is_checkout() && !is_wc_endpoint_url('order-received') ||
		$endpoint == 'order-received' && is_wc_endpoint_url('order-received')
	) {
		$classes[] = 'current';
	} else {
		$classes[] = 'hide-for-small';
	}

	return implode(' ', $classes);
}

$steps = get_theme_mod('cart_steps_numbers', 0);
?>

<div class="checkout-page-title page-title">
	<div class="back mt-4">
		<div class="container">
			<a href="<?php echo get_bloginfo('url'); ?>/shop/" class="back-to-des">
				<img src="<?php echo THEME_URL_CHILD; ?>/assets/images/Arrow-left-1.svg">
				Back to destination
			</a>
		</div>
	</div>
	<div class="page-title-inner flex-row medium-flex-wrap container desktop">
		<div class="flex-col flex-grow medium-text-center">
			<nav
				class="breadcrumbs flex-row flex-row-center heading-font checkout-breadcrumbs text-center strong <?php echo get_theme_mod('cart_steps_size', 'h2'); ?> <?php echo get_theme_mod('cart_steps_case', 'uppercase'); ?>">
				<a href="<?php echo esc_url(wc_get_cart_url()); ?>"
					class="<?php echo flatsome_checkout_breadcrumb_class('cart'); ?>">
					<?php if ($steps) {
						echo '<span class="breadcrumb-step hide-for-small">1</span>';
					} ?>
					<?php _e('Shopping Cart', 'flatsome'); ?>
				</a>
				<span class="divider hide-for-small"><img
						src="<?php echo THEME_URL_CHILD; ?>/assets/images/Line-46.svg"></span>
				<a href="<?php echo esc_url(wc_get_checkout_url()); ?>"
					class="<?php echo flatsome_checkout_breadcrumb_class('checkout') ?>">
					<?php if ($steps) {
						echo '<span class="breadcrumb-step hide-for-small">2</span>';
					} ?>
					<?php _e('Checkout details', 'flatsome'); ?>
				</a>
				<span class="divider hide-for-small"><img
						src="<?php echo THEME_URL_CHILD; ?>/assets/images/Line-46.svg"></span>
				<a href="#" class="no-click <?php echo flatsome_checkout_breadcrumb_class('order-received'); ?>">
					<?php if ($steps) {
						echo '<span class="breadcrumb-step hide-for-small">3</span>';
					} ?>
					<?php _e('Order Complete', 'flatsome'); ?>
				</a>
			</nav>
		</div>

	</div>
	<div class="page-title-inner flex-row medium-flex-wrap container mobile custom-title-checkout">
		<div class="flex-col flex-grow medium-text-center">
			<nav
				class="breadcrumbs d-flex flex-column align-items-start flex-row-start heading-font checkout-breadcrumbs <?php echo get_theme_mod('cart_steps_size', 'h2'); ?> <?php echo get_theme_mod('cart_steps_case', 'uppercase'); ?>">
				<a href="<?php echo esc_url(wc_get_cart_url()); ?>"
					class="<?php echo flatsome_checkout_breadcrumb_class('cart'); ?>">
					<?php if ($steps) {
						echo '<span class="breadcrumb-step">01/</span>';
					} ?>
					<span class="breadcrumb-step-cs">01/ </span>
					<?php _e('Shopping Cart', 'flatsome'); ?>
				</a>
				<span class="divider"></span>
				<a href="<?php echo esc_url(wc_get_checkout_url()); ?>"
					class="<?php echo flatsome_checkout_breadcrumb_class('checkout') ?>">
					<?php if ($steps) {
						echo '<span class="breadcrumb-step">02/</span>';
					} ?>
					<span class="breadcrumb-step-cs">02/ </span>
					<?php _e('Checkout details', 'flatsome'); ?>
				</a>
				<span class="divider"></span>
				<a href="#" class="no-click <?php echo flatsome_checkout_breadcrumb_class('order-received'); ?>">
					<?php if ($steps) {
						echo '<span class="breadcrumb-step">3</span>';
					} ?>
							<span class="breadcrumb-step-cs">03/ </span>
					<?php _e('Order Complete', 'flatsome'); ?>
				</a>
			</nav>
		</div>

	</div>
</div>