<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="appleid-signin-client-id" content="[CLIENT_ID]">
	<meta name="appleid-signin-scope" content="[SCOPES]">
	<meta name="appleid-signin-redirect-uri" content="[REDIRECT_URI]">
	<meta name="appleid-signin-state" content="[STATE]">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/reset.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/font.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/product.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/reviews.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/cart.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/woo.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/du.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/hieu.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/reponsive.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/css/account.css">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URL_CHILD; ?>/assets/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URL_CHILD; ?>/assets/slick/slick-theme.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/libraries/fontawesome5/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URL_CHILD; ?>/assets/jquery/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/libraries/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/owl/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL_CHILD; ?>/assets/lightgallery/lightgallery.css">

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

	<?php do_action('flatsome_after_body_open'); ?>
	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#main">
		<?php esc_html_e('Skip to content', 'flatsome'); ?>
	</a>

	<div id="wrapper">

		<?php do_action('flatsome_before_header'); ?>

		<header id="header" class="header <?php flatsome_header_classes(); ?>">
			<div class="header-wrapper">
				<?php get_template_part('template-parts/header/header', 'wrapper'); ?>
			</div>
		</header>

		<?php do_action('flatsome_after_header'); ?>
		<main id="main" class="<?php flatsome_main_classes(); ?>">