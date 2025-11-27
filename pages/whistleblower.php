<?php
/**
 * OUTSSINC Platform - Whistleblower / Report Misconduct Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Report Misconduct';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Report Misconduct</span>
    </nav>
    <h1>Report Misconduct</h1>
    <p>A safe and confidential way to report concerns about our organization or staff.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 800px;">
        
        <div class="alert alert-info" style="margin-bottom: var(--spacing-2xl);">
            <i class="fas fa-shield-alt"></i>
            <div>
                <strong>Your report will be kept confidential.</strong>
                <p style="margin: 0;">We do not tolerate retaliation against anyone who reports misconduct in good faith.</p>
            </div>
        </div>
        
        <h2>When to Use This Form</h2>
        <p>Use this form to report serious concerns such as:</p>
        <ul style="margin-left: var(--spacing-xl); margin-bottom: var(--spacing-xl);">
            <li>Misconduct by staff or volunteers</li>
            <li>Abuse, harassment, or discrimination</li>
            <li>Violations of confidentiality or privacy</li>
            <li>Financial misconduct or fraud</li>
            <li>Safety violations</li>
            <li>Other ethical concerns about our organization</li>
        </ul>
        
        <p>For general feedback or suggestions, please use our <a href="/pages/feedback.php">feedback form</a> instead.</p>
        
        <hr style="margin: var(--spacing-2xl) 0;">
        
        <h2>Submit a Report</h2>
        
        <form class="card" style="padding: var(--spacing-2xl);" id="report-form">
            
            <div class="form-group">
                <label for="report-type" class="required">Type of Concern</label>
                <select id="report-type" name="type" class="form-control" required>
                    <option value="">Select type...</option>
                    <option value="staff_misconduct">Staff/Volunteer Misconduct</option>
                    <option value="abuse">Abuse or Harassment</option>
                    <option value="discrimination">Discrimination</option>
                    <option value="privacy">Privacy/Confidentiality Violation</option>
                    <option value="financial">Financial Misconduct</option>
                    <option value="safety">Safety Concern</option>
                    <option value="other">Other Ethical Concern</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="incident-date">When did this occur?</label>
                <input type="date" id="incident-date" name="date" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="persons-involved">Who was involved?</label>
                <input type="text" id="persons-involved" name="persons" class="form-control" placeholder="Names or descriptions of people involved (if known)">
            </div>
            
            <div class="form-group">
                <label for="description" class="required">Description of Concern</label>
                <textarea id="description" name="description" class="form-control" rows="6" required placeholder="Please provide as much detail as possible about what happened, including dates, locations, and any witnesses..."></textarea>
            </div>
            
            <div class="form-group">
                <label>Do you have any evidence or documentation?</label>
                <p class="text-muted" style="font-size: 0.9rem; margin-bottom: var(--spacing-sm);">
                    If you have documents, screenshots, or other evidence, please describe them below. We may contact you to request copies.
                </p>
                <textarea name="evidence" class="form-control" rows="2" placeholder="Describe any evidence you have..."></textarea>
            </div>
            
            <hr style="margin: var(--spacing-xl) 0;">
            
            <h3>Your Information (Optional)</h3>
            <p class="text-muted" style="margin-bottom: var(--spacing-lg);">
                You may submit this report anonymously. However, providing your contact information allows us to follow up if we need more details.
            </p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg);">
                <div class="form-group">
                    <label for="reporter-name">Your Name</label>
                    <input type="text" id="reporter-name" name="name" class="form-control" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="reporter-email">Email Address</label>
                    <input type="email" id="reporter-email" name="email" class="form-control" placeholder="Optional">
                </div>
            </div>
            
            <div class="form-group">
                <label for="reporter-phone">Phone Number</label>
                <input type="tel" id="reporter-phone" name="phone" class="form-control" placeholder="Optional">
            </div>
            
            <div class="form-group" style="display: flex; align-items: flex-start; gap: var(--spacing-sm);">
                <input type="checkbox" id="anonymous" name="anonymous" style="margin-top: 4px;">
                <label for="anonymous" style="margin: 0;">I wish to remain anonymous. I understand this may limit the investigation.</label>
            </div>
            
            <hr style="margin: var(--spacing-xl) 0;">
            
            <div class="form-group" style="display: flex; align-items: flex-start; gap: var(--spacing-sm);">
                <input type="checkbox" id="good-faith" name="good_faith" required style="margin-top: 4px;">
                <label for="good-faith" style="margin: 0;">I certify that this report is made in good faith and to the best of my knowledge is accurate.</label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                <i class="fas fa-paper-plane"></i> Submit Report
            </button>
            
        </form>
        
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 800px;">
        <h2>What Happens Next?</h2>
        <div class="grid grid-2" style="gap: var(--spacing-lg); margin-top: var(--spacing-xl);">
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-search text-primary"></i> Investigation</h4>
                <p class="text-muted" style="margin: 0;">All reports are reviewed by designated staff. Serious matters may be referred to our Board of Directors or external authorities.</p>
            </div>
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-lock text-primary"></i> Confidentiality</h4>
                <p class="text-muted" style="margin: 0;">Your report and identity (if provided) will be kept confidential to the extent possible while conducting an investigation.</p>
            </div>
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-shield-alt text-primary"></i> No Retaliation</h4>
                <p class="text-muted" style="margin: 0;">We prohibit retaliation against anyone who reports concerns in good faith. Report any retaliation immediately.</p>
            </div>
            <div class="card" style="padding: var(--spacing-lg);">
                <h4><i class="fas fa-comment text-primary"></i> Follow-Up</h4>
                <p class="text-muted" style="margin: 0;">If you provided contact information and requested follow-up, we will update you on the outcome of your report.</p>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('report-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span> Submitting...';
    
    setTimeout(function() {
        alert('Your report has been submitted. Thank you for bringing this to our attention. If you provided contact information, we will follow up with you.');
        document.getElementById('report-form').reset();
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Report';
    }, 2000);
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
