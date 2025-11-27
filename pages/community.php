<?php
/**
 * OUTSSINC Platform - Community Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Community';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>Community</span>
    </nav>
    <h1>Our Community</h1>
    <p>Connect with others who understand your journey. You're not alone.</p>
</div>

<section class="section bg-white">
    <div class="container" style="max-width: 1000px;">
        <div class="section-header">
            <h2>Welcome to Our Community</h2>
            <p>OUTSSINC is more than a support service—it's a community of people helping people. Here, lived experience is valued, stories are heard, and everyone belongs.</p>
        </div>
        
        <div class="grid grid-3" style="margin-bottom: var(--spacing-3xl);">
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <i class="fas fa-hands-helping fa-3x text-primary" style="margin-bottom: var(--spacing-lg);"></i>
                <h4>Peer Support</h4>
                <p class="text-muted">Connect with others who have walked similar paths. Share experiences and learn from each other.</p>
            </div>
            
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <i class="fas fa-calendar-alt fa-3x text-primary" style="margin-bottom: var(--spacing-lg);"></i>
                <h4>Community Events</h4>
                <p class="text-muted">Join us for regular meetups, workshops, and social events throughout Northumberland County.</p>
            </div>
            
            <div class="card-3d" style="text-align: center; padding: var(--spacing-xl);">
                <i class="fas fa-comments fa-3x text-primary" style="margin-bottom: var(--spacing-lg);"></i>
                <h4>Online Connection</h4>
                <p class="text-muted">Can't make it in person? Connect with our community through online chat and virtual meetings.</p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container" style="max-width: 900px;">
        <h2 style="text-align: center; margin-bottom: var(--spacing-2xl);">Ways to Get Involved</h2>
        
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
            <h3><i class="fas fa-coffee text-primary"></i> Drop-In Sessions</h3>
            <p class="text-muted">
                Our weekly drop-in sessions are a casual way to connect. No appointment needed—just show up for coffee, 
                conversation, and community. It's a safe space where everyone is welcome.
            </p>
            <p><strong>When:</strong> Mondays & Wednesdays, 10 AM - 12 PM</p>
            <p><strong>Where:</strong> Cobourg Community Centre</p>
        </div>
        
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
            <h3><i class="fas fa-users text-primary"></i> Support Groups</h3>
            <p class="text-muted">
                Join one of our peer-led support groups. These small groups meet regularly to share experiences, 
                offer encouragement, and support each other through challenges.
            </p>
            <ul style="margin: var(--spacing-md) 0; padding-left: var(--spacing-xl);">
                <li>Recovery Support Group (Thursdays)</li>
                <li>Mental Health Peer Group (Tuesdays)</li>
                <li>Housing & Stability Group (Fridays)</li>
            </ul>
            <a href="/pages/events.php" class="btn btn-outline btn-sm">View Schedule</a>
        </div>
        
        <div class="card" style="padding: var(--spacing-xl); margin-bottom: var(--spacing-lg);">
            <h3><i class="fas fa-laptop text-primary"></i> Virtual Community</h3>
            <p class="text-muted">
                Can't attend in person? Our virtual community options let you connect from anywhere. 
                Video support groups, online chat, and phone check-ins are all available.
            </p>
            <div style="display: flex; gap: var(--spacing-md); flex-wrap: wrap;">
                <a href="/pages/chat.php" class="btn btn-outline btn-sm"><i class="fas fa-comments"></i> Live Chat</a>
                <a href="/pages/self-refer.php" class="btn btn-outline btn-sm"><i class="fas fa-video"></i> Request Virtual Meeting</a>
            </div>
        </div>
        
        <div class="card" style="padding: var(--spacing-xl);">
            <h3><i class="fas fa-heart text-primary"></i> Become a Peer Mentor</h3>
            <p class="text-muted">
                Have you overcome challenges and want to help others do the same? Our peer mentor program 
                trains people with lived experience to support others in the community.
            </p>
            <a href="/pages/volunteer.php" class="btn btn-primary btn-sm">Learn About Volunteering</a>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container" style="max-width: 1000px;">
        <div class="section-header">
            <h2>Community Guidelines</h2>
            <p>To keep our community safe and supportive, we ask everyone to follow these guidelines.</p>
        </div>
        
        <div class="grid grid-2" style="gap: var(--spacing-lg);">
            <div style="padding: var(--spacing-lg); background: var(--color-light); border-radius: var(--border-radius);">
                <h4><i class="fas fa-check-circle text-success"></i> Respect Everyone</h4>
                <p class="text-muted" style="margin: 0;">Treat all community members with dignity and respect, regardless of their background or circumstances.</p>
            </div>
            
            <div style="padding: var(--spacing-lg); background: var(--color-light); border-radius: var(--border-radius);">
                <h4><i class="fas fa-check-circle text-success"></i> Maintain Confidentiality</h4>
                <p class="text-muted" style="margin: 0;">What's shared in the community stays in the community. Never share someone else's story without permission.</p>
            </div>
            
            <div style="padding: var(--spacing-lg); background: var(--color-light); border-radius: var(--border-radius);">
                <h4><i class="fas fa-check-circle text-success"></i> No Judgment</h4>
                <p class="text-muted" style="margin: 0;">Everyone's journey is different. We don't judge people for their past or their current struggles.</p>
            </div>
            
            <div style="padding: var(--spacing-lg); background: var(--color-light); border-radius: var(--border-radius);">
                <h4><i class="fas fa-check-circle text-success"></i> Support, Don't Fix</h4>
                <p class="text-muted" style="margin: 0;">We're here to listen and support, not to give advice or try to fix each other's problems.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Connect?</h2>
        <p>Whether you need support or want to offer it, there's a place for you in our community.</p>
        <div class="cta-buttons">
            <a href="/pages/intake.php" class="btn btn-lg btn-white">
                <i class="fas fa-hands-helping"></i> Get Support
            </a>
            <a href="/pages/events.php" class="btn btn-lg btn-outline-white">
                <i class="fas fa-calendar"></i> View Events
            </a>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
