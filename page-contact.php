<?php
/**
 * Template Name: Contact Us Page
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$selected_recipient = isset($_GET['recipient']) ? sanitize_text_field($_GET['recipient']) : 'all';

// Fetch all team members for dropdown
$members = get_posts(array(
    'post_type'      => 'team_member',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'ASC',
));
?>

<div class="container section-padding">
    <div class="section-header">
        <span class="section-eyebrow"><?php _e('Direct Channels', 'quadro'); ?></span>
        <h1 class="section-title"><?php _e("Let's Build Something Exceptional", 'quadro'); ?></h1>
        <p class="section-subtitle">
            <?php _e('Send an inquiry directly to our four-member collective or address a specific specialist.', 'quadro'); ?>
        </p>
    </div>

    <div class="contact-grid">
        <!-- Left: Direct Info & Availability -->
        <div>
            <span class="badge badge-cyan" style="margin-bottom: 1rem;"><?php _e('Team Availability', 'quadro'); ?></span>
            <h2><?php _e('Direct Communication With Actual Builders', 'quadro'); ?></h2>
            <p style="margin-top: 1rem; font-size: 1.05rem;">
                <?php _e('We welcome discussions around custom software programming, relational database systems, predictive data analytics, agile project governance, and technical documentation. Expect a reply within 24 hours.', 'quadro'); ?>
            </p>

            <div class="contact-info-list">
                <!-- Email Item -->
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div class="contact-info-content">
                        <h4><?php _e('Direct Team Email', 'quadro'); ?></h4>
                        <p><a href="mailto:occmansilaomikechristopher@gmail.com">occmansilaomikechristopher@gmail.com</a></p>
                    </div>
                </div>

                <!-- Location & Timezone -->
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="contact-info-content">
                        <h4><?php _e('Global Remote / Timezone', 'quadro'); ?></h4>
                        <p><?php _e('Available Across UTC-8 to UTC+8 Flexible Working Hours', 'quadro'); ?></p>
                    </div>
                </div>

                <!-- GitHub Collective -->
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </div>
                    <div class="contact-info-content">
                        <h4><?php _e('Open Source Repositories', 'quadro'); ?></h4>
                        <p><a href="https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio" target="_blank" rel="noopener noreferrer">github.com/occmansilaomikechristopher-byte</a></p>
                    </div>
                </div>
            </div>

            <!-- Response Guarantee Pill -->
            <div class="glass-card" style="margin-top: 2.5rem; padding: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div class="status-dot"></div>
                    <span style="font-size: 0.9rem; font-weight: 600; color: var(--text-white);"><?php _e('Engineering Response Guarantee', 'quadro'); ?></span>
                </div>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.5rem;">
                    <?php _e('No automated bot queues. Your inquiry is reviewed directly by our group engineers.', 'quadro'); ?>
                </p>
            </div>
        </div>

        <!-- Right: Secure AJAX Contact Form -->
        <div>
            <div class="glass-card">
                <h3 style="margin-bottom: 0.5rem;"><?php _e('Send A Secure Message', 'quadro'); ?></h3>
                <p style="font-size: 0.925rem; color: var(--text-muted); margin-bottom: 2rem;">
                    <?php _e('Protected with WordPress security nonces and instant sanitization.', 'quadro'); ?>
                </p>

                <!-- Feedback Alert Container -->
                <div id="quadro-form-alert" class="form-alert"></div>

                <form id="quadro-contact-form" novalidate>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                        <div class="form-group">
                            <label for="contact_name" class="form-label"><?php _e('Your Full Name', 'quadro'); ?> *</label>
                            <input type="text" id="contact_name" name="name" class="form-control" placeholder="Alex Morgan" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_email" class="form-label"><?php _e('Your Email Address', 'quadro'); ?> *</label>
                            <input type="email" id="contact_email" name="email" class="form-control" placeholder="alex@company.com" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                        <div class="form-group">
                            <label for="contact_recipient" class="form-label"><?php _e('Addressed To', 'quadro'); ?></label>
                            <select id="contact_recipient" name="recipient" class="form-control">
                                <option value="all" <?php selected($selected_recipient, 'all'); ?>>
                                    <?php _e('-- Entire 4-Member Group --', 'quadro'); ?>
                                </option>
                                <?php foreach ($members as $member) : ?>
                                    <option value="<?php echo esc_attr($member->ID); ?>" <?php selected($selected_recipient, (string)$member->ID); ?>>
                                        <?php echo esc_html($member->post_title); ?> (<?php echo esc_html(quadro_get_member_role($member->ID)); ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_subject" class="form-label"><?php _e('Subject', 'quadro'); ?></label>
                            <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Project Collaboration Inquiry">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact_message" class="form-label"><?php _e('Project Details & Message', 'quadro'); ?> *</label>
                        <textarea id="contact_message" name="message" class="form-control" rows="5" placeholder="Tell us about your project objectives, timeline, or requirements..." required></textarea>
                    </div>

                    <button type="submit" id="quadro-submit-btn" class="btn btn-primary btn-lg" style="width: 100%;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        <?php _e('Transmit Message Directly', 'quadro'); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

