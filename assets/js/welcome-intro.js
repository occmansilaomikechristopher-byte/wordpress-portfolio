/**
 * Quadro Portfolio - Futuristic Welcome Intro Screen Controller
 * Handles user interaction, HTML5 Audio with Web Speech API fallback,
 * browser autoplay compliance, session storage persistence, and cinematic transitions.
 */

(function () {
    'use strict';

    const STORAGE_KEY = 'quadro_welcome_seen';

    function initWelcomeIntro() {
        const overlay = document.getElementById('quadro-welcome-overlay');
        if (!overlay) return;

        // 1. Session persistence check: If already viewed this browsing session, dismiss immediately
        if (sessionStorage.getItem(STORAGE_KEY) === 'true') {
            document.documentElement.classList.add('quadro-intro-seen');
            if (overlay.parentNode) {
                overlay.parentNode.removeChild(overlay);
            }
            return;
        }

        // Lock background page scroll
        document.body.classList.add('quadro-intro-active');

        const enterBtn    = document.getElementById('quadro-enter-btn');
        const skipBtn     = document.getElementById('quadro-skip-btn');
        const audioElement = document.getElementById('quadro-welcome-audio');
        const voiceNotice = document.getElementById('intro-voice-notice');

        let isTransitioning = false;
        let audioTimeout = null;

        // Perform the cinematic transition into the portfolio
        function transitionIntoPortfolio() {
            if (isTransitioning) return;
            isTransitioning = true;

            // Clear any pending safety timers
            if (audioTimeout) {
                clearTimeout(audioTimeout);
                audioTimeout = null;
            }

            // Record that visitor has seen the welcome screen for this session
            try {
                sessionStorage.setItem(STORAGE_KEY, 'true');
            } catch (e) {
                // Ignore storage exceptions if private mode blocks it
            }

            // Restore scroll and trigger cinematic fade/scale/blur
            document.body.classList.remove('quadro-intro-active');
            overlay.classList.add('cinematic-exit');

            // Cleanly remove from DOM after CSS transition finishes
            setTimeout(function () {
                if (overlay.parentNode) {
                    overlay.parentNode.removeChild(overlay);
                }
            }, 900);
        }

        // Fallback using native browser Web Speech API
        function playSpeechSynthesisFallback(onEndCallback) {
            if ('speechSynthesis' in window) {
                try {
                    window.speechSynthesis.cancel();
                    const text = "Welcome to the Quadro.dev Portfolio.";
                    const utterance = new SpeechSynthesisUtterance(text);
                    utterance.rate = 0.90;
                    utterance.pitch = 0.85; // Deep authoritative tone
                    utterance.volume = 1.0;

                    // Choose an English deep male voice if available
                    const voices = window.speechSynthesis.getVoices();
                    const preferredVoice = voices.find(v => v.lang.startsWith('en') && (v.name.includes('David') || v.name.includes('Guy') || v.name.includes('George') || v.name.includes('James') || v.name.toLowerCase().includes('male')));
                    if (preferredVoice) {
                        utterance.voice = preferredVoice;
                    }

                    utterance.onend = onEndCallback;
                    utterance.onerror = onEndCallback;
                    window.speechSynthesis.speak(utterance);

                    // Safety fallback if speech API doesn't fire onend
                    audioTimeout = setTimeout(onEndCallback, 3800);
                    return;
                } catch (err) {
                    console.warn('SpeechSynthesis error:', err);
                }
            }
            // If neither works, transition gracefully
            setTimeout(onEndCallback, 1000);
        }

        // Handle "ENTER PORTFOLIO" button click
        if (enterBtn) {
            enterBtn.addEventListener('click', function () {
                if (isTransitioning) return;

                // Visual active state & waveform visualizer
                enterBtn.classList.add('playing');
                enterBtn.setAttribute('disabled', 'true');
                if (voiceNotice) {
                    voiceNotice.classList.add('active');
                }

                // Play the audio
                let audioPlayed = false;

                if (audioElement) {
                    audioElement.currentTime = 0;
                    const playPromise = audioElement.play();

                    if (playPromise !== undefined) {
                        playPromise.then(function () {
                            audioPlayed = true;

                            // When voice finishes, execute cinematic transition
                            audioElement.addEventListener('ended', function () {
                                transitionIntoPortfolio();
                            }, { once: true });

                            // Safety timeout in case audio file duration hangs
                            audioTimeout = setTimeout(function () {
                                transitionIntoPortfolio();
                            }, 4500);

                        }).catch(function (error) {
                            console.warn('HTML5 Audio playback caught, falling back to Web Speech API:', error);
                            playSpeechSynthesisFallback(transitionIntoPortfolio);
                        });
                    } else {
                        // Older browser compatibility
                        audioElement.onended = transitionIntoPortfolio;
                        audioTimeout = setTimeout(transitionIntoPortfolio, 4500);
                    }
                } else {
                    playSpeechSynthesisFallback(transitionIntoPortfolio);
                }
            });
        }

        // Handle "Skip Intro" click
        if (skipBtn) {
            skipBtn.addEventListener('click', function (e) {
                e.preventDefault();
                // Silence any active audio immediately
                if (audioElement) {
                    try {
                        audioElement.pause();
                        audioElement.currentTime = 0;
                    } catch (ignore) {}
                }
                if ('speechSynthesis' in window) {
                    try {
                        window.speechSynthesis.cancel();
                    } catch (ignore) {}
                }
                transitionIntoPortfolio();
            });
        }

        // Keyboard navigation: Enter or Space on Enter Button, Escape to Skip
        document.addEventListener('keydown', function (e) {
            if (!overlay || overlay.classList.contains('cinematic-exit')) return;

            if (e.key === 'Escape') {
                if (skipBtn) skipBtn.click();
            }
        });
    }

    // Initialize as soon as DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWelcomeIntro);
    } else {
        initWelcomeIntro();
    }
})();
