<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container section-padding" style="min-height: 65vh; display: flex; align-items: center; justify-content: center;">
    <div class="glass-card" style="text-align: center; max-width: 600px; padding: 4rem 2.5rem;">
        <span class="badge badge-cyan" style="margin-bottom: 1.25rem;">ERROR 404</span>
        <h1 style="font-size: clamp(3rem, 6vw, 4.5rem); font-family: var(--font-mono); color: var(--accent-cyan); line-height: 1; margin-bottom: 1rem;">
            404
        </h1>
        <h2 style="margin-bottom: 1rem;"><?php _e('Endpoint Not Found', 'quadro'); ?></h2>
        <p style="color: var(--text-secondary); margin-bottom: 2rem;">
            <?php _e('The requested route does not exist or has been relocated within our codebase.', 'quadro'); ?>
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                <?php _e('Return to Home', 'quadro'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/our-projects')); ?>" class="btn btn-secondary">
                <?php _e('Browse Projects', 'quadro'); ?>
            </a>
        </div>
    </div>
</div>

<?php
get_footer();

