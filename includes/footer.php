    </main>
    
    <!-- Client Portal Sliding Panel -->
    <div id="client-portal" class="portal-panel" aria-hidden="true">
        <div class="portal-overlay"></div>
        <div class="portal-content">
            <button class="portal-close" id="portal-close" aria-label="Close portal">
                <i class="fas fa-times"></i>
            </button>
            
            <!-- Portal Views -->
            <div class="portal-views">
                <!-- Login View -->
                <div class="portal-view active" id="view-login">
                    <div class="portal-header">
                        <h2><i class="fas fa-user-circle"></i> Welcome Back</h2>
                        <p>Sign in to continue your journey</p>
                    </div>
                    
                    <form class="portal-form" id="login-form" action="/api/auth.php" method="POST">
                        <input type="hidden" name="action" value="login">
                        
                        <div class="form-group">
                            <label for="login-email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" id="login-email" name="email" required autocomplete="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="login-password"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" id="login-password" name="password" required autocomplete="current-password">
                        </div>
                        
                        <div class="form-group checkbox">
                            <input type="checkbox" id="remember-me" name="remember">
                            <label for="remember-me">Remember me on this device</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </button>
                        
                        <div class="form-links">
                            <a href="#" class="switch-view" data-target="view-forgot">Forgot password?</a>
                        </div>
                    </form>
                    
                    <div class="portal-footer">
                        <p>New here? <a href="#" class="switch-view" data-target="view-register">Create an account</a></p>
                        <div class="portal-divider"><span>or</span></div>
                        <a href="/staff/" class="staff-link"><i class="fas fa-user-tie"></i> Staff Login</a>
                    </div>
                </div>
                
                <!-- Register View -->
                <div class="portal-view" id="view-register">
                    <div class="portal-header">
                        <h2><i class="fas fa-user-plus"></i> Join OUTSSINC</h2>
                        <p>Create your account to access resources</p>
                    </div>
                    
                    <form class="portal-form" id="register-form" action="/api/auth.php" method="POST">
                        <input type="hidden" name="action" value="register">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="reg-first"><i class="fas fa-user"></i> First Name</label>
                                <input type="text" id="reg-first" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="reg-last">Last Name</label>
                                <input type="text" id="reg-last" name="last_name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="reg-email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" id="reg-email" name="email" required autocomplete="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="reg-phone"><i class="fas fa-phone"></i> Phone (for SMS verification)</label>
                            <input type="tel" id="reg-phone" name="phone" required autocomplete="tel">
                        </div>
                        
                        <div class="form-group">
                            <label for="reg-password"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" id="reg-password" name="password" required autocomplete="new-password" minlength="8">
                            <small>Minimum 8 characters</small>
                        </div>
                        
                        <div class="form-group checkbox">
                            <input type="checkbox" id="accept-tos" name="accept_tos" required>
                            <label for="accept-tos">I accept the <a href="/pages/terms.php" target="_blank">Terms of Service</a> and <a href="/pages/privacy.php" target="_blank">Privacy Policy</a></label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-user-plus"></i> Create Account
                        </button>
                    </form>
                    
                    <div class="portal-footer">
                        <p>Already have an account? <a href="#" class="switch-view" data-target="view-login">Sign in</a></p>
                    </div>
                </div>
                
                <!-- Forgot Password View -->
                <div class="portal-view" id="view-forgot">
                    <div class="portal-header">
                        <h2><i class="fas fa-key"></i> Reset Password</h2>
                        <p>Enter your email to receive reset instructions</p>
                    </div>
                    
                    <form class="portal-form" id="forgot-form" action="/api/auth.php" method="POST">
                        <input type="hidden" name="action" value="forgot">
                        
                        <div class="form-group">
                            <label for="forgot-email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" id="forgot-email" name="email" required autocomplete="email">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane"></i> Send Reset Link
                        </button>
                    </form>
                    
                    <div class="portal-footer">
                        <p><a href="#" class="switch-view" data-target="view-login"><i class="fas fa-arrow-left"></i> Back to login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Crisis Marquee (Fixed Bottom) -->
    <div class="crisis-marquee" id="crisis-marquee" role="marquee" aria-label="Important announcements">
        <div class="marquee-content">
            <span class="marquee-item urgent">
                <i class="fas fa-phone-alt"></i> 24/7 Crisis Line: <?php echo CRISIS_LINE; ?> | Text: <?php echo CRISIS_TEXT; ?>
            </span>
            <span class="marquee-item">
                <i class="fas fa-snowflake"></i> Cold Weather Alert: Emergency shelter beds available - Call for locations
            </span>
            <span class="marquee-item">
                <i class="fas fa-heart"></i> You are not alone. We are here to help.
            </span>
            <span class="marquee-item urgent">
                <i class="fas fa-phone-alt"></i> 24/7 Crisis Line: <?php echo CRISIS_LINE; ?> | Text: <?php echo CRISIS_TEXT; ?>
            </span>
            <span class="marquee-item">
                <i class="fas fa-snowflake"></i> Cold Weather Alert: Emergency shelter beds available - Call for locations
            </span>
            <span class="marquee-item">
                <i class="fas fa-heart"></i> You are not alone. We are here to help.
            </span>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="main-footer" role="contentinfo">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Brand Column -->
                <div class="footer-col">
                    <div class="footer-brand">
                        <h3>OUTSSINC</h3>
                        <p><?php echo SITE_FULL_NAME; ?></p>
                    </div>
                    <p class="footer-desc"><?php echo SITE_TAGLINE; ?></p>
                    <div class="footer-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo SITE_LOCATION; ?></span>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/pages/about.php">About Us</a></li>
                        <li><a href="/pages/resources.php">Find Resources</a></li>
                        <li><a href="/pages/intake.php">Get Help</a></li>
                        <li><a href="/pages/volunteer.php">Volunteer</a></li>
                        <li><a href="/pages/donate.php">Donate</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="/pages/faq.php">FAQ</a></li>
                        <li><a href="/pages/contact.php">Contact Us</a></li>
                        <li><a href="/docs/">Documentation</a></li>
                        <li><a href="/pages/accessibility.php">Accessibility</a></li>
                        <li><a href="/pages/feedback.php">Feedback</a></li>
                    </ul>
                </div>
                
                <!-- Legal -->
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="/pages/privacy.php">Privacy Policy</a></li>
                        <li><a href="/pages/terms.php">Terms of Service</a></li>
                        <li><a href="/pages/whistleblower.php">Report Misconduct</a></li>
                    </ul>
                </div>
                
                <!-- Crisis Contact -->
                <div class="footer-col footer-crisis">
                    <h4><i class="fas fa-phone-alt"></i> Crisis Support</h4>
                    <div class="crisis-info">
                        <p><strong>24/7 Crisis Line:</strong></p>
                        <a href="tel:<?php echo CRISIS_LINE; ?>" class="crisis-phone"><?php echo CRISIS_LINE; ?></a>
                        <p class="crisis-text">Text: <?php echo CRISIS_TEXT; ?></p>
                    </div>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                <p class="footer-mission">Peer Support | Lived Experience | Community Care</p>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/accessibility.js"></script>
    <script src="/assets/js/portal.js"></script>
</body>
</html>
