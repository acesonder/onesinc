<?php
/**
 * OUTSSINC Platform - Landing Page
 * 
 * Main public-facing homepage.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>You Are <span>Not Alone</span></h1>
            <p>OUTSSINC is here to meet you where you are and help you get to where you want to be. We provide peer support from people with lived and living experience, helping you navigate life's challenges.</p>
            
            <div class="hero-actions">
                <a href="/pages/intake.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-hands-helping"></i> Get Help Now
                </a>
                <a href="/pages/resources.php" class="btn btn-outline btn-lg">
                    <i class="fas fa-map-marked-alt"></i> Find Resources
                </a>
            </div>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">People Helped</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Partner Agencies</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </div>
        
        <div class="hero-visual">
            <div class="hero-image">
                <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;max-width:400px;">
                    <!-- Abstract community illustration -->
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#d80032;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#a00025;stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#f8f9fd;stop-opacity:0.3" />
                            <stop offset="100%" style="stop-color:#f8f9fd;stop-opacity:0.1" />
                        </linearGradient>
                    </defs>
                    <circle cx="200" cy="200" r="180" fill="url(#grad1)" opacity="0.1"/>
                    <circle cx="200" cy="200" r="140" fill="url(#grad1)" opacity="0.2"/>
                    <circle cx="200" cy="200" r="100" fill="url(#grad1)" opacity="0.3"/>
                    <!-- People icons -->
                    <g fill="url(#grad1)">
                        <circle cx="200" cy="160" r="30"/>
                        <ellipse cx="200" cy="230" rx="40" ry="50"/>
                    </g>
                    <g fill="#f8f9fd" opacity="0.8">
                        <circle cx="130" cy="200" r="20"/>
                        <ellipse cx="130" cy="250" rx="25" ry="35"/>
                    </g>
                    <g fill="#f8f9fd" opacity="0.8">
                        <circle cx="270" cy="200" r="20"/>
                        <ellipse cx="270" cy="250" rx="25" ry="35"/>
                    </g>
                    <!-- Connecting hands -->
                    <path d="M150 220 Q 170 200 190 220" stroke="#f8f9fd" stroke-width="8" fill="none" stroke-linecap="round"/>
                    <path d="M210 220 Q 230 200 250 220" stroke="#f8f9fd" stroke-width="8" fill="none" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Crisis Alert Banner -->
<section class="alert-crisis">
    <div class="container">
        <p><strong><i class="fas fa-phone-alt"></i> Need immediate help?</strong> 
        Call our 24/7 Crisis Line: <a href="tel:<?php echo CRISIS_LINE; ?>"><?php echo CRISIS_LINE; ?></a> 
        or Text: <a href="sms:<?php echo CRISIS_TEXT; ?>"><?php echo CRISIS_TEXT; ?></a></p>
    </div>
</section>

<!-- Services Section -->
<section class="features-section" id="services">
    <div class="section-header">
        <h2>How We Can Help</h2>
        <p>Whether you're facing housing challenges, mental health concerns, or just need someone to talk to - we're here with lived experience and real solutions.</p>
    </div>
    
    <div class="feature-grid">
        <div class="feature-card housing">
            <div class="feature-icon">
                <i class="fas fa-home"></i>
            </div>
            <h3>Housing Support</h3>
            <p>Help with finding housing, rent assistance, eviction prevention, and emergency shelter access.</p>
            <a href="/pages/resources.php?category=housing" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card mental-health">
            <div class="feature-icon">
                <i class="fas fa-brain"></i>
            </div>
            <h3>Mental Health</h3>
            <p>Peer support for anxiety, depression, trauma, and other mental health challenges.</p>
            <a href="/pages/resources.php?category=mental-health" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card food">
            <div class="feature-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <h3>Food Security</h3>
            <p>Connect with food banks, meal programs, and community kitchens in your area.</p>
            <a href="/pages/resources.php?category=food" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card financial">
            <div class="feature-icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <h3>Financial Help</h3>
            <p>Assistance with bills, debt, budgeting, and accessing financial support programs.</p>
            <a href="/pages/resources.php?category=financial" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card legal">
            <div class="feature-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <h3>Legal Support</h3>
            <p>Help navigating legal issues, understanding rights, and connecting with legal aid.</p>
            <a href="/pages/resources.php?category=legal" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card health">
            <div class="feature-icon">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h3>Health Services</h3>
            <p>Access to healthcare, harm reduction, and support for chronic conditions.</p>
            <a href="/pages/resources.php?category=health" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card employment">
            <div class="feature-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3>Employment</h3>
            <p>Job search support, resume help, skills training, and career guidance.</p>
            <a href="/pages/resources.php?category=employment" class="btn btn-sm btn-outline">Learn More</a>
        </div>
        
        <div class="feature-card family">
            <div class="feature-icon">
                <i class="fas fa-users"></i>
            </div>
            <h3>Family Support</h3>
            <p>Help with family challenges, parenting support, and child services navigation.</p>
            <a href="/pages/resources.php?category=family" class="btn btn-sm btn-outline">Learn More</a>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section bg-white" id="how-it-works">
    <div class="container">
        <div class="section-header">
            <h2>How It Works</h2>
            <p>Getting help is simple and confidential. Here's how we support you.</p>
        </div>
        
        <div class="grid grid-3" style="max-width: 1000px; margin: 0 auto;">
            <div class="card-3d text-center">
                <div class="card-icon" style="margin: 0 auto var(--spacing-lg);">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h4>1. Tell Us About You</h4>
                <p>Complete our smart intake assessment to help us understand your needs. It only takes a few minutes and you can save your progress.</p>
            </div>
            
            <div class="card-3d text-center">
                <div class="card-icon" style="margin: 0 auto var(--spacing-lg); background: linear-gradient(135deg, #28a745 0%, #1e7b34 100%);">
                    <i class="fas fa-user-friends"></i>
                </div>
                <h4>2. Get Matched</h4>
                <p>We'll connect you with a peer support worker who understands your situation - because they've been there too.</p>
            </div>
            
            <div class="card-3d text-center">
                <div class="card-icon" style="margin: 0 auto var(--spacing-lg); background: linear-gradient(135deg, #6f42c1 0%, #553098 100%);">
                    <i class="fas fa-rocket"></i>
                </div>
                <h4>3. Start Your Journey</h4>
                <p>Work with your peer support worker to access resources, make connections, and achieve your goals.</p>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <a href="/pages/intake.php" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-right"></i> Start Your Assessment
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Take the First Step?</h2>
        <p>You don't have to face life's challenges alone. Our peer support workers are here to help you navigate the path forward.</p>
        <div class="cta-buttons">
            <a href="/pages/self-refer.php" class="btn btn-lg btn-white">
                <i class="fas fa-user-plus"></i> Self Refer Now
            </a>
            <a href="/pages/about.php" class="btn btn-lg btn-outline-white">
                <i class="fas fa-info-circle"></i> Learn About Us
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section" id="testimonials">
    <div class="section-header">
        <h2>Stories of Hope</h2>
        <p>Real stories from people we've helped on their journey.</p>
    </div>
    
    <div class="testimonial-grid">
        <div class="testimonial-card">
            <p class="testimonial-text">"When I lost my job and was about to lose my apartment, OUTSSINC helped me find emergency support and connected me with resources I didn't know existed. They saved my life."</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">M</div>
                <div class="testimonial-info">
                    <div class="testimonial-name">Maria</div>
                    <div class="testimonial-role">Community Member</div>
                </div>
            </div>
        </div>
        
        <div class="testimonial-card">
            <p class="testimonial-text">"Having someone who actually understood what I was going through made all the difference. My peer support worker didn't just give me advice - they walked alongside me."</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">J</div>
                <div class="testimonial-info">
                    <div class="testimonial-name">James</div>
                    <div class="testimonial-role">Program Participant</div>
                </div>
            </div>
        </div>
        
        <div class="testimonial-card">
            <p class="testimonial-text">"I was struggling with addiction and felt hopeless. OUTSSINC met me where I was without judgment and helped me access treatment when I was ready. I'm now 6 months clean."</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">S</div>
                <div class="testimonial-info">
                    <div class="testimonial-name">Sarah</div>
                    <div class="testimonial-role">Recovery Journey</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="section bg-light" id="partners">
    <div class="container">
        <div class="section-header">
            <h2>Our Partners</h2>
            <p>We work with local agencies and organizations to provide comprehensive support.</p>
        </div>
        
        <div class="grid grid-4 text-center" style="gap: var(--spacing-xl); opacity: 0.7;">
            <div class="card p-2">
                <i class="fas fa-hospital fa-2x text-primary mb-2"></i>
                <p class="text-muted mb-0">Northumberland Hills Hospital</p>
            </div>
            <div class="card p-2">
                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                <p class="text-muted mb-0">Community Care</p>
            </div>
            <div class="card p-2">
                <i class="fas fa-hands-helping fa-2x text-primary mb-2"></i>
                <p class="text-muted mb-0">United Way</p>
            </div>
            <div class="card p-2">
                <i class="fas fa-building fa-2x text-primary mb-2"></i>
                <p class="text-muted mb-0">Cobourg Housing</p>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
