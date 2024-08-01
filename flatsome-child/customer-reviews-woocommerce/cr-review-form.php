<?php
/**
 * Review Form Template
 *
 * This template can be overridden by copying it to yourtheme/customer-reviews-woocommerce/cr-review-form.php
 *
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<div class="cr-review-form-wrap custom-review-product">
	<div class="cr-review-form-nav">
		<div class="cr-nav-left">
			<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16.9607 19.2506L11.0396 13.3295L16.9607 7.40833" stroke="#0E252C" stroke-miterlimit="10" />
			</svg>
			<span>
				<?php _e('Add a review', 'customer-reviews-woocommerce'); ?>
			</span>
		</div>
		<div class="cr-nav-right">
			<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M8.61914 8.62009L19.381 19.3799M8.61914 19.3799L19.381 8.62009" stroke="#0E252C"
					stroke-miterlimit="10" stroke-linejoin="round" />
			</svg>
		</div>
	</div>

	<div class="cr-review-form-item d-none">
		<input type="hidden" value="<?php echo esc_attr($cr_item_id); ?>" class="cr-review-form-item-id" />
	</div>
	<div class="reivew-title">
		<span>Write a review</span>
	</div>
	<div class="cr-review-form-rating">
		<div class="cr-review-form-rating-cont">
			<?php for ($i = 1; $i <= 5; $i++): ?>
				<div class="cr-review-form-rating-inner" data-rating="<?php echo $i; ?>">
					<svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg"
						class="cr-rating-deact">
						<path
							d="M10.5131 0.288628C10.7119 -0.0962093 11.288 -0.0962093 11.4868 0.288628L14.4654 6.04249C14.5448 6.19546 14.6976 6.3014 14.8745 6.32573L21.5344 7.24876C21.9799 7.31054 22.1576 7.83281 21.8357 8.132L17.0158 12.611C16.8881 12.7297 16.8295 12.9014 16.86 13.0691L17.9974 19.3935C18.0738 19.8165 17.6081 20.1392 17.2092 19.9392L11.2529 16.9538C11.0946 16.8745 10.9053 16.8745 10.747 16.9538L4.79023 19.9392C4.39182 20.1392 3.92604 19.8165 4.00249 19.3935L5.13988 13.0691C5.17004 12.9014 5.11177 12.7297 4.98365 12.611L0.164665 8.132C-0.157703 7.83281 0.020013 7.31054 0.465542 7.24876L7.12575 6.32573C7.30224 6.3014 7.45552 6.19546 7.5345 6.04249L10.5131 0.288628Z"
							fill="#DFE4E7" />
					</svg>
					<svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg"
						class="cr-rating-act">
						<path
							d="M10.5131 0.288628C10.7119 -0.0962093 11.288 -0.0962093 11.4868 0.288628L14.4654 6.04249C14.5448 6.19546 14.6976 6.3014 14.8745 6.32573L21.5344 7.24876C21.9799 7.31054 22.1576 7.83281 21.8357 8.132L17.0158 12.611C16.8881 12.7297 16.8295 12.9014 16.86 13.0691L17.9974 19.3935C18.0738 19.8165 17.6081 20.1392 17.2092 19.9392L11.2529 16.9538C11.0946 16.8745 10.9053 16.8745 10.747 16.9538L4.79023 19.9392C4.39182 20.1392 3.92604 19.8165 4.00249 19.3935L5.13988 13.0691C5.17004 12.9014 5.11177 12.7297 4.98365 12.611L0.164665 8.132C-0.157703 7.83281 0.020013 7.31054 0.465542 7.24876L7.12575 6.32573C7.30224 6.3014 7.45552 6.19546 7.5345 6.04249L10.5131 0.288628Z"
							fill="#F4DB6B" />
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M7.91797 18.3717L12.328 1.91336L14.4655 6.04248C14.5448 6.19545 14.6977 6.30139 14.8746 6.32572L21.5345 7.24875C21.98 7.31053 22.1577 7.8328 21.8357 8.13199L17.0159 12.611C16.8882 12.7297 16.8295 12.9014 16.8601 13.0691L17.9975 19.3934C18.0739 19.8165 17.6082 20.1392 17.2093 19.9392L11.253 16.9538C11.0947 16.8745 10.9054 16.8745 10.7471 16.9538L7.91797 18.3717Z"
							fill="#F5CD5B" />
					</svg>
				</div>
			<?php endfor; ?>
			<div class="cr-review-form-rating-nbr">0/5</div>
		</div>
		<div class="cr-review-form-field-error">
			<?php _e('* Rating is required', 'customer-reviews-woocommerce'); ?>
		</div>
	</div>


	<div class="cr-review-form-ne">
		<div class="cr-review-form-name">
			<label> Your name </label>
			<input type="text" name="cr_review_form_name" class="form-review-custom-bd cr-review-form-txt"></input>
			<div class="cr-review-form-field-error">
				<?php _e('* Name is required', 'customer-reviews-woocommerce'); ?>
			</div>
		</div>
		<div class="cr-review-form-email">
			<label> Email address </label>
			<input type="email" name="cr_review_form_email" class="form-review-custom-bd cr-review-form-txt"></input>
			<div class="cr-review-form-field-error">
				<?php _e('* Email is required', 'customer-reviews-woocommerce'); ?>
			</div>
		</div>
	</div>
	<div class="cr-review-form-title cr-review-form-ne">
		<label> Title of Review </label>
		<input type="text" name="cr_review_form_title" class="form-review-custom-bd cr-review-form-txt"></input>
	</div>
	<div class="cr-review-form-comment">
		<label> How was your overall experience?* </label>
		<textarea rows="5" name="cr_review_form_comment_txt" class="form-review-custom-bd cr-review-form-comment-txt"></textarea>
		<div class="cr-review-form-field-error">
			<?php _e('* Review is required', 'customer-reviews-woocommerce'); ?>
		</div>
	</div>

	<div class="cr-review-form-buttons">
		<button type="button" class="cr-review-form-submit">
			<span>
				<?php _e('Write a review', 'customer-reviews-woocommerce'); ?>
			</span>
			<img src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'img/spinner-dots.svg'; ?>" alt="Loading" />
		</button>
	</div>

	<div class="cr-review-form-result">
		<span></span>
		<button type="button" class="cr-review-form-continue"></button>
	</div>

</div>