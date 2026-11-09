<?php
/**
 * Theme Header
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php get_template_part('template-parts/welcome-intro'); ?>

<header class="site-header">
    <div class="container">
        <div class="nav-container">
            <!-- Brand Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <span class="logo-mark">Q4</span>
                <span class="logo-text">Quadro<span>.dev</span></span>
            </a>

            <!-- Desktop Nav Menu -->
            <nav class="primary-nav" aria-label="<?php esc_attr_e('Main Navigation', 'quadro'); ?>">
                <?php
                if (has_nav_menu('primary-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => 'quadro_fallback_menu',
                        'items_wrap'     => '<ul>%3$s</ul>',
                    ));
                } else {
                    quadro_fallback_menu();
                }
                ?>
            </nav>

            <!-- Nav Actions -->
            <div class="nav-actions">
                <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-primary btn-sm">
                    <?php _e('Hire Our Team', 'quadro'); ?>
                </a>

                <!-- Mobile Hamburger Toggle -->
                <button type="button" class="mobile-toggle" aria-label="<?php esc_attr_e('Open navigation menu', 'quadro'); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="drawer-backdrop"></div>
<aside class="mobile-drawer" aria-label="<?php esc_attr_e('Mobile Navigation Drawer', 'quadro'); ?>">
    <div>
        <div class="drawer-header">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <span class="logo-mark">Q4</span>
                <span class="logo-text">Quadro<span>.dev</span></span>
            </a>
            <button type="button" class="drawer-close" aria-label="<?php esc_attr_e('Close menu', 'quadro'); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <nav class="mobile-nav-links">
            <?php
            if (has_nav_menu('primary-menu')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'quadro_fallback_menu',
                    'items_wrap'     => '<ul>%3$s</ul>',
                ));
            } else {
                quadro_fallback_menu();
            }
            ?>
        </nav>
    </div>

    <div style="margin-top: 2rem;">
        <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-primary" style="width: 100%;">
            <?php _e('Get in Touch', 'quadro'); ?>
        </a>
    </div>
</aside>

<main id="primary" class="site-main">

