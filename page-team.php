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
                <h4 style="color: var(--accent-cyan); margin-bottom: 1rem;">Programming</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• PHP 8.x Object-Oriented Logic</li>
                    <li>• MySQL Relational Queries</li>
                    <li>• Modern JavaScript (ES6+)</li>
                    <li>• Custom WordPress Theme APIs</li>
                    <li>• Algorithms & Backend Security</li>
                </ul>
            </div>

            <div>
                <h4 style="color: #38bdf8; margin-bottom: 1rem;">Data Analysis</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• Python Data Modeling & Pandas</li>
                    <li>• SQL Query Optimization</li>
                    <li>• Statistical Forecasting & Metrics</li>
                    <li>• Tableau & PowerBI Dashboards</li>
                    <li>• Telemetry Trend Analytics</li>
                </ul>
            </div>

            <div>
                <h4 style="color: #a5b4fc; margin-bottom: 1rem;">Project Management</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• Agile & Scrum Sprint Planning</li>
                    <li>• JIRA & Trello Roadmaps</li>
                    <li>• Quality Assurance Benchmarks</li>
                    <li>• Resource & Velocity Management</li>
                    <li>• Milestone Risk Mitigation</li>
                </ul>
            </div>

            <div>
                <h4 style="color: #c4b5fd; margin-bottom: 1rem;">Technical Writing</h4>
                <ul style="color: var(--text-secondary); line-height: 2;">
                    <li>• REST API Endpoint Documentation</li>
                    <li>• Software Architecture Manuals</li>
                    <li>• Markdown & OpenAPI Standards</li>
                    <li>• Standard Operating Procedures</li>
                    <li>• User & Developer Onboarding Guides</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

