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

  $get_dir = get_template_directory_uri();
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="u1BOfAhFqe0jJD_eAKvMNowWGV-UywRXnASwMZGBuUA" />
	<meta name="msapplication-TileImage" content="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-270x270.png">
	<link rel="icon" href="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-32x32.png" sizes="32x32">
	<link rel="icon" href="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-180x180.png">
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff2" fetchpriority="high" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff2" fetchpriority="high" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff2" as="font" type="font/woff2" crossorigin>

	<!-- only for homepage -->
	<?php if(is_front_page()): ?>
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/img/background/world-map-dot.svg" fetchpriority="high" as="image">
	<?php endif; ?>
	
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/2HatsIcons/icomoon.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg" as="image">
	<style>@font-face {font-family: "TTFirsNeueTrl-Thin";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Thin.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Thin.woff") format("woff");font-display: swap }@font-face {font-family: "TTFirsNeueTrl-Medium";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff") format("woff");font-display: swap }@font-face {font-family: "BasisGrotesquePro-Light";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Light.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Light.woff") format("woff");font-display: swap }@font-face {font-family: "BasisGrotesquePro-Regular";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff") format("woff");font-display: swap }@font-face {font-family: "BasisGrotesquePro-Bold";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff") format("woff");font-display: swap }@font-face {font-family: "PTSerif-Regular";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/PTSerif/PTSerif-Regular.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/PTSerif/PTSerif-Regular.woff") format("woff");font-display: swap }@font-face {font-family: 'icomoon';src: url('<?php echo $get_dir; ?>/dist/assets/fonts/2HatsIcons/icomoon.woff2') format('woff2'), url('<?php echo $get_dir; ?>/dist/assets/fonts/2HatsIcons/icomoon.woff') format('woff');font-weight: normal;font-style: normal;font-display: block;}</style>

	<?php if(is_page_template('templates/template-shopware-migration.php')): ?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg2x.webp 2x"  type="image/webp" media="(min-width: 768px)">
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg-mobile.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg-mobile.webp 2x"  type="image/webp" media="(max-width: 767px)">
	<?php endif; ?>

	<?php if(is_page_template('templates/template-hire-developer.php')): ?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg2x.webp 2x"  type="image/webp" media="(min-width: 768px)">
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg-mobile.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg-mobile.webp 2x"  type="image/webp" media="(max-width: 767px)">
	<?php endif; ?>

	<?php if(is_page_template('templates/template-shopware-agency.php') || is_page_template('templates/template-agency.php')): ?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg2x.webp 2x"  type="image/webp" media="(min-width: 768px)">
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg-mobile.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/shopware-bg-mobile.webp 2x"  type="image/webp" media="(max-width: 767px)">
	<?php endif; ?>

	<?php if(is_page_template('templates/template-services.php')): ?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-bg.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-bg2x.webp 2x"  type="image/webp" media="(min-width: 768px)">
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-bg-mobile.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-bg-mobile.webp 2x"  type="image/webp" media="(max-width: 767px)">
	<?php endif; ?>

	<?php if(is_post_type_archive('post') || is_singular('post')): ?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.webp 2x"  type="image/webp" media="(min-width: 768px)">
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 2x"  type="image/webp" media="(max-width: 767px)">
	<?php endif; ?>

	<?php if(is_post_type_archive('case-study')): ?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg2x.webp 2x"  type="image/webp" media="(min-width: 768px)">
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.webp" imagesrcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.webp 2x"  type="image/webp" media="(max-width: 767px)">
	<?php endif; ?>

	<?php wp_head(); ?>
	<script>
		partytown = {
			debug: false,
			forward: ['dataLayer.push', 'gtag'],
			apply: ['document', 'document.open', 'document.write', 'document.close'],
			resolveUrl: function (url, location, type) {
				if (type === 'script') {
					if (url.href.includes('googletagmanager.com/gtm.js')) {
						return new URL('https://www.2hatslogic.de/gtm-proxy/gtm.js?id=GTM-M3ZKTW86');
					} else if (url.href.includes('googletagmanager.com/gtag/js')) {
						return new URL('https://www.2hatslogic.de/gtm-proxy/gtag/js?id=G-PCNVL4LFXV');
					} else if (url.href.includes('googletagmanager.com/debug/bootstrap')) {
						return new URL('https://www.2hatslogic.de/gtm-proxy/debug/bootstrap?id=GTM-M3ZKTW86');
					} else if (url.href.includes('connect.facebook.net/en_US/fbevents.js')) {
						return new URL('https://www.2hatslogic.de/fb-proxy/fbevents.js');
					} else if (url.href.includes('googleads.g.doubleclick.net/pagead/viewthroughconversion')) {
						return new URL('https://www.2hatslogic.de/google-ads-proxy/pagead/viewthroughconversion' + url.search);
					} else if (url.href.includes('https://www.google-analytics.com/collect')) {
						return new URL('https://www.2hatslogic.de/ga-proxy/collect' + url.search);
					} else if (url.href.includes('connect.facebook.net/signals/config')) {
						return new URL('https://www.2hatslogic.de/fb-proxy/signals/config' + url.search);
					}
				}
				return url;
			}
		};
  	</script>
	<script src="/~partytown/partytown.js"></script>
	<?php echo $gtm_head = get_field('gtm_head', 'options') ?? ''; ?>
	
	<?php
	if ( function_exists('get_field') ) {
		//Schema code
		$schemaCode = '';
		if (get_field('schema_code', get_the_ID())) {
			$schemaCode = get_field('schema_code', get_the_ID(), false, false);
		}
		if (get_field('schema', get_the_ID())) {
			$schemaCode = get_field('schema', get_the_ID(), false, false);
		}
		echo $schemaCode;

		// Page specific hreflang
		if (get_field('hreflang', get_the_ID())) {
			echo get_field('hreflang', get_the_ID(), false, false);
		}
	}
	?>
</head>

<body <?php body_class(); ?>>
	<?php echo $gtm_body= get_field('gtm_body', 'options') ?? ''; ?>
	
	<?php wp_body_open(); ?>
	<script> var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>'; </script>

	<div class="progress-container w-100 block fixed">
		<span class="progress-bar bg-primary w-0 block" id="progress"></span>
	</div>

	<header class="header transition z-12 sticky top-0 w-100 md:bb-0 bg-white md:pb-20 md:pt-20">
		<div class="container">
			<div class="header-inner flex w-100 justify-between align-center">
				<a href="<?php echo home_url(); ?>" class="brand w-100 max-w-px-106 max-h-px-48" aria-label="<?php echo get_bloginfo('name'); ?>">
					<img src="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg"
						alt="<?php echo get_bloginfo('name'); ?>" class="w-100 w-100 max-w-px-106 max-h-px-48" width="106" height="48">
				</a>

				<?php 
				wp_nav_menu( array(
					'menu'   => 'main-menu',
					'theme_location' => 'main-menu',
					'container' => 'nav',
					'container_class' => 'top-menu transition block ml-auto mr-0 h-px-82 md:fixed md:z-12 md:h-100 md:w-100 md:left-0 md:top-0 md:pt-140 md:pb-100 md:pl-20 md:pr-20',
					'menu_class' => 'main-menu no-bullets font-button flex md:column align-center fs-14 xxl:fs-16 lg:fs-15 md:fs-18',
					'items_wrap' => '<a href="#" class="hidden md:visible brand w-100 max-w-px-106 max-h-px-48 absolute left-20 top-20" aria-label="2hatslogic"><img src="'.$get_dir.'/dist/assets/img/brand/logo-wide.svg" alt="'.get_bloginfo('name').'" class="w-100 w-100 max-w-px-106 max-h-px-48" width="106" height="48"> </a><button class="btn btn-secondary hidden md:visible absolute md:fixed z-3 top-20 right-20 close" onclick="closeMenu()"> <i class="icomoon icon-close"></i></button><ul id="%1$s" class="%2$s">%3$s</ul> <div class="flex bg-white hidden md:visible md:mt-30 md:fixed bottom-1 w-100 left-0 right-0 px-20">
									<ul class="sub-menu no-bullets font-bold flex align-start b-0 bt-1 solid bc-hash w-100">
										<li class="md:mt-20 md:mb-20">
											<a href="'. home_url() .'/blog" class="inline-block" aria-label="blog">Blogs</a>
										</li>
										<li class="md:mt-20 md:mb-20 ml-30 pl-30 b-0 bl-1 solid bc-hash">
											<a href="'. home_url() .'/kontakt" class="inline-block" aria-label="contact">Kontakt</a>
										</li>
									</ul>
								</div>',
					'walker' => new \MAIN_Menu_Walker(),
				) );
				?>
				
				<a href="#" class="menu-btn fs-34 inline-flex align-center column hidden md:visible relative top-3" aria-label="menu">
					<i class="icomoon icon-menu"></i> 
				</a>
				<?php 
				$header_cta_label = get_field('header_cta_label', 'options');
				$header_cta_link  = get_field('header_cta_link', 'options');
				?>
				<?php if($header_cta_label): ?>
				<a href="<?php echo $header_cta_link ?:'#' ?>" class="btn btn-primary ml-40 xl:ml-30 sm:inline-flex md:hidden"><?php echo $header_cta_label; ?></a>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<?php
	$enable_sticky_cta = get_field('enable_sticky_cta', 'options');
	$stick_button_title = get_field('stick_button_title', 'options');
	$stick_button_select_modal = get_field('stick_button_select_modal', 'options');
	?>

	<?php if( $enable_sticky_cta ): ?>
	<button onclick="openModal('<?php echo $stick_button_select_modal; ?>')"
	class="bubble-menu b-0 bg-transparent p-0 hidden md:block transition fixed right-20 bottom-30 z-10"
	aria-label="free consultation">
		<div
			class="inner p-7 flex align-center justify-center relative text-center shadow z-1 column radius-50 h-px-80  w-px-80 c-white bg-primary">
			<i class="icomoon icon-chat fs-24 absolute z-1 h-100 w-100 flex align-center justify-center"></i>
			<svg viewBox="0 0 100 100" class="rotating uppercase" xmlns="http://www.w3.org/2000/svg">
			<path id="circlePath" d="
					M 10, 50
					a 40,40 0 1,1 80,0
					40,40 0 1,1 -80,0
					" fill="none" />
			<text class="fs-15 font-bold" fill="currentColor">
				<textPath href="#circlePath" textLength="255"><?php echo $stick_button_title; ?></textPath>
			</text>
			</svg>
		</div>
		<div class="bubble-overlay absolute top-0 bottom-0 left-0 right-0 z-0 radius-50 block h-100 w-100"></div>
		<div class="bubble-overlay-2 absolute top-0 bottom-0 left-0 right-0 z-0 radius-50 block h-100 w-100"></div>
		<div class="bubble-overlay-3 absolute top-0 bottom-0 left-0 right-0 z-0 radius-50 block h-100 w-100"></div>
	</button>
	<?php endif; ?>
