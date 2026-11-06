<?php
/**
 * Main Template File (Fallback)
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
        <span class="section-eyebrow"><?php _e('Latest Updates', 'quadro'); ?></span>
        <h1 class="section-title"><?php single_post_title(); ?></h1>
    </div>

    <?php if (have_posts()) : ?>
        <div class="projects-grid">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('project-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="project-thumbnail-wrapper">
                            <?php the_post_thumbnail('medium_large', array('class' => 'project-thumbnail')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="project-card-body">
                        <h2 class="project-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="project-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                    <div class="project-card-footer">
                        <span style="font-size: 0.85rem; color: var(--text-muted);"><?php echo get_the_date(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php _e('Read More', 'quadro'); ?></a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div style="margin-top: 3rem; text-align: center;">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <div class="glass-card" style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h2><?php _e('No Content Found', 'quadro'); ?></h2>
            <p><?php _e('There are no posts available at the moment. Please check back later.', 'quadro'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary" style="margin-top: 1rem;"><?php _e('Back to Home', 'quadro'); ?></a>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();

