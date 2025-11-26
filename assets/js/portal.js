/**
 * OUTSSINC Platform - Portal JavaScript
 * 
 * Handles client portal sliding panel functionality.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

(function() {
    'use strict';

    // ===================================
    // DOM Ready
    // ===================================
    document.addEventListener('DOMContentLoaded', function() {
        initPortal();
        initViewSwitching();
        initFormValidation();
    });

    // ===================================
    // Portal Panel
    // ===================================
    function initPortal() {
        var portalToggle = document.getElementById('portal-toggle');
        var portalClose = document.getElementById('portal-close');
        var portal = document.getElementById('client-portal');
        var overlay = portal ? portal.querySelector('.portal-overlay') : null;

        if (portalToggle && portal) {
            portalToggle.addEventListener('click', function() {
                openPortal();
            });
        }

        if (portalClose) {
            portalClose.addEventListener('click', function() {
                closePortal();
            });
        }

        if (overlay) {
            overlay.addEventListener('click', function() {
                closePortal();
            });
        }

        // Close on escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && portal && portal.getAttribute('aria-hidden') === 'false') {
                closePortal();
            }
        });

        function openPortal() {
            portal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            
            // Focus first input
            setTimeout(function() {
                var firstInput = portal.querySelector('input:not([type="hidden"])');
                if (firstInput) {
                    firstInput.focus();
                }
            }, 300);
        }

        function closePortal() {
            portal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            portalToggle.focus();
        }
    }

    // ===================================
    // View Switching
    // ===================================
    function initViewSwitching() {
        var switchLinks = document.querySelectorAll('.switch-view');
        
        switchLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                var targetId = this.getAttribute('data-target');
                var targetView = document.getElementById(targetId);
                
                if (targetView) {
                    // Hide all views
                    document.querySelectorAll('.portal-view').forEach(function(view) {
                        view.classList.remove('active');
                    });
                    
                    // Show target view
                    targetView.classList.add('active');
                    
                    // Focus first input
                    setTimeout(function() {
                        var firstInput = targetView.querySelector('input:not([type="hidden"])');
                        if (firstInput) {
                            firstInput.focus();
                        }
                    }, 100);
                }
            });
        });
    }

    // ===================================
    // Form Validation
    // ===================================
    function initFormValidation() {
        var loginForm = document.getElementById('login-form');
        var registerForm = document.getElementById('register-form');
        var forgotForm = document.getElementById('forgot-form');

        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleLogin(this);
            });
        }

        if (registerForm) {
            registerForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleRegister(this);
            });
        }

        if (forgotForm) {
            forgotForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleForgotPassword(this);
            });
        }
    }

    function handleLogin(form) {
        var formData = new FormData(form);
        var submitBtn = form.querySelector('button[type="submit"]');
        var originalText = submitBtn.innerHTML;
        
        // Show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner"></span> Signing in...';
        
        // Submit via AJAX
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                // Redirect to dashboard
                window.location.href = data.redirect || '/client/dashboard.php';
            } else {
                showFormError(form, data.message || 'Invalid email or password');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        })
        .catch(function() {
            showFormError(form, 'An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    }

    function handleRegister(form) {
        var formData = new FormData(form);
        var submitBtn = form.querySelector('button[type="submit"]');
        var originalText = submitBtn.innerHTML;
        
        // Validate password
        var password = form.querySelector('[name="password"]');
        if (password && password.value.length < 8) {
            showFormError(form, 'Password must be at least 8 characters');
            return;
        }
        
        // Validate TOS
        var tos = form.querySelector('[name="accept_tos"]');
        if (tos && !tos.checked) {
            showFormError(form, 'You must accept the Terms of Service');
            return;
        }
        
        // Show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner"></span> Creating account...';
        
        // Submit via AJAX
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                // Show success message or redirect
                if (data.requireVerification) {
                    showFormSuccess(form, 'Account created! Please check your phone for verification code.');
                } else {
                    window.location.href = data.redirect || '/client/dashboard.php';
                }
            } else {
                showFormError(form, data.message || 'Registration failed');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        })
        .catch(function() {
            showFormError(form, 'An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    }

    function handleForgotPassword(form) {
        var formData = new FormData(form);
        var submitBtn = form.querySelector('button[type="submit"]');
        var originalText = submitBtn.innerHTML;
        
        // Show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner"></span> Sending...';
        
        // Submit via AJAX
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                showFormSuccess(form, 'If an account exists with this email, reset instructions have been sent.');
            } else {
                showFormError(form, data.message || 'Unable to process request');
            }
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        })
        .catch(function() {
            showFormError(form, 'An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    }

    function showFormError(form, message) {
        removeFormMessages(form);
        
        var error = document.createElement('div');
        error.className = 'alert alert-danger form-message';
        error.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + escapeHtml(message);
        form.insertBefore(error, form.firstChild);
    }

    function showFormSuccess(form, message) {
        removeFormMessages(form);
        
        var success = document.createElement('div');
        success.className = 'alert alert-success form-message';
        success.innerHTML = '<i class="fas fa-check-circle"></i> ' + escapeHtml(message);
        form.insertBefore(success, form.firstChild);
    }

    function removeFormMessages(form) {
        var messages = form.querySelectorAll('.form-message');
        messages.forEach(function(msg) {
            msg.remove();
        });
    }

    function escapeHtml(str) {
        var div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

})();
