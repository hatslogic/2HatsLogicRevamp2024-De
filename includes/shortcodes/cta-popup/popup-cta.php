<?php

/**
 * Popup CTA Shortcode
 * 
 * Supports three types of CTAs:
 * 1. Contact Us popup
 * 2. Newsletter subscription popup  
 * 3. Download guide with email collection
 */

if (!function_exists('hl_popup_cta_shortcode')) :
    function hl_popup_cta_shortcode($atts, $content = null)
    {
        $defaults = array(
            'type' => 'contact', // contact, newsletter, download
            'title' => '',
            'content' => '',
            'button_text' => '',
            'contact_form_id' => '', // Contact Form 7 ID
            'download_file' => '', // File URL for download
            'tags' => '', // MailerLite groups
            'style' => 'default'
        );

        $atts = shortcode_atts($defaults, $atts, 'popup-cta');

        // Generate unique ID for this CTA
        $cta_id = 'cta-' . $atts['type'] . '-' . uniqid();
        $modal_id = 'modal-' . $cta_id;

        // Set default content based on type
        if (empty($atts['title'])) {
            switch ($atts['type']) {
                case 'contact':
                    $atts['title'] = __('Ready to Get Started?', 'app');
                    $atts['content'] = __('Get in touch with our experts and let\'s discuss your project.', 'app');
                    $atts['button_text'] = __('Contact Us', 'app');
                    break;
                case 'newsletter':
                    $atts['title'] = __('Stay Updated', 'app');
                    $atts['content'] = __('Subscribe to our newsletter for the latest insights and updates.', 'app');
                    $atts['button_text'] = __('Subscribe', 'app');
                    break;
                case 'download':
                    $atts['title'] = __('Download Guide', 'app');
                    $atts['content'] = __('Get our comprehensive guide delivered to your inbox.', 'app');
                    $atts['button_text'] = __('Download Now', 'app');
                    break;
            }
        }

        ob_start();
?>
        <div class="info bg-dark-primary c-white p-60 relative mt-40 mb-40">
            <div class="container">
                <div class="text-center px-40">
                    <h3 class="h3 block"><?php echo esc_html($atts['title']); ?></h3>
                    <?php if ($atts['content']) : ?>
                        <p class="mt-20"><?php echo esc_html($atts['content']); ?></p>
                    <?php endif; ?>
                    <div class="w-100 mt-30 flex justify-center"> 
                        <button type="button"
                            class="btn orange-btn text-center"
                            onclick="openModal('<?php echo esc_attr($modal_id); ?>')">
                            <?php echo esc_html($atts['button_text']); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

<?php

        // Store modal data globally for footer rendering
        global $hl_popup_cta_modals;
        if (!isset($hl_popup_cta_modals)) {
            $hl_popup_cta_modals = array();
        }

        $hl_popup_cta_modals[] = array(
            'modal_id' => $modal_id,
            'type' => $atts['type'],
            'title' => $atts['title'],
            'content' => $atts['content'],
            'contact_form_id' => $atts['contact_form_id'],
            'download_file' => $atts['download_file'],
            'newsletter_tags' => $atts['tags'] ? $atts['tags'] : hl_get_post_tags(),
        );

        return ob_get_clean();
    }
endif;


add_shortcode('popup-cta', 'hl_popup_cta_shortcode');

function hl_get_post_tags()
{
    $post_id = get_the_ID();
    // Get all tags for the post
    $tags = get_the_terms($post_id, 'post_tag');

    if ($tags && ! is_wp_error($tags)) {
        // Extract tag names
        $tag_names = wp_list_pluck($tags, 'name');

        // Convert to comma-separated string
        $tag_string = implode(', ', $tag_names);

        return $tag_string;
    }

    return '';
}

/**
 * Render popup CTA modals in footer
 */
function hl_render_popup_cta_modals()
{
    global $hl_popup_cta_modals;

    if (!empty($hl_popup_cta_modals)) {
        foreach ($hl_popup_cta_modals as $modal_data) {
            // Set query vars for the modal template
            set_query_var('cta_title', $modal_data['title']);
            set_query_var('cta_content', $modal_data['content']);
            set_query_var('cta_contact_form_id', $modal_data['contact_form_id']);
            set_query_var('cta_download_file', $modal_data['download_file']);
            set_query_var('cta_newsletter_tags', $modal_data['newsletter_tags']);
            set_query_var('cta_modal_id', $modal_data['modal_id']);

            // Include the appropriate modal template
            switch ($modal_data['type']) {
                case 'contact':
                    get_template_part('includes/shortcodes/cta-popup/partials/popup-cta-contact-modal');
                    break;
                case 'newsletter':
                    get_template_part('includes/shortcodes/cta-popup/partials/popup-cta-newsletter-modal');
                    break;
                case 'download':
                    get_template_part('includes/shortcodes/cta-popup/partials/popup-cta-download-modal');
                    break;
            }
        }
    }
}
add_action('wp_footer', 'hl_render_popup_cta_modals');
