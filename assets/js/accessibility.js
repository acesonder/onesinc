/**
 * OUTSSINC Platform - Accessibility JavaScript
 * 
 * Handles accessibility features:
 * - Font size adjustments
 * - High contrast mode
 * - Text-to-speech
 * - Reading guide
 * 
 * @package OUTSSINC
 * @version 2.0
 */

(function() {
    'use strict';

    // ===================================
    // State & Storage Keys
    // ===================================
    const STORAGE_PREFIX = 'outssinc_a11y_';
    const state = {
        fontSize: 'normal',
        highContrast: false,
        ttsEnabled: false,
        reduceMotion: false,
        dyslexiaFont: false,
        readingGuide: false
    };

    // Font size levels
    const fontSizes = ['small', 'normal', 'large', 'xlarge', 'xxlarge'];

    // ===================================
    // DOM Ready
    // ===================================
    document.addEventListener('DOMContentLoaded', function() {
        loadSettings();
        initFontControls();
        initContrastToggle();
        initTTS();
        applySettings();
    });

    // ===================================
    // Load & Save Settings
    // ===================================
    function loadSettings() {
        try {
            Object.keys(state).forEach(function(key) {
                var saved = localStorage.getItem(STORAGE_PREFIX + key);
                if (saved !== null) {
                    if (saved === 'true' || saved === 'false') {
                        state[key] = saved === 'true';
                    } else {
                        state[key] = saved;
                    }
                }
            });
        } catch (e) {
            console.warn('Could not load accessibility settings:', e);
        }
    }

    function saveSettings() {
        try {
            Object.keys(state).forEach(function(key) {
                localStorage.setItem(STORAGE_PREFIX + key, state[key]);
            });
        } catch (e) {
            console.warn('Could not save accessibility settings:', e);
        }
    }

    function applySettings() {
        // Apply font size
        document.body.setAttribute('data-font-size', state.fontSize);
        
        // Apply high contrast
        document.body.classList.toggle('high-contrast', state.highContrast);
        
        // Apply reduced motion
        document.body.classList.toggle('reduce-motion', state.reduceMotion);
        
        // Apply dyslexia font
        document.body.classList.toggle('dyslexia-friendly', state.dyslexiaFont);
        
        // Apply reading guide
        document.body.classList.toggle('show-reading-guide', state.readingGuide);
    }

    // ===================================
    // Font Size Controls
    // ===================================
    function initFontControls() {
        var decreaseBtn = document.getElementById('font-decrease');
        var increaseBtn = document.getElementById('font-increase');

        if (decreaseBtn) {
            decreaseBtn.addEventListener('click', function() {
                changeFontSize(-1);
            });
        }

        if (increaseBtn) {
            increaseBtn.addEventListener('click', function() {
                changeFontSize(1);
            });
        }
    }

    function changeFontSize(direction) {
        var currentIndex = fontSizes.indexOf(state.fontSize);
        var newIndex = currentIndex + direction;
        
        if (newIndex >= 0 && newIndex < fontSizes.length) {
            state.fontSize = fontSizes[newIndex];
            applySettings();
            saveSettings();
            
            // Announce change for screen readers
            announce('Font size changed to ' + state.fontSize);
        }
    }

    // ===================================
    // High Contrast Toggle
    // ===================================
    function initContrastToggle() {
        var contrastBtn = document.getElementById('contrast-toggle');
        
        if (contrastBtn) {
            contrastBtn.addEventListener('click', function() {
                state.highContrast = !state.highContrast;
                applySettings();
                saveSettings();
                
                announce('High contrast mode ' + (state.highContrast ? 'enabled' : 'disabled'));
            });
        }
    }

    // ===================================
    // Text-to-Speech
    // ===================================
    function initTTS() {
        var ttsBtn = document.getElementById('tts-toggle');
        
        if (ttsBtn && 'speechSynthesis' in window) {
            ttsBtn.addEventListener('click', function() {
                state.ttsEnabled = !state.ttsEnabled;
                
                if (state.ttsEnabled) {
                    enableTTS();
                } else {
                    disableTTS();
                }
                
                saveSettings();
                announce('Text to speech ' + (state.ttsEnabled ? 'enabled' : 'disabled'));
            });
        } else if (ttsBtn) {
            ttsBtn.style.display = 'none';
        }
    }

    function enableTTS() {
        document.body.classList.add('tts-enabled');
        
        // Add click handlers to readable elements
        var elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, li, a, button, label');
        elements.forEach(function(el) {
            el.setAttribute('data-tts', 'true');
            el.addEventListener('click', speakElement);
        });
    }

    function disableTTS() {
        document.body.classList.remove('tts-enabled');
        window.speechSynthesis.cancel();
        
        var elements = document.querySelectorAll('[data-tts]');
        elements.forEach(function(el) {
            el.removeAttribute('data-tts');
            el.removeEventListener('click', speakElement);
            el.classList.remove('tts-reading');
        });
    }

    function speakElement(e) {
        if (!state.ttsEnabled) return;
        
        var text = this.textContent || this.innerText;
        if (!text.trim()) return;
        
        // Cancel any ongoing speech
        window.speechSynthesis.cancel();
        
        // Highlight element
        document.querySelectorAll('.tts-reading').forEach(function(el) {
            el.classList.remove('tts-reading');
        });
        this.classList.add('tts-reading');
        
        // Create utterance
        var utterance = new SpeechSynthesisUtterance(text);
        utterance.rate = 0.9;
        utterance.pitch = 1;
        
        var self = this;
        utterance.onend = function() {
            self.classList.remove('tts-reading');
        };
        
        window.speechSynthesis.speak(utterance);
    }

    // ===================================
    // Screen Reader Announcements
    // ===================================
    function announce(message) {
        var announcer = document.getElementById('a11y-announcer');
        
        if (!announcer) {
            announcer = document.createElement('div');
            announcer.id = 'a11y-announcer';
            announcer.setAttribute('aria-live', 'polite');
            announcer.setAttribute('aria-atomic', 'true');
            announcer.className = 'sr-only';
            document.body.appendChild(announcer);
        }
        
        announcer.textContent = message;
        
        setTimeout(function() {
            announcer.textContent = '';
        }, 1000);
    }

    // ===================================
    // Reading Guide
    // ===================================
    function initReadingGuide() {
        // Create reading guide element
        var guide = document.createElement('div');
        guide.className = 'reading-guide';
        document.body.appendChild(guide);
        
        // Follow mouse
        document.addEventListener('mousemove', function(e) {
            if (state.readingGuide) {
                guide.style.top = (e.clientY - 15) + 'px';
            }
        });
    }

    // ===================================
    // Keyboard Shortcuts
    // ===================================
    document.addEventListener('keydown', function(e) {
        // Alt + Plus: Increase font
        if (e.altKey && (e.key === '+' || e.key === '=')) {
            e.preventDefault();
            changeFontSize(1);
        }
        
        // Alt + Minus: Decrease font
        if (e.altKey && e.key === '-') {
            e.preventDefault();
            changeFontSize(-1);
        }
        
        // Alt + C: Toggle contrast
        if (e.altKey && e.key === 'c') {
            e.preventDefault();
            state.highContrast = !state.highContrast;
            applySettings();
            saveSettings();
            announce('High contrast mode ' + (state.highContrast ? 'enabled' : 'disabled'));
        }
        
        // Alt + R: Read page
        if (e.altKey && e.key === 'r' && state.ttsEnabled) {
            e.preventDefault();
            readPage();
        }
    });

    function readPage() {
        var mainContent = document.querySelector('main');
        if (!mainContent) return;
        
        var text = mainContent.textContent || mainContent.innerText;
        window.speechSynthesis.cancel();
        
        var utterance = new SpeechSynthesisUtterance(text);
        utterance.rate = 0.9;
        window.speechSynthesis.speak(utterance);
    }

    // ===================================
    // Export API
    // ===================================
    window.OUTSSINC_A11Y = {
        getSettings: function() {
            return Object.assign({}, state);
        },
        
        setFontSize: function(size) {
            if (fontSizes.includes(size)) {
                state.fontSize = size;
                applySettings();
                saveSettings();
            }
        },
        
        setHighContrast: function(enabled) {
            state.highContrast = enabled;
            applySettings();
            saveSettings();
        },
        
        speak: function(text) {
            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
                var utterance = new SpeechSynthesisUtterance(text);
                window.speechSynthesis.speak(utterance);
            }
        },
        
        announce: announce
    };

})();
