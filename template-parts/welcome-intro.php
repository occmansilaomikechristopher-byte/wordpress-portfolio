<?php
/**
 * Template Part: Futuristic Welcome Intro Screen
 *
 * @package Quadro
 */

if (!defined('ABSPATH')) {
    exit;
}

$audio_dir_uri = get_template_directory_uri() . '/assets/audio';
?>
<!-- Instant Flash Prevention Script -->
<script>
(function() {
    try {
        if (sessionStorage.getItem('quadro_welcome_seen') === 'true') {
            document.documentElement.classList.add('quadro-intro-seen');
        }
    } catch(e) {}
})();
</script>

<div id="quadro-welcome-overlay" class="quadro-welcome-overlay" role="dialog" aria-modal="true" aria-labelledby="intro-main-title">
    <!-- Ambient Sci-Fi Glow Orbs -->
    <div class="intro-glow-orb intro-glow-cyan" aria-hidden="true"></div>
    <div class="intro-glow-orb intro-glow-purple" aria-hidden="true"></div>

    <!-- Central Futuristic Glass Card -->
    <div class="intro-card">
        <!-- Status Indicator Pill -->
        <div class="intro-status-pill">
            <span class="intro-status-dot-wrap">
                <span class="intro-status-ring"></span>
                <span class="intro-status-dot"></span>
            </span>
            <span><?php _e('SYSTEM ONLINE // QUADRO OS', 'quadro'); ?></span>
        </div>

        <!-- Brand Emblem -->
        <div>
            <span class="intro-emblem">Q4</span>
        </div>

        <!-- Main Title -->
        <h1 id="intro-main-title" class="intro-title">
            <?php _e('Welcome to', 'quadro'); ?> <span class="intro-title-gradient">Quadro.dev</span>
        </h1>

        <!-- Subtitle / Tagline -->
        <p class="intro-tagline">
            <?php _e('Four Specialized Minds. One Seamless Engineering Force.', 'quadro'); ?>
        </p>

        <!-- Four Core Disciplines -->
        <div class="intro-disciplines">
            <span class="intro-discipline-pill"><?php _e('Software Programming', 'quadro'); ?></span>
            <span class="intro-discipline-pill"><?php _e('Data Analytics', 'quadro'); ?></span>
            <span class="intro-discipline-pill"><?php _e('Project Management', 'quadro'); ?></span>
            <span class="intro-discipline-pill"><?php _e('Technical Writing', 'quadro'); ?></span>
        </div>

        <!-- Prominent ENTER PORTFOLIO Action Button -->
        <button id="quadro-enter-btn" class="intro-enter-btn" type="button" aria-label="<?php esc_attr_e('Enter Portfolio with Voice Introduction', 'quadro'); ?>">
            <span class="intro-enter-btn-inner">
                <span class="intro-sound-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                        <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
                    </svg>
                </span>
                <span><?php _e('ENTER PORTFOLIO', 'quadro'); ?></span>
            </span>

            <!-- Audio Waveform Visualizer (Active during voice playback) -->
            <span class="intro-waveform" aria-hidden="true">
                <span></span><span></span><span></span><span></span><span></span>
            </span>
        </button>

        <!-- Voice Status Feedback -->
        <div id="intro-voice-notice" class="intro-voice-notice" aria-live="polite">
            <span class="voice-notice-pulse"></span>
            <span><?php _e('Playing AI Voice Introduction...', 'quadro'); ?></span>
        </div>

        <!-- Skip Intro Link -->
        <div class="intro-skip-wrap">
            <button id="quadro-skip-btn" class="intro-skip-btn" type="button">
                <span><?php _e('Skip Intro', 'quadro'); ?></span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="13 17 18 12 13 7"></polyline>
                    <polyline points="6 17 11 12 6 7"></polyline>
                </svg>
            </button>
        </div>
    </div>

    <!-- Hidden High-Fidelity Audio Element -->
    <audio id="quadro-welcome-audio" preload="auto">
        <source src="<?php echo esc_url($audio_dir_uri . '/welcome.mp3'); ?>" type="audio/mpeg">
        <source src="<?php echo esc_url($audio_dir_uri . '/welcome.ogg'); ?>" type="audio/ogg">
    </audio>
</div>
