<?php
/**
 * Custom Template Tags and Helper Functions
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get member role title with fallback
 */
function quadro_get_member_role($post_id = 0) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $role = get_post_meta($post_id, '_member_role_title', true);
    if (!empty($role)) {
        return esc_html($role);
    }
    // Check taxonomy
    $terms = get_the_terms($post_id, 'member_role');
    if (!empty($terms) && !is_wp_error($terms)) {
        return esc_html($terms[0]->name);
    }
    return __('Software Specialist', 'quadro');
}

/**
 * Get technical skills as an array
 */
function quadro_get_member_skills_array($post_id = 0) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $skills_raw = get_post_meta($post_id, '_member_skills', true);
    if (empty($skills_raw)) {
        return array();
    }
    return array_map('trim', explode(',', $skills_raw));
}

/**
 * Get member social profile links
 */
function quadro_get_member_socials($post_id = 0) {
    $post_id = $post_id ? $post_id : get_the_ID();
    return array(
        'github'    => get_post_meta($post_id, '_member_github', true),
        'linkedin'  => get_post_meta($post_id, '_member_linkedin', true),
        'twitter'   => get_post_meta($post_id, '_member_twitter', true),
        'portfolio' => get_post_meta($post_id, '_member_portfolio', true),
        'email'     => get_post_meta($post_id, '_member_email', true),
    );
}

/**
 * Get project tech stack array
 */
function quadro_get_project_tech_array($post_id = 0) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $tech_raw = get_post_meta($post_id, '_project_tech_stack', true);
    if (empty($tech_raw)) {
        return array();
    }
    return array_map('trim', explode(',', $tech_raw));
}

/**
 * Get project primary category
 */
function quadro_get_project_category($post_id = 0) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $terms = get_the_terms($post_id, 'project_category');
    if (!empty($terms) && !is_wp_error($terms)) {
        return array(
            'slug' => $terms[0]->slug,
            'name' => $terms[0]->name
        );
    }
    return array(
        'slug' => 'general',
        'name' => __('Featured', 'quadro')
    );
}

