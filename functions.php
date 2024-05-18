<?php
/**
 * 2HatsLogic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 2HatsLogic
 */

 define( 'APP_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function my_acf_add_local_field_groups() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'my_acf_add_local_field_groups');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hatslogic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on 2HatsLogic, use a find and replace
		* to change 'hatslogic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'hatslogic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'hatslogic_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'hatslogic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hatslogic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hatslogic_content_width', 640 );
}
add_action( 'after_setup_theme', 'hatslogic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hatslogic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hatslogic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hatslogic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hatslogic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hatslogic_scripts() {
	wp_enqueue_style( 'hatslogic-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_enqueue_style( 'hatslogic-plugins', get_template_directory_uri() . '/dist/assets/css/plugins.min.css', array(), _S_VERSION );
	// wp_enqueue_style( 'hatslogic-app-app', get_template_directory_uri() . '/dist/assets/css/app.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'hatslogic-app-main', get_template_directory_uri() . '/dist/assets/css/main.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'hatslogic-wp-main', get_template_directory_uri() . '/dist/assets/css/wp.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'hatslogic-main', get_template_directory_uri() . '/dist/assets/js/main.min.js', array(), _S_VERSION, array(
        'in_footer' => true,
        'strategy'  => 'async',
    ));

	/*
	wp_enqueue_script( 'hatslogic-plugins', get_template_directory_uri() . '/dist/assets/js/plugins.min.js', array(), _S_VERSION, array(
        'in_footer' => true,
        'strategy'  => 'async',
    ));

	wp_enqueue_script( 'hatslogic-app', get_template_directory_uri() . '/dist/assets/js/app.min.js', array(), _S_VERSION, array(
        'in_footer' => true,
        'strategy'  => 'async',
    ));
	*/

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hatslogic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Disable gutenberg block editor
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

# Register Sidebars
# Note: In a child theme with custom app_setup_theme() this function is not hooked to widgets_init
function app_widgets_init() {
	$sidebar_options = array_merge( app_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'app' ),
		'id'   => 'default-sidebar',
	) );

	register_sidebar( $sidebar_options );
}

function app_excerpt_more() {
	return '...';
}

function app_excerpt_length() {
	return 55;
}



# Sidebar Options
function app_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

add_action( 'after_setup_theme', 'app_setup_theme' );

# To override theme setup process in a child theme, add your own app_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'app_setup_theme' ) ) {
	function app_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'app', get_template_directory() . '/languages' );

		$autoload_dir = APP_THEME_DIR . 'lib/autoload.php';
		include_once( $autoload_dir );

		# Autoload dependencies
		$autoload_dir = APP_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'app' ) );
		}
		include_once( $autoload_dir );

		# Additional libraries and includes
		include_once( APP_THEME_DIR . 'includes/admin-login.php' );
		include_once( APP_THEME_DIR . 'includes/comments.php' );
		include_once( APP_THEME_DIR . 'includes/title.php' );
		include_once( APP_THEME_DIR . 'includes/gravity-forms.php' );
		include_once( APP_THEME_DIR . 'includes/helpers.php' );
		include_once( APP_THEME_DIR . 'includes/hooks.php' );
		include_once( APP_THEME_DIR . 'includes/acf.php' );

		// Custom Blocks
		// include_once( APP_THEME_DIR . 'options/acf-blocks.php' );

		// Custom Post Types
		include_once( APP_THEME_DIR . 'options/post-types.php' );

		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		register_nav_menus( array(
			'main-menu' => __( 'Main Menu', 'app' ),
			'service-menu' => __( 'Services', 'app' ),
			'web-ecommerce-menu' => __( 'Web & E-commerce Development', 'app' ),
			'hide-developer-menu' => __( 'Hire a Developer', 'app' ),
			'company-menu' => __( 'Company', 'app' ),
			'quick-links-menu' => __( 'Quick Links', 'app' ),
		) );

		# Attach custom shortcodes
		include_once( APP_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'app_widgets_init' );

		# Add Filters
		add_filter( 'excerpt_more', 'app_excerpt_more' );
		add_filter( 'excerpt_length', 'app_excerpt_length', 999 );
		add_filter( 'app_theme_favicon_uri', function() {
			return get_template_directory_uri() . '/dist/assets/img/cropped-favicon-32x32.png';
		} );

		# Image sizes
		add_image_size( 'img_494x328', 494, 328, true );
		add_image_size( 'img_450x350', 450, 350, true );
		add_image_size( 'img_360x280', 360, 280, true );
		add_image_size( 'img_304x218', 304, 218, true );
		add_image_size( 'img_350x250', 350, 250, true );
		add_image_size( 'img_450x235', 450, 235, true );
		add_image_size( 'img_652x874', 652, 874, true );

		add_image_size( 'img_1200x862', 1200, 862, true );
		add_image_size( 'img_1060x762', 1060, 762, true );
		add_image_size( 'img_812x744', 812, 744, true );
		add_image_size( 'img_1075x716', 1075, 716, true );
		add_image_size( 'img_865x576', 865, 576, true );
		add_image_size( 'img_580x580', 580, 580, true );
		add_image_size( 'img_580x540', 580, 540, true );
	}
}

/**
 * Convert to WEBP URL
 */
function webp($url) {
	if($url && strpos($url, 'uploads') !== false){
	  $url = str_replace("uploads","webp-express/webp-images/uploads", $url);
	  $url = $url . '.webp';
	}
	return $url;
}



/**
 * Image Compression Adjustments in WordPress
*/

add_filter( 'big_image_size_threshold', '__return_false' );
add_filter('jpeg_quality', function($arg){return 100;});

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'global-styles' );
}

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'classic-theme-styles' );
}, 20 );

add_filter('wpcf7_autop_or_not', '__return_false');

class MAIN_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        // Add classes to <ul> based on depth
        $indent = str_repeat( "\t", $depth );
        $ul_classes = '';

        if ($depth === 0) {
            $ul_classes = 'no-bullets fixed md:relative z-2 bg-white w-100 left-0 right-0 top-82 md:top-0 transition b-0 bt-1 solid bc-hash md:bt-0';
        } elseif ($depth === 1) {
            $ul_classes = 'no-bullets font-regular mt-20 md:mt-5 lh-2';
        } elseif ($depth === 2) {
            $ul_classes = 'submenu-level-2';
        }
        
		if ($depth === 0) {
        	$output .= "\n$indent<ul class=\"$ul_classes\"><div class=\"container flex justify-between md:column gap-30 md:gap-20 py-60 md:pt-20 md:pb-20 md:pl-0 md:pr-0\">\n";
		} else {	
			$output .= "\n$indent<ul class=\"$ul_classes\">\n";
		}
    }

    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
        // Add classes to <li> and <a>
        $active_class = $item->current ? ' active' : '';
        $li_classes = '';
        $a_classes = '';

        if ($depth === 0) {
            $li_classes = 'ml-40 xl:ml-30 md:ml-0 inline-flex md:inline-block md:w-100';
            $a_classes = 'pt-30 pb-30 md:pt-10 md:pb-10 b-0 bb-3 solid md:bb-0 md:w-100 uppercase block';
        } elseif ($depth === 1) {
            $li_classes = 'depth-1';
            $a_classes = 'h4 inline-block font-bold b-0 bb-1 bc-hash solid pb-20 md:bb-0 md:pb-0';
        } elseif ($depth === 2) {
            $li_classes = 'depth-2';
            $a_classes = 'depth-2 a';
        }

        $output .= "<li class=\"$li_classes$active_class\">";

        if ($item->url && $item->url != '#') {
            $output .= '<a class="' . $a_classes . '" href="' . $item->url . '" aria-label="' . strtolower($item->title) . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $item->title;

        if ($item->url && $item->url != '#') {
            if ($args->walker->has_children) {
                $output .= '<i class="icomoon icon-expand_more ml-5 fs-12"></i>';
            }

            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        // End <li> and <ul> elements.
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $output .= "$indent\t</li>\n";
        // $output .= "$indent</div></ul>\n";

		if ($depth === 0) {
        	$output .= "$indent</div></ul>\n";
		} else {
			$output .= "$indent</ul>\n";
		}
    }
}

class FOOTER_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$active_class = $item->current ? ' active' : '';
		$output .= "<li class='" . $active_class . "'>";

		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '" aria-label="' . strtolower($item->title) . '">';
		} else {
			$output .= '<span>';
		}

		$output .= $item->title;

		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

		if ($args->walker->has_children) {
			$output .= '<i class="caret fa fa-angle-down"></i>';
		}
	}
}

function truncate_text($text, $max = 50, $append = '...') {
	if (strlen($text) <= $max) return $text;
	$return = substr($text, 0, $max);
	if (strpos($text, ' ') === false) return $return . $append;
	return preg_replace('/\w+$/', '', $return) . $append;
}


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


add_action( 'wp_print_styles',     'my_deregister_styles', 100 );

function my_deregister_styles()    { 
   //wp_deregister_style( 'amethyst-dashicons-style' ); 
   wp_deregister_style( 'dashicons' ); 


}

function itsme_disable_feed() {
	wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );


add_action('init', 'no_x_gravity_form_css', 9999999);
function no_x_gravity_form_css () {
	wp_dequeue_style( 'x-gravity-forms' );
}

require get_template_directory() . '/inc/minify-html.php';