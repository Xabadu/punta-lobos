<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<!-- Mobile menu -->
		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div>

		<!-- Desktop menu -->
		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home lang-selector-title"><a href="<?php echo pll_home_url('en_US'); ?>">ENGLISH</a> <span>/</span> <a href="<?php echo pll_home_url('es_ES'); ?>">SPANISH</a></li>
				</ul>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
		<div id="donate-link">
			<?php if(pll_current_language() == 'en') : ?>
				<a class="don-en-l" href="#">DONATE NOW</a>
			<?php else : ?>
				<a href="#">DONA HOY</a>
			<?php endif; ?>
		</div>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
			putRevSlider("home"); ?>
			<?php if(!is_front_page()) : ?>
				<div id="arrow-down" class="text-center">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/flecha-down.gif">
				</div>
				<div id="slider-info">
					<div id="slider-icons" class="float-left">
						<a href="http://instagram.com/<?php echo get_option("los_lobos_instagram_user"); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="http://facebook.com/<?php echo get_option("los_lobos_facebook_user"); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
					<div id="slider-author" class="float-right">
						<p id="slider-author-name"></p>
					</div>
				</div>
			<?php else : ?>
				<div id="slider-info-home">
					<div id="slider-icons" class="float-left">
						<a href="http://instagram.com/<?php echo get_option("los_lobos_instagram_user"); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="http://facebook.com/<?php echo get_option("los_lobos_facebook_user"); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
					<div id="slider-author" class="float-right">
						<p id="slider-author-name"></p>
					</div>
				</div>
			<?php endif; ?>
		<?php
