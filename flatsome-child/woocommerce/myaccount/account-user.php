<?php
/**
 * Account user.
 *
 * @package          Flatsome/WooCommerce/Templates
 * @flatsome-version 3.16.0
 */

?>
<div class="account-user">
	<div class="flex justify-content-between">
		<div>
		<span class="image mr-half inline-block my-account-user-image">
			<?php
			$current_user = wp_get_current_user();
			$user_id = $current_user->ID;
			echo get_avatar($user_id, 70);
			?>
		</span>
		<span class="user-name inline-block">
			<?php
			echo $current_user->display_name;
			?>
			<p>	<?php
			echo $current_user->user_email;
			?></p>
		</span>
		</div>
		<div class="mt-3">
			<a href="<?php  echo wc_logout_url() ?>">
					<button class="custom-button-logout"> sign out </button>
			</a>
		</div>
	
	</div>
	<?php do_action('flatsome_after_account_user'); ?>
</div>