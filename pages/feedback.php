<?php
/**
 * OUTSSINC Platform - Feedback Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Feedback';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Feedback</span>
    </nav>
    <h1>Share Your Feedback</h1>
    <p>Your input helps us improve. We value every comment, suggestion, and concern.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 700px;">
        
        <div class="alert alert-info" style="margin-bottom: var(--spacing-2xl);">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Your feedback is confidential.</strong>
                <p style="margin: 0;">You can submit anonymously if you prefer. All feedback is reviewed by our team.</p>
            </div>
        </div>
        
        <form class="card" style="padding: var(--spacing-2xl);" id="feedback-form">
            
            <div class="form-group">
                <label for="feedback-type" class="required">What type of feedback do you have?</label>
                <select id="feedback-type" name="type" class="form-control" required>
                    <option value="">Select type...</option>
                    <option value="suggestion">Suggestion for Improvement</option>
                    <option value="compliment">Compliment / Positive Feedback</option>
                    <option value="concern">Concern or Issue</option>
                    <option value="service">Feedback About a Service</option>
                    <option value="website">Website Feedback</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="feedback-text" class="required">Your Feedback</label>
                <textarea id="feedback-text" name="feedback" class="form-control" rows="6" required placeholder="Please share your thoughts, suggestions, or concerns..."></textarea>
            </div>
            
            <div class="form-group">
                <label>How was your overall experience?</label>
                <div style="display: flex; gap: var(--spacing-lg); margin-top: var(--spacing-sm);">
                    <label style="display: flex; align-items: center; gap: var(--spacing-xs); cursor: pointer;">
                        <input type="radio" name="rating" value="5">
                        <i class="fas fa-smile text-success" style="font-size: 1.5rem;"></i>
                        <span>Excellent</span>
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-xs); cursor: pointer;">
                        <input type="radio" name="rating" value="3">
                        <i class="fas fa-meh text-warning" style="font-size: 1.5rem;"></i>
                        <span>Okay</span>
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-xs); cursor: pointer;">
                        <input type="radio" name="rating" value="1">
                        <i class="fas fa-frown text-danger" style="font-size: 1.5rem;"></i>
                        <span>Poor</span>
                    </label>
                </div>
            </div>
            
            <hr style="margin: var(--spacing-xl) 0;">
            
            <p style="color: var(--color-gray); margin-bottom: var(--spacing-lg);">
                <strong>Optional:</strong> Provide your contact info if you'd like us to follow up with you.
            </p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg);">
                <div class="form-group">
                    <label for="feedback-name">Your Name</label>
                    <input type="text" id="feedback-name" name="name" class="form-control" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="feedback-email">Email Address</label>
                    <input type="email" id="feedback-email" name="email" class="form-control" placeholder="Optional">
                </div>
            </div>
            
            <div class="form-group" style="display: flex; align-items: center; gap: var(--spacing-sm);">
                <input type="checkbox" id="follow-up" name="follow_up">
                <label for="follow-up" style="margin: 0;">I would like a response to my feedback</label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                <i class="fas fa-paper-plane"></i> Submit Feedback
            </button>
            
        </form>
        
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 800px; text-align: center;">
        <h2><i class="fas fa-exclamation-triangle text-warning"></i> Have a Complaint?</h2>
        <p class="text-muted" style="margin-bottom: var(--spacing-xl);">
            If you have a serious complaint about our services or staff, please use our formal complaint process.
        </p>
        <a href="/pages/whistleblower.php" class="btn btn-outline">
            <i class="fas fa-flag"></i> Report Misconduct
        </a>
    </div>
</section>

<script>
document.getElementById('feedback-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span> Submitting...';
    
    setTimeout(function() {
        alert('Thank you for your feedback! We appreciate you taking the time to help us improve.');
        document.getElementById('feedback-form').reset();
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Feedback';
    }, 1500);
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
