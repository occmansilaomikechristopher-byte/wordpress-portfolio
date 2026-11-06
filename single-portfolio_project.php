<?php
/**
 * Single Portfolio Project Case Study
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$project_id      = get_the_ID();
$project_title   = get_the_title();
$tech_stack      = quadro_get_project_tech_array($project_id);
$category        = quadro_get_project_category($project_id);
$live_demo       = get_post_meta($project_id, '_project_live_demo', true);
$github_url      = get_post_meta($project_id, '_project_github_url', true);
$client          = get_post_meta($project_id, '_project_client', true);
$year            = get_post_meta($project_id, '_project_year', true);
$assigned_member = get_post_meta($project_id, '_project_assigned_member', true);
?>

<div class="container section-padding">
    <!-- Back to projects -->
    <div style="margin-bottom: 2rem;">
        <a href="<?php echo esc_url(home_url('/our-projects')); ?>" class="btn btn-secondary btn-sm">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            <?php _e('Back to Projects Showcase', 'quadro'); ?>
        </a>
    </div>

    <!-- Project Hero Header -->
    <div class="project-hero">
        <span class="badge badge-indigo" style="margin-bottom: 1rem;"><?php echo esc_html($category['name']); ?></span>
        <h1 style="font-size: clamp(2.25rem, 4.5vw, 3.5rem); margin-bottom: 1rem;"><?php echo esc_html($project_title); ?></h1>
        
        <p style="font-size: 1.2rem; color: var(--text-secondary); max-width: 800px;">
            <?php echo get_the_excerpt(); ?>
        </p>

        <!-- Project Meta Strip -->
        <div class="project-meta-strip">
            <?php if (!empty($client)) : ?>
                <div class="project-meta-item">
                    <span class="meta-label"><?php _e('Client / Context', 'quadro'); ?></span>
                    <span class="meta-value"><?php echo esc_html($client); ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($year)) : ?>
                <div class="project-meta-item">
                    <span class="meta-label"><?php _e('Completion Year', 'quadro'); ?></span>
                    <span class="meta-value"><?php echo esc_html($year); ?></span>
                </div>
            <?php endif; ?>

            <div class="project-meta-item">
                <span class="meta-label"><?php _e('Category', 'quadro'); ?></span>
                <span class="meta-value"><?php echo esc_html($category['name']); ?></span>
            </div>

            <div style="margin-left: auto; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <?php if (!empty($live_demo)) : ?>
                    <a href="<?php echo esc_url($live_demo); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                        <?php _e('Visit Live Demo', 'quadro'); ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($github_url)) : ?>
                    <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                        <?php _e('GitHub Repository', 'quadro'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Featured Image or Mockup -->
    <div style="margin-bottom: 3.5rem; border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border-subtle);">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', array('style' => 'width: 100%; max-height: 550px; object-fit: cover;')); ?>
        <?php else : ?>
            <div style="background: linear-gradient(135deg, #101726 0%, #06090e 100%); height: 350px; display: flex; align-items: center; justify-content: center; font-family: var(--font-mono); font-size: 1.5rem; color: var(--accent-cyan); border: 1px solid var(--border-subtle);">
                &lt;/&gt; <?php echo esc_html($project_title); ?> Architecture & Codebase
            </div>
        <?php endif; ?>
    </div>

    <!-- Case Study Body & Sidebar -->
    <div class="case-study-content">
        <div class="case-study-body">
            <h2><?php _e('Project Overview & Engineering Architecture', 'quadro'); ?></h2>
            <div style="color: var(--text-secondary); line-height: 1.8; font-size: 1.05rem;">
                <?php the_content(); ?>
            </div>

            <h3 style="margin-top: 2.5rem; margin-bottom: 1rem;"><?php _e('Technical Highlights', 'quadro'); ?></h3>
            <ul style="color: var(--text-secondary); line-height: 2; font-size: 1rem;">
                <li>• Clean component-driven modular structure adhering to SOLID design principles.</li>
                <li>• Strict data validation and escaping across all client-server boundaries.</li>
                <li>• Optimized asset delivery achieving top performance across web vitals.</li>
                <li>• Fully cross-device responsive layout thoroughly tested from 320px to 4K displays.</li>
            </ul>
        </div>

        <div class="case-study-sidebar">
            <div class="glass-card">
                <h3 style="margin-bottom: 1.25rem; font-size: 1.15rem;"><?php _e('Technologies Used', 'quadro'); ?></h3>
                <?php if (!empty($tech_stack)) : ?>
                    <div class="skill-tags" style="margin-bottom: 2rem;">
                        <?php foreach ($tech_stack as $tech) : ?>
                            <span class="skill-tag" style="font-size: 0.825rem; padding: 0.3rem 0.75rem;"><?php echo esc_html($tech); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($assigned_member)) : 
                    $lead_member = get_post($assigned_member);
                    if ($lead_member) :
                        $lead_role = get_post_meta($lead_member->ID, '_member_role_title', true);
                ?>
                    <div style="border-top: 1px solid var(--border-subtle); padding-top: 1.5rem; margin-top: 1.5rem;">
                        <span class="meta-label" style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-muted); font-weight: 600; display: block; margin-bottom: 0.75rem;"><?php _e('Lead Specialist', 'quadro'); ?></span>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--bg-surface-elevated); display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--accent-cyan);">
                                <?php echo esc_html(strtoupper(substr($lead_member->post_title, 0, 2))); ?>
                            </div>
                            <div>
                                <h4 style="margin: 0; font-size: 1rem;"><a href="<?php echo esc_url(get_permalink($lead_member->ID)); ?>"><?php echo esc_html($lead_member->post_title); ?></a></h4>
                                <span style="font-size: 0.8rem; color: var(--accent-cyan);"><?php echo esc_html($lead_role); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; endif; ?>

                <div style="margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-primary" style="width: 100%;">
                        <?php _e('Inquire About Similar Work', 'quadro'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

