<?php
/**
 * AJAX Contact Form Submission Handler
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

function quadro_handle_contact_submission() {
    // 1. Verify Nonce / Security Token
    if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'quadro_contact_nonce')) {
        wp_send_json_error(array(
            'message' => __('Security verification failed. Please reload the page and try again.', 'quadro')
        ), 403);
    }

    // 2. Sanitize & Validate Inputs
    $name      = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email     = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $subject   = isset($_POST['subject']) ? sanitize_text_field(wp_unslash($_POST['subject'])) : 'New Portfolio Contact Form Inquiry';
    $message   = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
    $recipient = isset($_POST['member_recipient']) ? sanitize_text_field(wp_unslash($_POST['member_recipient'])) : 'all';

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array(
            'message' => __('All required fields (Name, Email, Message) must be filled.', 'quadro')
        ), 400);
    }

    if (!is_email($email)) {
        wp_send_json_error(array(
            'message' => __('Please provide a valid email address.', 'quadro')
        ), 400);
    }

    // 3. Determine Recipient Email
    $admin_email = get_option('admin_email');
    $to_email    = $admin_email;
    $target_name = 'Entire Team';

    if ($recipient !== 'all' && is_numeric($recipient)) {
        $member_email = get_post_meta((int)$recipient, '_member_email', true);
        $member_title = get_the_title((int)$recipient);
        if (!empty($member_email)) {
            $to_email    = $member_email;
            $target_name = $member_title;
        }
    }

    // 4. Store Inquiries Locally in WP Options (Guarantees local testing works without SMTP)
    $inquiry = array(
        'id'        => uniqid('msg_'),
        'timestamp' => current_time('mysql'),
        'name'      => $name,
        'email'     => $email,
        'subject'   => $subject,
        'message'   => $message,
        'recipient' => $target_name,
    );

    $saved_inquiries = get_option('quadro_contact_messages', array());
    array_unshift($saved_inquiries, $inquiry);
    // Keep last 50 inquiries
    $saved_inquiries = array_slice($saved_inquiries, 0, 50);
    update_option('quadro_contact_messages', $saved_inquiries);

    // 5. Send Email via wp_mail
    $email_subject = sprintf('[%s] %s', get_bloginfo('name'), $subject);
    $email_body    = "You have received a new inquiry via the portfolio website:\n\n";
    $email_body   .= "From: " . $name . " <" . $email . ">\n";
    $email_body   .= "Addressed To: " . $target_name . "\n";
    $email_body   .= "Subject: " . $subject . "\n\n";
    $email_body   .= "Message:\n" . $message . "\n\n";
    $email_body   .= "---\nSent from Quadro Portfolio Website (" . home_url() . ")";

    $headers = array(
        'From: ' . get_bloginfo('name') . ' <no-reply@' . wp_parse_url(home_url(), PHP_URL_HOST) . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'Content-Type: text/plain; charset=UTF-8',
    );

    @wp_mail($to_email, $email_subject, $email_body, $headers);

    wp_send_json_success(array(
        'message' => sprintf(__('Thank you, %s! Your message has been sent to %s. We will get back to you shortly.', 'quadro'), esc_html($name), esc_html($target_name))
    ));
}
add_action('wp_ajax_quadro_submit_contact', 'quadro_handle_contact_submission');
add_action('wp_ajax_nopriv_quadro_submit_contact', 'quadro_handle_contact_submission');

