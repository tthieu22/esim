<?php
global $product;
$product_id = $product->get_id();

?>
<a href="<?php echo the_permalink(); ?>" class="destinations-flags-container-grid-card">
    <div class="destinations-flags-container-grid-card-main-info">
        <div class="destinations-flags-container-grid-card-main-info-flag">
            <div class="destinations-flags-container-grid-card-main-info-flag-container">
                <?php
                $image = get_field('flag');
                if (!empty($image)) { ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="destinations-flags-container-grid-card-main-info-flag-img" />
                <?php } else { ?>
                    <img decoding="async" class="destinations-flags-container-grid-card-main-info-flag-img"
                        src="<?php echo the_post_thumbnail_url(); ?>" alt="USA" loading="lazy">
                <?php } ?>

                <div class="destinations-flags-container-grid-card-main-info-flag-content">
                    <h3 class="">
                        <?php echo the_title(); ?>
                    </h3>
                    <div class="">
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
                            $basePrice = is_numeric($basePrice) ? floatval($basePrice) : null; ?>

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
                            <?php } else {
                                // Handle the case where one of the values is not numeric.
                                // This could be echoing an error message, throwing an exception, etc.
                                // It depends on your specific needs.
                                echo "Contact";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>