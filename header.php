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

	<header id="masthead" class="site-header" role="banner">
		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="offCanvas"></button>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
            <div id="contact-form" class="height-transition height-transition-hidden">
                <?php get_template_part( '/parts/contact-form' ); ?>

                <!-- SharpSpring Form for Contact  -->
                <script type="text/javascript">
                    var ss_form = {'account': 'MzQxMze2NAYA', 'formID': 'MzI0S0w1NTbUTTGxMNA1STQ10000SDXVNbc0SE0zs0iysDRKAgA'};
                    ss_form.width = '100%';
                    ss_form.height = '1000';
                    ss_form.domain = 'app-N24YKLWU.marketingautomation.services';
                    ss_form.hidden = {'_usePlaceholders' : true}; // Modify this for sending hidden variables, or overriding values
                </script>
                <script type="text/javascript" src="https://koi-N24YKLWU.marketingautomation.services/client/form.js?ver=1.1.1"></script>
            </div>

            <div class="small-12 medium-6 large-6 search-form">
                <?php get_search_form(); ?>
            </div>

            <?php get_template_part( '/parts/social-media' ); ?>

			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'parts/mobile-top-bar' ); ?>

                    <div id="contact-form-mobile">
                        <?php get_template_part( '/parts/contact-form' ); ?>

                        <!-- SharpSpring Form for Contact  -->
                        <script type="text/javascript">
                            var ss_form = {'account': 'MzQxMze2NAYA', 'formID': 'MzI0S0w1NTbUTTGxMNA1STQ10000SDXVNbc0SE0zs0iysDRKAgA'};
                            ss_form.width = '100%';
                            ss_form.height = '1000';
                            ss_form.domain = 'app-N24YKLWU.marketingautomation.services';
                            ss_form.hidden = {'_usePlaceholders' : true}; // Modify this for sending hidden variables, or overriding values
                        </script>
                        <script type="text/javascript" src="https://koi-N24YKLWU.marketingautomation.services/client/form.js?ver=1.1.1"></script>
                    </div>

                    <div id="social-media-mobile">
                        <?php get_template_part( '/parts/social-media' ); ?>
                    </div>
				<?php endif; ?>
			</div>

            <?php get_template_part( '/parts/logo' ); ?>

			<div class="top-bar-left show-for-medium">
				<?php foundationpress_top_bar_l(); ?>
			</div>
		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' ); ?>

        <?php get_template_part( '/parts/logo-mobile' ); ?>
