<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>


<?php
defined('ABSPATH') || exit;

$user = wp_get_current_user();
$user_id = $user->ID;


do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?> class="edit-acccount">

	<?php do_action('woocommerce_edit_account_form_start'); ?>
	<div class="row">
		<div class="col-md-6 col-sm-12 col-12 col-lg-6 col-md-6 col-xl-6">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_first_name">
					<?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
				</label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
					name="account_first_name" id="account_first_name" autocomplete="given-name"
					value="<?php echo esc_attr($user->first_name); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_display_name">
					<?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
				</label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
					name="account_display_name" id="account_display_name"
					value="<?php echo esc_attr($user->display_name); ?>" /> <span></span>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_email">
					<?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
				</label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email"
					id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_email">
					<?php esc_html_e('DBO', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
				</label>
				<input type="text" class="woocommerce-Input woocommerce-user_date input-text" name="user_date"
					id="user_date" autocomplete="user_date" value="<?php echo esc_attr($user->user_date); ?>" />
			</p>
		</div>
		<div class="col-md-6 col-sm-12 col-12 col-lg-6 col-md-6 col-xl-6">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_last_name">
					<?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
				</label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name"
					id="account_last_name" autocomplete="family-name"
					value="<?php echo esc_attr($user->last_name); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="phone">
					<?php _e('Phone', 'woocommerce'); ?>
				</label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="phone"
					value="<?php echo esc_attr($user->phone); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="Address">
					<?php _e('Address', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
				</label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_address_1"
					id="billing_address_1" value="<?php echo esc_attr($user->billing_address_1); ?>" />
			</p>
			<button type="submit"
				class="woocommerce-Button button-save-edit-account button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
				name="save_account_details" value="<?php esc_attr_e('Edit profile', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</div>
	</div>

	<div class="container">
		<?php do_action('woocommerce_edit_account_form'); ?>

		<p>
		<?php  wp_nonce_field('save_account_details', 'save-account-details-nonce');  ?>
		</p>

		<?php do_action('woocommerce_edit_account_form_end'); ?>
	</div>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>