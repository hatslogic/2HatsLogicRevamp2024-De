<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 2HatsLogic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Experience excellence in Web and E-Commerce development services with 2HatsLogic. Our dedicated programmers deliver top-notch solutions for your success.">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Custom Web &amp; E-Commerce Development Services | 2Hats Logic">
	<meta property="og:description" content="Experience excellence in Web and E-Commerce development services with 2HatsLogic. Our dedicated programmers deliver top-notch solutions for your success.">
	<meta property="og:url" content="https://www.2hatslogic.com/">
	<meta property="og:site_name" content="2Hats Logic Solutions - Laravel, Shopware, Magento experts, UX consultants">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/dist/assets/img/2hats-thumbnail.png">
	<meta property="og:image:width" content="484">
	<meta property="og:image:height" content="283">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:description" content="Experience excellence in Web and E-Commerce development services with 2HatsLogic. Our dedicated programmers deliver top-notch solutions for your success.">
	<meta name="twitter:title" content="Custom Web &amp; E-Commerce Development Services | 2Hats Logic">
	<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/dist/assets/img/2hats-thumbnail.png">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/dist/assets/img/cropped-favicon-270x270.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/cropped-favicon-32x32.png" sizes="32x32">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/cropped-favicon-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/cropped-favicon-180x180.png">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/world-map-dot.svg" fetchpriority="high" as="image">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff2" fetchpriority="high" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff2" fetchpriority="high" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/assets/fonts/2HatsIcons/icomoon.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/brand/logo-wide.svg" as="image">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="progress-container w-100 block fixed">
		<span class="progress-bar bg-primary w-0 block" id="progress"></span>
	</div>

	<header class="header z-10 sticky top-0 w-100 h-auto md:bb-0 bg-white pt-20 pb-20 md:pb-0 md:pt-30 md:relative">
		<div class="container">
			<div class="header-inner flex w-100 justify-between align-center">
				<a href="<?php echo home_url(); ?>" class="brand" aria-label="<?php echo get_bloginfo('name'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/brand/logo-wide.svg"
						alt="<?php echo get_bloginfo('name'); ?>" width="106" height="48">
				</a>

				<?php 
				wp_nav_menu( array(
					'menu'   => 'main-menu',
					'theme_location' => 'main-menu',
					'container' => 'nav',
					'container_class' => 'top-menu inline-flex ml-auto mr-0 md:hidden',
					'menu_class' => 'no-bullets font-button flex align-center',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker' => new \MAIN_Menu_Walker(),
				) );
				?>
				
				<a href="#" class="menu-btn inline-flex align-center column hidden sm:visible" aria-label="menu">
					<i class="icomoon icon-hamburger"></i> 
				</a>
			</div>
		</div>
	</header>

	<div class="sticky-menu show transition z-10 hidden md:block w-100 bg-white fixed bottom-0 left-0 right-0">
		<ul class="no-bullets flex align-center justify-center">
			<li class="h-100 w-100">
				<a href="#get-started" class="menu-btn h-100 bg-primary px-30 py-10 w-100 inline-flex align-center row" aria-label="consultation">
					<i class="icomoon icon-consultation"></i> 
					<span class="ml-10">Get a free Consultation</span>
				</a>
			</li>
			<li class="h-100 w-100">
				<a href="#" class="menu-btn h-100 bg-secondary px-30 py-10 w-100 inline-flex align-center row" aria-label="agency">
					<i class="icomoon icon-agency"></i> 
					<span class="ml-10">For Agency Requests</span>
				</a>
			</li>
		</ul>
	</div>