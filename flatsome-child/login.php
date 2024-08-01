<?php
/**
 * Login form
 */

function esimwise_login_page()
{
    if (is_user_logged_in()):
        ?>
        <p class="hidden redirect_url">
            <?php $redirect_url = get_bloginfo('url') . '/my-account';
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
        <?php
    else:
        ?>
        <div class="account-login-inner">
            <ul class="acount-login-tab">
                <li class="active">
                    <span> <a href="<?php echo get_bloginfo('url') . '/login' ?>">Sign in </a></span>
                </li>
                <li>
                    <span> <a href="<?php echo get_bloginfo('url') . '/register' ?>">Sign up </a></span>
                </li>
            </ul>
            <div class="d-flex items-center gap-2 login-title-wrap">
                <h4 class="login-title">WELCOME BACK!</h4>
            </div>

            <form class="woocommerce-form woocommerce-form-login login form-login-custom" method="post">

                <?php do_action('woocommerce_login_form_start'); ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide lc-text">
                    <label for="username">
                        <?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                    </label>
                    <input type="text" class="woocommerce-Input outline-none  woocommerce-Input--text input-text"
                        name="username" id="username" autocomplete="username"
                        value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
                    <?php // @codingStandardsIgnoreLine 
                            ?>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide lc-text">
                    <label for="password">
                        <?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                    </label>
                    <input class="woocommerce-Input outline-none  woocommerce-Input--text input-text" type="password"
                        name="password" id="password" autocomplete="current-password" />
                </p>

                <?php do_action('woocommerce_login_form'); ?>

                <div class="footer-login-1">
                    <p class="form-row lc-text footer-login-1-remember">
                        <label
                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                            <input class="woocommerce-form__input outline-none  woocommerce-form__input-checkbox"
                                name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>
                                <?php esc_html_e('Remember me', 'woocommerce'); ?>
                            </span>
                        </label>
                    </p>
                    <p class="woocommerce-LostPassword lost_password lc-text">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">
                            <?php esc_html_e('Lost your password?', 'woocommerce'); ?>
                        </a>
                    </p>
                </div>

                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <button type="submit" class=" lc-text woocommerce-button button woocommerce-form-login__submit disabled<?php if (fl_woocommerce_version_check('7.0.1')) {
                    echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '');
                } ?>" name="login" disabled value="<?php esc_attr_e('Log in', 'woocommerce'); ?>">
                    <?php esc_html_e('Log in', 'woocommerce'); ?>
                </button>

                <?php do_action('woocommerce_login_form_end'); ?>
                <div class="dont-have-acc text-center">
                    <span>Don't have an account? <a href="<?php echo get_bloginfo('url') . '/register' ?>">Sign up </a> </span>
                </div>
                <div class="flex flex-row items-center others-login-line">
                    <div class="bg-neutral-400 rounded-[1px] h-0 border-b w-full line"></div>
                    <p class=" text-center w-full lc-text">OR</p>
                    <div class="bg-neutral-400 rounded-[1px] h-0 border-b w-full line"></div>
                </div>
                <div class="others_login flex flex-row gap-2">
                    <div class="w-full container_hbutton apple">
                        <button data-testid="hbutton"
                            class="h-btn lc-text  rounded-xl px-5 py-3 border-3 flex items-center justify-center transition-all duration-300 h-btn w-full font-medium text-base text-neutral-charcoal"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                                <path
                                    d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z" />
                            </svg><a href="https://tkwmhdu.one/wp-login.php?loginSocial=facebook" data-plugin="nsl"
                                data-action="connect" data-redirect="current" data-provider="facebook" data-popupwidth="600"
                                data-popupheight="679">
                                Facebook
                            </a></button>
                    </div>
                    <div class="w-full container_hbutton google">
                        <a href="http://tkwmhdu.one/wp-login.php?loginSocial=google" data-plugin="nsl" data-action="connect"
                            data-redirect="current" data-provider="google" data-popupwidth="600" data-popupheight="600">
                            <button data-testid="hbutton"
                                class="h-btn lc-text rounded-xl px-5 py-3 border-3 flex items-center justify-center transition-all duration-300 h-btn w-full font-medium text-base text-neutral-charcoal"><svg
                                    viewBox="0 0 24 24" role="presentation" data-testid="icon"
                                    class="mr-2 text-primary-black w-full h-full" style="width: 1.2rem; height: 1.2rem;">
                                    <path
                                        d="M21.35,11.1H12.18V13.83H18.69C18.36,17.64 15.19,19.27 12.19,19.27C8.36,19.27 5,16.25 5,12C5,7.9 8.2,4.73 12.2,4.73C15.29,4.73 17.1,6.7 17.1,6.7L19,4.72C19,4.72 16.56,2 12.1,2C6.42,2 2.03,6.8 2.03,12C2.03,17.05 6.16,22 12.25,22C17.6,22 21.5,18.33 21.5,12.91C21.5,11.76 21.35,11.1 21.35,11.1V11.1Z"
                                        style="fill: currentcolor;"></path>
                                </svg><a href="https://tkwmhdu.one/wp-login.php?loginSocial=google" data-plugin="nsl"
                                    data-action="connect" data-redirect="current" data-provider="google" data-popupwidth="600"
                                    data-popupheight="600">
                                    Google
                                </a></button>
                        </a>
                    </div>
                </div>
            </form>

            <script>
                jQuery(document).ready(function ($) {
                    var checkInput = (e) => {
                        const content = $("#username").val().trim();
                        console.log(content);
                        $('.woocommerce-form-login__submit').prop('disabled', content === '');
                        $('.woocommerce-form-login__submit').toggleClass('disabled', content === '');
                    };


                    $(document).on('keyup', '#username', checkInput);
                });
            </script>
        </div>
        <?php
    endif; ?>
    <div id="cookie-consent" class="cookie-banner">
        <div class="container">
            <div class="cookie-content">
                <div class="cookie-text">
                    THIS WEBSITE USES COOKIES TO ENSURE YOU GET THE BEST EXPERIENCE ON OUR WEBSITE. <a
                        href="/privacy-policy">PRIVACY POLICY</a>
                </div>
                <div>
                    <button id="accept-cookies"
                        class="cookie-button lc-text woocommerce-button button woocommerce-form-login__submit">Accept</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cookieBanner = document.getElementById("cookie-consent");
            const acceptButton = document.getElementById("accept-cookies");

            // Check if the user has previously accepted the cookies
            const hasAcceptedCookies = localStorage.getItem("cookiesAccepted");

            if (!hasAcceptedCookies) {
                // Show the banner if the user hasn't accepted cookies
                cookieBanner.style.display = "block";
            }

            // Add click event listener to the "Accept" button
            acceptButton.addEventListener("click", function () {
                // Set a cookie to remember the user's choice for 30 days
                localStorage.setItem("cookiesAccepted", "true");

                // Hide the banner
                cookieBanner.style.display = "none";
            });
        });
    </script>
<?php }
add_shortcode('esimwise-login-page', 'esimwise_login_page');
?>