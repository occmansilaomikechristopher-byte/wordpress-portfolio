<?php
/**
 * AJAX Contact Form Submission Handler & Admin Inbox
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle AJAX Form Submission
 */
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

    // 4. Store Inquiries Locally in WP Options (Viewable directly in WP Admin)
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
    if (!is_array($saved_inquiries)) {
        $saved_inquiries = array();
    }
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

/**
 * Register Contact Messages Admin Menu Page
 */
function quadro_add_contact_messages_menu() {
    $messages = get_option('quadro_contact_messages', array());
    $count = is_array($messages) ? count($messages) : 0;
    $badge = $count > 0 ? sprintf(' <span class="awaiting-mod update-plugins count-%d"><span class="pending-count">%d</span></span>', $count, $count) : '';

    add_menu_page(
        __('Contact Messages', 'quadro'),
        __('Contact Messages', 'quadro') . $badge,
        'manage_options',
        'quadro-contact-messages',
        'quadro_render_contact_messages_page',
        'dashicons-email-alt',
        23
    );
}
add_action('admin_menu', 'quadro_add_contact_messages_menu');

/**
 * Render Contact Messages Inbox in WP Admin
 */
function quadro_render_contact_messages_page() {
    // Handle Delete Single Message
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['msg_id']) && check_admin_referer('delete_msg_' . $_GET['msg_id'])) {
        $msg_id = sanitize_text_field($_GET['msg_id']);
        $messages = get_option('quadro_contact_messages', array());
        if (is_array($messages)) {
            $messages = array_filter($messages, function($item) use ($msg_id) {
                return isset($item['id']) && $item['id'] !== $msg_id;
            });
            update_option('quadro_contact_messages', array_values($messages));
            echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__('Message deleted successfully.', 'quadro') . '</p></div>';
        }
    }

    // Handle Clear All Messages
    if (isset($_POST['quadro_clear_all_messages']) && check_admin_referer('quadro_clear_messages_nonce')) {
        update_option('quadro_contact_messages', array());
        echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__('All messages cleared.', 'quadro') . '</p></div>';
    }

    $messages = get_option('quadro_contact_messages', array());
    if (!is_array($messages)) {
        $messages = array();
    }
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?php _e('Contact Form Messages & Inquiries', 'quadro'); ?></h1>
        
        <?php if (!empty($messages)) : ?>
            <form method="post" style="display: inline-block; margin-left: 15px;" onsubmit="return confirm('Are you sure you want to delete all messages?');">
                <?php wp_nonce_field('quadro_clear_messages_nonce'); ?>
                <input type="submit" name="quadro_clear_all_messages" class="button" value="<?php esc_attr_e('Clear All Messages', 'quadro'); ?>" />
            </form>
        <?php endif; ?>

        <hr class="wp-header-end">

        <p><?php _e('All messages submitted through the Contact Us form on your portfolio website are logged here securely.', 'quadro'); ?></p>

        <?php if (empty($messages)) : ?>
            <div style="background: #fff; padding: 40px; text-align: center; border-radius: 8px; border: 1px solid #ccd0d4; margin-top: 20px;">
                <span class="dashicons dashicons-email" style="font-size: 48px; width: 48px; height: 48px; color: #94a3b8; margin-bottom: 10px;"></span>
                <h3><?php _e('No Messages in Inbox Yet', 'quadro'); ?></h3>
                <p style="color: #64748b;"><?php _e('When visitors or clients submit the form on your Contact Us page, their messages will appear right here!', 'quadro'); ?></p>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" target="_blank" class="button button-primary">
                    <?php _e('Test Contact Form Now', 'quadro'); ?>
                </a>
            </div>
        <?php else : ?>
            <table class="wp-list-table widefat fixed striped" style="margin-top: 15px;">
                <thead>
                    <tr>
                        <th style="width: 15%;"><?php _e('Date / Time', 'quadro'); ?></th>
                        <th style="width: 20%;"><?php _e('From (Sender)', 'quadro'); ?></th>
                        <th style="width: 15%;"><?php _e('Addressed To', 'quadro'); ?></th>
                        <th style="width: 20%;"><?php _e('Subject', 'quadro'); ?></th>
                        <th style="width: 25%;"><?php _e('Message', 'quadro'); ?></th>
                        <th style="width: 5%;"><?php _e('Action', 'quadro'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $msg) : 
                        $delete_url = wp_nonce_url(admin_url('admin.php?page=quadro-contact-messages&action=delete&msg_id=' . esc_attr($msg['id'])), 'delete_msg_' . $msg['id']);
                    ?>
                        <tr>
                            <td>
                                <strong><?php echo esc_html(date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime($msg['timestamp']))); ?></strong>
                            </td>
                            <td>
                                <strong><?php echo esc_html($msg['name']); ?></strong><br>
                                <a href="mailto:<?php echo esc_attr($msg['email']); ?>"><?php echo esc_html($msg['email']); ?></a>
                            </td>
                            <td>
                                <span class="badge" style="background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 4px; font-weight: 600;">
                                    <?php echo esc_html($msg['recipient']); ?>
                                </span>
                            </td>
                            <td>
                                <strong><?php echo esc_html($msg['subject']); ?></strong>
                            </td>
                            <td style="white-space: pre-wrap; font-size: 13px; line-height: 1.5;">
                                <?php echo esc_html($msg['message']); ?>
                            </td>
                            <td>
                                <a href="<?php echo esc_url($delete_url); ?>" onclick="return confirm('Delete this message?');" style="color: #ef4444; text-decoration: none;" title="Delete">
                                    <span class="dashicons dashicons-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <?php
}
