<?php
/**
 * OUTSSINC Platform - About Us Page
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'About Us';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<div class="page-header">
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span>/</span>
        <span>About Us</span>
    </nav>
    <h1>About OUTSSINC</h1>
    <p>Outreach Someone In Need of Change - Meeting you where you are, getting you where you want to be.</p>
</div>

<section class="section bg-white">
    <div class="container">
        <div class="grid grid-2" style="gap: var(--spacing-3xl); align-items: center;">
            <div>
                <h2>Our Mission</h2>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                    OUTSSINC is a peer-to-peer support organization based in Cobourg, Ontario, Canada. We are made up of individuals with lived and living experience who understand firsthand the challenges our community faces.
                </p>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                    We help people navigate the often overwhelming obstacles in life - from finding housing and food security, to accessing mental health support and managing financial challenges. Whether you're dealing with substance use, family crisis, legal issues, or simply need help finding out what services exist - we are here for you.
                </p>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                    <strong>We meet our clients where they are at, and help them get to where they want to be.</strong>
                </p>
            </div>
            <div>
                <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg" style="width:100%;max-width:400px;margin:0 auto;display:block;">
                    <defs>
                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#d80032;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#a00025;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <rect x="50" y="50" width="300" height="200" rx="20" fill="url(#grad)" opacity="0.1"/>
                    <circle cx="150" cy="120" r="40" fill="url(#grad)" opacity="0.3"/>
                    <circle cx="250" cy="120" r="40" fill="url(#grad)" opacity="0.3"/>
                    <path d="M150 160 C 150 200, 250 200, 250 160" stroke="url(#grad)" stroke-width="8" fill="none"/>
                    <text x="200" y="230" text-anchor="middle" font-size="16" fill="#1c1c1e" font-weight="600">Peer Support</text>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Our Values</h2>
            <p>The principles that guide everything we do.</p>
        </div>
        
        <div class="grid grid-3" style="max-width: 1000px; margin: 0 auto;">
            <div class="card-3d text-center">
                <div class="card-icon" style="margin: 0 auto var(--spacing-lg); background: linear-gradient(135deg, #e83e8c 0%, #c21a68 100%);">
                    <i class="fas fa-heart"></i>
                </div>
                <h4>Empathy First</h4>
                <p class="text-muted">We lead with compassion and understanding. No judgment, no barriers - just genuine care for every person we serve.</p>
            </div>
            
            <div class="card-3d text-center">
                <div class="card-icon" style="margin: 0 auto var(--spacing-lg); background: linear-gradient(135deg, #6f42c1 0%, #553098 100%);">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Lived Experience</h4>
                <p class="text-muted">Our team has walked the path you're on. We've been there, and we use that experience to help light your way forward.</p>
            </div>
            
            <div class="card-3d text-center">
                <div class="card-icon" style="margin: 0 auto var(--spacing-lg); background: linear-gradient(135deg, #28a745 0%, #1e7b34 100%);">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Safety & Privacy</h4>
                <p class="text-muted">Your information is confidential. We create safe spaces where you can be yourself without fear.</p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="section-header">
            <h2>What We Help With</h2>
            <p>Life's challenges come in many forms. We're here to help with all of them.</p>
        </div>
        
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #28a745 0%, #1e7b34 100%);">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Housing</h3>
                <p>Finding housing, rent assistance, eviction prevention, emergency shelters.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #fd7e14 0%, #cc5500 100%);">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3>Food Security</h3>
                <p>Food banks, meal programs, community kitchens, nutrition support.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #6f42c1 0%, #553098 100%);">
                    <i class="fas fa-brain"></i>
                </div>
                <h3>Mental Health</h3>
                <p>Peer support, counseling referrals, crisis intervention, wellness check-ins.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Substance Use</h3>
                <p>Harm reduction, treatment navigation, recovery support, peer connections.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #20c997 0%, #17a085 100%);">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Financial Help</h3>
                <p>Bill assistance, debt support, benefits applications, budgeting help.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3>Legal Support</h3>
                <p>Understanding rights, legal aid connections, court accompaniment.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);">
                    <i class="fas fa-id-card"></i>
                </div>
                <h3>ID & Documents</h3>
                <p>Birth certificates, health cards, IDs, document recovery assistance.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #e83e8c 0%, #c21a68 100%);">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Family Support</h3>
                <p>Parenting resources, family reconnection, child services navigation.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Connect?</h2>
        <p>Take the first step. Our team is ready to listen and help you navigate your path forward.</p>
        <div class="cta-buttons">
            <a href="/pages/intake.php" class="btn btn-lg btn-white">
                <i class="fas fa-clipboard-list"></i> Start Assessment
            </a>
            <a href="/pages/contact.php" class="btn btn-lg btn-outline-white">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Our Location</h2>
            <p>Based in Cobourg, Ontario, serving Northumberland County and beyond.</p>
        </div>
        
        <div class="card" style="max-width: 600px; margin: 0 auto; text-align: center;">
            <i class="fas fa-map-marker-alt fa-3x text-primary mb-2"></i>
            <h3>Cobourg, Ontario, Canada</h3>
            <p class="text-muted">Proudly serving our local community with peer support services.</p>
            <p>
                <strong>Phone:</strong> <?php echo SITE_PHONE; ?><br>
                <strong>Email:</strong> <?php echo SITE_EMAIL; ?><br>
                <strong>24/7 Crisis Line:</strong> <?php echo CRISIS_LINE; ?>
            </p>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
