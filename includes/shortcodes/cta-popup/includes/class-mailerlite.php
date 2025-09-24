<?php

namespace Includes\Shortcodes\CtaPopup;

/**
 * Mailerlite class
 */
class Mailerlite
{
    /**
     * API URL
     */
    const API_URL = 'https://connect.mailerlite.com/api';

    /**
     * API key
     */
    private $api_key;

    /**
     * Mailerlite constructor
     */
    public function __construct()
    {
        $this->api_key = get_field('mailerlite_api_key', 'option');
        if (!$this->api_key) {
            throw new \Exception('MailerLite API key is not set');
        }
    }

    /**
     * Fetch group(s) by name
     */
    public function get_group_by_name($names): array
    {
        if (is_array($names)) {
            $names = implode(',', $names);
        }

        $url = self::API_URL . '/groups?filter[name]=' . urlencode($names);
        $data = $this->send_request($url, 'GET');

        return !empty($data['data']) ? $data['data'] : [];
    }

    /**
     * Add subscriber
     */
    public function add_subscriber($email, $fields, $groups = [])
    {
        $url = self::API_URL . '/subscribers';

        return $this->send_request($url, 'POST', [
            'email' => $email,
            'fields' => $fields,
            'subscribed_at' => current_time('mysql'),
            'groups' => $groups,
        ]);
    }

    /**
     * Send request to MailerLite API
     */
    private function send_request($url, $method, $body = [])
    {
        $args = [
            'method'  => $method,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->api_key,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'User-Agent'    => $_SERVER['HTTP_USER_AGENT'],
            ],
            'timeout' => 30,
        ];

        if (!empty($body)) {
            $args['body'] = wp_json_encode($body);
        }

        $response = wp_remote_request($url, $args);

        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);

        return json_decode($body, true);
    }
}
