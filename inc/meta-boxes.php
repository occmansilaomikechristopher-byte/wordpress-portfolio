<?php
/**
 * Custom Meta Boxes for Team Members and Projects
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Meta Boxes
 */
function quadro_add_custom_meta_boxes() {
    // Member Details Box
    add_meta_box(
        'quadro_member_details',
        __('Member Professional Details & Social Links', 'quadro'),
        'quadro_render_member_meta_box',
        'team_member',
        'normal',
        'high'
    );

    // Project Details Box
    add_meta_box(
        'quadro_project_details',
        __('Project Specifications & Links', 'quadro'),
        'quadro_render_project_meta_box',
        'portfolio_project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'quadro_add_custom_meta_boxes');

/**
 * Render Team Member Meta Box
 */
function quadro_render_member_meta_box($post) {
    wp_nonce_field('quadro_save_member_meta', 'quadro_member_nonce');

    $role_title  = get_post_meta($post->ID, '_member_role_title', true);
    $skills      = get_post_meta($post->ID, '_member_skills', true);
    $experience  = get_post_meta($post->ID, '_member_experience', true);
    $email       = get_post_meta($post->ID, '_member_email', true);
    $github      = get_post_meta($post->ID, '_member_github', true);
    $linkedin    = get_post_meta($post->ID, '_member_linkedin', true);
    $twitter     = get_post_meta($post->ID, '_member_twitter', true);
    $portfolio   = get_post_meta($post->ID, '_member_portfolio', true);
    $featured    = get_post_meta($post->ID, '_member_featured', true);
    ?>
    <style>
        .quadro-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 10px; }
        .quadro-meta-field { margin-bottom: 14px; }
        .quadro-meta-field label { display: block; font-weight: 600; margin-bottom: 5px; color: #1e293b; }
        .quadro-meta-field input[type="text"],
        .quadro-meta-field input[type="email"],
        .quadro-meta-field input[type="url"] { width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 4px; }
        .quadro-meta-help { font-size: 12px; color: #64748b; margin-top: 4px; }
    </style>

    <div class="quadro-meta-grid">
        <div class="quadro-meta-field">
            <label for="member_role_title"><?php _e('Role / Position Title', 'quadro'); ?> *</label>
            <input type="text" id="member_role_title" name="member_role_title" value="<?php echo esc_attr($role_title); ?>" placeholder="e.g. Frontend Developer" required />
            <p class="quadro-meta-help"><?php _e('Displayed prominently on team cards and individual profile.', 'quadro'); ?></p>
        </div>

        <div class="quadro-meta-field">
            <label for="member_experience"><?php _e('Experience Level', 'quadro'); ?></label>
            <input type="text" id="member_experience" name="member_experience" value="<?php echo esc_attr($experience); ?>" placeholder="e.g. 3+ Years" />
        </div>
    </div>

    <div class="quadro-meta-field">
        <label for="member_skills"><?php _e('Technical Skills (Comma separated)', 'quadro'); ?> *</label>
        <input type="text" id="member_skills" name="member_skills" value="<?php echo esc_attr($skills); ?>" placeholder="e.g. HTML, CSS, JavaScript, WordPress, Tailwind" required />
        <p class="quadro-meta-help"><?php _e('List core technical competencies separated by commas.', 'quadro'); ?></p>
    </div>

    <div class="quadro-meta-grid">
        <div class="quadro-meta-field">
            <label for="member_email"><?php _e('Direct Email Address', 'quadro'); ?></label>
            <input type="email" id="member_email" name="member_email" value="<?php echo esc_attr($email); ?>" placeholder="member@quadro-dev.com" />
        </div>

        <div class="quadro-meta-field">
            <label for="member_github"><?php _e('GitHub Profile URL', 'quadro'); ?></label>
            <input type="url" id="member_github" name="member_github" value="<?php echo esc_url($github); ?>" placeholder="https://github.com/username" />
        </div>

        <div class="quadro-meta-field">
            <label for="member_linkedin"><?php _e('LinkedIn Profile URL', 'quadro'); ?></label>
            <input type="url" id="member_linkedin" name="member_linkedin" value="<?php echo esc_url($linkedin); ?>" placeholder="https://linkedin.com/in/username" />
        </div>

        <div class="quadro-meta-field">
            <label for="member_twitter"><?php _e('Twitter / X Profile URL', 'quadro'); ?></label>
            <input type="url" id="member_twitter" name="member_twitter" value="<?php echo esc_url($twitter); ?>" placeholder="https://x.com/username" />
        </div>
    </div>

    <div class="quadro-meta-field">
        <label for="member_portfolio"><?php _e('Personal Portfolio / Blog URL', 'quadro'); ?></label>
        <input type="url" id="member_portfolio" name="member_portfolio" value="<?php echo esc_url($portfolio); ?>" placeholder="https://personalportfolio.dev" />
    </div>

    <div class="quadro-meta-field" style="margin-top: 15px;">
        <label>
            <input type="checkbox" name="member_featured" value="1" <?php checked($featured, '1'); ?> />
            <strong><?php _e('Feature this member on the homepage preview', 'quadro'); ?></strong>
        </label>
    </div>
    <?php
}

/**
 * Render Project Meta Box
 */
function quadro_render_project_meta_box($post) {
    wp_nonce_field('quadro_save_project_meta', 'quadro_project_nonce');

    $tech_stack      = get_post_meta($post->ID, '_project_tech_stack', true);
    $live_demo       = get_post_meta($post->ID, '_project_live_demo', true);
    $github_url      = get_post_meta($post->ID, '_project_github_url', true);
    $client          = get_post_meta($post->ID, '_project_client', true);
    $year            = get_post_meta($post->ID, '_project_year', true);
    $featured        = get_post_meta($post->ID, '_project_featured', true);
    $assigned_member = get_post_meta($post->ID, '_project_assigned_member', true);

    // Get list of all team members for assignment
    $members = get_posts(array(
        'post_type'      => 'team_member',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ));
    ?>
    <div class="quadro-meta-field">
        <label for="project_tech_stack"><?php _e('Technologies Used (Comma separated)', 'quadro'); ?> *</label>
        <input type="text" id="project_tech_stack" name="project_tech_stack" value="<?php echo esc_attr($tech_stack); ?>" placeholder="e.g. PHP, WordPress, React, Tailwind CSS, MySQL" style="width: 100%; padding: 8px;" required />
        <p class="quadro-meta-help"><?php _e('Tech badges displayed on the project card.', 'quadro'); ?></p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div class="quadro-meta-field">
            <label for="project_live_demo"><?php _e('Live Demo URL', 'quadro'); ?></label>
            <input type="url" id="project_live_demo" name="project_live_demo" value="<?php echo esc_url($live_demo); ?>" placeholder="https://demo.project.com" style="width: 100%; padding: 8px;" />
        </div>

        <div class="quadro-meta-field">
            <label for="project_github_url"><?php _e('GitHub Repository URL', 'quadro'); ?></label>
            <input type="url" id="project_github_url" name="project_github_url" value="<?php echo esc_url($github_url); ?>" placeholder="https://github.com/organization/repo" style="width: 100%; padding: 8px;" />
        </div>

        <div class="quadro-meta-field">
            <label for="project_client"><?php _e('Client / Context', 'quadro'); ?></label>
            <input type="text" id="project_client" name="project_client" value="<?php echo esc_attr($client); ?>" placeholder="e.g. Enterprise Client / Open Source" style="width: 100%; padding: 8px;" />
        </div>

        <div class="quadro-meta-field">
            <label for="project_year"><?php _e('Year / Completion Date', 'quadro'); ?></label>
            <input type="text" id="project_year" name="project_year" value="<?php echo esc_attr($year); ?>" placeholder="e.g. 2026" style="width: 100%; padding: 8px;" />
        </div>
    </div>

    <div class="quadro-meta-field">
        <label for="project_assigned_member"><?php _e('Lead / Assigned Team Member', 'quadro'); ?></label>
        <select id="project_assigned_member" name="project_assigned_member" style="width: 100%; padding: 8px;">
            <option value=""><?php _e('-- Entire Team / Collaborative Project --', 'quadro'); ?></option>
            <?php foreach ($members as $member) : ?>
                <option value="<?php echo esc_attr($member->ID); ?>" <?php selected($assigned_member, $member->ID); ?>>
                    <?php echo esc_html($member->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="quadro-meta-field" style="margin-top: 15px;">
        <label>
            <input type="checkbox" name="project_featured" value="1" <?php checked($featured, '1'); ?> />
            <strong><?php _e('Feature this project on the Homepage', 'quadro'); ?></strong>
        </label>
    </div>
    <?php
}

/**
 * Save Team Member Meta
 */
function quadro_save_member_meta($post_id) {
    if (!isset($_POST['quadro_member_nonce']) || !wp_verify_nonce($_POST['quadro_member_nonce'], 'quadro_save_member_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array(
        '_member_role_title' => 'sanitize_text_field',
        '_member_skills'     => 'sanitize_text_field',
        '_member_experience' => 'sanitize_text_field',
        '_member_email'      => 'sanitize_email',
        '_member_github'     => 'esc_url_raw',
        '_member_linkedin'   => 'esc_url_raw',
        '_member_twitter'    => 'esc_url_raw',
        '_member_portfolio'  => 'esc_url_raw',
    );

    foreach ($fields as $field_key => $sanitizer) {
        $post_key = substr($field_key, 1); // remove leading underscore
        if (isset($_POST[$post_key])) {
            update_post_meta($post_id, $field_key, call_user_func($sanitizer, $_POST[$post_key]));
        } else {
            delete_post_meta($post_id, $field_key);
        }
    }

    $featured = isset($_POST['member_featured']) ? '1' : '0';
    update_post_meta($post_id, '_member_featured', $featured);
}
add_action('save_post_team_member', 'quadro_save_member_meta');

/**
 * Save Project Meta
 */
function quadro_save_project_meta($post_id) {
    if (!isset($_POST['quadro_project_nonce']) || !wp_verify_nonce($_POST['quadro_project_nonce'], 'quadro_save_project_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array(
        '_project_tech_stack'      => 'sanitize_text_field',
        '_project_live_demo'       => 'esc_url_raw',
        '_project_github_url'      => 'esc_url_raw',
        '_project_client'          => 'sanitize_text_field',
        '_project_year'            => 'sanitize_text_field',
        '_project_assigned_member' => 'absint',
    );

    foreach ($fields as $field_key => $sanitizer) {
        $post_key = substr($field_key, 1);
        if (isset($_POST[$post_key])) {
            update_post_meta($post_id, $field_key, call_user_func($sanitizer, $_POST[$post_key]));
        } else {
            delete_post_meta($post_id, $field_key);
        }
    }

    $featured = isset($_POST['project_featured']) ? '1' : '0';
    update_post_meta($post_id, '_project_featured', $featured);
}
add_action('save_post_portfolio_project', 'quadro_save_project_meta');

