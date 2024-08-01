<?php
// Add custom Theme Functions here
define('THEME_URL', get_template_directory_uri());
define('THEME_URL_CHILD', get_stylesheet_directory_uri());

// Call reviews.php
include_once 'reviews.php';
include_once 'login.php';
include_once 'register.php';

add_action( 'wp', 'my_remove_lightbox', 99 );	 	 
function my_remove_lightbox() {	 	 
   remove_theme_support( 'wc-product-gallery-lightbox' );	 	 
}

if (!function_exists('tkw_setup')):
	function tkw_setup()
	{
		register_nav_menus(
			array(
				'top-destinations' => 'Top destinations Mobile',
				'interest' => 'Interest Mobile',
			)
		);

	}
endif;
add_action('after_setup_theme', 'tkw_setup');

function ah_remove_custom_post_type_slug($post_link, $post, $leavename)
{
    if (!in_array($post->post_type, array('featured_item')) || 'publish' != $post->post_status) // url featured_item 
        return $post_link;
    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    return $post_link;
}
add_filter('post_type_link', 'ah_remove_custom_post_type_slug', 10, 3);

function ah_parse_request_tricksy($query)
{
    if (!$query->is_main_query())
        return;
    if (
        2 != count($query->query)
        || !isset($query->query['page'])
    )
        return;
    if (!empty($query->query['name']))
        $query->set('post_type', array('post', 'featured_item', 'page'));
}
add_action('pre_get_posts', 'ah_parse_request_tricksy');


function ajax_enqueue_script()
{
    wp_enqueue_script('frontend-ajax', get_stylesheet_directory_uri() . '/assets/js/search.js', array(), null, true);
    wp_localize_script(
        'frontend-ajax',
        'frontend_ajax_object',
        array(
            'ajaxurl' => admin_url('admin-ajax.php')
        )
    );
}
add_action('wp_enqueue_scripts', 'ajax_enqueue_script');
///GET COUNTRY POST IN TAB
function search_post_country()
{
    if (isset($_POST['key'])) {

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            's' => sanitize_text_field($_POST['key'])
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) { ?>
            <div class="search-found">
                <div class="header-search">
                    Destination
                </div>
                <div class="search-found-contet row">
                    <?php while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>
                        <div class="list-searh-country col-12">
                            <a href="<?php echo the_permalink() ?>">
                                <div class="d-flex">
                                    <div class="list-searh-country-img">
                                        <img data-src="<?php echo the_post_thumbnail_url(); ?>"
                                            src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>"
                                            loading="lazy">
                                    </div>
                                    <div class="list-searh-country-content">
                                        <p class="title">
                                            <?php echo the_title(); ?>
                                        </p>
                                        <span class="list-searh-country-content-ex">
                                            <?php echo the_excerpt(10); ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } // endwhile ?>
                </div>
            </div>
            <?php wp_reset_postdata();
        } else {
            echo '<div class="not-found">
            No results matched your query </div>';
        }

        wp_die();
    }
}
add_action('wp_ajax_search_post_country', 'search_post_country');
add_action('wp_ajax_nopriv_search_post_country', 'search_post_country');



//Search home
function ux_builder_search_guide()
{
    add_ux_builder_shortcode(
        'guide_shortcode',
        array(
            'name' => __('Search Element'),
            'category' => __('Content'),
        )
    );
}
add_action('ux_builder_setup', 'ux_builder_search_guide');
function ux_builder_search_guide_func($atts)
{
    extract(
        shortcode_atts(
            array(
                'scrubfield' => '1',
            ),
            $atts
        )
    );
    ob_start();

    ?>


<?php include 'search-home-form.php' ?>

<?php return ob_get_clean();
}

add_shortcode('guide_shortcode', 'ux_builder_search_guide_func');


//trustpilot
function trustpilot_builder()
{
    add_ux_builder_shortcode(
        'trustpilot_shortcode',
        array(
            'name' => __('Write Review trustpilot'),
            'category' => __('Content'),
            'priority' => 1,
            'options' => array(
                'star' => array(
                    'type' => 'textfield',
                    'heading' => 'Star',
                    'step' => '1',
                    'min' => 1,
                    'max' => 5,
                    'default' => 5,
                ),
                'username' => array(
                    'type' => 'textfield',
                    'heading' => 'User Name',
                    'default' => 'anonymous',
                ),
                'time' => array(
                    'type' => 'textfield',
                    'heading' => 'Time review',
                    'default' => '1 day a go',
                ),
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Title',
                    'default' => '',
                ),
                'content' => array(
                    'type' => 'textarea',
                    'heading' => 'content',
                    'default' => '',
                ),
            ),
        )
    );
}
add_action('ux_builder_setup', 'trustpilot_builder');
function trustpilot_builder_func($atts)
{
    extract(
        shortcode_atts(
            array(
                'star' => '5',
                'username' => '',
                'time' => '',
                'title' => '',
                'content' => '',
            ),
            $atts
        )
    );
    ob_start();
    include 'trust-pilot-item.php' ?>

<?php return ob_get_clean();
}

add_shortcode('trustpilot_shortcode', 'trustpilot_builder_func');

//Short code country
function blog_country_event_element()
{
    add_ux_builder_shortcode(
        'blog_country_event_shortcode',
        array(
            'name' => __('Product list Custom'),
            'category' => __('Content'),
            'priority' => 1,
            'options' => array(
                'listproduct' => array(
                    'type' => 'select',
                    'heading' => 'Products',
                    'param_name' => 'ids',
                    'config' => array(
                        'multiple' => true,
                        'placeholder' => __('Select post..', 'flatsome'),
                        'postSelect' => array(
                            'post_type' => array('product')
                        ),
                    ),
                ),
            ),
        )
    );
}
add_action('ux_builder_setup', 'blog_country_event_element');

function blog_country_event_func($atts)
{
    extract(
        shortcode_atts(
            array(
                'listproduct' => ''
            ),
            $atts
        )
    );
    ob_start();

    $arrayproduct = explode(",", $listproduct);

    $query = array(
        'post_type' => 'product',
        'order' => 'DESC',
        'orderby' => 'ID',
        'post__in' => $arrayproduct,
    );


    // The Query
    $the_query = new WP_Query($query);

    if ($the_query->have_posts()) { ?>
    <div class="destinations-flags-container-grid">
        <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php include('destinations-list.php'); ?>
        <?php } // endwhile ?>
    </div>
    <?php
    } else {
        echo '<div class="not-found">
        Not Found </div>';
    }

    // Reset Post Data
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('blog_country_event_shortcode', 'blog_country_event_func');

// add_filter('woocommerce_dropdown_variation_attribute_options_html', 'custom_variation_label_description_price', 20, 2);

function custom_variation_label_description_price($html, $args)
{
    $options = $args['options'];
    $product = $args['product'];
    $attribute = $args['attribute'];

    $html = '';
    if (!empty($options)) {
        if ($product && taxonomy_exists($attribute)) {
            // Get terms for attribute
            $terms = wc_get_product_terms($product->get_id(), $attribute, array('fields' => 'all'));
            $counter = 0;
            $currentCurrency = 'USD';
            $labecustom = '$';
            if (class_exists('WOOMULTI_CURRENCY_Data')) {
                $multiCurrencySettings = WOOMULTI_CURRENCY_Data::get_ins();
                $currentCurrency = $multiCurrencySettings->get_current_currency();

                $labecustom = $currentCurrency;

                if ($currentCurrency === 'USD') {
                    $labecustom = 'USD';
                }

                if ($currentCurrency === 'VND') {
                    $labecustom = 'đ';
                }
            }
            foreach ($terms as $term) {
                if (in_array($term->slug, $options)) {
                    $args = array('attribute_' . sanitize_title($attribute) => $term->slug);
                    $variations = $product->get_available_variations();
                    foreach ($variations as $variation) {
                        if ($variation['attributes'] == $args) {
                            // Assuming you have a custom field named 'description'.
                            // Replace 'description' with your actual field key.
                            $variation_product = wc_get_product($variation['variation_id']);
                            $description = $variation_product->get_description();

                            $html .= '<div class="product-variation">';
                            $html .= '<input type="radio" class="variation-option-select" name="attribute_' . sanitize_title($attribute) . '" value="' . $term->slug . '" id="' . sanitize_title($attribute) . '_' . $term->slug . '"';
                            // if ($counter == 0) {
                            //     $html .= ' checked';
                            // }
                            $html .= '>';
                            $html .= '<label for="' . sanitize_title($attribute) . '_' . $term->slug . '">';
                            $html .= '<strong class="variation_label">' . $term->name . '</strong>';
                            $html .= '<span class="variation_description">' . $description . '</span>';
                            $html .= '</label>';
                            $html .= '<span><del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>' . $variation['display_regular_price'] . '</bdi></span></del>';
                            $html .= '<ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"> </span>' . custom_wc_price($variation['display_price'], array('currency' => $currentCurrency)) . '</bdi></span></ins></span>';
                            $html .= '<div class="currency_symbol">' . $labecustom . '</div>';
                            $html .= '</div>';

                            $counter++;
                        }
                    }
                }
            }

        }
    }

    return $html;
}

function custom_variation_shortcode($atts)
{
    global $product;
    $product = wc_get_product(); // lấy sản phẩm hiện tại
    if ($product->is_type('variable')) { // kiểm tra xem sản phẩm có phải dạng biến thể không
        $attributes = $product->get_variation_attributes(); // lấy các thuộc tính biến thể
        $html = '';
        foreach ($attributes as $attribute => $options) {
            $args = array(
                'options' => $options,
                'product' => $product,
                'attribute' => $attribute
            );
            $html .= custom_variation_label_description_price($html, $args); // sử dụng hàm đã tạo
        }
        return $html; // trả về chuỗi html
    }
    return '';
}
add_shortcode('custom_variations', 'custom_variation_shortcode');


function custom_wc_price($price, $args = array())
{

    $labecustom = '';
    if (class_exists('WOOMULTI_CURRENCY_Data')) {
        $multiCurrencySettings = WOOMULTI_CURRENCY_Data::get_ins();
        $currentCurrency = $multiCurrencySettings->get_current_currency();

        $labecustom = $currentCurrency;

        if ($currentCurrency === 'USD') {
            $labecustom = '$';
        }

        if ($currentCurrency === 'VND') {
            $labecustom = '';
        }
    }

    $args = apply_filters(
        'wc_price_args',
        wp_parse_args(
            $args,
            array(
                'ex_tax_label' => false,
                'currency' => '',
                'decimal_separator' => wc_get_price_decimal_separator(),
                'thousand_separator' => wc_get_price_thousand_separator(),
                'decimals' => wc_get_price_decimals(),
                'price_format' => get_woocommerce_price_format(),
            )
        )
    );

    $unformatted_price = $price;
    $negative = $price < 0;

    if ($negative) {
        $price = $price * -1;
    }

    $price = apply_filters('raw_woocommerce_price', floatval($negative ? $price * -1 : $price));
    $price = apply_filters('formatted_woocommerce_price', number_format($price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator']), $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator']);

    if (apply_filters('woocommerce_price_trim_zeros', false) && $args['decimals'] > 0) {
        $price = wc_trim_zeros($price);
    }

    $formatted_price = ($negative ? '-' : '') . sprintf($args['price_format'], $labecustom, $price);
    $return = '<span class="woocommerce-Price-amount amount">' . $formatted_price . '</span>';

    if ($args['ex_tax_label'] && wc_tax_enabled()) {
        $return .= ' <small class="woocommerce-Price-taxLabel tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
    }

    return $return;
}


add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
function ql_woocommerce_ajax_add_to_cart()
{
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
        if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
        WC_AJAX::get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        echo wp_send_json($data);
    }
    wp_die();
}

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_cart_fragments');
function wc_refresh_cart_fragments($fragments){
    ob_start();
    ?>
   <span id="cart-total"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
        $fragments['#cartCount'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

  
        <div class="cart-body">
            <?php echo woocommerce_mini_cart(); ?>
        </div>

    <?php $fragments['.cart-body'] = ob_get_clean();

    return $fragments;

} );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_action( 'woocommerce_review_order_before_payment', 'woocommerce_checkout_coupon_form' );



// rename the coupon field on the checkout page
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {

	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Apply coupon' === $text ) {
		$translated_text = 'Apply';
	
	} elseif ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}

    if ( 'If you have a coupon code, please apply it below.' === $text ) {
		$translated_text = '';
	}

	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );

add_filter('formatted_woocommerce_price', 'custom_round_vnd_price', 10, 5);

/**
 * Round VND price for `formatted_woocommerce_price` filter-hook.
 * 
 * @param string $formatted_price     Formatted price.
 * @param float  $price               Unformatted price value.
 * @param int    $decimals            Number of decimals.
 * @param string $decimal_separator   Decimal separator.
 * @param string $thousand_separator  Thousand separator.
 *
 * @return string
 */
function custom_round_vnd_price($formatted_price, $price, $decimals, $decimal_separator, $thousand_separator) {
    // Check if the current currency is VND
    if (get_woocommerce_currency() === 'VND') {
        // Perform the rounding logic
        if ($price % 1000 < 500) {
            $price = floor($price / 1000) * 1000;
        } else {
            $price = ceil($price / 1000) * 1000;
        }

        // Re-format the rounded price
        $formatted_price = number_format($price, $decimals, $decimal_separator, $thousand_separator);
    }

    return $formatted_price;
}


add_action('woocommerce_after_add_to_cart_button','devvn_quickbuy_after_addtocart_button');
function devvn_quickbuy_after_addtocart_button(){
    global $product;
    ?>
    <button type="button" class="button buy_now_button">
        <?php _e('Buy it now', 'devvn'); ?>
    </button>
    <input type="hidden" name="is_buy_now" class="is_buy_now" value="0" autocomplete="off"/>
    <script>
        jQuery(document).ready(function(){
            jQuery('.is_buy_now').val('0');
            jQuery('body').on('click', '.buy_now_button', function(e){
                e.preventDefault();
                var thisParent = jQuery(this).parents('form.cart');
                if(jQuery('.single_add_to_cart_button', thisParent).hasClass('disabled')) {
                    jQuery('.single_add_to_cart_button', thisParent).trigger('click');
                    return false;
                }
                thisParent.addClass('devvn-quickbuy');
                jQuery('.is_buy_now', thisParent).val('1');
                jQuery('.single_add_to_cart_button', thisParent).trigger('click');
            });
        });
        jQuery( document.body ).on( 'added_to_cart', function (e, fragments, cart_hash, addToCartButton){
            let thisForm  = addToCartButton.closest('.cart');
            let is_buy_now = parseInt(jQuery('.is_buy_now', thisForm).val()) || 0;
            if(is_buy_now === 1 && typeof wc_add_to_cart_params !== "undefined") {
                window.location = wc_add_to_cart_params.cart_url;
            }
        });
    </script>
    <?php
}
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url) {
    if(!get_theme_mod( 'ajax_add_to_cart' )) {
        if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now'] && get_option('woocommerce_cart_redirect_after_add') !== 'yes') {
            $redirect_url = wc_get_checkout_url(); //or wc_get_cart_url()
        }
    }
    return $redirect_url;
}
add_filter('woocommerce_get_script_data', 'devvn_woocommerce_get_script_data', 10, 2);
function devvn_woocommerce_get_script_data($params, $handle) {
    if($handle == 'wc-add-to-cart'){
        $params['cart_url'] = wc_get_checkout_url();
    }
    return $params;
}

// Unhook the payment section from its default location
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

// Hook the payment section after the customer details section
add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 10 );
// Add additional checkboxes to the terms and conditions section

///My acountttttt/////////////////////////////////////////////////////////////////////////////////////
add_filter('woocommerce_account_menu_items', 'wpsh_custom_endpoint', 40);
function wpsh_custom_endpoint($menu_links)
{
    $menu_links = array_slice($menu_links, 0, 5, true)
        + array('edit-password' => 'Edit password') // Change 'support' to your desired endpoint slug and 'Support' to the tab title
        + array_slice($menu_links, 5, NULL, true);
    return $menu_links;
}

add_action('init', 'wpsh_new_endpoint');
function wpsh_new_endpoint()
{
    add_rewrite_endpoint('edit-password', EP_PAGES); // Change 'support' to your desired endpoint slug
}

add_action('woocommerce_account_edit-password_endpoint', 'wpsh_endpoint_content');
function wpsh_endpoint_content()
{
    include 'custom-password-change-form.php';
}


add_filter('woocommerce_account_menu_items', 'wpsh_custom_endpoint_order');
function wpsh_custom_endpoint_order()
{
    $myorder = array(
        'dashboard' => __('Personal Infomation', 'woocommerce'),
        'orders' => __('orders history', 'woocommerce'),
        'edit-password' => __('Edit password', 'woocommerce'),
        'edit-address' => __('Setting', 'woocommerce'),
    );
    return $myorder;
}

add_filter('woocommerce_save_account_details_required_fields', 'remove_required_fields');

function remove_required_fields($required_fields)
{
    unset($required_fields['password_2']);
    unset($required_fields['password_1']);
    unset($required_fields['password_current']);
    unset($required_fields['account_password']);
    unset($required_fields['account_password_2']);
    unset($required_fields['account_password-2']);
    unset($required_fields['account_password_1']);
    unset($required_fields['account_password-1']);
    unset($required_fields['account_first_name']);
    unset($required_fields['account_last_name']);
    unset($required_fields['account_display_name']);
    unset($required_fields['account_email']);
    return $required_fields;
}

add_action('woocommerce_save_account_details', 'save_favorite_color_account_details', 12, 1);
function save_favorite_color_account_details($user_id)
{
    // For Favorite color
    if (isset($_POST['phone']))
        update_user_meta($user_id, 'phone', sanitize_text_field($_POST['phone']));
    if (isset($_POST['billing_address_1']))
        update_user_meta($user_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
    if (isset($_POST['user_date']))
        update_user_meta($user_id, 'user_date', sanitize_text_field($_POST['user_date']));
}

/**
 * Adds a new column to the "My Orders" table in the account.
 *
 * @param string[] $columns the columns in the orders table
 * @return string[] updated columns
 */
function th_wc_add_my_account_orders_column($columns)
{

    $new_columns = array();

    foreach ($columns as $key => $name) {

        $new_columns[$key] = $name;

        // add ship-to after order status column
        if ('order-date' === $key) {
            $new_columns['new-data'] = __('Items', 'textdomain');
        }
    }

    return $new_columns;
}
add_filter('woocommerce_my_account_my_orders_columns', 'th_wc_add_my_account_orders_column');

/**
 * Adds data to the custom "new-data" column in "My Account > Orders".
 *
 * @param \WC_Order $order the order object for the row
 */
function th_wc_my_orders_new_data_column($order)
{

    $new_data = $order->get_item_count();
    echo !empty($new_data) ? $new_data : '–';

}
add_action('woocommerce_my_account_my_orders_column_new-data', 'th_wc_my_orders_new_data_column');


function custom_display_account_orders_status_column($order)
{
    $order_status = $order->get_status();

    switch ($order_status) {
        case 'pending':
            echo '<span class="custom-bage custom-pending-status">Pending Payment</span>';
            break;

        case 'processing':
            echo '<span class="custom-bage custom-processing-status">Processing</span>';
            break;

        case 'on-hold':
            echo '<span class="custom-bage custom-on-hold-status">On Hold</span>';
            break;

        case 'completed':
            echo '<span class="custom-bage custom-completed-status">Completed</span>';
            break;

        case 'cancelled':
            echo '<span class="custom-bage custom-cancelled-status">Cancelled</span>';
            break;

        case 'refunded':
            echo '<span class="custom-bage custom-refunded-status">Refunded</span>';
            break;

        case 'failed':
            echo '<span class="custom-bage custom-failed-status">Failed</span>';
            break;

        default:
            echo '<span class="custom-bage custom-unknown-status">Unknown</span>';
    }
}
add_action('woocommerce_my_account_my_orders_column_order-status', 'custom_display_account_orders_status_column');
