<?php
require_once get_template_directory() . '/includes/shortcodes/cta-popup/popup-cta.php';
require_once get_template_directory() . '/includes/shortcodes/cta-popup/includes/cta-ajax-handlers.php';
require_once get_template_directory() . '/includes/shortcodes/cta-popup/includes/class-mailerlite.php';

/**
 * Enqueue popup CTA scripts and styles
 */
function hl_popup_cta_enqueue_scripts()
{
    // Enqueue our custom AJAX script
    wp_enqueue_script(
        'popup-cta-ajax',
        get_template_directory_uri() . '/includes/shortcodes/cta-popup/assets/js/popup-cta-ajax.js',
        array(), // No dependencies - plugin handles Turnstile script
        '1.0.0',
        true
    );

    // Localize script with AJAX URL and Turnstile settings
    wp_localize_script('popup-cta-ajax', 'popupCtaAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'turnstileSiteKey' => get_option('cfturnstile_key', ''),
        'turnstileTheme' => get_option('cfturnstile_theme', 'light'),
        'turnstileLanguage' => get_option('cfturnstile_language', 'auto'),
        'turnstileAppearance' => get_option('cfturnstile_appearance', 'always')
    ));
}
add_action('wp_enqueue_scripts', 'hl_popup_cta_enqueue_scripts');
