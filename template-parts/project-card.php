<?php
/**
 * Template Part: Project Card
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

$project_id   = get_the_ID();
$tech_stack   = quadro_get_project_tech_array($project_id);
$category     = quadro_get_project_category($project_id);
$live_demo    = get_post_meta($project_id, '_project_live_demo', true);
$github_url   = get_post_meta($project_id, '_project_github_url', true);
$permalink    = get_permalink($project_id);
$project_title = get_the_title();
?>

<div class="project-card" data-category="<?php echo esc_attr(strtolower($category['slug'])); ?>">
    <div class="project-thumbnail-wrapper">
        <span class="project-category-badge badge badge-indigo"><?php echo esc_html($category['name']); ?></span>
        
        <a href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($project_title); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('quadro-project-preview', array('class' => 'project-thumbnail', 'alt' => esc_attr($project_title))); ?>
            <?php else : ?>
                <div class="project-thumbnail-placeholder">
                    <span>&lt;/&gt; <?php echo esc_html($project_title); ?></span>
                </div>
            <?php endif; ?>
        </a>
    </div>

    <div class="project-card-body">
        <h3 class="project-title">
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($project_title); ?></a>
        </h3>

        <div class="project-excerpt">
            <?php
            if (has_excerpt()) {
                the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 16, '...');
            }
            ?>
        </div>

        <?php if (!empty($tech_stack)) : ?>
            <div class="project-tech-stack">
                <div class="skill-tags">
                    <?php foreach (array_slice($tech_stack, 0, 4) as $tech) : ?>
                        <span class="skill-tag"><?php echo esc_html($tech); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="project-card-footer">
        <div class="project-actions">
            <?php if (!empty($live_demo)) : ?>
                <a href="<?php echo esc_url($live_demo); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" title="Live Preview">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    <?php _e('Live Demo', 'quadro'); ?>
                </a>
            <?php endif; ?>

            <?php if (!empty($github_url)) : ?>
                <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="Source Code">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                </a>
            <?php endif; ?>
        </div>

        <a href="<?php echo esc_url($permalink); ?>" class="btn btn-outline btn-sm">
            <?php _e('Details', 'quadro'); ?>
        </a>
    </div>
</div>

