<?php
/**
 * Edit account password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account-password.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?> class="edit-acccount">

    <?php do_action('woocommerce_edit_account_password_form_start'); ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="password_current">
            <?php esc_html_e('Current password', 'woocommerce'); ?>
        </label>
        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current"
            id="password_current" autocomplete="off" />
    </p>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="password_1">
            <?php esc_html_e('New password', 'woocommerce'); ?>
        </label>
        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1"
            id="password_1" autocomplete="off" />
    </p>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="password_2">
            <?php esc_html_e('Confirm new password', 'woocommerce'); ?>
        </label>
        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2"
            id="password_2" autocomplete="off" />
    </p>

    <div class="row custom-change-pass">
        <div class="col-6">
            <a href="<?php echo get_bloginfo('url'); ?>/my-account/">
                <button class="button-main-no-bg" data-bs-dismiss="offcanvas" aria-label="Close">
                    Cancle
                </button>
            </a>
        </div>
        <div class="col-6">
            <button type="submit"
                class="woocommerce-Button button-main button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
                name="save_account_details" value="<?php esc_attr_e('Edit profile', 'woocommerce'); ?>"><?php esc_html_e('Change password', 'woocommerce'); ?></button>
            <input type="hidden" name="action" value="save_account_details" />
        </div>
    </div>
    <div class="clear"></div>

    <div class="container">
        <?php do_action('woocommerce_edit_account_form'); ?>

        <p>
            <?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
        </p>

        <?php do_action('woocommerce_edit_account_form_end'); ?>
    </div>
</form>

<?php do_action('woocommerce_after_edit_account_password_form'); ?>