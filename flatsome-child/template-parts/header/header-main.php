<?php
/**
 * Header main.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<div id="masthead" class="header-main <?php header_inner_class('main'); ?>">
  <div class="header-inner flex-row container <?php flatsome_logo_position(); ?>" role="navigation">

    <!-- Logo -->
    <div id="logo" class="flex-col logo">
      <?php get_template_part('template-parts/header/partials/element', 'logo'); ?>
    </div>

    <!-- Mobile Left Elements -->
    <div class="flex-col show-for-medium flex-left">
      <ul class="mobile-nav nav nav-left <?php flatsome_nav_classes('main-mobile'); ?>">
        <?php flatsome_header_elements('header_mobile_elements_left', 'mobile'); ?>
      </ul>
    </div>

    <!-- Left Elements -->
    <div class="flex-col hide-for-medium flex-left
            <?php if (get_theme_mod('logo_position', 'left') == 'left')
              echo 'flex-grow'; ?>">
      <ul class="header-nav header-nav-main nav nav-left <?php flatsome_nav_classes('main'); ?>">
        <?php flatsome_header_elements('header_elements_left'); ?>
      </ul>
    </div>

    <!-- Right Elements -->
    <div class="flex-col hide-for-medium flex-right">
      <ul class="header-nav header-nav-main nav nav-right <?php flatsome_nav_classes('main'); ?>">
        <?php flatsome_header_elements('header_elements_right'); ?>
        <div class="header-cart">
          <div class="cart-link">
            <div>
              <img src="<?php echo THEME_URL_CHILD; ?>/images/cart.svg" />
              <span id="cart-total">
                <?php echo WC()->cart->get_cart_contents_count(); ?>
              </span>
            </div>
          </div>
          <div class="shopping-cart-menu-wrapper">
            <div class="cart-heading">
              <h3 class="cart-title">Cart</h3>
              <span class="close-side-cart"><img src="<?php echo THEME_URL_CHILD; ?>/images/up.svg" /></span>
            </div>
            <div class="cart-body">
              <?php echo woocommerce_mini_cart(); ?>
            </div>
          </div>
        </div>
        <div class="login-header">
          <?php if (is_user_logged_in()) { ?>
            <a class="profile" href="/my-account" target="_blank">
              <img src="<?php echo THEME_URL_CHILD; ?>/assets/images/userprofile.png">
            </a>
          <?php } else { ?>
            <a class="login-customer" href="/login" target="_blank">Login</a>
          <?php } ?>
        </div>
      </ul>
    </div>

    <!-- Mobile Right Elements -->
    <div class="flex-col show-for-medium flex-right">
      <ul class="mobile-nav nav nav-right <?php flatsome_nav_classes('main-mobile'); ?>">
        <?php flatsome_header_elements('header_mobile_elements_right', 'mobile'); ?>
      </ul>
      <div class="header-cart">
        <div class="login-header">
          <?php if (is_user_logged_in()) { ?>
            <a class="profile" href="/my-account" target="_blank">
              <img src="<?php echo THEME_URL_CHILD; ?>/assets/images/userprofile.png">
            </a>
          <?php } else { ?>
          <?php } ?>
        </div>
        <div class="cart-link">
          <div>
            <img src="<?php echo THEME_URL_CHILD; ?>/images/cart.svg" />
            <span id="cart-total">
              <?php echo WC()->cart->get_cart_contents_count(); ?>
            </span>
          </div>
        </div>
        <div class="shopping-cart-menu-wrapper">
          <div class="cart-heading">
            <h3 class="cart-title">Cart</h3>
            <span class="close-side-cart"><img src="<?php echo THEME_URL_CHILD; ?>/images/up.svg" /></span>
          </div>
          <div class="cart-body">
            <?php echo woocommerce_mini_cart(); ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php if (get_theme_mod('header_divider', 1)) { ?>
    <div class="container">
      <div class="top-divider full-width"></div>
    </div>
  <?php } ?>
</div>
<div class="overlay-cart"></div>