<?php
global $product;
$product_id = $product->get_id();

function display_value($value)
{
    if ($value) {
        return $value;
    } else {
        return '';
    }
}


?>
<div id="product-info" class="product__info">
    <span class="product__intro">International travel eSIM for </span>
    <h1 class="product__country">
        <?php echo the_title(); ?>
    </h1>
    <div class="total-reviews">
        <?php echo do_shortcode('[cusrev_all_reviews add_review="false" show_replies="fasle" shop_reviews="false" show_products="false" ]'); ?>
    </div>
    <ul class="product-custom-text-sum">
        <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987Z"
                    stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>100% Satisfaction Guarantee</span>
        </li>
        <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                    stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 14C8 14 9.5 16 12 16C14.5 16 16 14 16 14" stroke="#666666" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9 9H9.01" stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M15 9H15.01" stroke="#666666" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span>1000+ happy Clients</span>
        </li>
        <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M22 2L11 13" stroke="#666666" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke="#666666" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span>eSIMs are instantly delivered to your email</span>
        </li>
    </ul>
    <div class="tabs-product">
        <div class="tabs row tab-product-detail">
            <a onclick="openTab(event, 'General')" class="tablinks-product" id="defaultOpen-product">
                <p>
                    Features </p>
            </a>
            <a onclick="openTab(event, 'Detalle')" class="tablinks-product">
                <p>
                    Description </p>
            </a>
            <a onclick="openTab(event, 'Compatibles')" class="tablinks-product">
                <p>
                    Compatibility </p>
            </a>
            <a id="tabFicha" class="tablinks-product" onclick="openTab(event, 'Ficha')" class="tablinks-product">
                <p>
                    Technical Specs </p>
            </a>
        </div>
        <div id="General" class="tabcontent-product product__bullets default">
            <?php
            $value = get_field("features");
            echo display_value($value);

            ?>
        </div>
        <div id="Detalle" class="tabcontent-product">
            <?php echo the_content(); ?>
        </div>
        <div id="Compatibles" class="tabcontent-product">
            <?php
            $compatibility = get_field("compatibility");
            echo display_value($compatibility);
            ?>
        </div>
        <div id="Ficha" class="tabcontent-product">
            <div class="product__bullets">


                <ul>
                    <li><strong>Network:</strong>
                        <?php
                        $network = get_field("network");
                        echo display_value($network);
                        ?>
                    </li>
                    <li><strong>Speed:</strong>
                        <?php
                        $speed = get_field("speed");
                        echo display_value($speed);
                        ?>
                    </li>
                    <li><strong>Tethering / Hotspot:</strong>
                        <?php
                        $tethering__hotspot = get_field("tethering__hotspot");
                        echo display_value($tethering__hotspot);
                        ?>
                    </li>
                    <li><strong>Data Packages:</strong>
                        <?php
                        $data_packages = get_field("data_packages");
                        echo display_value($data_packages);
                        ?>
                    </li>
                    <li><strong>Days of usage:</strong>
                        <?php
                        $days_of_usage = get_field("days_of_usage");
                        echo display_value($days_of_usage);
                        ?>
                    </li>
                    <li><strong>Phone number:</strong>
                        <?php
                        $phone_number = get_field("phone_number");
                        echo display_value($phone_number);
                        ?>
                    </li>
                    <li><strong>Plan type:</strong>
                        <?php
                        $plan_type = get_field("plan_type");
                        echo display_value($plan_type);
                        ?>
                    </li>
                    <li><strong>SMS:</strong>
                        <?php
                        $sms = get_field("sms");
                        echo display_value($sms);
                        ?>
                    </li>
                    <li><strong>Analog calls:</strong>
                        <?php
                        $analog_calls = get_field("analog_calls");
                        echo display_value($analog_calls);
                        ?>
                    </li>
                    <li><strong>Activation:</strong>
                        <?php
                        $activation = get_field("activation");
                        echo display_value($activation);
                        ?>
                    </li>
                    <li><strong>Compatibility:</strong>
                        <?php
                        $compatibility = get_field("compatibility");
                        echo display_value($compatibility);
                        ?>
                    </li>
                </ul>
                <ul>
                    <li><strong>Coverage:</strong>
                        <?php
                        $coverage = get_field("coverage");
                        echo display_value($coverage);
                        ?>
                    </li>
                    <li><strong>Shipping:</strong>
                        <?php
                        $shipping = get_field("shipping");
                        echo display_value($shipping);
                        ?>
                    </li>
                    <li><strong>Delivery time:</strong>
                        <?php
                        $delivery_time = get_field("delivery_time");
                        echo display_value($delivery_time);
                        ?>
                    </li>
                    <li><strong>Installation:</strong>
                        <?php
                        $installation = get_field("installation");
                        echo display_value($installation);
                        ?>
                    </li>
                    <li><strong>ID required</strong>:
                        <?php
                        $id_required = get_field("id_required");
                        echo display_value($id_required);
                        ?>
                    </li>
                    <li><strong>Technology:</strong>
                        <?php
                        $technology = get_field("technology");
                        echo display_value($technology);
                        ?>
                    </li>
                    <li><strong>Designed for:</strong>
                        <?php
                        $designed_for = get_field("designed_for");
                        echo display_value($designed_for);
                        ?>
                    </li>
                    </li>
                    <li><strong>Speed reduction:</strong>
                        <?php
                        $speed_reduction = get_field("speed_reduction");
                        echo display_value($speed_reduction);
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-product">
        <div class="variants-tabs-container">
            <div class="currencies-dropdown">
                <div class="select">
                    <div class="btn-group-currency">
                        <button type="button" class="btn currency-button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="border: 1px solid rgb(228, 230, 234);">

                            <img decoding="async" src="<?php echo THEME_URL_CHILD; ?>/assets/images/vector.svg"
                                alt="icon-collapse" style="width: 8px;height: 5px;">
                        </button>
                        <div class="dropdown-currency deactivate">
                            <a href="?wmc-currency=USD" class="dropdown-item-currency" data-currency="USD"> USD
                                ($)</a>
                            <a href="?wmc-currency=VND" class="dropdown-item-currency " data-currency="VND">
                                VND (đ)</a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="single_variation_wrap clone addtocart-cs product-add-tocard-cs relative <?php echo $product->is_type('variable') ? 'product-variable' : 'no-variable'; ?>">
                <?php
                $product = wc_get_product(get_the_ID());

                if ($product->is_type('variable')) { ?>

                <?php } else { ?>
                    <div class="single-price-ab">
                        <span class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>">
                            <?php echo $product->get_price_html(); ?>
                        </span>
                    </div>
                <?php } ?>

                <?php woocommerce_template_single_add_to_cart();
                ?>
            </div>
            <div class="pay-single-product d-flex">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M8.00701 2.385C6.57839 2.77872 5.15948 3.20685 3.75151 3.669C3.62294 3.71065 3.50866 3.78756 3.42167 3.89099C3.33469 3.99442 3.2785 4.1202 3.25951 4.254C2.42851 10.4895 4.34851 15.039 6.63901 18.036C7.60878 19.3176 8.76512 20.4466 10.0695 21.3855C10.5885 21.7515 11.0475 22.0155 11.409 22.185C11.589 22.2705 11.736 22.3275 11.8485 22.362C11.8977 22.3793 11.9484 22.3918 12 22.3995C12.051 22.3912 12.1011 22.3787 12.15 22.362C12.264 22.3275 12.411 22.2705 12.591 22.185C12.951 22.0155 13.4115 21.75 13.9305 21.3855C15.2349 20.4466 16.3912 19.3176 17.361 18.036C19.6515 15.0405 21.5715 10.4895 20.7405 4.254C20.7217 4.12014 20.6656 3.99427 20.5786 3.89082C20.4915 3.78736 20.3772 3.71049 20.2485 3.669C19.272 3.3495 17.6235 2.829 15.993 2.3865C14.328 1.935 12.7965 1.6005 12 1.6005C11.205 1.6005 9.67201 1.9335 8.00701 2.385ZM7.60801 0.84C9.23551 0.3975 10.965 0 12 0C13.035 0 14.7645 0.3975 16.392 0.84C18.057 1.29 19.7355 1.8225 20.7225 2.145C21.1352 2.28128 21.501 2.5312 21.778 2.86605C22.055 3.20091 22.232 3.60711 22.2885 4.038C23.1825 10.7535 21.108 15.7305 18.591 19.023C17.5237 20.4315 16.251 21.6718 14.8155 22.7025C14.3191 23.0592 13.7932 23.3728 13.2435 23.64C12.8235 23.838 12.372 24 12 24C11.628 24 11.178 23.838 10.7565 23.64C10.2068 23.3728 9.68087 23.0592 9.18451 22.7025C7.74905 21.6717 6.47638 20.4314 5.40901 19.023C2.89201 15.7305 0.817508 10.7535 1.71151 4.038C1.76804 3.60711 1.94497 3.20091 2.22198 2.86605C2.49899 2.5312 2.86485 2.28128 3.27751 2.145C4.7103 1.67521 6.15422 1.24009 7.60801 0.84Z"
                                fill="#999999" />
                            <path
                                d="M16.281 7.71888C16.3508 7.78854 16.4062 7.87131 16.444 7.96243C16.4818 8.05354 16.5013 8.15122 16.5013 8.24988C16.5013 8.34853 16.4818 8.44621 16.444 8.53733C16.4062 8.62844 16.3508 8.71121 16.281 8.78088L11.781 13.2809C11.7113 13.3507 11.6285 13.4061 11.5374 13.4439C11.4463 13.4818 11.3486 13.5012 11.25 13.5012C11.1513 13.5012 11.0536 13.4818 10.9625 13.4439C10.8714 13.4061 10.7886 13.3507 10.719 13.2809L8.46897 11.0309C8.39924 10.9611 8.34392 10.8784 8.30619 10.7873C8.26845 10.6961 8.24902 10.5985 8.24902 10.4999C8.24902 10.4013 8.26845 10.3036 8.30619 10.2125C8.34392 10.1214 8.39924 10.0386 8.46897 9.96888C8.5387 9.89914 8.62149 9.84383 8.7126 9.80609C8.8037 9.76835 8.90136 9.74893 8.99997 9.74893C9.09859 9.74893 9.19624 9.76835 9.28735 9.80609C9.37846 9.84383 9.46124 9.89914 9.53097 9.96888L11.25 11.6894L15.219 7.71888C15.2886 7.64903 15.3714 7.59362 15.4625 7.55581C15.5536 7.518 15.6513 7.49854 15.75 7.49854C15.8486 7.49854 15.9463 7.518 16.0374 7.55581C16.1285 7.59362 16.2113 7.64903 16.281 7.71888Z"
                                fill="#999999" />
                        </svg>
                    </div>
                    <div id="secure-payment" class="d-flex flex-column">
                        <span class="secure-payment-1">Secure payment</span>
                        <span class="secure-payment-2">
                            guaranteed
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <span id="verified">Verified by</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="15" viewBox="0 0 44 15" fill="none">
                            <g clip-path="url(#clip0_767_9496)">
                                <mask id="mask0_767_9496" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0"
                                    y="0" width="71" height="24">
                                    <path d="M70.3982 0.600098H0.601562V23.4001H70.3982V0.600098Z" fill="white" />
                                </mask>
                                <g mask="url(#mask0_767_9496)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22.1262 0.847517L19.2214 14.3881H15.7083L18.614 0.847517H22.1262ZM36.9051 9.5903L38.7544 4.50637L39.8189 9.5903H36.9051ZM40.8251 14.3881H44.0737L41.2379 0.847517H38.2397C37.5654 0.847517 36.9968 1.23851 36.7444 1.84053L31.4736 14.3881H35.1612L35.8939 12.3653H40.4004L40.8251 14.3881ZM31.6561 9.96692C31.6718 6.39356 26.7008 6.19623 26.7349 4.59953C26.7456 4.11404 27.2094 3.59784 28.2247 3.46562C28.7272 3.40016 30.1155 3.34942 31.6879 4.0713L32.305 1.20011C31.4592 0.894262 30.3723 0.600098 29.0185 0.600098C25.5469 0.600098 23.1026 2.44088 23.0832 5.07567C23.06 7.02597 24.8273 8.11282 26.1587 8.76127C27.5268 9.42467 27.9856 9.85039 27.9805 10.4438C27.9705 11.3526 26.8889 11.7533 25.8781 11.769C24.1121 11.7963 23.0868 11.2928 22.2702 10.9136L21.6343 13.8806C22.4543 14.2565 23.9695 14.5837 25.5405 14.6001C29.2312 14.6001 31.6447 12.7831 31.6561 9.96692ZM17.1066 0.847517L11.4153 14.3881H7.70221L4.90159 3.58181C4.7315 2.91668 4.58383 2.67227 4.06684 2.39246C3.2227 1.93502 1.82808 1.50663 0.601562 1.24018L0.684268 0.847517H6.66186C7.42329 0.847517 8.10867 1.35271 8.28151 2.22785L9.76084 10.0638L13.4169 0.847517H17.1066Z"
                                        fill="#999999" />
                                </g>
                            </g>
                            <defs>
                                <clipPath id="clip0_767_9496">
                                    <rect width="44" height="15" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="d-flex  flex-column">
                    <span id="master-cart">Mastercard</span>
                    <span id="SecureCode">SecureCode</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="98" height="24" viewBox="0 0 98 24" fill="none">
                        <mask id="mask0_767_9502" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="97" height="24">
                            <path d="M96.9523 0.54541H0.547852V23.4545H96.9523V0.54541Z" fill="white" />
                        </mask>
                        <g mask="url(#mask0_767_9502)">
                            <path
                                d="M18.0787 2.04731C16.9519 0.877147 14.9176 0.375977 12.3161 0.375977H4.76614C4.50862 0.376298 4.25964 0.46022 4.0638 0.61271C3.86795 0.765202 3.73803 0.976297 3.6973 1.20819L0.546242 19.3928C0.53045 19.4777 0.535181 19.5647 0.560103 19.6477C0.585025 19.7307 0.629539 19.8078 0.690527 19.8734C0.751515 19.9391 0.827505 19.9919 0.913183 20.028C0.99886 20.0641 1.09215 20.0827 1.18654 20.0825H5.85011L7.02734 13.2937L6.99205 13.5053C7.03172 13.274 7.16074 13.0632 7.35581 12.911C7.55087 12.7589 7.79915 12.6753 8.05584 12.6753H10.2691C14.6226 12.6753 18.0284 11.0661 19.0241 6.39921C19.0543 6.26127 19.0795 6.12793 19.1022 5.99689C19.3972 4.27269 19.1022 3.10022 18.0787 2.03811"
                                fill="#999999" />
                            <path
                                d="M75.147 10.7006C74.8622 12.4065 73.4329 12.4065 72.0515 12.4065H71.2649L71.817 9.22009C71.8327 9.12689 71.8846 9.04196 71.9633 8.98077C72.0421 8.91957 72.1422 8.88621 72.2456 8.88675H72.606C73.5463 8.88675 74.4362 8.88674 74.895 9.37413C75.1672 9.66609 75.2505 10.1006 75.147 10.7006ZM74.5446 6.24756H69.334C69.1612 6.24734 68.9939 6.30356 68.8627 6.40603C68.7313 6.50849 68.6446 6.65045 68.6181 6.8062L66.5106 18.9906C66.5004 19.0473 66.5038 19.1053 66.5206 19.1606C66.5375 19.216 66.5673 19.2673 66.608 19.311C66.6489 19.3548 66.6996 19.3899 66.7568 19.414C66.814 19.4381 66.8762 19.4505 66.9392 19.4503H69.6188C69.7401 19.4518 69.8577 19.4131 69.9503 19.3418C70.043 19.2705 70.1042 19.1711 70.1231 19.0619L70.723 15.6135C70.7495 15.4583 70.8359 15.3169 70.9668 15.2149C71.0976 15.1129 71.2642 15.0569 71.4364 15.0571H73.0875C76.5209 15.0571 78.5024 13.5398 79.0191 10.5374C79.2535 9.22469 79.0191 8.19246 78.3561 7.4683C77.6125 6.67516 76.2991 6.25445 74.5547 6.25445"
                                fill="#999999" />
                            <path
                                d="M37.9674 10.7005C37.6825 12.4062 36.2532 12.4062 34.8718 12.4062H34.0752L34.6273 9.21995C34.643 9.12675 34.695 9.0418 34.7736 8.98062C34.8523 8.91943 34.9524 8.88606 35.0558 8.8866H35.4163C36.3566 8.8866 37.2464 8.8866 37.7052 9.37398C37.98 9.66595 38.0607 10.1004 37.9573 10.7005H37.9674ZM37.3574 6.24742H32.1543C31.9815 6.2472 31.8143 6.30342 31.683 6.40588C31.5516 6.50835 31.4649 6.65031 31.4384 6.80606L29.3309 18.9904C29.3207 19.0471 29.3241 19.1052 29.3409 19.1605C29.3578 19.2158 29.3876 19.2672 29.4284 19.3109C29.4692 19.3547 29.5199 19.3898 29.5771 19.4139C29.6343 19.4379 29.6965 19.4503 29.7595 19.4502H32.2476C32.42 19.4506 32.587 19.3946 32.7182 19.2926C32.8495 19.1906 32.9365 19.0492 32.9635 18.8939L33.5332 15.6041C33.5598 15.4486 33.6467 15.3069 33.778 15.2049C33.9094 15.1027 34.0766 15.047 34.2491 15.0478H35.8978C39.3312 15.0478 41.3126 13.5304 41.8293 10.528C42.0638 9.21535 41.8293 8.18313 41.1663 7.45896C40.4252 6.66583 39.1118 6.24512 37.3675 6.24512"
                                fill="#999999" />
                            <path
                                d="M49.4666 15.0755C49.3715 15.6899 49.0321 16.251 48.5128 16.652C47.9937 17.053 47.3309 17.266 46.6507 17.2503C46.3387 17.2794 46.0235 17.239 45.7324 17.1324C45.4413 17.0259 45.1829 16.8563 44.9795 16.6386C44.7762 16.4207 44.6339 16.1611 44.5649 15.882C44.4959 15.6029 44.5024 15.3127 44.5837 15.0364C44.678 14.4237 45.0138 13.8633 45.5284 13.4601C46.0429 13.0569 46.7009 12.8384 47.3793 12.8455C47.6897 12.8305 47.9998 12.8784 48.2875 12.9858C48.5752 13.0931 48.8332 13.2572 49.0431 13.4662C49.2386 13.6897 49.3778 13.9498 49.451 14.2279C49.5242 14.506 49.5296 14.7954 49.4666 15.0755ZM52.9454 10.6454H50.4598C50.3564 10.6449 50.2562 10.6783 50.1776 10.7395C50.0989 10.8007 50.0469 10.8856 50.0312 10.9788L49.9203 11.6156L49.7464 11.3858C49.2068 10.6707 48.0019 10.4316 46.7969 10.4316C44.0391 10.4316 41.6847 12.3375 41.2259 15.0089C40.9889 16.3445 41.3268 17.6181 42.1561 18.5079C42.9123 19.324 44.0038 19.6572 45.2996 19.6572C45.9419 19.6628 46.5788 19.5505 47.1726 19.3269C47.7664 19.1034 48.3047 18.7733 48.7557 18.3561L48.6422 18.9883C48.6324 19.0451 48.6362 19.1032 48.6533 19.1585C48.6705 19.2138 48.7005 19.2652 48.7415 19.3088C48.7824 19.3525 48.8334 19.3876 48.8907 19.4117C48.948 19.4357 49.0102 19.4481 49.0733 19.4481H51.3194C51.4918 19.4484 51.6587 19.3925 51.7899 19.2905C51.9213 19.1885 52.0083 19.0471 52.0353 18.8917L53.3864 11.0983C53.3963 11.0416 53.3926 10.9834 53.3754 10.9281C53.3583 10.8728 53.3281 10.8215 53.2872 10.7778C53.2462 10.7341 53.1954 10.699 53.1381 10.675C53.0808 10.6509 53.0184 10.6385 52.9554 10.6385"
                                fill="#999999" />
                            <path
                                d="M86.648 15.0755C86.5529 15.6904 86.2132 16.2517 85.6933 16.6528C85.1736 17.0539 84.5103 17.2665 83.8297 17.2503C83.5178 17.2788 83.2029 17.238 82.9121 17.1313C82.6212 17.0245 82.3631 16.8551 82.1599 16.6374C81.9567 16.4197 81.8144 16.1603 81.7451 15.8815C81.676 15.6027 81.6819 15.3127 81.7625 15.0364C81.8575 14.4235 82.1938 13.8631 82.7088 13.4599C83.2237 13.0567 83.882 12.8383 84.5607 12.8455C84.871 12.8309 85.1811 12.8789 85.4688 12.9862C85.7563 13.0936 86.0144 13.2574 86.2244 13.4662C86.4201 13.6899 86.5593 13.9498 86.6325 14.2279C86.7057 14.506 86.711 14.7954 86.648 15.0755ZM90.1267 10.6454H87.6312C87.5278 10.6449 87.4275 10.6783 87.3489 10.7395C87.2702 10.8007 87.2183 10.8856 87.2026 10.9788L87.0916 11.6156L86.9177 11.3858C86.3757 10.6707 85.1708 10.4316 83.9684 10.4316C81.2105 10.4316 78.8561 12.3375 78.3973 15.0089C78.1578 16.3445 78.4982 17.6181 79.3275 18.5079C80.0837 19.324 81.1752 19.6572 82.4709 19.6572C83.113 19.6635 83.7498 19.5514 84.3432 19.3278C84.9366 19.1043 85.4745 18.7737 85.9245 18.3561L85.8136 18.9883C85.8038 19.0451 85.8075 19.1032 85.8247 19.1585C85.8418 19.2138 85.8719 19.2652 85.9129 19.3088C85.9538 19.3525 86.0048 19.3876 86.062 19.4117C86.1193 19.4357 86.1816 19.4481 86.2447 19.4481H88.4907C88.6631 19.4484 88.8301 19.3925 88.9613 19.2905C89.0926 19.1885 89.1796 19.0471 89.2066 18.8917L90.5553 11.0983C90.5656 11.0417 90.5621 10.9836 90.5453 10.9283C90.5285 10.873 90.4987 10.8216 90.4579 10.7779C90.417 10.7341 90.3663 10.699 90.3091 10.6749C90.2519 10.6509 90.1897 10.6384 90.1267 10.6385"
                                fill="#999999" />
                            <path
                                d="M66.2414 10.6455H63.7206C63.6023 10.6456 63.4858 10.672 63.3812 10.7224C63.2766 10.7729 63.1871 10.846 63.1206 10.9351L59.6721 15.5928L58.205 11.1259C58.1609 10.9897 58.0694 10.87 57.9444 10.7851C57.8195 10.7001 57.6677 10.6544 57.5118 10.6547H55.0463C54.9772 10.6546 54.9091 10.6695 54.8475 10.6983C54.786 10.7271 54.7329 10.7689 54.6927 10.8202C54.6525 10.8715 54.6263 10.9308 54.6163 10.9932C54.6064 11.0556 54.6129 11.1193 54.6354 11.1789L57.3957 18.5746L54.7993 21.9172C54.753 21.9763 54.7255 22.0459 54.7196 22.1185C54.7138 22.1909 54.7301 22.2635 54.7665 22.3281C54.803 22.3926 54.8583 22.4469 54.9264 22.4847C54.9944 22.5226 55.0725 22.5425 55.1523 22.5425H57.6604C57.7773 22.5425 57.8923 22.5168 57.9959 22.4676C58.0995 22.4184 58.1885 22.347 58.2554 22.2598L66.5944 11.2685C66.6393 11.2089 66.6656 11.1393 66.6703 11.067C66.675 10.9948 66.6581 10.9227 66.6212 10.8586C66.5844 10.7945 66.5292 10.7408 66.4613 10.7033C66.3935 10.6657 66.3158 10.6457 66.2364 10.6455"
                                fill="#999999" />
                            <path
                                d="M93.0629 6.58329L90.9252 18.9976C90.915 19.0542 90.9184 19.1123 90.9352 19.1676C90.952 19.223 90.9819 19.2743 91.0227 19.318C91.0634 19.3618 91.1141 19.3969 91.1713 19.421C91.2285 19.445 91.2907 19.4574 91.3537 19.4573H93.504C93.6765 19.4577 93.8434 19.4018 93.9746 19.2998C94.106 19.1978 94.193 19.0563 94.22 18.9011L96.33 6.71662C96.3397 6.65983 96.336 6.60176 96.3188 6.54643C96.3017 6.49109 96.2716 6.4398 96.2306 6.3961C96.1896 6.35239 96.1388 6.31731 96.0815 6.29327C96.0242 6.26923 95.9619 6.2568 95.8989 6.25684H93.4914C93.3879 6.25685 93.2876 6.29071 93.209 6.35228C93.1304 6.41385 93.0786 6.49907 93.0629 6.59249"
                                fill="#999999" />
                            <path
                                d="M18.0787 2.04731C16.9519 0.877147 14.9176 0.375977 12.3161 0.375977H4.76614C4.50862 0.376298 4.25964 0.46022 4.0638 0.61271C3.86795 0.765202 3.73803 0.976297 3.6973 1.20819L0.546242 19.3928C0.53045 19.4777 0.535181 19.5647 0.560103 19.6477C0.585025 19.7307 0.629539 19.8078 0.690527 19.8734C0.751515 19.9391 0.827505 19.9919 0.913183 20.028C0.99886 20.0641 1.09215 20.0827 1.18654 20.0825H5.85011L7.02734 13.2937L6.99205 13.5053C7.03172 13.274 7.16074 13.0632 7.35581 12.911C7.55087 12.7589 7.79915 12.6753 8.05584 12.6753H10.2691C14.6226 12.6753 18.0284 11.0661 19.0241 6.39921C19.0543 6.26127 19.0795 6.12793 19.1022 5.99689C19.3972 4.27269 19.1022 3.10022 18.0787 2.03811"
                                fill="#999999" />
                            <path
                                d="M8.28524 6.02907C8.30897 5.89078 8.36937 5.75985 8.46118 5.64767C8.553 5.53549 8.67346 5.44545 8.81211 5.38537C8.93852 5.32919 9.07734 5.30008 9.21796 5.30031H15.1394C15.7925 5.29625 16.4449 5.3393 17.0906 5.42905C17.2619 5.45434 17.4283 5.48423 17.5948 5.51641C17.7612 5.54859 17.9123 5.58538 18.0636 5.62675L18.288 5.68883C18.5702 5.77372 18.8443 5.87985 19.1072 6.00609C19.4022 4.28188 19.1072 3.10942 18.0838 2.04731C16.9569 0.877147 14.9251 0.375977 12.3211 0.375977H4.76614C4.50862 0.376298 4.25964 0.46022 4.0638 0.61271C3.86795 0.765201 3.73803 0.976297 3.6973 1.20819L0.546242 19.3905C0.53045 19.4754 0.535181 19.5624 0.560103 19.6454C0.585025 19.7285 0.629539 19.8055 0.690527 19.8711C0.751515 19.9368 0.827505 19.9896 0.913183 20.0257C0.99886 20.0618 1.09215 20.0804 1.18654 20.0802H5.85011L7.02734 13.2937L8.28524 6.02907Z"
                                fill="#666666" />
                            <path
                                d="M19.1034 6.00635C19.0807 6.13739 19.0555 6.27073 19.0252 6.40866C18.0168 11.0709 14.6238 12.6848 10.2703 12.6848H8.05448C7.79658 12.6852 7.54742 12.77 7.35255 12.9242C7.15769 13.0782 7.03013 13.2912 6.9932 13.5238L5.85881 20.0851L5.53615 21.9449C5.52297 22.0188 5.52758 22.0944 5.54966 22.1664C5.57176 22.2384 5.61079 22.3052 5.66406 22.3621C5.71732 22.419 5.78353 22.4646 5.85808 22.4958C5.93264 22.5269 6.01375 22.5429 6.09578 22.5426H10.0258C10.2506 22.5425 10.4679 22.4692 10.6389 22.3361C10.8098 22.203 10.9231 22.0186 10.9585 21.8162L10.9963 21.6322L11.7374 17.3516L11.7854 17.1218C11.8207 16.9193 11.934 16.7349 12.1049 16.6018C12.2758 16.4686 12.4933 16.3954 12.7181 16.3952H13.3079C17.1144 16.3952 20.094 14.9837 20.9663 10.9054C21.3293 9.20187 21.1402 7.77884 20.1798 6.77879C19.8747 6.46871 19.5099 6.21233 19.1034 6.02244"
                                fill="#999999" />
                            <path
                                d="M18.0613 5.62651C17.91 5.58513 17.7537 5.54835 17.5924 5.51616C17.431 5.48398 17.2646 5.45409 17.0881 5.42881C16.4426 5.33906 15.7902 5.29601 15.137 5.30007H9.22062C9.07999 5.29984 8.94117 5.32894 8.81477 5.38513C8.67612 5.4452 8.55566 5.53525 8.46385 5.64742C8.37203 5.7596 8.31164 5.89053 8.28791 6.02883L7.02748 13.3027L6.99219 13.5141C7.03132 13.2831 7.15982 13.0724 7.35447 12.9201C7.54911 12.768 7.79706 12.6843 8.05347 12.6843H10.2693C14.6228 12.6843 18.0284 11.075 19.0242 6.40816C19.0545 6.27022 19.0797 6.13688 19.1023 6.00584C18.8397 5.87942 18.5656 5.77402 18.2831 5.69088L18.0588 5.62651"
                                fill="#666666" />
                        </g>
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="24" viewBox="0 0 58 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M27.1184 18.4121V11.7442H30.5455C31.9499 11.7442 33.1353 11.2716 34.1016 10.3397L34.3334 10.1034C36.0986 8.17387 35.9826 5.168 34.1016 3.38287C33.161 2.4378 31.8726 1.92588 30.5455 1.95213H25.0439V18.4121H27.1184ZM27.1187 9.72292V3.97372H30.5979C31.3453 3.97372 32.0541 4.26248 32.5824 4.78753C33.7036 5.89012 33.7293 7.72776 32.6469 8.86973C32.1185 9.43415 31.3711 9.74917 30.5979 9.72292H27.1187ZM44.0103 8.02999C43.1212 7.20305 41.9101 6.78302 40.3769 6.78302C38.4056 6.78302 36.924 7.51808 35.9448 8.97507L37.7743 10.1433C38.4443 9.14571 39.3591 8.64692 40.5186 8.64692C41.2531 8.64692 41.9616 8.92256 42.5157 9.42135C43.0569 9.89389 43.366 10.5764 43.366 11.2983V11.784C42.5672 11.3377 41.5623 11.1015 40.3254 11.1015C38.8824 11.1015 37.7228 11.4428 36.8595 12.1384C35.9963 12.8341 35.5582 13.753 35.5582 14.9211C35.5325 15.9843 35.9834 16.9951 36.7822 17.6776C37.5939 18.4127 38.6247 18.7802 39.8358 18.7802C41.2659 18.7802 42.3997 18.137 43.263 16.8507H43.3531V18.4127H45.3373V11.4691C45.3373 10.012 44.8992 8.85693 44.0103 8.02999ZM38.3803 16.3387C37.955 16.0236 37.6973 15.5116 37.6973 14.9604C37.6973 14.3435 37.9808 13.8315 38.5349 13.4246C39.1019 13.0177 39.8106 12.8077 40.6483 12.8077C41.808 12.7946 42.71 13.0571 43.3543 13.5821C43.3543 14.4747 43.0064 15.2492 42.3235 15.9055C41.7048 16.5355 40.8673 16.8899 39.991 16.8899C39.4111 16.903 38.8442 16.7062 38.3803 16.3387ZM49.7948 23.3612L56.7264 7.15057H54.4717L51.2636 15.2362H51.2249L47.9395 7.15057H45.6847L50.2328 17.6907L47.656 23.3612H49.7948Z"
                            fill="#999999" />
                        <path
                            d="M19.9561 10.3007C19.9561 9.6575 19.9046 9.01432 19.8015 8.38428H11.0532V12.0202H16.0651C15.859 13.1884 15.1891 14.2385 14.2098 14.8948V17.2575H17.199C18.9512 15.6167 19.9561 13.1884 19.9561 10.3007Z"
                            fill="#999999" />
                        <path
                            d="M11.054 19.5412C13.5536 19.5412 15.6666 18.7011 17.1998 17.2572L14.2106 14.8945C13.3732 15.4721 12.3038 15.8002 11.054 15.8002C8.63182 15.8002 6.58324 14.1332 5.84884 11.9019H2.76953V14.3432C4.3414 17.5329 7.54955 19.5412 11.054 19.5412Z"
                            fill="#999999" />
                        <path
                            d="M5.8487 11.9022C5.46211 10.734 5.46211 9.46074 5.8487 8.27939V5.85107H2.7689C1.44162 8.51566 1.44162 11.6659 2.7689 14.3305L5.8487 11.9022Z"
                            fill="#999999" />
                        <path
                            d="M11.054 4.38065C12.3811 4.3544 13.6567 4.86632 14.6101 5.79826L17.2642 3.0943C15.5764 1.49292 13.3603 0.61348 11.054 0.639731C7.54955 0.639731 4.3414 2.66114 2.76953 5.85076L5.84884 8.29221C6.58324 6.04766 8.63182 4.38065 11.054 4.38065Z"
                            fill="#999999" />
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="24" viewBox="0 0 52 24" fill="none">
                        <path
                            d="M16.1281 6.75239C15.9415 6.91281 15.7534 7.07176 15.5692 7.23513C14.9177 7.81355 14.4285 8.48616 14.256 9.32508C14.1318 9.87607 14.1361 10.4457 14.2683 10.9951C14.4004 11.5444 14.6575 12.0605 15.022 12.5078C15.3974 12.9854 15.8451 13.3821 16.4408 13.6117C16.5106 13.6382 16.5812 13.6617 16.6666 13.6926C16.5883 13.8906 16.5208 14.0856 16.437 14.2755C15.9517 15.3793 15.3207 16.4007 14.4591 17.2868C14.2962 17.4506 14.1203 17.6026 13.933 17.7415C13.3059 18.2199 12.6004 18.4039 11.8046 18.1831C11.408 18.0742 11.016 17.952 10.6208 17.8379C10.2183 17.7102 9.79883 17.6359 9.37441 17.6172C8.8429 17.6054 8.35528 17.7548 7.8614 17.924C7.49172 18.061 7.11372 18.1772 6.72938 18.2721C6.12339 18.4083 5.57463 18.2331 5.07291 17.9137C4.57915 17.586 4.15396 17.1756 3.81859 16.7032C2.94477 15.5482 2.28849 14.2611 1.87833 12.8979C1.51026 11.6882 1.42179 10.4186 1.61884 9.17422C1.79601 8.06523 2.23659 7.06441 3.066 6.23726C3.92835 5.38067 4.99059 5.02818 6.23393 5.14445C6.85324 5.20185 7.44434 5.37037 8.037 5.53227C8.28394 5.59997 8.53637 5.65075 8.78645 5.71035C9.13666 5.78443 9.50177 5.76739 9.84242 5.66105C10.3308 5.52712 10.8129 5.37478 11.2974 5.24012C12.0104 5.03058 12.7673 4.98813 13.5019 5.11648C14.4677 5.29163 15.2313 5.77879 15.8702 6.46171C15.9486 6.54707 16.0269 6.63391 16.1054 6.72074C16.114 6.73063 16.1215 6.74122 16.1281 6.75239Z"
                            fill="#999999" />
                        <path
                            d="M12.4965 1.16748C12.5172 1.35743 12.5261 1.54835 12.5231 1.73927C12.4567 2.71983 12.0168 3.64524 11.2837 4.34656C10.9489 4.67624 10.5781 4.96545 10.1219 5.13544C9.72995 5.28262 9.31995 5.31058 8.90681 5.33928C8.90054 5.33928 8.89348 5.33266 8.88721 5.32972C8.94601 3.07713 10.1556 1.62006 12.4965 1.16748Z"
                            fill="#999999" />
                        <path
                            d="M21.2866 3.84515C22.5458 3.65298 23.82 3.55969 25.0958 3.56624C27.0556 3.56624 28.4934 3.99453 29.4075 4.76502C30.251 5.45014 30.7527 6.49953 30.7527 7.7822C30.7527 9.08768 30.3419 10.1157 29.5666 10.8649C28.5153 11.915 26.8056 12.4515 24.8669 12.4515C24.2742 12.4515 23.727 12.4301 23.2708 12.3234V18.1032H21.2866V3.84515ZM23.2708 10.8016C23.7035 10.909 24.2515 10.9488 24.9123 10.9488C27.3065 10.9488 28.7662 9.85743 28.7662 7.86609C28.7662 5.96085 27.33 5.04098 25.1404 5.04098C24.2742 5.04098 23.6126 5.105 23.2708 5.18816V10.8016Z"
                            fill="#999999" />
                        <path
                            d="M37.9086 18.102L37.7519 16.7958H37.6836C37.0675 17.6097 35.8806 18.3375 34.308 18.3375C32.0738 18.3375 30.9331 16.8606 30.9331 15.3616C30.9331 12.8595 33.3053 11.4871 37.5692 11.5084V11.2943C37.5692 10.4384 37.3183 8.89671 35.0606 8.89671C34.0344 8.89671 32.9627 9.19695 32.1874 9.66793L31.7312 8.42647C32.6437 7.86939 33.9662 7.50586 35.357 7.50586C38.7326 7.50586 39.5534 9.66793 39.5534 11.7439V15.6162C39.5534 16.5155 39.5988 17.3934 39.7353 18.0998L37.9086 18.102ZM37.6124 12.8146C35.4235 12.7719 32.9377 13.1355 32.9377 15.1474C32.9377 16.3675 33.8039 16.946 34.8308 16.946C36.2671 16.946 37.1827 16.0894 37.4963 15.2122C37.567 15.019 37.6054 14.8167 37.6099 14.6124L37.6124 12.8146Z"
                            fill="#999999" />
                        <path
                            d="M42.2161 7.74219L44.633 13.8641C44.8838 14.5492 45.1575 15.3624 45.3385 15.9835H45.3841C45.5893 15.3624 45.8176 14.5706 46.0895 13.8214L48.2823 7.74219H50.4028L47.3925 15.1269C45.9555 18.6806 44.9756 20.499 43.6068 21.6131C42.6269 22.427 41.647 22.7479 41.1444 22.8332L40.6427 21.2496C41.2854 21.0495 41.8813 20.736 42.3988 20.326C43.127 19.7592 43.7046 19.0409 44.0857 18.228C44.1775 18.0352 44.2426 17.8858 44.2426 17.7784C44.2426 17.6709 44.1971 17.5215 44.1054 17.286L40.0273 7.74219H42.2161Z"
                            fill="#999999" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

</div>