<?php
/**
 * Template Name: Our Projects Page
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
        <span class="section-eyebrow"><?php _e('Engineering Archive', 'quadro'); ?></span>
        <h1 class="section-title"><?php _e('Our Projects & Software Portfolio', 'quadro'); ?></h1>
        <p class="section-subtitle">
            <?php _e('Explore web platforms, APIs, design systems, and custom applications created by our four-member team.', 'quadro'); ?>
        </p>
    </div>

    <!-- Category Filter Bar -->
    <div class="project-filter-bar">
        <button type="button" class="filter-btn active" data-filter="all"><?php _e('All Projects', 'quadro'); ?></button>
        <button type="button" class="filter-btn" data-filter="frontend"><?php _e('Frontend', 'quadro'); ?></button>
        <button type="button" class="filter-btn" data-filter="backend"><?php _e('Backend', 'quadro'); ?></button>
        <button type="button" class="filter-btn" data-filter="ui/ux"><?php _e('UI/UX Design', 'quadro'); ?></button>
        <button type="button" class="filter-btn" data-filter="full-stack"><?php _e('Full-Stack', 'quadro'); ?></button>
    </div>

    <?php
    $projects_query = new WP_Query(array(
        'post_type'      => 'portfolio_project',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ($projects_query->have_posts()) :
    ?>
        <div class="projects-grid">
            <?php
            while ($projects_query->have_posts()) :
                $projects_query->the_post();
                get_template_part('template-parts/project-card');
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    <?php else : ?>
        <div class="glass-card" style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h3><?php _e('No Projects Available Yet', 'quadro'); ?></h3>
            <p><?php _e('Log into the WordPress dashboard and seed the demo data using "Portfolio Demo Setup".', 'quadro'); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();

