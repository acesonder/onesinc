<?php
/**
 * OUTSSINC Platform - Contact Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Contact Us';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Contact Us</span>
    </nav>
    <h1>Get in Touch</h1>
    <p>Have questions? We're here to help. Reach out anytime.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 1100px;">
        <div class="grid grid-2" style="gap: var(--spacing-3xl);">
            
            <!-- Contact Info -->
            <div>
                <h2 style="margin-bottom: var(--spacing-xl);">Contact Information</h2>
                
                <div style="margin-bottom: var(--spacing-xl);">
                    <div style="display: flex; gap: var(--spacing-lg); margin-bottom: var(--spacing-lg);">
                        <div style="width: 50px; height: 50px; background: var(--color-primary); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-phone-alt" style="color: white;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: var(--spacing-xs);">Phone</h4>
                            <p class="text-muted" style="margin: 0;">
                                <a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a>
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: var(--spacing-lg); margin-bottom: var(--spacing-lg);">
                        <div style="width: 50px; height: 50px; background: var(--color-primary); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-envelope" style="color: white;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: var(--spacing-xs);">Email</h4>
                            <p class="text-muted" style="margin: 0;">
                                <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                            </p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: var(--spacing-lg); margin-bottom: var(--spacing-lg);">
                        <div style="width: 50px; height: 50px; background: var(--color-primary); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt" style="color: white;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: var(--spacing-xs);">Location</h4>
                            <p class="text-muted" style="margin: 0;"><?php echo SITE_LOCATION; ?></p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: var(--spacing-lg);">
                        <div style="width: 50px; height: 50px; background: var(--color-primary); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-clock" style="color: white;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: var(--spacing-xs);">Hours</h4>
                            <p class="text-muted" style="margin: 0;">
                                Monday - Friday: 9 AM - 5 PM<br>
                                Crisis Line: 24/7
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="background: linear-gradient(135deg, var(--color-danger) 0%, #a71d2a 100%); color: white; padding: var(--spacing-xl);">
                    <h4 style="color: white; margin-bottom: var(--spacing-sm);"><i class="fas fa-phone-alt"></i> Crisis Support</h4>
                    <p style="margin-bottom: var(--spacing-md); opacity: 0.9;">24/7 Crisis Line available for immediate support.</p>
                    <a href="tel:<?php echo CRISIS_LINE; ?>" style="color: white; font-size: 1.5rem; font-weight: 700;"><?php echo CRISIS_LINE; ?></a>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div>
                <h2 style="margin-bottom: var(--spacing-xl);">Send Us a Message</h2>
                
                <form class="card" style="padding: var(--spacing-xl);" id="contact-form">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg);">
                        <div class="form-group">
                            <label for="first-name" class="required">First Name</label>
                            <input type="text" id="first-name" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last_name" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="required">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject" class="required">Subject</label>
                        <select id="subject" name="subject" class="form-control" required>
                            <option value="">Select a topic...</option>
                            <option value="general">General Inquiry</option>
                            <option value="support">Request Support</option>
                            <option value="volunteer">Volunteer Information</option>
                            <option value="donate">Donation Inquiry</option>
                            <option value="partnership">Partnership Opportunity</option>
                            <option value="media">Media/Press Inquiry</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="required">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required placeholder="How can we help you?"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span> Sending...';
    
    setTimeout(function() {
        alert('Thank you for your message! We will respond within 1-2 business days.');
        document.getElementById('contact-form').reset();
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
    }, 1500);
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
