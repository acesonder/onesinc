/**
 * OUTSSINC Platform - Main JavaScript
 * 
 * Core functionality for navigation, safety features, and interactions.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

(function() {
    'use strict';

    // ===================================
    // Global State
    // ===================================
    const state = {
        navOpen: false,
        portalOpen: false,
        safetyMode: false,
        escPressCount: 0,
        escTimeout: null
    };

    // ===================================
    // DOM Ready
    // ===================================
    document.addEventListener('DOMContentLoaded', function() {
        initNavigation();
        initSafetyFeatures();
        initDropdowns();
        initForms();
        initScrollEffects();
    });

    // ===================================
    // Navigation
    // ===================================
    function initNavigation() {
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');

        if (navToggle && navMenu) {
            navToggle.addEventListener('click', function() {
                state.navOpen = !state.navOpen;
                navToggle.classList.toggle('active', state.navOpen);
                navMenu.classList.toggle('open', state.navOpen);
                navToggle.setAttribute('aria-expanded', state.navOpen);
                
                // Prevent body scroll when menu is open
                document.body.style.overflow = state.navOpen ? 'hidden' : '';
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (state.navOpen && !navMenu.contains(e.target) && !navToggle.contains(e.target)) {
                    closeNav();
                }
            });

            // Close menu on escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && state.navOpen) {
                    closeNav();
                }
            });
        }

        function closeNav() {
            state.navOpen = false;
            navToggle.classList.remove('active');
            navMenu.classList.remove('open');
            navToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    }

    // ===================================
    // Dropdown Menus
    // ===================================
    function initDropdowns() {
        const dropdownItems = document.querySelectorAll('.nav-item.dropdown');

        dropdownItems.forEach(function(item) {
            const toggle = item.querySelector('.dropdown-toggle');
            
            if (toggle) {
                // Mobile: Click to toggle
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth <= 1200) {
                        e.preventDefault();
                        item.classList.toggle('open');
                        
                        // Close other dropdowns
                        dropdownItems.forEach(function(other) {
                            if (other !== item) {
                                other.classList.remove('open');
                            }
                        });
                    }
                });

                // Keyboard navigation
                toggle.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        item.classList.toggle('open');
                    }
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        const firstLink = item.querySelector('.dropdown-menu a');
                        if (firstLink) {
                            item.classList.add('open');
                            firstLink.focus();
                        }
                    }
                });
            }

            // Arrow key navigation within dropdown
            const dropdownLinks = item.querySelectorAll('.dropdown-menu a');
            dropdownLinks.forEach(function(link, index) {
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        const next = dropdownLinks[index + 1] || dropdownLinks[0];
                        next.focus();
                    }
                    if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        const prev = dropdownLinks[index - 1] || dropdownLinks[dropdownLinks.length - 1];
                        prev.focus();
                    }
                    if (e.key === 'Escape') {
                        item.classList.remove('open');
                        toggle.focus();
                    }
                });
            });
        });
    }

    // ===================================
    // Safety Features
    // ===================================
    function initSafetyFeatures() {
        const quickExitBtn = document.getElementById('quick-exit');
        const safetyOverlay = document.getElementById('safety-overlay');

        // Quick Exit Button
        if (quickExitBtn) {
            quickExitBtn.addEventListener('click', function() {
                activateSafetyMode();
            });
        }

        // Double Escape to activate safety mode
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (state.safetyMode) {
                    // Already in safety mode - check for double escape to exit
                    state.escPressCount++;
                    if (state.escPressCount >= 2) {
                        deactivateSafetyMode();
                    }
                    clearTimeout(state.escTimeout);
                    state.escTimeout = setTimeout(function() {
                        state.escPressCount = 0;
                    }, 500);
                } else {
                    // Not in safety mode - check for double escape to enter
                    state.escPressCount++;
                    if (state.escPressCount >= 2) {
                        activateSafetyMode();
                    }
                    clearTimeout(state.escTimeout);
                    state.escTimeout = setTimeout(function() {
                        state.escPressCount = 0;
                    }, 500);
                }
            }
        });

        function activateSafetyMode() {
            state.safetyMode = true;
            state.escPressCount = 0;
            
            if (safetyOverlay) {
                safetyOverlay.classList.remove('hidden');
                safetyOverlay.setAttribute('aria-hidden', 'false');
            }
            
            // Also redirect to weather site after a moment for extra safety
            setTimeout(function() {
                if (state.safetyMode) {
                    // Replace history so back button doesn't return here
                    window.location.replace('https://weather.gc.ca/city/pages/on-25_metric_e.html');
                }
            }, 3000);
        }

        function deactivateSafetyMode() {
            state.safetyMode = false;
            state.escPressCount = 0;
            
            if (safetyOverlay) {
                safetyOverlay.classList.add('hidden');
                safetyOverlay.setAttribute('aria-hidden', 'true');
            }
        }
    }

    // ===================================
    // Form Handling
    // ===================================
    function initForms() {
        // Auto-save forms to localStorage
        const forms = document.querySelectorAll('form[data-autosave]');
        
        forms.forEach(function(form) {
            const formId = form.id || 'form-' + Math.random().toString(36).substring(2);
            
            // Restore saved data
            const savedData = localStorage.getItem('outssinc_form_' + formId);
            if (savedData) {
                try {
                    const data = JSON.parse(savedData);
                    Object.keys(data).forEach(function(key) {
                        const input = form.querySelector('[name="' + key + '"]');
                        if (input && input.type !== 'password' && input.type !== 'hidden') {
                            input.value = data[key];
                        }
                    });
                } catch (e) {
                    console.error('Error restoring form data:', e);
                }
            }
            
            // Save on input
            form.addEventListener('input', function() {
                const formData = new FormData(form);
                const data = {};
                formData.forEach(function(value, key) {
                    // Don't save passwords or sensitive data
                    const input = form.querySelector('[name="' + key + '"]');
                    if (input && input.type !== 'password' && input.type !== 'hidden') {
                        data[key] = value;
                    }
                });
                localStorage.setItem('outssinc_form_' + formId, JSON.stringify(data));
            });
            
            // Clear on submit
            form.addEventListener('submit', function() {
                localStorage.removeItem('outssinc_form_' + formId);
            });
        });

        // Crisis keyword detection
        const crisisInputs = document.querySelectorAll('[data-crisis-detect]');
        const crisisKeywords = ['suicide', 'kill myself', 'end my life', 'want to die', 'overdose'];
        
        crisisInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                const value = this.value.toLowerCase();
                const hasCrisisKeyword = crisisKeywords.some(function(keyword) {
                    return value.includes(keyword);
                });
                
                if (hasCrisisKeyword) {
                    showCrisisModal();
                }
            });
        });
    }

    // ===================================
    // Crisis Modal
    // ===================================
    function showCrisisModal() {
        // Check if modal already exists
        if (document.getElementById('crisis-modal')) {
            return;
        }

        const modal = document.createElement('div');
        modal.id = 'crisis-modal';
        modal.className = 'modal';
        modal.setAttribute('role', 'dialog');
        modal.setAttribute('aria-modal', 'true');
        modal.setAttribute('aria-labelledby', 'crisis-modal-title');
        
        modal.innerHTML = `
            <div class="modal-overlay"></div>
            <div class="modal-content crisis-modal-content">
                <h2 id="crisis-modal-title"><i class="fas fa-heart"></i> We're Here For You</h2>
                <p>It sounds like you might be going through a difficult time. You don't have to face this alone.</p>
                
                <div class="crisis-options">
                    <a href="tel:1-833-456-4566" class="btn btn-lg btn-primary btn-block">
                        <i class="fas fa-phone-alt"></i> Call Crisis Line: 1-833-456-4566
                    </a>
                    <a href="sms:45645" class="btn btn-lg btn-secondary btn-block">
                        <i class="fas fa-sms"></i> Text: 45645
                    </a>
                    <button class="btn btn-lg btn-outline btn-block" id="start-live-chat">
                        <i class="fas fa-comments"></i> Start Live Chat
                    </button>
                </div>
                
                <button class="modal-close" aria-label="Close">
                    <i class="fas fa-times"></i> Continue to form
                </button>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Focus trap
        const closeBtn = modal.querySelector('.modal-close');
        closeBtn.focus();
        
        closeBtn.addEventListener('click', function() {
            modal.remove();
        });
        
        modal.querySelector('.modal-overlay').addEventListener('click', function() {
            modal.remove();
        });
        
        document.addEventListener('keydown', function modalEscape(e) {
            if (e.key === 'Escape') {
                modal.remove();
                document.removeEventListener('keydown', modalEscape);
            }
        });
    }

    // ===================================
    // Scroll Effects
    // ===================================
    function initScrollEffects() {
        const nav = document.getElementById('main-nav');
        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            // Add shadow on scroll
            if (nav) {
                if (currentScroll > 10) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            }
            
            lastScroll = currentScroll;
        }, { passive: true });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Update focus for accessibility
                    target.setAttribute('tabindex', '-1');
                    target.focus();
                }
            });
        });
    }

    // ===================================
    // Utility Functions
    // ===================================
    window.OUTSSINC = {
        // Show toast notification
        toast: function(message, type) {
            type = type || 'info';
            const toast = document.createElement('div');
            toast.className = 'toast toast-' + type;
            toast.innerHTML = '<span>' + message + '</span>';
            toast.setAttribute('role', 'alert');
            
            document.body.appendChild(toast);
            
            setTimeout(function() {
                toast.classList.add('show');
            }, 10);
            
            setTimeout(function() {
                toast.classList.remove('show');
                setTimeout(function() {
                    toast.remove();
                }, 300);
            }, 5000);
        },

        // Trigger confetti animation
        confetti: function() {
            const container = document.createElement('div');
            container.className = 'confetti-container';
            document.body.appendChild(container);
            
            const colors = ['#d80032', '#28a745', '#ffc107', '#17a2b8', '#6f42c1'];
            
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                container.appendChild(confetti);
            }
            
            setTimeout(function() {
                container.remove();
            }, 5000);
        },

        // Format date
        formatDate: function(date) {
            return new Intl.DateTimeFormat('en-CA', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }).format(new Date(date));
        }
    };

})();
