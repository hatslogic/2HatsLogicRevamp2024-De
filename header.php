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
	<meta name="description" content="Experience excellence in Web and E-Commerce development services with 2HatsLogic. Our dedicated programmers deliver top-notch solutions for your success.">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Custom Web &amp; E-Commerce Development Services | 2Hats Logic">
	<meta property="og:description" content="Experience excellence in Web and E-Commerce development services with 2HatsLogic. Our dedicated programmers deliver top-notch solutions for your success.">
	<meta property="og:url" content="https://www.2hatslogic.com/">
	<meta property="og:site_name" content="2Hats Logic Solutions - Laravel, Shopware, Magento experts, UX consultants">
	<meta property="og:image" content="<?php echo $get_dir; ?>/dist/assets/img/2hats-thumbnail.png">
	<meta property="og:image:width" content="484">
	<meta property="og:image:height" content="283">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:description" content="Experience excellence in Web and E-Commerce development services with 2HatsLogic. Our dedicated programmers deliver top-notch solutions for your success.">
	<meta name="twitter:title" content="Custom Web &amp; E-Commerce Development Services | 2Hats Logic">
	<meta name="twitter:image" content="<?php echo $get_dir; ?>/dist/assets/img/2hats-thumbnail.png">
	<meta name="msapplication-TileImage" content="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-270x270.png">
	<link rel="icon" href="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-32x32.png" sizes="32x32">
	<link rel="icon" href="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-192x192.png" sizes="192x192">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $get_dir; ?>/dist/assets/img/cropped-favicon-180x180.png">
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff2" fetchpriority="high" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff2" fetchpriority="high" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/img/background/world-map-dot.svg" fetchpriority="high" as="image">
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/fonts/2HatsIcons/icomoon.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg" as="image">
	<style>@font-face {font-family: "TTFirsNeueTrl-Thin";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Thin.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Thin.woff") format("woff");font-display: swap }@font-face {font-family: "TTFirsNeueTrl-Medium";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/TTFirsNeueTrl/TTFirsNeueTrl-Medium.woff") format("woff");font-display: swap }@font-face {font-family: "BasisGrotesquePro-Light";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Light.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Light.woff") format("woff");font-display: swap }@font-face {font-family: "BasisGrotesquePro-Regular";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Regular.woff") format("woff");font-display: swap }@font-face {font-family: "BasisGrotesquePro-Bold";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/BasisGrotesquePro/BasisGrotesquePro-Bold.woff") format("woff");font-display: swap }@font-face {font-family: "PTSerif-Regular";src: url("<?php echo $get_dir; ?>/dist/assets/fonts/PTSerif/PTSerif-Regular.woff2") format("woff2"), url("<?php echo $get_dir; ?>/dist/assets/fonts/PTSerif/PTSerif-Regular.woff") format("woff");font-display: swap }@font-face {font-family: 'icomoon';src: url('<?php echo $get_dir; ?>/dist/assets/fonts/2HatsIcons/icomoon.woff2') format('woff2'), url('<?php echo $get_dir; ?>/dist/assets/fonts/2HatsIcons/icomoon.woff') format('woff');font-weight: normal;font-style: normal;font-display: block;}</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<script> var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>'; </script>

	<div class="progress-container w-100 block fixed">
		<span class="progress-bar bg-primary w-0 block" id="progress"></span>
	</div>

	<header class="header z-12 sticky top-0 w-100 md:bb-0 bg-white md:pb-20 md:pt-20 md:relative">
		<div class="container">
			<div class="header-inner flex w-100 justify-between align-center">
				<a href="<?php echo home_url(); ?>" class="brand" aria-label="<?php echo get_bloginfo('name'); ?>">
					<img src="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg"
						alt="<?php echo get_bloginfo('name'); ?>" class="w-100" width="106" height="48">
				</a>

				<?php 
				wp_nav_menu( array(
					'menu'   => 'main-menu',
					'theme_location' => 'main-menu',
					'container' => 'nav',
					'container_class' => 'top-menu inline-flex ml-auto mr-0 h-px-82 md:hidden md:fixed md:z-12 md:h-100 md:w-100 md:left-0 md:top-0 md:pt-40 md:pb-100 md:pl-20 md:pr-20',
					'menu_class' => 'main-menu no-bullets font-button flex md:column align-center fs-14 xxl:fs-16 lg:fs-15 md:fs-18',
					'items_wrap' => '<button class="btn btn-secondary hidden md:visible absolute md:fixed z-3 top-0 right-0 close" onclick="closeMenu()"> <i class="icomoon icon-close"></i></button><ul id="%1$s" class="%2$s">%3$s</ul> <div class="flex bg-white hidden md:visible md:mt-30 md:fixed bottom-1 w-100 left-0 right-0 px-20">
									<ul class="sub-menu no-bullets font-bold flex align-start b-0 bt-1 solid bc-hash w-100">
										<li class="md:mt-20 md:mb-20">
											<a href="'. home_url() .'/blogs" class="inline-block" aria-label="blog">Blogs</a>
										</li>
										<li class="md:mt-20 md:mb-20 ml-30 pl-30 b-0 bl-1 solid bc-hash">
											<a href="'. home_url() .'/contact" class="inline-block" aria-label="contact">Contact</a>
										</li>
									</ul>
								</div>',
					'walker' => new \MAIN_Menu_Walker(),
				) );
				?>
				
				<a href="#" class="menu-btn fs-32 inline-flex align-center column hidden md:visible" aria-label="menu">
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
	 $sticky_cta_1 = get_field('sticky_cta_1', 'options');
	 $sticky_cta_2 = get_field('sticky_cta_2', 'options');
	 ?>

	 <?php if( $sticky_cta_1 || $sticky_cta_2 ): ?>
	<div class="sticky-menu transition z-10 hidden md:block w-100 bg-white fixed bottom-0 left-0 right-0">
    <ul class="no-bullets flex align-center justify-center">
		<?php if( $sticky_cta_1 ): ?>
        <li class="h-100 w-100">
            <a href="<?php echo $sticky_cta_1['url']; ?>" class="menu-btn h-100 bg-primary px-30 py-10 w-100 inline-flex align-center row" aria-label="consultation">
                <i class="icomoon icon-headphones fs-24"></i> 
                <span class="ml-10 fs-14"><?php echo $sticky_cta_1['title']; ?></span>
            </a>
        </li>
		<?php endif; ?>

		<?php if( $sticky_cta_2 ): ?>
        <li class="h-100 w-100">
            <a href="<?php echo $sticky_cta_2['url']; ?>" class="menu-btn h-100 bg-secondary px-30 py-10 w-100 inline-flex align-center row" aria-label="agency">
                <i class="icomoon icon-handshake fs-24"></i> 
                <span class="ml-10 fs-14"><?php echo $sticky_cta_2['title']; ?></span>
            </a>
        </li>
		<?php endif; ?>
    </ul>
</div>
<?php endif; ?>