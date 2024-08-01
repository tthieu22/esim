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
ob_start();

$product_id = $product->get_id();

$product = wc_get_product($product_id);
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}


?>

<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6" id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <div class="product-custom-item">
        <a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>">
            <div class="destination">
                <div class="destination__image">
                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="Japan" loading="lazy">
                </div>
                <div class="destination__main-info">
                    <h3 class="destination__title">
                        <?php echo the_title(); ?>
                    </h3>
                    <div class="destination__price-info">
                        <!-- <p class="destination__from">from</p> -->
                        <div class="destination__prices">
                            <?php if (class_exists('WOOMULTI_CURRENCY_Data')) {
                                $multiCurrencySettings = WOOMULTI_CURRENCY_Data::get_ins();

                                // Get the list of currencies and the current currency.
                                $wmcCurrencies = $multiCurrencySettings->get_list_currencies();
                                $currentCurrency = $multiCurrencySettings->get_current_currency();

                                $labecustom = $currentCurrency;

                                if ($currentCurrency === 'USD') {
                                    $labecustom = '$';
                                }

                                if ($currentCurrency === 'VND') {
                                    $labecustom = 'đ';
                                }

                                // Get the rate of the current currency.
                                $currentCurrencyRate = isset($wmcCurrencies[$currentCurrency]['rate']) ? floatval($wmcCurrencies[$currentCurrency]['rate']) : null;


                                // Get the product's base price.
                                $basePrice = get_post_meta($product_id, '_price', true);

                                $basePrice = is_numeric($basePrice) ? floatval($basePrice) : null;


                                ?>


                                <?php if ($currentCurrencyRate !== null && $basePrice !== null) {
                                    // Calculate the product's price in the current currency.
                                    $currentPrice = $basePrice * $currentCurrencyRate;
                                    $formattedPrice = wc_price($currentPrice, array('currency' => $currentCurrency)); ?>

                                    <p class="mutil-crs">
                                        From <span class="woocommerce-Price-amount amount"><bdi>
                                                <?php echo $formattedPrice; ?>
                                            </bdi></span><span class="woocommerce-currency">
                                            <?php if ($currentCurrency === 'USD') { ?>
                                                <?php echo $currentCurrency; ?>
                                            <?php } ?>
                                        </span>
                                    </p>

                                    <?php
                                    if ($product) {
                                        if ($product->is_type('variable')) {
                                            $variations = $product->get_available_variations();



                                            // Display prices for each variation.
                                            if (!empty($variations)) {
                                                $first_variation = reset($variations);
                                                $variation_id = $first_variation['variation_id'];
                                                $variation_obj = wc_get_product($variation_id);
                                                $first_variation_regular_price = $variation_obj->get_regular_price();

                                                ?>
                                                <p class="destination__previous-price"><span class="woocommerce-Price-amount amount"><bdi>
                                                            <?php echo wc_price($first_variation_regular_price, array('currency' => $currentCurrency)); ?>
                                                            <?php if ($currentCurrency === 'USD') { ?>
                                                                <?php echo $currentCurrency; ?>
                                                            <?php } ?>
                                                        </bdi></span></p>
                                                <?php
                                            }
                                        }

                                    } else {
                                        echo "Product not found.";
                                    } ?>

                                <?php } else {
                                    // Handle the case where one of the values is not numeric.
                                    // This could be echoing an error message, throwing an exception, etc.
                                    // It depends on your specific needs.
                                    echo "Contact";
                                }

                                // Assuming $product_id holds the ID of the WooCommerce product.
                            
                            }
                            ?>

                        </div>
                    </div>
                    <div class="total-reviews">
                        <?php echo do_shortcode('[cusrev_all_reviews  products="' . $product_id . '" add_review="false" show_replies="fasle" shop_reviews="false" show_products="false" ]'); ?>
                    </div>
                </div>
                <!-- <div class="destination__wave">
                    <img src="<?php echo THEME_URL_CHILD; ?>/assets/images/destination-wave.svg" alt="Japan">
                </div> -->

            </div>
        </a>
    </div>

</div>