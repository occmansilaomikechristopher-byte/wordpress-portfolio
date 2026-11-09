<?php
/**
 * Quadro Theme Functions and Definitions
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

define('QUADRO_VERSION', '1.0.0');

/**
 * Theme Setup
 */
function quadro_theme_setup() {
    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable Featured Images
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 500, true);
    add_image_size('quadro-member-portrait', 450, 450, true);
    add_image_size('quadro-project-preview', 750, 470, true);

    // Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Gutenberg wide alignment & responsive embeds
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    // Register Nav Menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Header Menu', 'quadro'),
        'footer-menu'  => __('Footer Navigation Menu', 'quadro'),
    ));
}
add_action('after_setup_theme', 'quadro_theme_setup');

/**
 * Enqueue Styles and Scripts
 */
function quadro_enqueue_scripts() {
    // Google Fonts: Inter & JetBrains Mono
    wp_enqueue_style(
        'quadro-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Core Theme Stylesheet (Variables & Reset)
    wp_enqueue_style('quadro-style', get_stylesheet_uri(), array(), QUADRO_VERSION);

    // Components CSS
    wp_enqueue_style(
        'quadro-components',
        get_template_directory_uri() . '/assets/css/components.css',
        array('quadro-style'),
        QUADRO_VERSION
    );

    // Main Layout CSS
    wp_enqueue_style(
        'quadro-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('quadro-components'),
        QUADRO_VERSION
    );

    // Responsive CSS
    wp_enqueue_style(
        'quadro-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('quadro-main'),
        QUADRO_VERSION
    );

    // Futuristic Welcome Intro Screen Styles
    wp_enqueue_style(
        'quadro-welcome-intro',
        get_template_directory_uri() . '/assets/css/welcome-intro.css',
        array('quadro-responsive'),
        QUADRO_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'quadro-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        QUADRO_VERSION,
        true
    );

    // Futuristic Welcome Intro Screen Controller
    wp_enqueue_script(
        'quadro-welcome-intro',
        get_template_directory_uri() . '/assets/js/welcome-intro.js',
        array(),
        QUADRO_VERSION,
        true
    );

    // Dynamic Project Filtering Script
    wp_enqueue_script(
        'quadro-project-filter',
        get_template_directory_uri() . '/assets/js/project-filter.js',
        array(),
        QUADRO_VERSION,
        true
    );

    // AJAX Contact Form Script
    wp_enqueue_script(
        'quadro-contact-ajax',
        get_template_directory_uri() . '/assets/js/contact-ajax.js',
        array(),
        QUADRO_VERSION,
        true
    );

    // Localize Script for AJAX Nonces & Endpoint
    wp_localize_script('quadro-contact-ajax', 'quadro_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('quadro_contact_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'quadro_enqueue_scripts');

/**
 * Fallback Navigation Menu
 */
function quadro_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'quadro') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about-us')) . '">' . __('About Us', 'quadro') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/our-team')) . '">' . __('Our Team', 'quadro') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/our-projects')) . '">' . __('Projects', 'quadro') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact-us')) . '">' . __('Contact', 'quadro') . '</a></li>';
    echo '</ul>';
}

/**
 * Include Modular Features
 */
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/meta-boxes.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/ajax-contact.php';
require_once get_template_directory() . '/inc/demo-data-seeder.php';

