<?php
/**
 * OUTSSINC Platform - Self Refer Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Self Refer';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Self Refer</span>
    </nav>
    <h1>Refer Yourself for Support</h1>
    <p>Take the first step toward getting the help you need. It's confidential and judgment-free.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        
        <div class="alert alert-info" style="margin-bottom: var(--spacing-2xl);">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>What happens when you self-refer?</strong>
                <p style="margin: var(--spacing-sm) 0 0;">A peer support worker will reach out within 24-48 hours to discuss your needs and how we can help. Everything you share is confidential.</p>
            </div>
        </div>
        
        <form id="self-refer-form" class="card" style="padding: var(--spacing-2xl);" method="POST" action="/api/intake.php">
            <input type="hidden" name="type" value="self_referral">
            <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
            
            <h2 style="margin-bottom: var(--spacing-xl);"><i class="fas fa-user-plus text-primary"></i> Your Information</h2>
            
            <div class="form-group">
                <label for="name" class="required">Your Name (or what you'd like to be called)</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="First name is fine">
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg);">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Best number to reach you">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="your@email.com">
                </div>
            </div>
            
            <div class="form-group">
                <label for="location">Your City/Town</label>
                <input type="text" id="location" name="location" class="form-control" placeholder="e.g., Cobourg, Port Hope">
            </div>
            
            <hr style="margin: var(--spacing-xl) 0;">
            
            <h2 style="margin-bottom: var(--spacing-xl);"><i class="fas fa-hands-helping text-primary"></i> How Can We Help?</h2>
            
            <div class="form-group">
                <label class="required">What areas do you need support with? (Select all that apply)</label>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--spacing-sm); margin-top: var(--spacing-md);">
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="housing"> <i class="fas fa-home"></i> Housing
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="food"> <i class="fas fa-utensils"></i> Food Security
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="mental-health"> <i class="fas fa-brain"></i> Mental Health
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="addiction"> <i class="fas fa-heartbeat"></i> Substance Use
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="financial"> <i class="fas fa-dollar-sign"></i> Financial Help
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="employment"> <i class="fas fa-briefcase"></i> Employment
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="legal"> <i class="fas fa-balance-scale"></i> Legal Issues
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm); padding: var(--spacing-sm); background: var(--color-light); border-radius: var(--border-radius-sm); cursor: pointer;">
                        <input type="checkbox" name="needs[]" value="other"> <i class="fas fa-ellipsis-h"></i> Other
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="situation">Tell us a little about your situation (optional)</label>
                <textarea id="situation" name="situation" class="form-control" rows="4" placeholder="Share as much or as little as you're comfortable with..."></textarea>
            </div>
            
            <div class="form-group">
                <label for="urgency">How urgent is your need?</label>
                <select id="urgency" name="urgency" class="form-control">
                    <option value="low">I'm okay for now, just exploring options</option>
                    <option value="medium" selected>I could use help soon</option>
                    <option value="high">This is urgent - I need help quickly</option>
                    <option value="crisis">I'm in crisis right now</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="contact_preference">How would you prefer we contact you?</label>
                <select id="contact_preference" name="contact_preference" class="form-control">
                    <option value="phone">Phone Call</option>
                    <option value="text">Text Message</option>
                    <option value="email">Email</option>
                    <option value="any">Any method is fine</option>
                </select>
            </div>
            
            <hr style="margin: var(--spacing-xl) 0;">
            
            <div class="form-group" style="display: flex; align-items: flex-start; gap: var(--spacing-sm);">
                <input type="checkbox" id="consent" name="consent" required style="margin-top: 4px;">
                <label for="consent" style="margin-bottom: 0;">I consent to being contacted by OUTSSINC and understand that my information will be kept confidential.</label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                <i class="fas fa-paper-plane"></i> Submit Referral
            </button>
        </form>
        
    </div>
</section>

<section class="alert-crisis">
    <div class="container">
        <p><strong><i class="fas fa-exclamation-triangle"></i> In immediate danger or crisis?</strong> 
        Call our 24/7 Crisis Line: <a href="tel:<?php echo CRISIS_LINE; ?>"><?php echo CRISIS_LINE; ?></a> 
        or call 911</p>
    </div>
</section>

<script>
document.getElementById('self-refer-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner"></span> Submitting...';
    
    // Simulate form submission
    setTimeout(function() {
        window.location.href = '/pages/intake-complete.php?type=referral';
    }, 1500);
});

// Show crisis alert if crisis urgency selected
document.getElementById('urgency').addEventListener('change', function() {
    if (this.value === 'crisis') {
        alert('If you are in immediate crisis, please call our 24/7 Crisis Line: <?php echo CRISIS_LINE; ?> or call 911.');
    }
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
