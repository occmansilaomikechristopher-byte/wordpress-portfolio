<?php
/**
 * Theme Footer
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
</main><!-- #primary -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-top">
            <!-- Brand & Status -->
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <span class="logo-mark">Q4</span>
                    <span class="logo-text">Quadro<span>.dev</span></span>
                </a>
                <p><?php _e('A multidisciplinary BSIT collective of 4 specialists covering Programming, Data Analysis, Project Management, and Technical Writing.', 'quadro'); ?></p>
                
                <div class="status-pill">
                    <span class="status-dot"></span>
                    <span><?php _e('Available for Q4 2026 Collaborations', 'quadro'); ?></span>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="footer-heading"><?php _e('Explore', 'quadro'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us')); ?>"><?php _e('About Team', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/our-team')); ?>"><?php _e('The 4 Members', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/our-projects')); ?>"><?php _e('Projects Showcase', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact-us')); ?>"><?php _e('Contact Us', 'quadro'); ?></a></li>
                </ul>
            </div>

            <!-- Tech Focus -->
            <div>
                <h4 class="footer-heading"><?php _e('Disciplines', 'quadro'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/our-team')); ?>"><?php _e('Software Programming', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/our-team')); ?>"><?php _e('Data Analytics & Reporting', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/our-team')); ?>"><?php _e('Agile Project Management', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/our-team')); ?>"><?php _e('Technical Writing & Documentation', 'quadro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/our-projects')); ?>"><?php _e('Cloud Computing & WordPress', 'quadro'); ?></a></li>
                </ul>
            </div>

            <!-- Connect -->
            <div>
                <h4 class="footer-heading"><?php _e('Connect', 'quadro'); ?></h4>
                <div style="display: flex; gap: 0.6rem; margin-bottom: 1.25rem;">
                    <a href="https://github.com/occmansilaomikechristopher-byte/wordpress-portfolio" target="_blank" rel="noopener noreferrer" class="social-link" title="GitHub Collective">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>
                    <a href="mailto:contact@quadro-dev.com" class="social-link" title="Gmail: contact@quadro-dev.com">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </a>
                    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="social-link" title="Twitter / X">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                </div>
                <p style="font-size: 0.85rem; color: var(--text-muted);">
                    <?php _e('Need custom engineering? Drop us a line anytime.', 'quadro'); ?>
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <div>
                &copy; <?php echo esc_html(date('Y')); ?> <strong>Quadro Engineering Collective</strong>. <?php _e('All rights reserved.', 'quadro'); ?>
            </div>
            <div>
                <?php _e('Built with WordPress & Modern Web Standards.', 'quadro'); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

