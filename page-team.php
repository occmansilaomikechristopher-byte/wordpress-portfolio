<?php
/**
 * Template Name: Our Team Page
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container section-padding">
    <div class="section-header">
        <span class="section-eyebrow"><?php _e('The Engineering Force', 'quadro'); ?></span>
        <h1 class="section-title"><?php _e('Meet Our 4-Member Group', 'quadro'); ?></h1>
        <p class="section-subtitle">
            <?php _e('Four specialized engineers and designers combining frontend artistry, backend scalability, user-centered design, and full-stack integration.', 'quadro'); ?>
        </p>
    </div>

    <?php
    $team_query = new WP_Query(array(
        'post_type'      => 'team_member',
        'posts_per_page' => 4,
        'orderby'        => 'date',
        'order'          => 'ASC',
    ));

    if ($team_query->have_posts()) :
    ?>
        <div class="team-grid">
            <?php
            while ($team_query->have_posts()) :
                $team_query->the_post();
                get_template_part('template-parts/member-card');
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    <?php else : ?>
        <div class="glass-card" style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h3><?php _e('No Team Members Configured Yet', 'quadro'); ?></h3>
            <p><?php _e('Log into WP Admin and use the "Portfolio Demo Setup" menu to instantly seed the 4 member profiles.', 'quadro'); ?></p>
        </div>
    <?php endif; ?>

    <!-- Collective Skills Matrix -->
    <div class="glass-card" style="margin-top: 5rem; padding: 3rem;">
        <div style="text-align: center; max-width: 680px; margin: 0 auto 2.5rem auto;">
            <span class="badge badge-emerald" style="margin-bottom: 0.75rem;"><?php _e('Collective Competency', 'quadro'); ?></span>
            <h2><?php _e('Our Combined Technology Stack', 'quadro'); ?></h2>
            <p><?php _e('We leverage industry-standard technologies to build reliable, high-speed applications.', 'quadro'); ?></p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem;">
            <div>
                <h4 style="color: var(--accent-cyan); margin-bottom: 1rem;">Frontend</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• HTML5 (Semantic & Accessible)</li>
                    <li>• CSS3, PostCSS & CSS Grid</li>
                    <li>• Modern JavaScript (ES6+)</li>
                    <li>• Tailwind CSS & SCSS</li>
                    <li>• React & Micro-frontends</li>
                </ul>
            </div>

            <div>
                <h4 style="color: #a5b4fc; margin-bottom: 1rem;">Backend & DB</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• PHP 8.x Object-Oriented Architecture</li>
                    <li>• MySQL & MariaDB Normalization</li>
                    <li>• RESTful API Development</li>
                    <li>• WordPress Internal APIs & Hooks</li>
                    <li>• Session & Cache Optimization</li>
                </ul>
            </div>

            <div>
                <h4 style="color: #6ee7b7; margin-bottom: 1rem;">Design & UI</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• Figma Design Systems & Tokens</li>
                    <li>• Interactive Prototyping</li>
                    <li>• Wireframing & User Journeys</li>
                    <li>• Responsive Breakpoint Planning</li>
                    <li>• WCAG 2.1 AA Accessibility</li>
                </ul>
            </div>

            <div>
                <h4 style="color: #f59e0b; margin-bottom: 1rem;">Full-Stack & DevOps</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• Full Software Lifecycle Management</li>
                    <li>• Git & GitHub Collaboration</li>
                    <li>• Headless CMS & Decoupled APIs</li>
                    <li>• Security Audits & Input Sanitization</li>
                    <li>• XAMPP & Apache Deployment</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

