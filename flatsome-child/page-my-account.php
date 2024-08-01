<?php
/**
 * Template name: WooCommerce - My Account
 *
 * This template adds My account to the sidebar.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header(); ?>

<?php do_action('flatsome_before_page'); ?>
<div class="my-account-banner">
	<?php wc_get_template('myaccount/header.php'); ?>
</div>
<div class="page-wrapper my-account mb">
	<div class="accoun-header">
		<div class="container">
			<?php if (is_user_logged_in()) { ?>
				<?php wc_get_template('myaccount/account-user.php'); ?>
			<?php } ?>
		</div>

	</div>
	<div class="container" role="main">

		<?php if (is_user_logged_in()) { ?>

			<div class="row vertical-tabs my-account-custom">
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-12 col-12">

					<?php do_action('woocommerce_before_account_navigation'); ?>

					<ul id="my-account-nav" class="account-nav nav nav-line nav-uppercase nav-vertical mt-half">
						<?php wc_get_template('myaccount/account-links.php'); ?>
					</ul>

					<?php do_action('woocommerce_after_account_navigation'); ?>
				</div>

				<div class="col-md-9 col-12 col-xl-9 col-sm-12 col-xl-9 ">
					<?php while (have_posts()):
						the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>

		<?php } else { ?>
			<p class="hidden redirect_url">
				<?php $redirect_url = get_bloginfo('url') . '/login';
				echo esc_url($redirect_url); ?>
			</p>
			<script>
				jQuery(document).ready(function ($) {
					if ($('.redirect_url').length) {
						// Get the redirect URL from the hidden element
						var redirectUrl = $('.redirect_url').text().trim();

						// Perform the redirect
						window.location.href = redirectUrl;
					}
				});
			</script>

		<?php } ?>

	</div>
</div>

<?php do_action('flatsome_after_page'); ?>

<?php get_footer(); ?>