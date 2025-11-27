<?php
/**
 * OUTSSINC Platform - Volunteer Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Volunteer';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Volunteer</span>
    </nav>
    <h1>Volunteer With Us</h1>
    <p>Use your experience to help others on their journey. Become a peer support volunteer.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 1000px;">
        <div class="section-header">
            <h2>Why Volunteer?</h2>
            <p>Your lived experience can be a powerful tool to help others navigate life's challenges.</p>
        </div>
        
        <div class="grid grid-3" style="margin-bottom: var(--spacing-3xl);">
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                    <i class="fas fa-heart" style="font-size: 1.75rem; color: white;"></i>
                </div>
                <h4>Make an Impact</h4>
                <p class="text-muted">Your support can change someone's life. Help people who are going through what you once faced.</p>
            </div>
            
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #28a745 0%, #1e7b34 100%); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                    <i class="fas fa-graduation-cap" style="font-size: 1.75rem; color: white;"></i>
                </div>
                <h4>Gain Skills</h4>
                <p class="text-muted">Receive training in peer support, crisis intervention, and community resources.</p>
            </div>
            
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #6f42c1 0%, #553098 100%); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                    <i class="fas fa-users" style="font-size: 1.75rem; color: white;"></i>
                </div>
                <h4>Join Community</h4>
                <p class="text-muted">Be part of a supportive team of people who understand your journey.</p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 900px;">
        <h2 style="text-align: center; margin-bottom: var(--spacing-2xl);">Volunteer Opportunities</h2>
        
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
            <h3><i class="fas fa-hands-helping text-primary"></i> Peer Support Volunteer</h3>
            <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                Provide one-on-one support to clients navigating challenges like housing, mental health, and substance use. 
                This role requires lived experience and completion of our peer support training.
            </p>
            <div style="display: flex; gap: var(--spacing-lg); flex-wrap: wrap;">
                <span class="badge badge-light"><i class="fas fa-clock"></i> 4-8 hours/week</span>
                <span class="badge badge-light"><i class="fas fa-map-marker-alt"></i> In-person & Virtual</span>
                <span class="badge badge-light"><i class="fas fa-certificate"></i> Training Provided</span>
            </div>
        </div>
        
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
            <h3><i class="fas fa-street-view text-primary"></i> Outreach Team Member</h3>
            <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                Join our street outreach team to connect with community members in need. 
                Distribute resources, build relationships, and be a friendly face for those who may not seek help otherwise.
            </p>
            <div style="display: flex; gap: var(--spacing-lg); flex-wrap: wrap;">
                <span class="badge badge-light"><i class="fas fa-clock"></i> 2-4 hours/week</span>
                <span class="badge badge-light"><i class="fas fa-map-marker-alt"></i> In-person</span>
                <span class="badge badge-light"><i class="fas fa-certificate"></i> Training Provided</span>
            </div>
        </div>
        
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
            <h3><i class="fas fa-phone text-primary"></i> Crisis Line Support</h3>
            <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                After completing specialized training, help staff our 24/7 crisis line. 
                Provide emotional support and connect callers with resources.
            </p>
            <div style="display: flex; gap: var(--spacing-lg); flex-wrap: wrap;">
                <span class="badge badge-light"><i class="fas fa-clock"></i> 4-hour shifts</span>
                <span class="badge badge-light"><i class="fas fa-map-marker-alt"></i> Remote</span>
                <span class="badge badge-light"><i class="fas fa-certificate"></i> 40-hour Training</span>
            </div>
        </div>
        
        <div class="card" style="padding: var(--spacing-xl);">
            <h3><i class="fas fa-laptop text-primary"></i> Administrative Support</h3>
            <p class="text-muted" style="margin-bottom: var(--spacing-md);">
                Help with office tasks, data entry, event planning, and communications. 
                No lived experience required—just a desire to support our mission.
            </p>
            <div style="display: flex; gap: var(--spacing-lg); flex-wrap: wrap;">
                <span class="badge badge-light"><i class="fas fa-clock"></i> Flexible</span>
                <span class="badge badge-light"><i class="fas fa-map-marker-alt"></i> Office & Remote</span>
                <span class="badge badge-light"><i class="fas fa-check"></i> No Experience Required</span>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container" style="max-width: 700px;">
        <h2 style="text-align: center; margin-bottom: var(--spacing-2xl);">Volunteer Application</h2>
        
        <form class="card" style="padding: var(--spacing-2xl);" id="volunteer-form">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg);">
                <div class="form-group">
                    <label for="first-name" class="required">First Name</label>
                    <input type="text" id="first-name" name="first_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="last-name" class="required">Last Name</label>
                    <input type="text" id="last-name" name="last_name" class="form-control" required>
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
                <label class="required">Which roles interest you?</label>
                <div style="display: flex; flex-direction: column; gap: var(--spacing-sm); margin-top: var(--spacing-sm);">
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm);">
                        <input type="checkbox" name="roles[]" value="peer_support"> Peer Support Volunteer
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm);">
                        <input type="checkbox" name="roles[]" value="outreach"> Outreach Team Member
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm);">
                        <input type="checkbox" name="roles[]" value="crisis_line"> Crisis Line Support
                    </label>
                    <label style="display: flex; align-items: center; gap: var(--spacing-sm);">
                        <input type="checkbox" name="roles[]" value="admin"> Administrative Support
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="experience">Tell us about yourself and why you want to volunteer</label>
                <textarea id="experience" name="experience" class="form-control" rows="4" placeholder="Share your background, any lived experience, and what motivates you to help others..."></textarea>
            </div>
            
            <div class="form-group">
                <label style="display: flex; align-items: flex-start; gap: var(--spacing-sm);">
                    <input type="checkbox" name="consent" required style="margin-top: 4px;">
                    <span>I understand that a background check may be required for certain volunteer positions.</span>
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                <i class="fas fa-paper-plane"></i> Submit Application
            </button>
        </form>
    </div>
</section>

<script>
document.getElementById('volunteer-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span> Submitting...';
    
    setTimeout(function() {
        alert('Thank you for your interest in volunteering! We will review your application and be in touch within 5 business days.');
        window.location.href = '/';
    }, 1500);
});
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
