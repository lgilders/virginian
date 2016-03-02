<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">

        <!-- Insert Owl Carousel -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/components/owl-carousel/assets/owl.carousel.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/components/owl-carousel/assets/owl.theme.default.css" type="text/css" charset="utf-8" />

        <!-- Insert Fontfaces -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/components/vendemed/css/vendemed.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/components/scalasansproregular/ScalaSansProRegular.css" type="text/css" charset="utf-8" />

        <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header content-container" role="banner">
		<div class="title-bar" data-responsive-toggle="site-navigation">
            <button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
            <div class="title-bar-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </div>
        </div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">

            <div id="sticky-nav">
                <div id="contact-form" class="height-transition height-transition-hidden">
                    <div class="close-form">X</div>
                    <?php get_template_part( '/parts/contact-form' ); ?>
                    <div class="row">
                        <div class="small-12 centered columns">
                            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="99"]'); ?>
                        </div>
                    </div>
                    <!-- SharpSpring code -->
                    <script type="text/javascript">
                        var ss_noform = ss_noform || [];
                        ss_noform.push(['baseURI', 'https://app-N24YKLWU.marketingautomation.services/webforms/receivePostback/MzQxMze2NAYA/']); ss_noform.push(['endpoint', 'e46627a6-f7c5-49e5-ba87-b090fecb4411']);
                    </script>
                    <script type="text/javascript" src="https://koi-N24YKLWU.marketingautomation.services/client/noform.js?ver=1.24" ></script>
                </div>

                <div id="desktop-menu">
                    <div class="top-bar-right">
                        <?php foundationpress_top_bar_r(); ?>

                        <?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
                            <?php get_template_part( 'parts/mobile-top-bar' ); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php get_template_part( '/parts/logo' ); ?>

                <div class="top-bar-left show-for-medium">
                    <?php foundationpress_top_bar_l(); ?>
                </div>
            </div>

		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' ); ?>
