<?php
/**
 * Template Name: Home Page
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- 1. Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-pill">
            <span class="status-pill">
                <span class="status-dot"></span>
                <span><?php _e('Software Engineering & Design Syndicate', 'quadro'); ?></span>
            </span>
        </div>

        <h1 class="hero-title">
            <?php _e('Four Specialized Minds.', 'quadro'); ?><br>
            <span class="gradient-text"><?php _e('One Seamless Engineering Force.', 'quadro'); ?></span>
        </h1>

        <p class="hero-description">
            <?php _e('We are a tightly-knit group of four developers and designers delivering high-performance web applications, resilient backend architectures, intuitive user interfaces, and custom WordPress solutions.', 'quadro'); ?>
        </p>

        <div class="hero-cta-group">
            <a href="<?php echo esc_url(home_url('/our-projects')); ?>" class="btn btn-primary btn-lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                <?php _e('Explore Our Projects', 'quadro'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/our-team')); ?>" class="btn btn-secondary btn-lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <?php _e('Meet The 4 Members', 'quadro'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-outline btn-lg">
                <?php _e("Let's Collaborate", 'quadro'); ?>
            </a>
        </div>

        <!-- Real-Time Metrics / Stats Bar -->
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">4</div>
                <div class="stat-label"><?php _e('Core Specialists', 'quadro'); ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-number">25+</div>
                <div class="stat-label"><?php _e('Shipped Projects', 'quadro'); ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99.8%</div>
                <div class="stat-label"><?php _e('Uptime & Quality', 'quadro'); ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label"><?php _e('Custom Engineered', 'quadro'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Four Disciplines / Core Pillars -->
<section class="section-padding" style="background: rgba(6, 9, 14, 0.4);">
    <div class="container">
        <div class="section-header">
            <span class="section-eyebrow"><?php _e('Our Collective Power', 'quadro'); ?></span>
            <h2 class="section-title"><?php _e('Engineered Across Four Disciplines', 'quadro'); ?></h2>
            <p class="section-subtitle">
                <?php _e('Each team member anchors a critical pillar of modern software delivery, creating a frictionless workflow from Figma to production.', 'quadro'); ?>
            </p>
        </div>

        <div class="about-pillars-grid">
            <!-- Pillar 1 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3 class="pillar-title"><?php _e('Frontend Engineering', 'quadro'); ?></h3>
                <p><?php _e('Modern JavaScript, semantic HTML5, fluid responsive styling, and micro-interactions optimized for 60fps rendering speeds.', 'quadro'); ?></p>
            </div>

            <!-- Pillar 2 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                </div>
                <h3 class="pillar-title"><?php _e('Backend & Database', 'quadro'); ?></h3>
                <p><?php _e('Robust PHP backends, relational MySQL schema optimization, REST API endpoints, and rock-solid server security.', 'quadro'); ?></p>
            </div>

            <!-- Pillar 3 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                </div>
                <h3 class="pillar-title"><?php _e('UI/UX Design Systems', 'quadro'); ?></h3>
                <p><?php _e('Human-centered design, interactive wireframing, WCAG accessible interfaces, and scalable design tokens created in Figma.', 'quadro'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Featured Projects Showcase -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-eyebrow"><?php _e('Proof of Work', 'quadro'); ?></span>
            <h2 class="section-title"><?php _e('Featured Collaborative Projects', 'quadro'); ?></h2>
            <p class="section-subtitle">
                <?php _e('Explore selected web applications, systems, and digital platforms built by our four team members.', 'quadro'); ?>
            </p>
        </div>

        <?php
        $featured_projects = new WP_Query(array(
            'post_type'      => 'portfolio_project',
            'posts_per_page' => 3,
            'meta_key'       => '_project_featured',
            'meta_value'     => '1',
        ));

        // Fallback to recent projects if none marked featured
        if (!$featured_projects->have_posts()) {
            $featured_projects = new WP_Query(array(
                'post_type'      => 'portfolio_project',
                'posts_per_page' => 3,
            ));
        }

        if ($featured_projects->have_posts()) :
        ?>
            <div class="projects-grid">
                <?php
                while ($featured_projects->have_posts()) :
                    $featured_projects->the_post();
                    get_template_part('template-parts/project-card');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div style="text-align: center; margin-top: 3.5rem;">
                <a href="<?php echo esc_url(home_url('/our-projects')); ?>" class="btn btn-secondary">
                    <?php _e('View All Projects (Showcase Archive)', 'quadro'); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        <?php else : ?>
            <p style="text-align: center; color: var(--text-muted);"><?php _e('No projects yet. Use the Portfolio Demo Setup in WP Admin to seed projects.', 'quadro'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- 4. Meet The 4 Team Members -->
<section class="section-padding" style="background: rgba(6, 9, 14, 0.4);">
    <div class="container">
        <div class="section-header">
            <span class="section-eyebrow"><?php _e('The Squad', 'quadro'); ?></span>
            <h2 class="section-title"><?php _e('Meet The 4 Team Members', 'quadro'); ?></h2>
            <p class="section-subtitle">
                <?php _e('Get to know each developer and designer shaping our digital architecture.', 'quadro'); ?>
            </p>
        </div>

        <?php
        $team_members = new WP_Query(array(
            'post_type'      => 'team_member',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'ASC',
        ));

        if ($team_members->have_posts()) :
        ?>
            <div class="team-grid">
                <?php
                while ($team_members->have_posts()) :
                    $team_members->the_post();
                    get_template_part('template-parts/member-card');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div style="text-align: center; margin-top: 3.5rem;">
                <a href="<?php echo esc_url(home_url('/our-team')); ?>" class="btn btn-outline">
                    <?php _e('Detailed Team Dossier & Profiles', 'quadro'); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        <?php else : ?>
            <p style="text-align: center; color: var(--text-muted);"><?php _e('No members yet. Use the Portfolio Demo Setup in WP Admin to seed members.', 'quadro'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- 5. High-Conversion Contact CTA Banner -->
<section class="section-padding">
    <div class="container">
        <div class="glass-card" style="padding: 4rem 3rem; text-align: center; max-width: 900px; margin: 0 auto; position: relative; overflow: hidden;">
            <span class="badge badge-cyan" style="margin-bottom: 1.25rem;"><?php _e('Ready to Build Something Remarkable?', 'quadro'); ?></span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.75rem); margin-bottom: 1.25rem;">
                <?php _e('Let our 4-member group bring your next vision into reality.', 'quadro'); ?>
            </h2>
            <p style="max-width: 600px; margin: 0 auto 2.5rem auto; font-size: 1.1rem; color: var(--text-secondary);">
                <?php _e('Whether you need a custom WordPress theme, an enterprise web application, or an end-to-end design system, we are ready to collaborate.', 'quadro'); ?>
            </p>
            <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-primary btn-lg">
                    <?php _e('Start A Project With Us', 'quadro'); ?>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

