<?php
/**
 * 2HatsLogic functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 */
define('APP_THEME_DIR', dirname(__FILE__).DIRECTORY_SEPARATOR);

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '2.3.9');
}

function my_acf_add_local_field_groups()
{
    remove_filter('acf_the_content', 'wpautop');
}
add_action('acf/init', 'my_acf_add_local_field_groups');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hatslogic_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on 2HatsLogic, use a find and replace
     * to change 'hatslogic' to the name of your theme in all the template files.
     */
    load_theme_textdomain('hatslogic', get_template_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        [
            'search-form',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'hatslogic_custom_background_args',
            [
                'default-color' => 'ffffff',
                'default-image' => '',
            ]
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /*
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]
    );
}
add_action('after_setup_theme', 'hatslogic_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hatslogic_content_width()
{
    $GLOBALS['content_width'] = apply_filters('hatslogic_content_width', 640);
}
add_action('after_setup_theme', 'hatslogic_content_width', 0);

/**
 * Register widget area.
 *
 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hatslogic_widgets_init()
{
    register_sidebar(
        [
            'name' => esc_html__('Sidebar', 'hatslogic'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'hatslogic'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]
    );
}
add_action('widgets_init', 'hatslogic_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function hatslogic_scripts()
{
    wp_enqueue_style('hatslogic-style', get_stylesheet_uri(), [], _S_VERSION);
    // wp_enqueue_style( 'hatslogic-plugins', get_template_directory_uri() . '/dist/assets/css/plugins.min.css', array(), _S_VERSION );
    // wp_enqueue_style( 'hatslogic-app-app', get_template_directory_uri() . '/dist/assets/css/app.min.css', array(), _S_VERSION );
    wp_enqueue_style('hatslogic-app-main', get_template_directory_uri().'/dist/assets/css/main.min.css', [], _S_VERSION);
    // wp_enqueue_style('hatslogic-wp-main', get_template_directory_uri().'/dist/assets/css/wp.min.css', [], _S_VERSION);

    wp_enqueue_style('hatslogic-transition-main', get_template_directory_uri().'/dist/assets/css/transition.min.css', [], _S_VERSION);
    wp_enqueue_script('hatslogic-main', get_template_directory_uri().'/dist/assets/js/main.min.js', [], _S_VERSION,
        [
            'in_footer' => true,
            'strategy' => 'async',
        ]
    );

    /*
    wp_enqueue_script('hatslogic-smooth-scroll', get_template_directory_uri().'/dist/assets/js/smooth-scroll.js', [], _S_VERSION,
        [
            'in_footer' => true
        ]
    );
    */

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

    // if (is_singular() && comments_open() && get_option('thread_comments')) {
    // 	wp_enqueue_script('comment-reply');
    // }

    // if (is_page('contact') || is_front_page()) {
    //     wp_enqueue_style('hatslogic-contact', 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css');
    //     wp_enqueue_style('hatslogic-contact-theme', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css');
    //     wp_enqueue_script('hatslogic-contact-intlTelInput', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js');
    //     wp_enqueue_script('hatslogic-contact-utils', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js');
    // }
}
add_action('wp_enqueue_scripts', 'hatslogic_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory().'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory().'/inc/jetpack.php';
}

/*
 * Disable gutenberg block editor
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

// Register Sidebars
// Note: In a child theme with custom app_setup_theme() this function is not hooked to widgets_init
function app_widgets_init()
{
    $sidebar_options = array_merge(app_get_default_sidebar_options(), [
        'name' => __('Default Sidebar', 'app'),
        'id' => 'default-sidebar',
    ]);

    register_sidebar($sidebar_options);
}

function app_excerpt_more()
{
    return '...';
}

function app_excerpt_length()
{
    return 55;
}

// Sidebar Options
function app_get_default_sidebar_options()
{
    return [
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widget__title">',
        'after_title' => '</h2>',
    ];
}

add_action('after_setup_theme', 'app_setup_theme');

// To override theme setup process in a child theme, add your own app_setup_theme() to your child theme's
// functions.php file.
if (!function_exists('app_setup_theme')) {
    function app_setup_theme()
    {
        // Make this theme available for translation.
        load_theme_textdomain('app', get_template_directory().'/languages');

        $autoload_dir = APP_THEME_DIR.'lib/autoload.php';
        include_once $autoload_dir;

        // Autoload dependencies
        $autoload_dir = APP_THEME_DIR.'vendor/autoload.php';
        if (!is_readable($autoload_dir)) {
            wp_die(__('Please, run <code>composer install</code> to download and install the theme dependencies.', 'app'));
        }
        include_once $autoload_dir;

        // Additional libraries and includes
        include_once APP_THEME_DIR.'includes/ajax.php';
        include_once APP_THEME_DIR.'includes/admin-login.php';
        // include_once APP_THEME_DIR.'includes/comments.php';
        include_once APP_THEME_DIR.'includes/title.php';
        // include_once (APP_THEME_DIR . 'includes/gravity-forms.php');
        include_once APP_THEME_DIR.'includes/helpers.php';
        include_once APP_THEME_DIR.'includes/hooks.php';
        include_once APP_THEME_DIR.'includes/acf.php';

        // Custom Blocks
        // include_once( APP_THEME_DIR . 'options/acf-blocks.php' );

        // Custom Post Types
        include_once APP_THEME_DIR.'options/post-types.php';

        // Theme supports
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('menus');
        add_theme_support('html5', ['gallery']);

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
        // add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

        // Register Theme Menu Locations
        register_nav_menus(
            [
                'main-menu' => __('Main Menu', 'app'),
                'service-menu' => __('Services', 'app'),
                'web-ecommerce-menu' => __('Web & E-commerce Development', 'app'),
                'hide-developer-menu' => __('Hire a Developer', 'app'),
                'company-menu' => __('Company', 'app'),
                'quick-links-menu' => __('Quick Links', 'app'),
            ]);

        // Attach custom shortcodes
        include_once APP_THEME_DIR.'options/shortcodes.php';

        // Add Actions
        add_action('widgets_init', 'app_widgets_init');

        // Add Filters
        add_filter('excerpt_more', 'app_excerpt_more');
        add_filter('excerpt_length', 'app_excerpt_length', 999);
        add_filter('app_theme_favicon_uri', function () {
            return get_template_directory_uri().'/dist/assets/img/cropped-favicon-32x32.png';
        });

        // Image sizes
        add_image_size('img_100x100', 100, 100, true);
        add_image_size('img_180x180', 180, 180, true);
        add_image_size('img_494x328', 494, 328, true);
        add_image_size('img_450x350', 450, 350, true);
        add_image_size('img_360x280', 360, 280, true);
        add_image_size('img_304x218', 304, 218, true);
        add_image_size('img_350x250', 350, 250, true);
        add_image_size('img_450x235', 450, 235, true);
        add_image_size('img_652x874', 652, 874, true);

        add_image_size('img_1200x862', 1200, 862, true);
        add_image_size('img_1060x762', 1060, 762, true);
        add_image_size('img_812x744', 812, 744, true);
        add_image_size('img_1075x716', 1075, 716, true);
        add_image_size('img_865x576', 865, 576, true);
        add_image_size('img_580x580', 580, 580, true);
        add_image_size('img_580x540', 580, 540, true);
        add_image_size('img_548x348', 548, 348, true);
        add_image_size('img_730x466', 730, 466, true);
        add_image_size('img_100x100', 100, 100, true);
        add_image_size('img_498x260', 498, 260, true);
        add_image_size('img_749x379', 749, 379, true);
        add_image_size('img_1139x340', 1139, 340, true);
        add_image_size('img_606x749', 606, 749, true);
        add_image_size('img_648x445', 648, 445, true);
        add_image_size('img_987x689', 987, 689, true);
        add_image_size('img_1140x348', 1140, 348, true);

        add_image_size('img_1650x1334', 1650, 1334, true);
        add_image_size('img_1530x934', 1530, 934, true);
        add_image_size('img_780x780', 780, 780, true);
        add_image_size('img_524x450', 524, 450, true);
        add_image_size('img_460x487', 460, 487, true);
        add_image_size('img_914x511', 914, 511, true);
        add_image_size('img_556x340', 556, 340, true);

        add_image_size('img_1920x893', 1920, 893, true);
        add_image_size('img_649x734', 649, 734, true);
        add_image_size('img_250x330', 250, 330, true);
        add_image_size('img_500x611', 500, 611, true);
        add_image_size('img_500x288', 500, 288, true);
        add_image_size('img_500x286', 500, 286, true);
        add_image_size('img_500x613', 500, 613, true);
        add_image_size('img_500x599', 500, 599, true);
        add_image_size('img_238x288', 238, 288, true);
        add_image_size('img_818x464', 818, 464, true);
    }
}

/**
 * Convert to WEBP URL.
 */
function webp($url)
{
    if ($url && strpos($url, 'uploads') !== false) {
        $url = str_replace('uploads', 'webp-express/webp-images/uploads', $url);
        $url = $url.'.webp';
    }

    return $url;
}

/*
 * Image Compression Adjustments in WordPress
 */

add_filter('big_image_size_threshold', '__return_false');
add_filter('jpeg_quality', function ($arg) {
    return 100;
});

function wps_deregister_styles()
{
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('global-styles');
}
add_action('wp_print_styles', 'wps_deregister_styles', 100);

add_filter('wpcf7_autop_or_not', '__return_false');

class MAIN_Menu_Walker extends Walker_Nav_Menu
{
    private $curItem;

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Add classes to <ul> based on depth
        $indent = str_repeat("\t", $depth);
        $is_compact = in_array('compact', $this->curItem->classes);
        $ul_classes = '';

        if ($depth === 0) {
            if ($is_compact) {
                $ul_classes = 'arrow-top no-bullets absolute min-w-px-260 md:relative z-2 w-100 left-0 right-0 top-82 md:top-0 transition md:bt-0 -ml-20 md:ml-0';
            } else {
                $ul_classes = 'no-bullets fixed md:relative z-2 bg-white w-100 left-0 right-0 top-82 md:top-0 transition b-0 bt-1 solid bc-light-grey md:bt-0';
            }
        } elseif ($depth === 1) {
            $ul_classes = 'no-bullets font-regular mt-20 md:mt-5 lh-2';
        } elseif ($depth === 2) {
            $ul_classes = 'submenu-level-2';
        }

        if ($depth === 0) {
            if ($is_compact) {
                $output .= "\n$indent<ul class=\"$ul_classes\"><div class=\"container flex column justify-between md:column gap-20 md:gap-15 py-40 mt-20 md:mt-5 bg-white md:pt-10 md:pb-20 md:pl-0 md:pr-0\">\n";
            } else {
                $output .= "\n$indent<ul class=\"$ul_classes\"><div class=\"container flex justify-between md:column gap-30 md:gap-20 py-40 md:pt-20 md:pb-20 md:pl-0 md:pr-0\">\n";
            }
        } else {
            $output .= "\n$indent<ul class=\"$ul_classes\">\n";
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        // Add classes to <li> and <a>
        $this->curItem = $item;

        $is_compact = in_array('compact', $item->classes);

        $active_class = $item->current || in_array('current-menu-parent', $item->classes) || in_array('current-menu-ancestor', $item->classes)  ? ' active' : '';
        $li_classes = '';
        $a_classes = '';

        if ($depth === 0) {
            $li_classes = 'ml-40 xl:ml-30 md:ml-0 inline-flex md:inline-block md:w-100';

            if ($is_compact) {
                $li_classes .= ' compact relative';
            }

            if ($args->walker->has_children) {
                $li_classes .= ' has-child';
            }

            $a_classes = 'mobile-toggle pt-30 pb-30 md:pt-8 md:pb-8 b-0 bb-3 solid md:bb-0 md:w-100 uppercase md:capitalize md:fs-28 block md:flex md:justify-between md:align-center';
        } elseif ($depth === 1) {
            $li_classes = 'depth-1 w-100';
            if ($args->walker->has_children) {
                $li_classes .= ' has-child';
            }

            if ($is_compact) {
                $a_classes = 'h4 inline-block font-bold w-100';
            } else {
                $a_classes = 'h4 inline-block font-bold b-0 bb-1 bc-hash solid pb-20 md:bb-0 md:pb-0';
            }
        } elseif ($depth === 2) {
            $li_classes = 'depth-2';
            if ($args->walker->has_children) {
                $li_classes .= ' has-child';
            }

            $a_classes = 'depth-2 inline-block w-100';
        }

        $output .= "<li class=\"$li_classes$active_class\">";

        if ($item->url && $item->url != '#') {
            $output .= '<a class="'.$a_classes.'" href="'.$item->url.'" aria-label="'.strtolower($item->title).'">';
        } else {
            $output .= '<span>';
        }

        $output .= $item->title;
        if ($depth === 1) {
            $output .= '<span class="block fs-15 lh-1-25 c-grey font-regular mt-5">'.$item->description.'</span>';
        }

        if ($item->url && $item->url != '#') {
            if ($args->walker->has_children && $depth === 0) {
                $output .= '<i class="icomoon icon-expand_more ml-5 fs-12 md:fs-20"></i>';
            }

            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        // End <li> and <ul> elements.
        $is_compact = in_array('compact', $this->curItem->classes);
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        // $output .= "$indent\t</li>\n";
        // $output .= "$indent</div></ul>\n";

        $blog_url = home_url().'/blog';
        $contact_url = home_url().'/contact';

        if ($depth === 0) {
            if ($is_compact) {
                $output .= "$indent</div></ul>\n";
            } else {
                $output .= "$indent</div><div class=\"menu-end container flex md:hidden\"> <ul class=\"sub-menu no-bullets font-bold flex align-start b-0 bt-1 solid bc-hash w-100\"><li class=\"mt-30 mb-30\"> <a href=\"$blog_url\" class=\"inline-block\" aria-label=\"blog\">Blog</a></li><li class=\"mt-30 mb-30 ml-30 pl-30 b-0 bl-1 solid bc-hash\"> <a href=\"$contact_url\" class=\"inline-block\" aria-label=\"contact\">Contact</a></li></ul></div></ul>\n";
            }
        } else {
            $output .= "$indent</ul>\n";
        }
    }
}

class FOOTER_Menu_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $active_class = $item->current ? ' active' : '';
        $output .= "<li class='".$active_class."'>";

        if ($item->url && $item->url != '#') {
            $output .= '<a href="'.$item->url.'" aria-label="'.strtolower($item->title).'">';
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

function truncate_text($text, $max = 50, $append = '...')
{
    if (strlen($text) <= $max) {
        return $text;
    }
    $return = substr($text, 0, $max);
    if (strpos($text, ' ') === false) {
        return $return.$append;
    }

    return preg_replace('/\w+$/', '', $return).$append;
}

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, ['wpemoji']);
    } else {
        return [];
    }
}

/**
 * Disable the emoji's.
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Remove from TinyMCE
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}
add_action('init', 'disable_emojis');

function itsme_disable_feed()
{
    wp_die(__('No feed available, please visit the <a href="'.esc_url(home_url('/')).'">homepage</a>!'));
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

add_action('init', 'no_x_gravity_form_css', 9999999);
function no_x_gravity_form_css()
{
    wp_dequeue_style('x-gravity-forms');
}

require get_template_directory().'/inc/minify-html.php';

// Function to calculate reading time
function get_reading_time($post_id, $content)
{
    // Check if content is empty and a custom reading time is set
    if (!$content && ($custom_reading_time = get_field('reading_time', $post_id))) {
        return $custom_reading_time.' minute'.($custom_reading_time > 1 ? 's' : '');
    }

    // Return empty string if content is empty and no custom reading time is set
    if (!$content) {
        return '';
    }

    // Calculate word count and reading time in minutes
    $word_count = str_word_count(strip_tags($content));
    $reading_time_minutes = ceil($word_count / 200);

    // If reading time is less than 1 minute, calculate and return in seconds
    if ($reading_time_minutes < 1) {
        $reading_time_seconds = ceil($word_count / (200 / 60));

        return $reading_time_seconds.' second'.($reading_time_seconds > 1 ? 's' : '');
    }

    // Calculate hours and remaining minutes if reading time is 60 minutes or more
    $reading_time_hours = intdiv($reading_time_minutes, 60);
    $reading_time_remaining_minutes = $reading_time_minutes % 60;

    // Construct reading time text
    $reading_time_text = '';
    if ($reading_time_hours > 0) {
        $reading_time_text .= $reading_time_hours.' hour'.($reading_time_hours > 1 ? 's' : '').' ';
    }
    if ($reading_time_remaining_minutes > 0) {
        $reading_time_text .= $reading_time_remaining_minutes.' minute'.($reading_time_remaining_minutes > 1 ? 's' : '');
    }

    return trim($reading_time_text);
}

// Related Case studes

function get_related_case_studies($post_id, $taxonomy = 'category', $post_type = 'case-study', $posts_per_page = 3)
{
    $categories = wp_get_post_terms($post_id, $taxonomy);

    if (empty($categories) || is_wp_error($categories)) {
        return [];
    }

    $category_ids = wp_list_pluck($categories, 'term_id');

    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'post__not_in' => [$post_id],
        'post_status' => 'publish',
        'tax_query' => [
            [
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $category_ids,
            ],
        ],
    ];

    $query = new WP_Query($args);

    return $query->posts;
}

// Related Resources

function get_related_resources($post_id, $taxonomy = 'category', $post_type = 'post', $posts_per_page = 4)
{
    $categories = wp_get_post_terms($post_id, $taxonomy);

    if (empty($categories) || is_wp_error($categories)) {
        return [];
    }

    $category_ids = wp_list_pluck($categories, 'term_id');

    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'post__not_in' => [$post_id],
        'post_status' => 'publish',
        'tax_query' => [
            [
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $category_ids,
            ],
        ],
    ];

    $query = new WP_Query($args);

    return $query->posts;
}

// remove a ton of script from non-woocommerce pages
function deregister_polyfill()
{
    wp_deregister_script('regenerator-runtime');
    // wp_deregister_script( 'cfturnstile' );
}
add_action('wp_enqueue_scripts', 'deregister_polyfill');

// function deregister_plugin_styles() {
// 	wp_deregister_style( 'cfturnstile' );
// }
// add_action( 'wp_print_styles', 'deregister_plugin_styles', 100 );

// add_action( 'wp_enqueue_scripts', function() {
// 	wp_enqueue_script( 'cfturnstile-js', 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit', array(), 'null', true );
// 	wp_script_add_data( 'cfturnstile-js', 'strategy', 'async' );
// } );

// function custom_turnstile_script()
// {
//     // Deregister the original script if needed
//     wp_dequeue_script('cloudflare-turnstile-script'); // Adjust the handle name as per your existing script handle

//     // Register and enqueue the script in the head
//     wp_register_script(
//         'cloudflare-turnstile-api',
//         'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit', // Cloudflare Turnstile API URL
//         [], // Dependencies
//         null, // Version
//         false // In the head (true for footer, false for head)
//     );
//     wp_enqueue_script('cloudflare-turnstile-api');
// }

// // Add the custom attribute to the script tag
// function add_custom_script_type($tag, $handle)
// {
//     if ('cloudflare-turnstile-api' === $handle) {
//         // Add the custom type attribute to the script tag
//         $tag = str_replace(' src=', ' type="text/partytown" src=', $tag);
//     }

//     return $tag;
// }

// add_action('wp_enqueue_scripts', 'custom_turnstile_script');
// add_filter('script_loader_tag', 'add_custom_script_type', 10, 2);

function contactform_dequeue_scripts()
{
    $load_scripts = false;

    if (is_singular()) {
        $post = get_post();

        if (has_shortcode($post->post_content, 'contact-form-7')) {
            $load_scripts = true;
        }
    }

    if (!$load_scripts) {
        wp_dequeue_script('contact-form-7');
        wp_dequeue_style('contact-form-7');
    }
}

// add_action( 'wp_enqueue_scripts', 'contactform_dequeue_scripts', 99 );

add_theme_support('post-thumbnails');

add_action('after_setup_theme', 'aw_custom_add_image_sizes');
function aw_custom_add_image_sizes()
{
    add_image_size('small', 300, 9999); // 300px wide unlimited height
    add_image_size('medium-small', 450, 9999); // 300px wide unlimited height
    add_image_size('xl', 1200, 9999); // 1200px wide unlimited height
    add_image_size('xxl', 2000, 9999); // 2000px wide unlimited height
    add_image_size('xxxl', 3000, 9999); // 3000px wide unlimited height
    add_image_size('portfolio_full', 9999, 900); // 900px tall unlimited width
}

add_filter('image_size_names_choose', 'aw_custom_add_image_size_names');
function aw_custom_add_image_size_names($sizes)
{
    return array_merge($sizes, [
        'small' => __('Small'),
        'medium-small' => __('Medium Small'),
        'xl' => __('Extra Large'),
        'xxl' => __('2x Extra Large'),
        'xxxl' => __('3x Extra Large'),
        'portfolio_full' => __('Portfolio Full Size'),
    ]);
}

function replace_image_classes_with_ids($content)
{
    // Match all image tags
    preg_match_all('/<img[^>]+>/i', $content, $matches);
    $images = $matches[0];

    foreach ($images as $img) {
        // Extract the image URL from each tag
        preg_match('/src="([^"]+)/i', $img, $match);
        $image_url = str_replace('src="', '', $match[0]);
        // Remove the dimensions from the image URL (e.g., '-300x170')
        $image_url = preg_replace('/-\d+x\d+(?=\.\w+$)/', '', $image_url);

        // Use the cleaned URL to get the attachment ID
        $attachment_id = attachment_url_to_postid($image_url);

        // Extract the old class
        preg_match('/wp-image-\d+/', $img, $class_match);

        // If an attachment ID was found, extract the old class and replace it in the content
        if ($attachment_id && !empty($class_match)) {
            $old_class = $class_match[0]; // This is the class you want to replace

            // Define the new class with the correct ID
            $new_class = 'wp-image-'.$attachment_id; // This is the new class with the correct ID

            // Replace the old class with the new class in the content
            $content = str_replace($old_class, $new_class, $content);
        }
    }

    return $content;
}
add_filter('the_content', 'replace_image_classes_with_ids');

// Crop Images Dynamically based on the aspect ratio and use in picture tags
function hatslogic_get_attachment_picture(int $image_id, array $breakpoints = [], array $attributes = []): ?string
{
    if (!$image_id) {
        return null;
    }

    $picturetag_class = $attributes['picturetag_class'] ?? '';
    unset($attributes['picturetag_class']);

    $img_attributes = array_map(fn ($key, $value) => "$key='$value'", array_keys($attributes), $attributes);
    $img_attributes = implode(' ', $img_attributes);

    $picture = '<picture '.($picturetag_class ? "class='$picturetag_class'" : '').'>';

    foreach ($breakpoints as $media_query => $image_size) {
        $imageId = $image_id;
        if (isset($image_size[2])) {
            $imageId = $image_size[2];
            $image_src = bis_get_attachment_image_src($imageId, [$image_size[0], $image_size[1]], true);
            $image_src_2x = bis_get_attachment_image_src($imageId, [$image_size[0] * 2, $image_size[1] * 2], true);
        } else {
            $image_src = bis_get_attachment_image_src($imageId, [$image_size[0] * 2, $image_size[1] * 2], true);
            $image_src_2x = bis_get_attachment_image_src($imageId, [$image_size[0] * 3, $image_size[1] * 3], true);
        }
        if ($image_src && !empty($image_src['src'])) {
            $webp_src = webp(esc_url($image_src['src']));
            $webp_src_2x = webp(esc_url($image_src_2x['src']));

            $source_tag = "<source srcset='$webp_src 1x, $webp_src_2x 2x' type='image/webp' media='".esc_attr($media_query)."'>
			<source srcset='".esc_url($image_src['src']).' 1x, '.esc_url($image_src_2x['src'])." 2x' media='".esc_attr($media_query)."'>";

            $picture .= $source_tag;
        }
    }

    $largest_size = end($breakpoints);
    $fallback_image_src = bis_get_attachment_image_src($image_id, $largest_size);
    $fallback_image_src_2x = bis_get_attachment_image_src($image_id, [$largest_size[0] * 2, $largest_size[1] * 2]);

    if ($fallback_image_src && !empty($fallback_image_src['src'])) {
        $alt_text = esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true));
        $width = $largest_size[0];
        $height = $largest_size[1];
        $picture .= "<img src='".esc_url($fallback_image_src['src'])."' $img_attributes alt='$alt_text' width='$width' height='$height'>";
    }

    $picture .= '</picture>';

    return $picture;
}
function short_content($num)
{
    $limit = $num + 1;
    $content = str_split(get_the_content());
    $length = count($content);
    if ($length >= $num) {
        $content = array_slice($content, 0, $num);
        $content = implode('', $content).'...';
        echo strip_tags($content);
    } else {
        strip_tags(the_content());
    }
}

function disable_category_archive_page()
{
    if (is_category()) {
        wp_redirect(home_url('/'));
        exit;
    }
}
add_action('template_redirect', 'disable_category_archive_page');


// Disable support for comments and trackbacks in post types 
function disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'disable_comments_post_types_support'); 

// Close comments on the front-end 
function disable_comments_status()
{
    return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2); 

// Hide existing comments 
function disable_comments_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2); 

// Remove comments page in menu 
function disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu'); 

// Redirect any user trying to access comments page 
function disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'disable_comments_admin_menu_redirect'); 

// Remove comments metabox from dashboard 
function disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');


function remove_unwanted_tags_and_styles($content) {

    if(!is_singular('post')){
        return $content;
    }

    $disable_inline_styles = get_field('disable_inline_styles', get_the_ID());

    // only for post single
    if ($disable_inline_styles) {
        // Remove specific tags (adjust as needed)
        $content = preg_replace('/<script[^>]*>(.*?)<\/script>/is', '', $content);
        $content = preg_replace('/<style[^>]*>(.*?)<\/style>/is', '', $content);
        $content = preg_replace('/<iframe[^>]*>(.*?)<\/iframe>/is', '', $content);
    
        // Remove inline styles
        $content = preg_replace('/ style="[^"]*"/', '', $content);

        // Remove unwanted spans
        $content = preg_replace('/<span[^>]*>(.*?)<\/span>/is', '$1', $content);

        // Remove unwanted strong and b tags
        $content = preg_replace('/<strong[^>]*>(.*?)<\/strong>/is', '$1', $content);
        $content = preg_replace('/<b[^>]*>(.*?)<\/b>/is', '$1', $content);
    }
  
    return $content;

}
add_filter('the_content', 'remove_unwanted_tags_and_styles');
add_filter('site_transient_update_plugins', 'disable_specific_plugin_updates');
function disable_specific_plugin_updates($value)
{
    if (isset($value) && is_object($value)) {
        if (isset($value->response['simple-cloudflare-turnstile/simple-cloudflare-turnstile.php'])) {
            unset($value->response['simple-cloudflare-turnstile/simple-cloudflare-turnstile.php']);
        }
    }
    return $value;
}

/** functions to redirect to seo tools page */
function custom_seo_tool_rewrite() {
    add_rewrite_rule('^seo-tool/?$', 'index.php?seo_tool=1', 'top');
}
add_action('init', 'custom_seo_tool_rewrite');

function custom_seo_tool_query_vars($query_vars) {
    $query_vars[] = 'seo_tool';
    return $query_vars;
}
add_filter('query_vars', 'custom_seo_tool_query_vars');

function custom_seo_tool_template_include($template) {
    if (get_query_var('seo_tool')) {
        return get_template_directory() . '/template-custom-seo-tool.php';
    }
    return $template;
}
add_filter('template_include', 'custom_seo_tool_template_include');

/** Enqueue script files for SEO Tool */
function enqueue_seo_tool_script() {

    if (get_query_var('seo_tool')) {
        
        wp_enqueue_script('seo-tool-script', get_template_directory_uri() . '/src/assets/js/seo-tool.js', array(), null, true);

        // Check if constants are defined, otherwise provide empty values
        $openai_url = defined('OPENAI_URL') ? OPENAI_URL : '';
        $openai_key = defined('OPENAI_KEY') ? OPENAI_KEY : '';
        $openai_model = defined('OPENAI_MODEL') ? OPENAI_MODEL : '';

        // Localize the script to pass API URL and key securely
        wp_localize_script('seo-tool-script', 'config', array(
            'OPENAIURL' => $openai_url,
            'OPENAIKEY' => $openai_key,
            'OPENAIMODEL' => $openai_model
        ));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_seo_tool_script');