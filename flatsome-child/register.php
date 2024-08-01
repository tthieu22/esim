<?php
// function that runs when shortcode is called
function wpb_register_shortcode()
{ ?>

    <?php if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $current_user = wp_get_current_user();
        $profile_url = get_author_posts_url($user_id);
        $edit_profile_url = get_edit_profile_url($user_id);
        $logout_url = esc_url(wp_logout_url(home_url())); // Corrected logout URL?>
        <div class="regted">
            You are logged in with the username <a href="<?php echo $profile_url ?>">
                <?php echo $current_user->display_name; ?>
            </a> Would you like to <a href="<?php echo $logout_url; ?>">Log out</a>?
        </div>
    <?php } else { ?>
        <div class="register-esim">
            <?php $err = '';
            $success = '';
            global $wpdb, $PasswordHash, $current_user, $user_ID;
            if (isset($_POST['task']) && $_POST['task'] == 'register') {
                $pwd1 = $wpdb->_escape(trim($_POST['pwd1']));
                $pwd2 = $wpdb->_escape(trim($_POST['pwd2']));
                $email = $wpdb->_escape(trim($_POST['email']));
                $username = $wpdb->_escape(trim($_POST['username']));

                if ($email == "" || $pwd1 == "" || $pwd2 == "" || $username == "") {
                    $err = 'Please do not leave mandatory fields empty!';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $err = 'Invalid email address!';
                } else if (email_exists($email)) {
                    $err = 'Email address already exists!';
                } else if ($pwd1 <> $pwd2) {
                    $err = 'The two passwords do not match!';
                } else {
                    $user_id = wp_insert_user(array('user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber'));
                    if (is_wp_error($user_id)) {
                        $err = 'Error on user creation.';
                    } else {
                        do_action('user_register', $user_id);
                        $success = 'You have successfully registered!';
                    }
                }
            }
            ?>
            <!--display error/success message-->
            <div id="message">
                <?php
                if (!empty($err)):
                    echo '' . $err . '';
                endif;
                ?>
                <?php
                if (!empty($success)):
                    $login_page = home_url('/login'); ?>
                    <div class="pop-up-register-success">
                        <div class="d-flex items-center gap-2 login-title-wrap flex-column pop-up-register-info">
                            <h4 class="login-title">Account verification</h4>
                            <p>Hello
                                <?php echo $username; ?>! You can now access your account information
                            </p>
                        </div>
                        <div>
                            <a href="<?php echo $login_page; ?>"> <button type="submit"
                                    class="lc-text woocommerce-button button woocommerce-form-login__submit">Login</button> </a>
                        </div>
                    </div>

                    <script>
                        jQuery(document).ready(function ($) {
                            $('#register-value').hide();
                        });
                    </script>

                <?php endif;
                ?>
            </div>
            <div id="register-value">
                <ul class="acount-login-tab">
                    <li>
                        <span> <a href="<?php echo get_bloginfo('url') . '/login' ?>">Sign in </a></span>
                    </li>
                    <li class="active">
                        <span> <a href="<?php echo get_bloginfo('url') . '/register' ?>">Sign up </a></span>
                    </li>
                </ul>
                <div class="d-flex items-center gap-2 login-title-wrap">
                    <h4 class="login-title">CREATE A NEW ACCOUNT</h4>
                </div>
                <form class="form-horizontal woocommerce-form woocommerce-form-login login form-login-custom" method="post"
                    role="form">

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide lc-text">
                        <label for="username">
                            <?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                        </label>
                        <input class="woocommerce-Input outline-none  woocommerce-Input--text input-text" type="text"
                            name="username" id="username" autocomplete="current-password" />
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide lc-text">
                        <label for="email">
                            <?php esc_html_e('Email', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                        </label>
                        <input class="woocommerce-Input outline-none  woocommerce-Input--text input-text" type="email"
                            name="email" id="email" autocomplete="current-password" />
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide lc-text">
                        <label for="password">
                            <?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                        </label>
                        <input class="woocommerce-Input outline-none  woocommerce-Input--text input-text" type="password"
                            name="pwd1" id="pwd1" autocomplete="current-password" />
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide lc-text">
                        <label for="password">
                            <?php esc_html_e('Re-type Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                        </label>
                        <input class="woocommerce-Input outline-none  woocommerce-Input--text input-text" type="password"
                            name="pwd2" id="pwd2 " autocomplete="current-password" />
                    </p>

                    <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                    <div class="form-group">
                        <button type="submit" class="lc-text woocommerce-button button woocommerce-form-login__submit">Sign
                            up</button>
                        <input type="hidden" name="task" value="register" />
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
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
// register shortcode

add_shortcode('esim_register', 'wpb_register_shortcode');
?>