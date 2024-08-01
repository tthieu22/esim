<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
$show_shipping = !wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>

<div class="woocommerce-order">

	<?php
	if ($order):

		do_action('woocommerce_before_thankyou', $order->get_id());
		?>

		<?php if ($order->has_status('failed')): ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
				<?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?>
			</p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()): ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else: ?>
			<div class="order-content">
				<div class="flex justify-content-center order-thank-u flex-column  align-items-center">
					<div class="thank-u-img">
						<img src="<?php echo THEME_URL_CHILD; ?>/assets/images/ordersuccess.png" alt="thank order">
					</div>
					<div>
						<h2 class="thank-u-title">Your order is on its way!</h2>
					</div>
					<p>We received your order and we’ll let you know when we ship it out</p>
					<a href="<?php echo get_bloginfo('url'); ?>/shop/">
						<button class="button-custom">Continue shopping</button>
					</a>
				</div>
				<div class="row">

					<div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12">
						<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
							<h3>ORDER INFORMATION</h3>
							<li>
								<h4 class="shippingaddress-title"> Shipping address </h4>
								<?php echo wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce'))); ?>

								<?php if ($order->get_billing_phone()): ?>
									<p class="woocommerce-customer-details--phone">
										<?php echo esc_html($order->get_billing_phone()); ?>
									</p>
								<?php endif; ?>

								<?php if ($order->get_billing_email()): ?>
									<p class="woocommerce-customer-details--email">
										<?php echo esc_html($order->get_billing_email()); ?>
									</p>
								<?php endif; ?>
							</li>
							<?php if ($order->get_payment_method_title()): ?>
								<li class="woocommerce-order-overview__payment-method method">
									<strong><?php esc_html_e('Payment method:', 'woocommerce'); ?></strong>
									<span>
										<?php echo wp_kses_post($order->get_payment_method_title()); ?>
									</span>
								</li>
							<?php endif; ?>

						</ul>
					</div>
					<div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12 order-thank-u-right">
						<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
						<?php do_action('woocommerce_thankyou', $order->get_id()); ?>
					</div>
				</div>
			</div>

		<?php endif; ?>

	<?php else: ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
			<?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</p>

	<?php endif; ?>

</div>