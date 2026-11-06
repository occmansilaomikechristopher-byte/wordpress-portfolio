<?php
/**
 * Single Team Member Profile Template
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$member_id   = get_the_ID();
$member_name = get_the_title();
$role_title  = quadro_get_member_role($member_id);
$skills      = quadro_get_member_skills_array($member_id);
$socials     = quadro_get_member_socials($member_id);
$experience  = get_post_meta($member_id, '_member_experience', true);
$contact_url = add_query_arg('recipient', $member_id, home_url('/contact-us'));
?>

<div class="container section-padding">
    <!-- Breadcrumb / Back button -->
    <div style="margin-bottom: 2rem;">
        <a href="<?php echo esc_url(home_url('/our-team')); ?>" class="btn btn-secondary btn-sm">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            <?php _e('Back to All Members', 'quadro'); ?>
        </a>
    </div>

    <!-- Member Profile Header Dossier -->
    <div class="member-profile-header">
        <div>
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('quadro-member-portrait', array('class' => 'member-profile-avatar', 'alt' => esc_attr($member_name))); ?>
            <?php else : ?>
                <div class="member-profile-avatar" style="background: var(--bg-surface-elevated); display: flex; align-items: center; justify-content: center; font-size: 4rem; color: var(--accent-cyan); font-weight: 800;">
                    <?php
                    $words = explode(' ', $member_name);
                    $initials = '';
                    foreach ($words as $w) {
                        $initials .= mb_substr($w, 0, 1);
                    }
                    echo esc_html(strtoupper(substr($initials, 0, 2)));
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="member-profile-details">
            <div class="member-profile-meta">
                <span class="badge badge-cyan"><?php echo esc_html($role_title); ?></span>
                <?php if (!empty($experience)) : ?>
                    <span class="badge badge-indigo"><?php echo esc_html($experience); ?> <?php _e('Experience', 'quadro'); ?></span>
                <?php endif; ?>
                <span class="status-pill">
                    <span class="status-dot"></span>
                    <span><?php _e('Active Contributor', 'quadro'); ?></span>
                </span>
            </div>

            <h1><?php echo esc_html($member_name); ?></h1>

            <p style="font-size: 1.15rem; color: var(--text-secondary); max-width: 680px; margin-top: 0.75rem;">
                <?php echo get_the_excerpt(); ?>
            </p>

            <div class="member-profile-socials">
                <?php if (!empty($socials['github'])) : ?>
                    <a href="<?php echo esc_url($socials['github']); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="GitHub">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>
                <?php endif; ?>

                <?php if (!empty($socials['linkedin'])) : ?>
                    <a href="<?php echo esc_url($socials['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="LinkedIn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                <?php endif; ?>

                <?php if (!empty($socials['portfolio'])) : ?>
                    <a href="<?php echo esc_url($socials['portfolio']); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="Personal Portfolio">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    </a>
                <?php endif; ?>

                <a href="<?php echo esc_url($contact_url); ?>" class="btn btn-primary btn-sm" style="margin-left: 0.5rem;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <?php printf(__('Message %s', 'quadro'), esc_html($member_name)); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Biography & Skills Breakdown Grid -->
    <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 3rem; margin-bottom: 5rem;">
        <div class="glass-card">
            <h3 style="margin-bottom: 1.25rem;"><?php _e('Biography & Background', 'quadro'); ?></h3>
            <div style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.8;">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="glass-card">
            <h3 style="margin-bottom: 1.5rem;"><?php _e('Technical Competencies', 'quadro'); ?></h3>

            <?php if (!empty($skills)) : ?>
                <div class="skill-tags" style="margin-bottom: 2rem;">
                    <?php foreach ($skills as $skill) : ?>
                        <span class="skill-tag" style="font-size: 0.85rem; padding: 0.35rem 0.85rem;"><?php echo esc_html($skill); ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- Proficiency Meters -->
                <div>
                    <h4 style="font-size: 0.95rem; text-transform: uppercase; color: var(--text-muted); margin-bottom: 1rem;"><?php _e('Proficiency Breakdown', 'quadro'); ?></h4>
                    <?php
                    $percentages = array('95%', '90%', '88%', '85%', '92%');
                    foreach (array_slice($skills, 0, 4) as $idx => $s) :
                        $pct = isset($percentages[$idx]) ? $percentages[$idx] : '85%';
                    ?>
                        <div class="skill-bar-container">
                            <div class="skill-bar-header">
                                <span><?php echo esc_html($s); ?></span>
                                <span style="font-family: var(--font-mono); color: var(--accent-cyan);"><?php echo esc_html($pct); ?></span>
                            </div>
                            <div class="skill-bar-track">
                                <div class="skill-bar-fill" style="width: <?php echo esc_attr($pct); ?>;"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p><?php _e('No skills specified for this member.', 'quadro'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Member's Contributed Projects -->
    <div>
        <div class="section-header" style="text-align: left; margin-bottom: 2.5rem;">
            <span class="section-eyebrow"><?php _e('Portfolio Contribution', 'quadro'); ?></span>
            <h2><?php printf(__('Projects Featuring %s', 'quadro'), esc_html($member_name)); ?></h2>
        </div>

        <?php
        $member_projects = new WP_Query(array(
            'post_type'      => 'portfolio_project',
            'posts_per_page' => 3,
            'meta_query'     => array(
                'relation' => 'OR',
                array(
                    'key'   => '_project_assigned_member',
                    'value' => $member_id,
                ),
                array(
                    'key'     => '_project_assigned_member',
                    'value'   => '',
                    'compare' => '=',
                ),
            ),
        ));

        if ($member_projects->have_posts()) :
        ?>
            <div class="projects-grid">
                <?php
                while ($member_projects->have_posts()) :
                    $member_projects->the_post();
                    get_template_part('template-parts/project-card');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <p><?php _e('No specific projects mapped to this member yet.', 'quadro'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();

