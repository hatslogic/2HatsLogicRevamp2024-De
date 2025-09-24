<?php

/**
 * CTA AJAX Handlers
 * 
 * Handles newsletter subscriptions and download requests
 */

// Newsletter subscription handler
add_action('wp_ajax_subscribe_newsletter', 'hl_handle_newsletter_subscription');
add_action('wp_ajax_nopriv_subscribe_newsletter', 'hl_handle_newsletter_subscription');

function hl_handle_newsletter_subscription()
{
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'hl_cta_nonce')) {
        wp_send_json(array('success' => false, 'message' => __('Security check failed', 'app')));
        return;
    }

    // Verify Turnstile token using the plugin's function
    if (function_exists('cfturnstile_check')) {
        $turnstile_result = cfturnstile_check($_POST['cf-turnstile-response'] ?? '');
        if (!$turnstile_result || !$turnstile_result['success']) {
            wp_send_json(array('success' => false, 'message' => __('Security verification failed. Please try again.', 'app')));
            return;
        }
    }

    $email = sanitize_email($_POST['email'] ?? '');
    $name = sanitize_text_field($_POST['name'] ?? '');
    $newsletter_tags = sanitize_text_field($_POST['newsletter_tags'] ?? 'general');

    if (empty($email)) {
        wp_send_json(array('success' => false, 'message' => __('Email is required', 'app')));
        return;
    }

    try {
        $fields = [
            'name' => $name,
        ];
        $mailerlite_result = hl_subscribe_to_mailerlite($newsletter_tags, $email, $fields);

        wp_send_json(array(
            'success' => true,
            'subscribed_groups' => $mailerlite_result['subscribed_groups'],
            'user_id' => $mailerlite_result['user_id'],
            'message' => __('Successfully subscribed to newsletter!', 'app')
        ));
    } catch (\Exception $e) {
        wp_send_json(array('success' => false, 'message' => $e->getMessage()));
    }
}

// Download guide handler
add_action('wp_ajax_download_guide', 'hl_handle_download_guide');
add_action('wp_ajax_nopriv_download_guide', 'hl_handle_download_guide');

function hl_handle_download_guide()
{
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'hl_cta_nonce')) {
        wp_send_json(array('success' => false, 'message' => __('Security check failed', 'app')));
        return;
    }

    // Verify Turnstile token using the plugin's function
    if (function_exists('cfturnstile_check')) {
        $turnstile_result = cfturnstile_check($_POST['cf-turnstile-response'] ?? '');
        if (!$turnstile_result || !$turnstile_result['success']) {
            wp_send_json(array('success' => false, 'message' => __('Security verification failed. Please try again.', 'app')));
            return;
        }
    }

    $email = sanitize_email($_POST['email'] ?? '');
    $name = sanitize_text_field($_POST['name'] ?? '');
    $download_file = esc_url_raw($_POST['download_file'] ?? '');
    $subscribe_newsletter = isset($_POST['subscribe_newsletter']) ? true : false;
    $newsletter_tags = sanitize_text_field($_POST['newsletter_tags'] ?? 'general');


    if (empty($email) || empty($download_file)) {
        wp_send_json(array('success' => false, 'message' => __('Email and download file are required', 'app')));
        return;
    }

    try {

        // Subscribe to newsletter if requested
        if ($subscribe_newsletter) {

            $fields = [
                'name' => $name,
            ];
            $mailerlite_result = hl_subscribe_to_mailerlite($newsletter_tags, $email, $fields);

            wp_send_json(array(
                'success' => true,
                'subscribed_groups' => $mailerlite_result['subscribed_groups'],
                'user_id' => $mailerlite_result['user_id'],
                'message' => __('Successfully subscribed to newsletter!', 'app'),
                'download_url' => $download_file,
            ));
        }

        wp_send_json(array(
            'success' => true,
            'message' => __('Download started!', 'app'),
            'download_url' => $download_file
        ));
    } catch (\Exception $e) {
        wp_send_json(array('success' => false, 'message' => $e->getMessage()));
    }
}

/**
 * MailerLite Integration Functions
 */
function hl_subscribe_to_mailerlite($newsletter_tags, $email, $fields)
{
    $newsletter_tags = explode(',', $newsletter_tags);
    $newsletter_tags = array_map('trim', $newsletter_tags);
    $newsletter_tags = array_map('strtolower', $newsletter_tags);

    $mailerlite = new \Includes\Shortcodes\CtaPopup\Mailerlite();
    $groups = $mailerlite->get_group_by_name($newsletter_tags);

    $groups = array_filter($groups, function ($group) use ($newsletter_tags) {
        return in_array(strtolower($group['name']), $newsletter_tags);
    });
    $group_ids = array_column($groups, 'id');
    $mailerlite_result = $mailerlite->add_subscriber($email, $fields, $group_ids);

    $subscribed_groups = array_column($groups, 'name');

    return array(
        'subscribed_groups' => $subscribed_groups,
        'user_id' => $mailerlite_result['data']['id'],
    );
}
