<?php
/**
 * Template Part: Team Member Card
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

$member_id   = get_the_ID();
$role_title  = quadro_get_member_role($member_id);
$skills      = quadro_get_member_skills_array($member_id);
$socials     = quadro_get_member_socials($member_id);
$permalink   = get_permalink($member_id);
$member_name = get_the_title();
?>

<div class="member-card">
    <div class="member-card-header">
        <div class="member-avatar-wrapper">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('quadro-member-portrait', array('class' => 'member-avatar', 'alt' => esc_attr($member_name))); ?>
            <?php else : ?>
                <div class="member-avatar-fallback">
                    <?php
                    // Get initials
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

        <h3 class="member-name">
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($member_name); ?></a>
        </h3>

        <div class="member-role">
            <span class="badge badge-cyan"><?php echo esc_html($role_title); ?></span>
        </div>
    </div>

    <div class="member-card-body">
        <div class="member-bio">
            <?php
            if (has_excerpt()) {
                the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 18, '...');
            }
            ?>
        </div>

        <?php if (!empty($skills)) : ?>
            <div class="member-skills-section">
                <div class="member-skills-label"><?php _e('Core Stack', 'quadro'); ?></div>
                <div class="skill-tags">
                    <?php foreach (array_slice($skills, 0, 4) as $skill) : ?>
                        <span class="skill-tag"><?php echo esc_html($skill); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="member-card-footer">
        <div class="member-social-links">
            <?php if (!empty($socials['github'])) : ?>
                <a href="<?php echo esc_url($socials['github']); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="GitHub">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                </a>
            <?php endif; ?>

            <?php if (!empty($socials['linkedin'])) : ?>
                <a href="<?php echo esc_url($socials['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="LinkedIn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
            <?php endif; ?>

            <?php if (!empty($socials['portfolio'])) : ?>
                <a href="<?php echo esc_url($socials['portfolio']); ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="Website / Portfolio">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </a>
            <?php endif; ?>
        </div>

        <a href="<?php echo esc_url($permalink); ?>" class="btn btn-secondary btn-sm">
            <?php _e('View Profile', 'quadro'); ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>
</div>

