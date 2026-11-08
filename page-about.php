<?php
/**
 * Template Name: About Us Page
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container section-padding">
    <!-- About Hero Section -->
    <div class="about-hero-grid">
        <div>
            <span class="badge badge-cyan about-intro-badge"><?php _e('About Our Collective', 'quadro'); ?></span>
            <h1 class="about-intro-title">
                <?php _e('Four Passionate Developers.', 'quadro'); ?><br>
                <span class="gradient-text"><?php _e('United by Engineering Craft.', 'quadro'); ?></span>
            </h1>
            <p class="about-lead-text">
                <?php _e('Quadro was formed with a straightforward belief: specialized talent works best when closely aligned. Rather than a bloated agency hierarchy, we are four dedicated builders covering every facet of modern web engineering.', 'quadro'); ?>
            </p>
            <p>
                <?php _e('With backgrounds spanning frontend performance, backend infrastructure, user interface research, and full-stack integration, our collaborative workflow ensures zero translation loss between design concepts and production code.', 'quadro'); ?>
            </p>
            <div style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/our-team')); ?>" class="btn btn-secondary">
                    <?php _e('Meet The 4 Members', 'quadro'); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </div>

        <div>
            <div class="glass-card">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                    <div class="status-dot"></div>
                    <span style="font-family: var(--font-mono); font-size: 0.85rem; color: var(--accent-cyan); text-transform: uppercase;"><?php _e('The Quadro Standard', 'quadro'); ?></span>
                </div>
                <h3 style="margin-bottom: 1rem;"><?php _e('Why Work With a 4-Member Group?', 'quadro'); ?></h3>
                <ul style="display: flex; flex-direction: column; gap: 1rem; color: var(--text-secondary); font-size: 0.95rem;">
                    <li style="display: flex; gap: 0.75rem;">
                        <span style="color: var(--accent-emerald);">✔</span>
                        <span><strong>Direct Access to Builders:</strong> You talk directly with the engineers creating your code, never account managers.</span>
                    </li>
                    <li style="display: flex; gap: 0.75rem;">
                        <span style="color: var(--accent-emerald);">✔</span>
                        <span><strong>End-to-End Ownership:</strong> From Figma UI tokens to MySQL database queries, every layer is handled by an expert.</span>
                    </li>
                    <li style="display: flex; gap: 0.75rem;">
                        <span style="color: var(--accent-emerald);">✔</span>
                        <span><strong>Clean, Maintainable WordPress:</strong> No bloated plugins or spaghetti code; only high-performance custom architecture.</span>
                    </li>
                    <li style="display: flex; gap: 0.75rem;">
                        <span style="color: var(--accent-emerald);">✔</span>
                        <span><strong>Rapid Delivery Cycles:</strong> Agile sprints with weekly demos and continuous integration.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Mission, Vision & Goals -->
    <div class="section-header" style="margin-top: 2rem;">
        <span class="section-eyebrow"><?php _e('Our Foundation', 'quadro'); ?></span>
        <h2 class="section-title"><?php _e('Mission, Vision & Strategic Goals', 'quadro'); ?></h2>
    </div>

    <div class="about-pillars-grid">
        <!-- Mission -->
        <div class="pillar-card">
            <div class="pillar-icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
            </div>
            <h3 class="pillar-title"><?php _e('Our Mission', 'quadro'); ?></h3>
            <p><?php _e('To build robust, accessible, and high-performance digital software that empowers teams, elevates user experiences, and sets the standard for modern WordPress and web application craftsmanship.', 'quadro'); ?></p>
        </div>

        <!-- Vision -->
        <div class="pillar-card">
            <div class="pillar-icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </div>
            <h3 class="pillar-title"><?php _e('Our Vision', 'quadro'); ?></h3>
            <p><?php _e('To become a benchmark development team recognized for architectural rigor, clean code standards, human-centered UI design, and frictionless cross-disciplinary execution.', 'quadro'); ?></p>
        </div>

        <!-- Goals -->
        <div class="pillar-card">
            <div class="pillar-icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <h3 class="pillar-title"><?php _e('Our Core Goals', 'quadro'); ?></h3>
            <p><?php _e('Achieve 100% PageSpeed performance ratings, zero security vulnerabilities, flawless mobile responsiveness, and long-term maintainability on every project we deliver.', 'quadro'); ?></p>
        </div>
    </div>

    <!-- Development Philosophy & Workflow -->
    <div class="section-header" style="margin-top: 4rem;">
        <span class="section-eyebrow"><?php _e('How We Build', 'quadro'); ?></span>
        <h2 class="section-title"><?php _e('Our 4-Phase Development Philosophy', 'quadro'); ?></h2>
        <p class="section-subtitle">
            <?php _e('A disciplined engineering cycle that translates ambiguity into rock-solid software.', 'quadro'); ?>
        </p>
    </div>

    <div class="philosophy-grid">
        <div class="philosophy-item">
            <div class="philosophy-step"><?php _e('PHASE 01', 'quadro'); ?></div>
            <h4><?php _e('Project Governance & Sprints', 'quadro'); ?></h4>
            <p><?php _e('Led by Project Manager Ariel Caharian: sprint backlogs, agile velocity planning, milestone roadmapping, and cross-functional alignment.', 'quadro'); ?></p>
        </div>

        <div class="philosophy-item">
            <div class="philosophy-step"><?php _e('PHASE 02', 'quadro'); ?></div>
            <h4><?php _e('Data Modeling & Analytics', 'quadro'); ?></h4>
            <p><?php _e('Led by Data Analyst Niel Kenneth De jesus: relational schema design, SQL data normalization, telemetry analytics, and statistical modeling.', 'quadro'); ?></p>
        </div>

        <div class="philosophy-item">
            <div class="philosophy-step"><?php _e('PHASE 03', 'quadro'); ?></div>
            <h4><?php _e('Programming & Integration', 'quadro'); ?></h4>
            <p><?php _e('Led by Programmer Mike Christopher Mansilao: object-oriented PHP architecture, secure MySQL queries, custom WordPress components, and responsive frontends.', 'quadro'); ?></p>
        </div>

        <div class="philosophy-item">
            <div class="philosophy-step"><?php _e('PHASE 04', 'quadro'); ?></div>
            <h4><?php _e('Technical Documentation', 'quadro'); ?></h4>
            <p><?php _e('Led by Technical Writer Lorence Mar Bigtasin: REST API endpoint specs, architecture manuals, SOP guidelines, and end-user documentation.', 'quadro'); ?></p>
        </div>
    </div>
</div>

<?php
get_footer();

