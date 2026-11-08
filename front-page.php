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
                <span><?php _e('BSIT Cloud Computing & Software Engineering Collective', 'quadro'); ?></span>
            </span>
        </div>

        <h1 class="hero-title">
            <?php _e('Four Specialized Minds.', 'quadro'); ?><br>
            <span class="gradient-text"><?php _e('One Seamless Engineering Force.', 'quadro'); ?></span>
        </h1>

        <p class="hero-description">
            <?php _e('We are a multidisciplinary team of four specialists delivering robust software programming, predictive data analytics, agile project governance, and comprehensive technical documentation.', 'quadro'); ?>
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
                <?php _e('Each team member anchors a critical pillar of modern software delivery, uniting programming, data intelligence, agile leadership, and technical documentation.', 'quadro'); ?>
            </p>
        </div>

        <div class="about-pillars-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
            <!-- Pillar 1 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3 class="pillar-title"><?php _e('Software Programming', 'quadro'); ?></h3>
                <p><?php _e('Robust PHP backend logic, MySQL relational database management, clean OOP architecture, and dynamic WordPress web applications.', 'quadro'); ?></p>
            </div>

            <!-- Pillar 2 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                </div>
                <h3 class="pillar-title"><?php _e('Data Analytics', 'quadro'); ?></h3>
                <p><?php _e('Quantitative telemetry analysis, statistical reporting, SQL query optimization, and interactive data visualization dashboards.', 'quadro'); ?></p>
            </div>

            <!-- Pillar 3 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <h3 class="pillar-title"><?php _e('Project Management', 'quadro'); ?></h3>
                <p><?php _e('Agile/Scrum roadmapping, cross-functional team leadership, milestone sprint planning, and quality assurance oversight.', 'quadro'); ?></p>
            </div>

            <!-- Pillar 4 -->
            <div class="pillar-card">
                <div class="pillar-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                </div>
                <h3 class="pillar-title"><?php _e('Technical Writing', 'quadro'); ?></h3>
                <p><?php _e('Exhaustive REST API specifications, system architecture documentation, standard operating procedures, and developer guides.', 'quadro'); ?></p>
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
                <?php _e('Get to know each specialist shaping our programming, data analytics, project leadership, and technical documentation.', 'quadro'); ?>
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

